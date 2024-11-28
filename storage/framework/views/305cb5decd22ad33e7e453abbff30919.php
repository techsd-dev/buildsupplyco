
<?php $__env->startSection('title'); ?> Category <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<style>
    .error-message {
        font-size: 0.875rem;
        margin-top: 0.25rem;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Category List</h4>
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
                                    <th class="sort" data-sort="Image">Image</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php if($categories->isEmpty()): ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <!-- <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo e($row->id); ?>">
                                        </div>
                                    </td> -->
                                    <td><?php echo e($key + 1); ?></td> <!-- Serial number -->
                                    <td class="customer_name"><?php echo e($row->name); ?></td> <!-- Category name -->
                                    <td class="image"><img src="<?php echo e(url('public/uploads/categories/',$row->images)); ?>" height="50px" width="80px" alt=""></td>
                                    <td class="status">
                                        <span class="badge 
                                            <?php if($row->status == 'active'): ?> 
                                                bg-success-subtle text-success 
                                            <?php else: ?> 
                                                bg-danger-subtle text-danger 
                                            <?php endif; ?> text-uppercase">
                                            <?php echo e(ucfirst($row->status)); ?>

                                        </span> <!-- Status with conditional badge styling -->
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#exampleModalgrid"
                                                    data-id="<?php echo e($row->id); ?>"
                                                    data-name="<?php echo e($row->name); ?>"
                                                    data-status="<?php echo e($row->status); ?>">
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                    data-id="<?php echo e($row->id); ?>"
                                                    onclick="deleteSingle(<?php echo e($row->id); ?>)">
                                                    Remove
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="pagination-wrap hstack gap-2">
                            <div class="d-flex justify-content-end">
                                <div class="pagination-wrap hstack gap-2">
                                    <?php echo e($categories->links('vendor.pagination.bootstrap-5')); ?>

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
                    <h5 class="modal-title" id="exampleModalgridLabel">Category Add</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add/Edit Modal Form -->
                    <form id="categoryForm" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="categoryId" name="id">

                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="categoryName" class="form-label">Name <span class="text-danger">*</span></label>
                                    <input type="text" name="name" class="form-control" id="categoryName" placeholder="Enter category name">
                                </div>
                            </div><!--end col-->
                            <!-- Status Field -->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="categoryStatus" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control" id="categoryStatus" required>
                                        <option value="active">Active</option>
                                        <option value="inactive">Inactive</option>
                                    </select>
                                </div>
                            </div><!--end col-->

                            <!-- Image Upload Input -->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="categoryImage" class="form-label">Category Image</label>
                                    <input type="file" name="image" class="form-control" id="categoryImage">
                                    <div id="imagePreview" class="mt-3">
                                        <!-- Image preview area will be dynamically updated -->
                                    </div>
                                </div>
                            </div><!--end col-->

                            <div class="col-lg-12">
                                <div class="hstack gap-2 justify-content-end">
                                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div><!--end col-->
                        </div><!--end row-->
                        <div id="loading" style="display: none;">
                            <div class="spinner-border" role="status">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
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
                <p>Are you sure you want to delete this category?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="confirmDelete">Delete</button>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin.categories.ajax', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/backend/admin/categories/index.blade.php ENDPATH**/ ?>