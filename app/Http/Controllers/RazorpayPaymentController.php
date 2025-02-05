<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RazorpayPaymentController extends Controller
{
    public function processPayment(Request $request)
    {
        if (!auth()->check()) {
            session(['url.intended' => url()->full()]);
            return redirect('user-login')->withInput($request->except('password'))->with('error', 'You need to log in first.');
        }

        // Validate input fields
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'address' => 'required|string',
            'payment_method' => 'required',
        ]);

        // Initialize order total
        $totalPrice = $request->price * 100; // Convert price to paise

        // Create order
        $order = Order::create([
            'user_id' => auth()->id(),
            'name' => $request->name,
            'total' => $totalPrice,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
        ]);

        // Check if the request includes a product ID (single product purchase)
        if ($request->has('product_id')) {
            $product = Product::find($request->product_id);
            if ($product) {
                $quantity = $request->quantity ?? 1; // Default quantity is 1
                $totalAmt = $product->prd_price * $quantity;

                // Add product to OrderItem
                OrderItem::create([
                    'order_id' => $order->id,
                    'price' => $product->prd_price,
                    'total' => $totalAmt,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                ]);

                $totalPrice += $totalAmt;
            }
        } else {
            // If no product ID, fetch products from the cart
            $cartItems = Cart::where('user_id', auth()->id())->get();
            foreach ($cartItems as $item) {
                $product = Product::find($item->product_id);
                $totalAmt = $product->prd_price * $item->quantity;

                if ($product) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'price' => $product->prd_price,
                        'total' => $totalAmt,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                    ]);
                    $totalPrice += $totalAmt;
                }
            }
            // Clear cart after order creation
            Cart::where('user_id', auth()->id())->delete();
        }

        // Prepare transaction data
        $user_id = Auth::user()->id;
        $transactionID = time() . '-' . $user_id;

        // Initialize Razorpay API
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            // Create Razorpay order
            $razorpayOrder = $api->order->create([
                'receipt' => (string)$order->id,
                'amount' => (int)$totalPrice,
                'currency' => 'INR',
                'payment_capture' => 1,
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment failed to initialize.');
        }

        // Store transaction details in DB
        $transactionData = [
            'user_id' => $user_id,
            'mer_transaction_id' => $transactionID,
            'razorpay_order_id' => $razorpayOrder['id'],
            'order_id' => $order->id,
            'type' => 'Razorpay',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
        DB::table('transactions')->insert($transactionData);

        // Generate Razorpay payment form
        echo '<form action="' . url('razorpay-process-response') . '" method="POST" id="razorpay-form">
            ' . csrf_field() . '
            <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
            <input type="hidden" name="razorpay_order_id" value="' . $razorpayOrder['id'] . '">
            <input type="hidden" name="order_data" value="' . htmlentities(json_encode($order)) . '">
            <input type="hidden" name="mer_transaction_id" value="' . $transactionID . '"> 
        </form>

        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
        <script>
            var options = {
                "key": "' . env('RAZORPAY_KEY') . '",
                "amount": "' . $totalPrice . '",
                "currency": "INR",
                "name": "Buildsupplyco",
                "description": "Payment for Order",
                "order_id": "' . $razorpayOrder['id'] . '",
                "handler": function (response){
                    document.getElementById("razorpay_payment_id").value = response.razorpay_payment_id;
                    document.getElementById("razorpay-form").submit();
                },
                "prefill": {
                    "name": "' . Auth::user()->name . '",
                    "email": "' . Auth::user()->email . '",
                    "contact": "' . Auth::user()->phone . '"
                },
                "theme": {
                    "color": "#3399cc"
                }
            };
            var rzp1 = new Razorpay(options);
            rzp1.open();
        </script>';
    }

    public function processResponse(Request $request)
    {
        $input = $request->all();
        $merTransactionId = $input['mer_transaction_id'];
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            // Fetch payment details from Razorpay
            $payment = $api->payment->fetch($input['razorpay_payment_id']);
            if ($payment['status'] == 'captured') {
                $transactionData = [
                    'transaction_id' => $input['razorpay_payment_id'],
                    'amount' => $payment['amount'] / 100,
                    'status' => 'SUCCESS',
                    'complete_response' => json_encode($payment),
                    'type' => $payment['method'],
                    'updated_at' => now(),
                ];
                DB::table('transactions')->where('razorpay_order_id', $payment['order_id'])->update($transactionData);

                // Retrieve order details
                $order = DB::table('transactions')->where('razorpay_order_id', $payment['order_id'])->first();
                // Send WhatsApp Notification to Vendors
                $this->whatsAppApi($order->order_id);
                // Redirect to Thank You Page
                return view('frontend.pages.thanku', [
                    'mrTrsId' => $merTransactionId,
                    'userId' => $order->user_id,
                    'orderId' => $order->order_id
                ]);
            }
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Payment failed.');
        }
    }

    public function whatsAppApi($orderId)
    {
        $order = Order::with('orderItems.product')->find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        // Order details message
        $orderDetails = "New Order Received!\n";
        $orderDetails .= "Order ID: $orderId\n";

        // Loop through order items and pass necessary variables
        foreach ($order->orderItems as $item) {
            $productName = $item->product->prd_name;
            $quantity = $item->quantity;
            $price = $item->price;

            // Append item details to the message
            $orderDetails .= "- Product: $productName, Qty: $quantity, Price: ₹$price\n";

            // Call the sendWhatsAppMessageToVendors function with necessary data
            $this->sendWhatsAppMessageToVendors($productName, $quantity, $price, $orderId);
        }

        return response()->json(['success' => 'WhatsApp notifications sent to vendors.']);
    }


    public function sendWhatsAppMessageToVendors($productName, $quantity, $price, $orderId)
    {
        $url = "https://api.interakt.ai/v1/public/message/";
        $token = "bWI3bGF4REdoQlJPbWlYdTNZeDR3Z1ZfUHk0LTJGOXhmcjl0amI5V3lzTTo=";
        $vendors = DB::table('vendors')->get();
        foreach ($vendors as $vendor) {
            $phone = $vendor->phone;
            $orderId = preg_replace('/\s+/', ' ', trim($orderId));
            $productName = preg_replace('/\s+/', ' ', trim($productName));
            $quantity = preg_replace('/\s+/', ' ', trim($quantity));
            $price = preg_replace('/\s+/', ' ', trim($price));
            $data = [
                "countryCode" => "+91",
                "phoneNumber" => $phone,
                "callbackData" => "some text here",
                "type" => "Template",
                "template" => [
                    "name" => "orders",
                    "languageCode" => "en",
                    "bodyValues" => [
                        $orderId,
                        $productName,
                        $quantity,
                        $price
                    ]
                ]
            ];

            // Set the request headers
            $headers = [
                "Content-Type: application/json",
                "Authorization: Basic $token"
            ];

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            $response = curl_exec($ch);
            curl_close($ch);
        }
        return $response;
    }
}
