
<?php $__env->startSection('title'); ?> Sub Category <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Sub Category List</h4>
            </div>

            <div class="card-body">
                <div id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#subCategoryModal" id="addCategoryBtn">
                                <i class="ri-add-line align-bottom me-1"></i> Add
                            </button>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" id="searchSubCategory" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">Sr. No.</th>
                                    <th>Name</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="subcategoryList">
                                <?php $__empty_1 = true; $__currentLoopData = $subcategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subcategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($subcategory->name); ?></td>
                                    <td><?php echo e($subcategory->category->name ?? 'N/A'); ?></td>
                                    <td><?php echo e($subcategory->status); ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="editSubCategory(<?php echo e($subcategory->id); ?>, '<?php echo e($subcategory->name); ?>', '<?php echo e($subcategory->category_id); ?>', '<?php echo e($subcategory->status); ?>')">Edit</button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleteSubCategory(<?php echo e($subcategory->id); ?>)">Delete</button>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <tr>
                                    <td colspan="5" class="text-center">No subcategories found.</td>
                                </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-end">
                        <?php echo e($subcategories->links('vendor.pagination.bootstrap-5')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add/Edit SubCategory Modal -->
<div class="modal fade" id="subCategoryModal" tabindex="-1" aria-labelledby="subCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="subCategoryModalLabel">Add Sub Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="subcategoryForm">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" id="subcategoryId">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Category</label>
                                <select class="form-control" id="category_id" name="category_id" required>
                                    <option value="">Select Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <label for="status" class="form-label">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" id="saveSubCategoryBtn">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Are you sure you want to delete this subcategory?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<?php $__env->startSection('script'); ?>
<script>
    $('#subcategoryForm').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: '<?php echo e(route("sub.category.save")); ?>', // Single route for store/update
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                if (response.success) {
                    Swal.fire({
                        title: 'Success',
                        text: response.message,
                        icon: 'success',
                        confirmButtonText: 'OK'
                    });
                    location.reload();
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: response.message,
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr) {
                Swal.fire({
                    title: 'Error',
                    text: 'An error occurred while saving the subcategory.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });

    function editSubCategory(id, name, category_id, status) {
        $('#subcategoryId').val(id);
        $('#name').val(name);
        $('#category_id').val(category_id);
        $('#status').val(status);
        $('#subCategoryModalLabel').text('Edit Sub Category');
        $('#subCategoryModal').modal('show');
    }

    function deleteSubCategory(id) {
        $('#deleteModal').modal('show');
        $('#confirmDeleteBtn').off('click').on('click', function() {
            $.ajax({
                type: 'POST',
                url: '<?php echo e(route("sub.category.delete")); ?>',
                data: {
                    id: id,
                    _token: '<?php echo e(csrf_token()); ?>'
                },
                success: function(response) {
                    if (response.success) {
                        Swal.fire('Deleted!', response.message, 'success');
                        location.reload();
                    } else {
                        Swal.fire('Error!', response.message, 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error!', 'An error occurred while deleting the subcategory.', 'error');
                }
            });
        });
    }

    $('#searchSubCategory').on('keyup', function() {
        let query = $(this).val();
        $.ajax({
            type: 'GET',
            url: '<?php echo e(route("sub.category.search")); ?>',
            data: {
                query: query
            },
            success: function(response) {
                if (response.success) {
                    let subcategoryList = '';
                    response.categories.forEach(function(category, index) {
                        subcategoryList += `<tr>
                                                <td>${index + 1}</td>
                                                <td>${category.name}</td>
                                                <td>${category.category.name}</td>
                                                <td>${category.status}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" onclick="editSubCategory(${category.id}, '${category.name}', '${category.category_id}', '${category.status}')">Edit</button>
                                                    <button type="button" class="btn btn-danger btn-sm" onclick="deleteSubCategory(${category.id})">Delete</button>
                                                </td>
                                            </tr>`;
                    });
                    $('#subcategoryList').html(subcategoryList);
                }
            },
            error: function() {
                Swal.fire('Error!', 'An error occurred while searching subcategories.', 'error');
            }
        });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/backend/admin/subcategories/index.blade.php ENDPATH**/ ?>