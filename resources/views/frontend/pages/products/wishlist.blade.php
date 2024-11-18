@extends('frontend.layouts.master')
@section('title', 'Wishlist')
@section('content')

<!-- Wishlist Area -->
<div class="wishlist-area py-5">
    <div class="container">
        <h2 class="text-center mb-4">Your Wishlist</h2>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive shadow rounded">
                    <table class="wishlist-table table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th class="text-center">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($wishlistItems->isEmpty())
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <h5>Your wishlist is currently empty.</h5>
                                    <a href="{{ url('/') }}" class="btn btn-primary mt-3">Continue Shopping</a>
                                </td>
                            </tr>
                            @else
                            @foreach($wishlistItems as $item)
                            <tr>
                                <td class="p-3">
                                    <a href="{{ route('product.details', $item->product->slug) }}">
                                        <img src="{{ asset('public/uploads/products/' . $item->product->prd_image) }}" alt="{{ $item->product->prd_name }}" class="img-thumbnail" style="width: 80px; height: auto;">
                                    </a>
                                </td>
                                <td>
                                    <h5 class="mb-1">
                                        <a href="{{ route('product.details', $item->product->slug) }}" class="text-dark">{{ $item->product->prd_name }}</a>
                                    </h5>
                                    <small class="text-muted">In stock</small>
                                </td>
                                <td class="fw-bold">₹{{ $item->product->prd_discount_price }}</td>
                                <td class="text-center">
                                    <form action="{{ route('wishlist.remove') }}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                        <button type="submit" onclick="return confirm('Remove this item from the wishlist?');" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-alt"></i> Remove
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @if(!$wishlistItems->isEmpty())
                <div class="text-end mt-4">
                    <a href="{{ url('/') }}" class="btn btn-outline-primary">Continue Shopping</a>
                    <a href="{{ route('checkout.index') }}" class="btn btn-primary">Proceed to Checkout</a>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- End of Wishlist Area -->

@endsection