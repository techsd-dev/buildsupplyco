@extends('backend.layouts.master')
@section('title') Order Details @endsection
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Order Details (Order ID: {{ $order->id }})</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h5>Customer Details</h5>
                        <p><strong>Name:</strong> {{ $order->user->name ?? 'N/A' }}</p>
                        <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
                        <p><strong>Phone:</strong> {{ $order->user->phone ?? 'N/A' }}</p>
                    </div>
                    <div class="col-md-6">
                        <h5>Transaction Details</h5>
                        @php 
                         $totalAmt = $order->transactions->sum('amount')/100;
                        @endphp 
                        <p><strong>Total Amount:</strong> ₹{{ number_format($totalAmt, 2) }}</p>
                        @foreach($order->transactions as $transaction)
                        <p><strong>Status:</strong> {{ ucfirst($transaction->status) }} ({{ $transaction->created_at->format('d M Y') }})</p>
                        @endforeach
                    </div>
                </div>

                <h5>Order Items</h5>
                <div class="table-responsive">
                    <table class="table align-middle table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>Product Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order->orderItems as $item)
                            <tr>
                                <td>
                                    <img src="{{ url('public/uploads/products/' . $item->product->prd_image) }}" 
                                         alt="{{ $item->product->prd_name }}" 
                                         class="img-thumbnail" style="width: 100px;">
                                </td>
                                <td>{{ $item->product->prd_name ?? 'N/A' }}</td>
                                <td>{{ $item->quantity }}</td>
                                <td>₹{{ number_format($item->prd_price, 2) }}</td>
                                <td>₹{{ number_format($item->quantity * $item->prd_price, 2) }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <a href="{{ route('orders') }}" class="btn btn-secondary mt-3">Back to Orders</a>
            </div>
        </div>
    </div>
</div>
@endsection
