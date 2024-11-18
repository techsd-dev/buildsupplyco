@extends('backend.layouts.master')
@section('title') Category @endsection
@section('content')
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Category List</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <!-- <div class="row g-4 mb-3">
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <!-- <th scope="col" style="width: 50px;">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                                        </div>
                                    </th> -->
                                    <th class="sort" data-sort="customer_name">Sr. No.</th>
                                    <th class="sort" data-sort="customer_name">Name</th>
                                    <th class="sort" data-sort="customer_phone">Phone</th>
                                    <th class="sort" data-sort="customer_email">Email</th>
                                    <th class="sort" data-sort="customer_sub">Subject</th>
                                    <th class="sort" data-sort="date">Query Date</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @if($contactus->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                @else
                                @foreach($contactus as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td class="customer_name">{{ $row->name }}</td>
                                    <td class="customer_phone">{{ $row->phone }}</td>
                                    <td class="customer_email">{{ $row->email }}</td>
                                    <td class="customer_sub">{{ $row->subject }}</td>
                                    <td class="date">{{ $row->created_at }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    {{ $contactus->links('vendor.pagination.bootstrap-5') }}
                                </div>
                            </div>

                        </div>
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
@endsection