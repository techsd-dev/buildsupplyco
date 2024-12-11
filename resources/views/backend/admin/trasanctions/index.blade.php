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
                <form method="GET" action="{{ route('tr.history') }}" class="mb-4">
                    <div class="row g-3 align-items-center">
                        <div class="col-md-3">
                            <label for="status" class="form-label">Transaction Status</label>
                            <select name="status" id="status" class="form-select">
                                <option value="">All</option>
                                <option value="success" {{ request('status') == 'success' ? 'selected' : '' }}>Success</option>
                                <option value="failed" {{ request('status') == 'failed' ? 'selected' : '' }}>Failed</option>
                                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="userName" class="form-label">User Name</label>
                            <input type="text" name="user_name" id="userName" class="form-control" value="{{ request('user_name') }}" placeholder="Enter user name">
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
                        <a href="{{ route('tr.history') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </form>

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