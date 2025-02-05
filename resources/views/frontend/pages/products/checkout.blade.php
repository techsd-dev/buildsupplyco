@extends('frontend.layouts.master')

@section('title', 'Checkout')

@section('content')

<!-- Checkout Area Start -->
<div class="checkout-area mt-15">
    <div class="container">
        <div class="row mt-10">
            <div class="col-lg-8">
                <h4>Billing Details</h4>
                <form action="{{ url('razorpay-process') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name <span class="text-danger">*</span></label>
                        <input type="text" id="name" name="name" value="Shankar" class="form-control" placeholder="Enter your Full Name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" value="shankar@gmail.com" class="form-control" placeholder="Enter your Email Address" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone No. <span class="text-danger">*</span></label>
                        <input type="tel" id="phone" name="phone" class="form-control" placeholder="Enter your Phone No." required pattern="^\d{10}$" value="8789876565" title="Please enter a 10-digit phone number">
                    </div>
                    <div class="form-group">
                        <label for="address">Shipping Address <span class="text-danger">*</span></label>
                        <textarea id="address" name="address" class="form-control" placeholder="Enter your Shipping Address" required>Agra</textarea>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select id="payment_method" name="payment_method" class="form-control" required>
                            <option value="credit_card">Phonepe</option>
                            <!-- <option value="paypal">PayPal</option>
                            <option value="cash_on_delivery">Cash on Delivery</option> -->
                        </select>
                    </div>
            </div>

            <div class="col-lg-4">
                <div class="order-details">
                    <h4>Your Order</h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(isset($product))
                            <input type="hidden" name="product_id" value="{{ $product->id }}" id="">
                            <!-- If a single product was passed (Buy Now) -->
                            <tr>
                                <td>{{ $product->prd_name }}</td>
                                <td>₹{{ number_format($product->prd_price, 2) }}</td>
                                <td>{{ $quantity }}</td>
                                <td>₹{{ number_format($total, 2) }}</td>
                            </tr>
                            @elseif(isset($cartItems))
                            <!-- If cart items are present -->
                            @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->prd_name }}</td>
                                <td>₹{{ number_format($item->product->prd_price, 2) }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>₹{{ number_format($item->product->prd_price * $item->quantity, 2) }}</td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                        <tfoot>
                            @if(isset($product))
                            <!-- For Buy Now (single product) -->
                            <tr>
                                <th colspan="3">Subtotal</th>
                                <th>₹{{ number_format($total, 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="3">Discount</th>
                                <th>₹{{ number_format($grandTotal, 2) }}</th>
                            </tr>
                            @elseif(isset($cartItems))
                            <!-- For cart items -->
                            <tr>
                                <th colspan="3">Subtotal</th>
                                <th>₹{{ number_format($total, 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="3">Discount</th>
                                <th>₹{{ number_format($grandTotal, 2) }}</th>
                            </tr>
                            @endif
                            @php
                            $totalWithShip = isset($total) ? $total + 99 : 0;
                            @endphp
                            <tr>
                                <th colspan="3">Shipping Charge</th>
                                <th>₹99.00</th>
                            </tr>
                            <tr>
                                <th colspan="3">Grand Total</th>
                                <th>₹{{ number_format($totalWithShip, 2) }}</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <input type="hidden" name="price" value="{{ $totalWithShip }}">
                <button type="submit" class="btn btn-primary mt-3">Place Order</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Checkout Area End -->

@endsection