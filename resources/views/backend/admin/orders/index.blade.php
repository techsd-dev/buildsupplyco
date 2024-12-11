@extends('backend.layouts.master')
@section('title') Orders @endsection
@section('content')
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Orders List</h4>
            </div><!-- end card header -->
            <div class="card-body">
    <form method="GET" action="{{ route('orders') }}" class="mb-4">
        <div class="row g-3 align-items-center">
            <div class="col-md-3">
                <label for="orderStatus" class="form-label">Order Status</label>
                <select name="order_status" id="orderStatus" class="form-select">
                    <option value="">All</option>
                    <option value="pending" {{ request('order_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('order_status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="delivered" {{ request('order_status') == 'delivered' ? 'selected' : '' }}>Delivered</option>
                    <option value="cancelled" {{ request('order_status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="transactionStatus" class="form-label">Transaction Status</label>
                <select name="transaction_status" id="transactionStatus" class="form-select">
                    <option value="">All</option>
                    <option value="success" {{ request('transaction_status') == 'success' ? 'selected' : '' }}>Success</option>
                    <option value="failed" {{ request('transaction_status') == 'failed' ? 'selected' : '' }}>Failed</option>
                </select>
            </div>
            <div class="col-md-3">
                <label for="startDate" class="form-label">Start Date</label>
                <input type="date" name="start_date" id="startDate" class="form-control" value="{{ request('start_date') }}">
            </div>
            <div class="col-md-3">
                <label for="endDate" class="form-label">End Date</label>
                <input type="date" name="end_date" id="endDate" class="form-control" value="{{ request('end_date') }}">
            </div>
        </div>
        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Filter</button>
            <a href="{{ route('orders') }}" class="btn btn-secondary">Reset</a>
        </div>
    </form>

            <div class="card-body">
                <div class="listjs-table" id="orderList">
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="orderTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Order ID</th>
                                    <th>Customer Details</th>
                                    <th>Order Total</th>
                                    <th>Order Items</th>
                                    <th>Transaction Status</th>
                                    <th>Order Status</th>
                                    <th>Order Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @if($orders->isEmpty())
                                <tr>
                                    <td colspan="9" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                @else
                                @foreach($orders as $key => $order)
                                @php
                                $totalAmt = $order->transactions->sum('amount')/100;
                                @endphp
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $order->id }}</td>
                                    <td>{{ $order->user->name ?? 'N/A' }} <br> {{ $order->user->email ?? 'N/A' }} <br> {{ $order->user->phone ?? 'N/A' }}</td>
                                    <td>₹{{ number_format($totalAmt, 2) }}</td>
                                    <td>
                                        <ul>
                                            @foreach($order->orderItems as $item)
                                            <li>{{ $item->product->prd_name ?? 'Unknown Product' }} ({{ $item->quantity }})</li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td>
                                        @foreach($order->transactions as $transaction)
                                        {{ ucfirst($transaction->status) }}
                                        <br>
                                        @endforeach
                                    </td>
                                    <td>{{ $order->status }}</td>
                                    <td>{{ $order->created_at->format('d M Y') }}</td>
                                    <td>
                                        <a href="{{ route('orders.details', $order->id) }}" class="btn btn-sm btn-info">
                                            <i class="fas fa-eye"></i> View Details
                                        </a>
                                        <button class="btn btn-sm btn-warning update-status" data-id="{{ $order->id }}">
                                            <i class="fas fa-edit"></i> Update Status
                                        </button>
                                    </td>

                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $orders->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.querySelectorAll('.update-status').forEach(button => {
        button.addEventListener('click', function() {
            const orderId = this.getAttribute('data-id');

            Swal.fire({
                title: 'Update Order Status',
                input: 'select',
                inputOptions: {
                    'pending': 'Pending',
                    'confirmed': 'Confirmed',
                    'delivered': 'Delivered',
                    'cancelled': 'Cancelled'
                },
                inputPlaceholder: 'Select status',
                showCancelButton: true,
                confirmButtonText: 'Update Status',
                cancelButtonText: 'Cancel',
                inputValidator: (value) => {
                    if (!value) {
                        return 'You need to select a status!';
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const status = result.value;
                    const url = `{{ route('orders.updateStatus', ['orderId' => '__orderId__']) }}`.replace('__orderId__', orderId);

                    fetch(url, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                status: status
                            })
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Status Updated!', 'The order status has been updated successfully.', 'success');
                                location.reload(); 
                            } else {
                                Swal.fire('Error', 'There was an issue updating the order status.', 'error');
                            }
                        });
                }
            });
        });
    });
</script>

@endsection