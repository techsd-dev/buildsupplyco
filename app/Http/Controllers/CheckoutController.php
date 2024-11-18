<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', auth()->id())->get();
        $total = $cartItems->sum(fn($item) => $item->product->prd_discount_price * $item->quantity);
        $grandTotal = $cartItems->sum(fn($item) => $item->discounted_total);
        $discount = $total - $grandTotal;
        return view('frontend.pages.products.checkout', compact('cartItems', 'total', 'grandTotal', 'discount'));
    }

    public function process(Request $request)
    {
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
            'email' => $request->email,
            'address' => $request->address,
            'payment_method' => $request->payment_method,
            'total' => session('total'),
        ]);

        // Add Order Items
        $cartItems = Cart::where('user_id', auth()->id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'quantity' => $item->quantity,
                'price' => $item->product->prd_discount_price,
            ]);
        }

        // Clear cart after order
        Cart::where('user_id', auth()->id())->delete();
        return redirect()->route('order.success')->with('message', 'Order placed successfully!');
    }
}