@extends('frontend.layouts.master')
@section('title', 'Cart List')
@section('content')

<!--shopping-cart area-->
<div class="shopping-cart-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="table-responsive">
                    <table class="cart-table">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th class="text-center"><i class="fa fa-times" aria-hidden="true"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            @if($cartItems->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Cart List is empty.</td>
                            </tr>
                            @else
                            @foreach($cartItems as $item)
                            <tr>
                                <td>
                                    <div class="mini-cart-thumb">
                                        <a href="#"><img src="{{ asset('public/uploads/products/' . $item->product->prd_image) }}" alt="" /></a>
                                    </div>
                                </td>
                                <td>
                                    <div class="cart-product-name">
                                        <h5><a href="#">{{ $item->product->prd_name }}</a></h5>
                                    </div>
                                </td>
                                <td>
                                    <span class="cart-product-price">₹{{ $item->product->prd_discount_price }}</span>
                                </td>
                                <td>
                                    <div class="cart-quantity-changer">
                                        <form action="{{ route('cart.update', $item->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" style="width: 60px;">
                                            <button type="submit" class="btn btn-sm btn-primary">Update</button>
                                        </form>
                                    </div>
                                </td>
                                <td>
                                    <span class="cart-product-price">₹{{ $item->product->prd_discount_price * $item->quantity }}</span>
                                </td>
                                <td>
                                    <div class="product-remove">
                                        <form action="{{ route('cart.remove') }}" method="POST" style="display: inline;">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item->id }}">
                                            <button type="submit" onclick="return confirm('Are you sure you want to remove this item from the cart?');" class="btn btn-sm btn-danger">Remove</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="row mt-30">
            <!-- <div class="col-lg-6">
                <div class="cart-update pull-right">
                    <a href="#" class="btn-common">UPDATE CART</a>
                </div>
            </div> -->
            <div class="col-lg-6">
                <div class="cart-update">
                    <a href="{{ url('/') }}" class="btn-common">CONTINUE SHOPPING</a>
                </div>
            </div>
        </div>

        <div class="row mt-40">
            <div class="col-lg-4">
                <!-- <div class="cart-box shpping-tax">
                    <h5>Estimate Shipping And Tax</h5>
                    <div class="cart-box-inner">
                        <p>Enter your destination to get shipping & tax</p>
                        <table class="table">
                            <tr>
                                <td>
                                    <label>COUNTRY *:</label>
                                </td>
                                <td>
                                    <select>
                                        <option>Select options</option>
                                        <option>United States</option>
                                        <option>China</option>
                                        <option>Canada</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>STATE / PROVINCE *:</label>
                                </td>
                                <td>
                                    <select>
                                        <option>Select options</option>
                                        <option>United States</option>
                                        <option>China</option>
                                        <option>Canada</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>ZIP / POSTAL CODE *:</label>
                                </td>
                                <td>
                                    <select>
                                        <option>Select options</option>
                                        <option>United States</option>
                                        <option>China</option>
                                        <option>Canada</option>
                                    </select>
                                </td>
                            </tr>
                        </table>
                        <a href="#" class="btn-common">GET A QUOTE</a>
                    </div>
                </div> -->
            </div>
            <div class="col-lg-4">
                <!-- <div class="cart-box cart-coupon fix">
                    <h5>Discount Codes</h5>
                    <div class="cart-box-inner">
                        <p>Enter your coupon if you have one</p>
                        <form action="{{ route('cart.applyCoupon') }}" method="POST">
                            @csrf
                            <input type="text" name="coupon_code" placeholder="Enter coupon code" required />
                            <button type="submit" class="btn-common">Apply</button>
                        </form>
                        @if(session('message'))
                        <div class="alert alert-info mt-2">{{ session('message') }}</div>
                        @endif
                    </div>
                </div> -->
            </div>

            <div class="col-lg-4">
                <div class="cart-box cart-total">
                    <h5>Cart Total</h5>
                    <div class="cart-box-inner">
                        <table class="table">
                            <tr>
                                <td>SUB TOTAL:</td>
                                <td><span>₹{{ $cartItems->sum(fn($item) => $item->product->prd_discount_price * $item->quantity) }}</span></td>
                            </tr>
                            <tr>
                                <td>GRAND TOTAL:</td>
                                <td>
                                    <span>
                                        ₹{{ $cartItems->sum(fn($item) => $item->product->prd_discount_price * $item->quantity) - (session('discount') ? session('discount') * $cartItems->sum(fn($item) => $item->product->prd_discount_price * $item->quantity) : 0) }}
                                    </span>
                                </td>
                            </tr>

                        </table>
                        <div class="proceed-checkout">
                            <div class="col-lg-12">
                                <a href="#">Checkout with multiple addresses</a>
                            </div>
                            <div class="col-lg-12">
                                <a href="{{ route('checkout.index') }}" class="btn-common">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--shopping-cart end-->

@endsection