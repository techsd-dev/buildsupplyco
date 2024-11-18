<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<!-- =============== Category section start============== -->
<script>
    $(document).ready(function() {
        $('#categoryForm').on('submit', function(e) {
            e.preventDefault();

            $('.error-message').remove();

            let formData = new FormData(this);

            $.ajax({
                url: "{{ route('category.storeOrUpdate') }}",
                method: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    $('#loading').hide();
                    Swal.fire({
                        icon: 'success',
                        title: 'Category Saved!',
                        text: response.success
                    });
                    $('#exampleModalgrid').modal('hide');
                    window.location.reload();
                },
                error: function(response) {
                    $('#loading').hide();
                    // errors
                    $('.error-message').remove();
                    if (response.responseJSON && response.responseJSON.errors) {
                        $.each(response.responseJSON.errors, function(field, messages) {
                            const fieldElement = $(`[name="${field}"]`);
                            fieldElement.after(`<div class="error-message text-danger">${messages.join(', ')}</div>`);
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Something went wrong!'
                        });
                    }
                }

            });
        });

        // edit 
        $('.edit-item-btn').on('click', function() {
            var categoryId = $(this).data('id');
            var categoryName = $(this).data('name');
            var categoryStatus = $(this).data('status');
            var categoryImage = $(this).data('image');

            $('#categoryId').val(categoryId);
            $('#categoryName').val(categoryName);
            $('#categoryStatus').val(categoryStatus);
            $('#exampleModalgridLabel').text('Edit Category');
            if (categoryImage) {
                $('#imagePreview').html(`<img src="${categoryImage}" alt="Category Image" class="img-fluid" width="100" height="100">`);
            } else {
                $('#imagePreview').html('');
            }
        });
    });

    // delete 
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
                    url: "{{ route('category.delete') }}",
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

    // category filter 
    $(document).ready(function() {
        $('.search').on('keyup', function() {
            var query = $(this).val();

            $.ajax({
                url: "{{ route('category.search') }}",
                type: "GET",
                data: {
                    query: query
                },
                success: function(response) {
                    $('tbody.list').empty();

                    if (response.success && response.categories.length > 0) {
                        $.each(response.categories, function(index, category) {
                            var statusClass = category.status === 'active' ?
                                'bg-success-subtle text-success' :
                                'bg-danger-subtle text-danger';

                            var row = `
                            <tr>
                                <td>${index + 1}</td>
                                <td class="customer_name">${category.name}</td>
                                <td class="status">
                                    <span class="badge ${statusClass} text-uppercase">
                                        ${category.status.charAt(0).toUpperCase() + category.status.slice(1)}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <div class="edit">
                                            <button class="btn btn-sm btn-success edit-item-btn"
                                                data-bs-toggle="modal"
                                                data-bs-target="#exampleModalgrid"
                                                data-id="${category.id}"
                                                data-name="${category.name}"
                                                data-status="${category.status}">
                                                Edit
                                            </button>
                                        </div>
                                        <div class="remove">
                                            <button class="btn btn-sm btn-danger remove-item-btn"
                                                data-id="${category.id}"
                                                onclick="deleteSingle(${category.id})">
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
                            <td colspan="4" class="text-center">No categories found</td>
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
<!-- =============== Category section end============== -->