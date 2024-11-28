@extends('frontend.layouts.master')
@section('title', 'Checkout')
@section('content')

<!-- Checkout Area Start -->
<div class="checkout-area mt-15">
    <div class="container">
        <!-- <div class="row">
            <div class="col-lg-12">
                <p>Returning customer? <a href="#">Click here</a> to login</p>
            </div>
        </div> -->
        <div class="row mt-10">
            <div class="col-lg-8">
                <h4>Billing Details</h4>
                <form action="{{ route('order.n.phonepe') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input type="phone" id="phone" name="phone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Shipping Address</label>
                        <textarea id="address" name="address" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <select id="payment_method" name="payment_method" class="form-control" required>
                            <option value="credit_card">Credit Card</option>
                            <option value="paypal">PayPal</option>
                            <option value="cash_on_delivery">Cash on Delivery</option>
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
                            @foreach($cartItems as $item)
                            <tr>
                                <td>{{ $item->product->prd_name }}</td>
                                <td>
                                    ₹{{ number_format($item->product->prd_price ?? $item->product->prd_price, 2) }}
                                </td>
                                <td>{{ $item->quantity }}</td>
                                <td>
                                    ₹{{ number_format(($item->product->prd_price ?? $item->product->prd_price) * $item->quantity, 2) }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3">Subtotal</th>
                                <th>₹{{ number_format($total, 2) }}</th>
                            </tr>
                            <tr>
                                <th colspan="3">Discount</th>
                                <th>₹{{ number_format($grandTotal, 2) }}</th>
                            </tr>
                            @php 
                            $totalWithShip = $total + 99;
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
