@extends('backend.layouts.master')
@section('title') Transaction History @endsection
@section('content')

<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Transaction History</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive table-card mt-3 mb-1">
                    <table class="table align-middle table-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th scope="col">#</th>
                                <th>Transaction ID</th>
                                <th>User Details</th>
                                <th>Amount</th>
                                <th>Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $transaction)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $transaction->transaction_id }}</td>
                                <td>{{ $transaction->user->name ?? 'N/A' }} <br> {{ $transaction->user->email ?? 'N/A' }}
                                <br>{{ $transaction->user->phone ?? 'N/A' }}
                            </td>
                                <td>₹{{ number_format($transaction->amount/100, 2) }}</td>
                                <td>{{ $transaction->created_at->format('d-m-Y') }}</td>
                                <td>{{ $transaction->status }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">No transactions found.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end">
                    {{ $transactions->links('vendor.pagination.bootstrap-5') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
