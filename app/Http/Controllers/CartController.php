<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();
        return view('frontend.pages.products.cart', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        // Check if the user is authenticated
        if (Auth::check()) {
            // Use the authenticated user's ID
            $userId = Auth::id();
            $sessionId = null; // No session ID needed for authenticated users
        } else {
            // Use the session ID for guest users
            $userId = null; // No user ID for guest users
            $sessionId = session()->getId(); // Get the session ID
        }

        // Get the product from the database
        $product = Product::findOrFail($request->product_id);

        // Check if the product already exists in the cart for this user (either authenticated or guest)
        $cartItem = Cart::where(function ($query) use ($userId, $sessionId) {
            // Check for either user_id or session_id
            if ($userId) {
                $query->where('user_id', $userId);
            } elseif ($sessionId) {
                $query->where('session_id', $sessionId);
            }
        })
            ->where('product_id', $product->id)
            ->first();

        // If the product is already in the cart, increase the quantity
        if ($cartItem) {
            $cartItem->quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Otherwise, create a new cart item for the user or guest
            Cart::create([
                'user_id' => $userId,  // Store the Auth ID for authenticated users
                'session_id' => $sessionId, // Store the session ID for guest users
                'product_id' => $product->id,
                'quantity' => $request->quantity,
            ]);
        }

        return response()->json(['success' => 'Product added to cart']);
    }



    public function updateCart(Request $request, $id)
    {
        $cartItem = Cart::where('user_id', Auth::id())->where('id', $id)->first();
        if ($cartItem) {
            $cartItem->update(['quantity' => $request->quantity]);
        }
        return back()->with('success', 'Cart updated');
    }

    public function remove(Request $request)
    {
        $request->validate(['id' => 'required|integer']);
        $cartItem = Cart::where('id', $request->id)->where('user_id', Auth::id())->first();
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Item removed from cart.');
        }
        return redirect()->back()->with('success', 'Item not found.');
    }

    public function applyCoupon(Request $request)
    {
        // Validate the coupon code
        $request->validate(['coupon_code' => 'required|string']);

        $couponCode = $request->input('coupon_code');
        $discount = 0;
        $message = '';

        // Here you should retrieve your coupon data. For example:
        if ($couponCode === 'SAVE10') {
            $discount = 0.10; // 10% discount
            $message = "Coupon applied successfully! You get 10% off.";
        } else {
            $message = "Invalid coupon code.";
            return redirect()->back()->with('message', $message);
        }

        // Retrieve the cart items from the database
        $cartItems = Cart::where('user_id', auth()->id())->get(); // Assuming you have a user_id column
        $total = $cartItems->sum(fn($item) => $item->product->prd_discount_price * $item->quantity);

        // Calculate the discounted total
        $discountedTotal = $total - ($total * $discount);

        // Optionally, you can store the discounted total in the database
        // This example assumes you have a 'total' column in your carts table
        Cart::where('user_id', auth()->id())->update(['discounted_total' => $discountedTotal]);

        // Redirect back with a success message
        return redirect()->back()->with('message', $message);
    }
}
