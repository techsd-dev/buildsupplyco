
<?php $__env->startSection('title'); ?> Product <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<?php echo $__env->make('backend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Product List</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <a href="<?php echo e(route('product.create')); ?>" class="btn btn-success add-btn"><i
                                        class="ri-add-line align-bottom me-1"></i> Add</a>
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
                        <table class="table align-middle table-nowrap" id="productTable">
                            <thead class="table-light">
                                <tr>
                                    <th class="sort" data-sort="sr_no">Sr. No.</th>
                                    <th class="sort" data-sort="prd_name">Product Name</th>
                                    <th class="sort" data-sort="category">Category</th>
                                    <th class="sort" data-sort="sub_category">Subcategory</th>
                                    <th class="sort" data-sort="brand">Brand</th>
                                    <th class="sort" data-sort="prd_price">Price</th>
                                    <th class="sort" data-sort="status">Status</th>
                                    <th class="sort" data-sort="image">Image</th>
                                    <th class="sort" data-sort="action">Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php if($products->isEmpty()): ?>
                                <tr>
                                    <td colspan="8" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop"
                                            colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px">
                                        </lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td class="prd_name"><?php echo e($product->prd_name); ?></td>
                                    <td class="category"><?php echo e($product->category->name ?? 'N/A'); ?></td>
                                    <td class="sub_category"><?php echo e($product->subCategory->name ?? 'N/A'); ?></td>
                                    <td class="brand"><?php echo e($product->brand->name ?? 'N/A'); ?></td>
                                    <td class="prd_price">₹<?php echo e($product->prd_price ?? '0'); ?></td>
                                    <td class="status">
                                        <span class="badge 
                        <?php if($product->status == 1): ?> 
                            bg-success-subtle text-success 
                        <?php else: ?> 
                            bg-danger-subtle text-danger 
                        <?php endif; ?> text-uppercase">
                                            <?php echo e($product->status == 1 ? 'Active' : 'Inactive'); ?>

                                        </span> <!-- Status -->
                                    </td>
                                    <td class="image">
                                        <img src="<?php echo e($product->prd_image ? url('public/uploads/products/' . $product->prd_image) : asset('default-image.jpg')); ?>" height="50px" width="70px" alt="Product Image">
                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <a href="<?php echo e(route('product.edit', $product->id)); ?>" class="btn btn-sm btn-success edit-item-btn">
                                                    Edit
                                                </a>
                                            </div>
                                            <div class="remove">
                                                <button class="btn btn-sm btn-danger remove-item-btn"
                                                    data-id="<?php echo e($product->id); ?>"
                                                    onclick="deleteSingle(<?php echo e($product->id); ?>)">
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
                                    <?php echo e($products->links('vendor.pagination.bootstrap-5')); ?>

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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
<script>
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
                    url: "<?php echo e(route('products.delete')); ?>",
                    type: 'POST',
                    data: {
                        _token: '<?php echo e(csrf_token()); ?>',
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
</script>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/backend/admin/products/index.blade.php ENDPATH**/ ?>