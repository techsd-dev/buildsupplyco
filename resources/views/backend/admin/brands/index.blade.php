@extends('backend.layouts.master')
@section('title') Brands @endsection
@section('content')
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Brands List</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"><i
                                        class="ri-add-line align-bottom me-1"></i> Add</button>
                                <!-- <button class="btn btn-soft-danger" onClick="deleteMultiple()"><i
                                        class="ri-delete-bin-2-line"></i></button> -->
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

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
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                @if($brands->isEmpty())
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                @else
                                @foreach($brands as $key => $row)
                                <tr>
                                    <!-- <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="{{ $row->id }}">
                                        </div>
                                    </td> -->
                                    <td>{{ $key + 1 }}</td> <!-- Serial number -->
                                    <td class="customer_name">{{ $row->name }}</td> <!-- brands name -->
                                    <td class="status">
                                        <span class="badge 
                                            @if($row->status == 'active') 
                                                bg-success-subtle text-success 
                                            @else 
                                                bg-danger-subtle text-danger 
                                            @endif text-uppercase">
                                            {{ ucfirst($row->status) }}
                                        </span> <!-- Status with conditional badge styling -->
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalgrid"
                                                    data-id="{{ $row->id }}"
                                                    data-name="{{ $row->name }}"
                                                    data-status="{{ $row->status }}">
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                    data-id="{{ $row->id }}"
                                                    onclick="deleteSingle({{ $row->id }})">
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    </td>
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
                                    {{ $brands->links('vendor.pagination.bootstrap-5') }}
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

<!-- add/edit modal  -->
<div class="live-preview">
    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">brands Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add/Edit Modal Form -->
                    <form id="brandsForm" method="POST">
                        @csrf <!-- Include CSRF token for protection -->
                        <input type="hidden" id="brandsId" name="id"> <!-- Hidden input for brands ID (for editing) -->

                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="brandsName" class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" id="brandsName" placeholder="Enter brands name" required>
                                </div>
                            </div><!--end col-->
                            <div class="row">
                                <div class="col-lg-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteRecordModal" tabindex="-1" aria-labelledby="deleteRecordModalLabel">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteRecordModalLabel">Delete Confirmation</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete this brands?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<!-- =============== brands section start============== -->
<script>
    $(document).ready(function() {
        $('#brandsForm').on('submit', function(e) {
            e.preventDefault();

            var form = $(this);
            var actionUrl;
            var method;

            // Check if it's an add or edit action
            if ($('#brandsId').val() === "") {
                // Add brands
                actionUrl = "{{ route('brands.store') }}";
                method = 'POST';
            } else {
                // Edit brands
                var brandsId = $('#brandsId').val();
                actionUrl = "{{ route('brands.update', '') }}/" + brandsId;
                method = 'POST';
            }

            // AJAX request
            $.ajax({
                url: actionUrl,
                type: method,
                data: form.serialize(),
                success: function(response) {
                    if (response.success) {
                        $('#exampleModalgrid').modal('hide');
                        Swal.fire('Success!', response.message, 'success').then(() => {
                            location.reload();
                        });
                    } else {
                        Swal.fire('Error!', response.message, 'error');
                    }
                },
                error: function(xhr) {
                    Swal.fire('Error!', 'Something went wrong!', 'error');
                }
            });
        });

        // Handle click event on Edit button
        $('.edit-item-btn').on('click', function() {
            var brandsId = $(this).data('id');
            var brandsName = $(this).data('name');
            var brandsStatus = $(this).data('status');

            $('#brandsId').val(brandsId);
            $('#brandsName').val(brandsName);
            $('#exampleModalgridLabel').text('Edit brands');
        });
    });

    function deleteSingle(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "{{ route('brands.delete') }}",
                    type: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Deleted!', response.message, 'success');
                            window.location.reload();
                        } else {
                            Swal.fire('Error!', response.message, 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.fire('Error!', 'An error occurred while processing your request.', 'error');
                    }
                });
            }
        });
    }

    // brands filter 
    $(document).ready(function() {
        $('.search').on('keyup', function() {
            var query = $(this).val();

            $.ajax({
                url: "{{ route('brands.search') }}",
                type: "GET",
                data: {
                    query: query
                },
                success: function(response) {
                    // Clear the current table
                    $('tbody.list').empty();

                    if (response.success && response.brands.length > 0) {
                        // Loop through brands and append rows dynamically
                        $.each(response.brands, function(index, brands) {
                            var statusClass = brands.status === 'active' ?
                                'bg-success-subtle text-success' :
                                'bg-danger-subtle text-danger';

                            var row = `
                            <tr>
                                <td>${index + 1}</td>
                                <td class="customer_name">${brands.name}</td>
                                <td class="status">
                                    <span class="badge ${statusClass} text-uppercase">
                                        ${brands.status.charAt(0).toUpperCase() + brands.status.slice(1)}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <button class="btn btn-sm btn-success edit-item-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModalgrid"
                                                data-id="${brands.id}"
                                                data-name="${brands.name}"
                                                data-status="${brands.status}">
                                                Edit
                                            </button>
                                        </div>
                                        <div class="remove">
                                            <button class="btn btn-sm btn-danger remove-item-btn"
                                                data-id="${brands.id}"
                                                onclick="deleteSingle(${brands.id})">
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        `;
                            $('tbody.list').append(row);
                        });
                    } else {
                        var noResultsRow = `
                        <tr>
                            <td colspan="4" class="text-center">No brands found</td>
                        </tr>
                    `;
                        $('tbody.list').append(noResultsRow);
                    }
                },
                // error: function(xhr) {
                //     Swal.fire('Error!', 'Something went wrong!', 'error');
                // }
            });
        });
    });
</script>
<!-- =============== brands section end============== -->