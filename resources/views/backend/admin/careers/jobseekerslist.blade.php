@extends('backend.layouts.master')
@section('title') Job Seekers @endsection
@section('content')
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Job Seekers List</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <!-- Filter Form -->
                <form method="GET" action="{{ route('jobSeekers') }}">
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{ request('name') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="job_title" class="form-control" placeholder="Designation" value="{{ request('job_title') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="text" name="location" class="form-control" placeholder="Location" value="{{ request('location') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>

                <div class="listjs-table" id="customerList">
                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Exprience</th>
                                    <th>Designation</th>
                                    <th>Current Location</th>
                                    <th>CV</th>
                                    <th>Apply Date</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @if($data->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                @else
                                @foreach($data as $key => $row)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->email }}</td>
                                    <td>{{ $row->mobile }}</td>
                                    <td>{{ $row->exprience }}</td>
                                    <td>{{ $row->job_title }}</td>
                                    <td>{{ $row->current_location }}</td>
                                    <td class="cv-logo">
                                        <a href="{{ url('uploads/categories/' . $row->resume) }}" download><strong>Download CV</strong></a>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}</td>
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $data->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div><!-- end card -->
        </div>
    </div>
</div>
@endsection
