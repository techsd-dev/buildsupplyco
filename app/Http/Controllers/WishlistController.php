<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlistItems = Wishlist::where('user_id', Auth::id())->with('product')->get();
        return view('frontend.pages.products.wishlist', compact('wishlistItems'));
    }

    public function addToWishlist(Request $request)
    {
        if (!Auth::check()) {
            return response()->json(['status' => 'error', 'message' => 'Please log in to add items to your wishlist']);
        }
        $user_id = Auth::id();
        $product_id = $request->product_id;
        $wishlist = Wishlist::where('user_id', $user_id)->where('product_id', $product_id)->first();
        if ($wishlist) {
            return response()->json(['status' => 'info', 'message' => 'This product is already in your wishlist']);
        } else {
            Wishlist::create([
                'user_id' => $user_id,
                'product_id' => $product_id,
            ]);
            return response()->json(['status' => 'success', 'message' => 'Product added to wishlist']);
        }
    }


    public function removeFromWishlist(Request $request)
    {
        Wishlist::where('id', $request->id)->delete();
        return redirect()->back()->with('success', 'Product removed from wishlist');
    }
}
