<?php

namespace App\Http\Controllers;

use App\Models\BookApartment;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Users;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PhonePecontroller extends Controller
{
    public function phonePe(Request $request)
    {
        if (!auth()->check()) {
            session(['url.intended' => url()->full()]);
            return redirect('user/signin')->withInput($request->except('password'))->with('error', 'You need to log in first.');
        }


        // get gst from settigns table 
        // $getGst = DB::table('settings')->where('id', 1)->first();

        // calculate gst & total price
        $totalPrice = $request->price * 100;

        if (!empty(Auth::user()->id)) { {
                $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|email',
                    'address' => 'required|string',
                    'payment_method' => 'required',
                ]);
                // Create Order
                $order = Order::create([
                    'user_id' => auth()->id(),
                    'name' => $request->name,
                    'total' => $totalPrice,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'address' => $request->address,
                    'payment_method' => $request->payment_method,
                ]);

                // Add Order Items
                $cartItems = Cart::where('user_id', auth()->id())->get();
                foreach ($cartItems as $item) {
                    OrderItem::create([
                        'order_id' => $order->id,
                        'price' => 00.00,
                        'product_id' => $item->product_id,
                        'quantity' => $item->quantity,
                    ]);
                }

                // Clear cart after order
                Cart::where('user_id', auth()->id())->delete();
            }
        }

        // payment behalf of auth id 
        $user_id = Auth::user()->id;
        $transactionID = time() . '-' . $user_id;
        $trnsData['user_id'] = $user_id;
        $trnsData['mer_transaction_id'] = $transactionID;
        $trnsData['order_id'] = $order->id;
        $trnsData['created_at'] = carbon::now();
        $trnsData['updated_at'] = carbon::now();
        DB::table('transactions')->insert($trnsData);

        $data = array(
            'merchantId' => 'PHONEPEPGTESTUAT54',
            'merchantTransactionId' => $transactionID,
            'merchantUserId' => 'MUID123',
            'amount' => $totalPrice,
            'redirectUrl' =>  url('phonepe-response'),
            'redirectMode' => 'POST',
            'callbackUrl' =>  url('phonepe-response'),
            'mobileNumber' => '9999999999',
            'paymentInstrument' =>
            array(
                'type' => 'PAY_PAGE',
            ),
        );
        $encode = base64_encode(json_encode($data));
        $saltKey = 'eb94b389-9708-439e-a03b-333941a6be6a';
        $saltIndex = 1;
        $string = $encode . '/pg/v1/pay' . $saltKey;
        $sha256 = hash('sha256', $string);
        $finalXHeader = $sha256 . '###' . $saltIndex;
        $url = "https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/pay";
        $response = Curl::to($url)
            ->withHeader('Content-Type:application/json')
            ->withHeader('X-VERIFY:' . $finalXHeader)
            ->withData(json_encode(['request' => $encode]))
            ->post();
        $rData = json_decode($response);

        return redirect()->to($rData->data->instrumentResponse->redirectInfo->url);
    }

    public function response(Request $request)
    {
        $input = $request->all();
        \Log::info('PhonePe API response: ' . json_encode($input));

        $saltKey = 'eb94b389-9708-439e-a03b-333941a6be6a';
        $saltIndex = 1;

        $finalXHeader = hash('sha256', '/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'] . $saltKey) . '###' . $saltIndex;

        $response = Curl::to('https://api-preprod.phonepe.com/apis/pg-sandbox/pg/v1/status/' . $input['merchantId'] . '/' . $input['transactionId'])
            ->withHeader('Content-Type:application/json')
            ->withHeader('accept:application/json')
            ->withHeader('X-VERIFY:' . $finalXHeader)
            ->withHeader('X-MERCHANT-ID:' . $input['transactionId'])
            ->get();


        \Log::info('PhonePe API status response: ' . $response);

        $res = json_decode($response);

        if (json_last_error() !== JSON_ERROR_NONE) {
            \Log::error('Failed to decode PhonePe API status response: ' . json_last_error_msg());
            return redirect()->back()->with('error', 'You have exceeded your payment limit. Please try again after 24 hours.');
        }
        if (isset($input['code']) && $input['code'] === 'PAYMENT_SUCCESS') {
            $getuserId = explode('-', $input['transactionId']);
            $userId = $getuserId[1];
            $tData['user_id'] = $userId;
            $tData['mer_transaction_id'] = $input['transactionId'];
            $tData['transaction_id'] = $input['providerReferenceId'];
            $tData['amount'] = $input['amount'];
            $tData['state'] = 'SUCCESS';
            $tData['complete_response'] = json_encode($input);
            $tData['status'] = 'Success';
            $tData['updated_at'] = Carbon::now();
            $orderId = DB::table('transactions')->where('mer_transaction_id', $input['transactionId'])->value('order_id');
        } else {
            $tData['complete_response'] = json_encode($input);
            $tData['status'] = 'Fail';
            $tData['updated_at'] = Carbon::now();
        }

        // $data['status'] = 1;
        // Order::where('id',  $orderId)->update($data);
        $mrTrsId = $input['transactionId'];
        $trans = DB::table('transactions')->where('mer_transaction_id', $mrTrsId)->update($tData);
        Auth::loginUsingId($userId);
        return view('frontend.pages.thanku', compact('mrTrsId', 'userId', 'orderId'));
    }
}
