@extends('frontend.layouts.master')
@section('title', 'Order Success')
@section('content')

<div class="order-success">
    <div class="container">
        <h2>Thank You for Your Order!</h2>
        <p>Your order has been placed successfully. We’ll get in touch with you soon.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
    </div>
</div>

@endsection
