
<?php $__env->startSection('title'); ?> Banner <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<?php echo $__env->make('backend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Banner List</h4>
            </div><!-- end card header -->

            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="col-sm-auto">
                            <div>
                                <button type="button" class="btn btn-success add-btn" data-bs-toggle="modal" data-bs-target="#exampleModalgrid">
                                    <i class="ri-add-line align-bottom me-1"></i> Add
                                </button>
                            </div>
                        </div>
                        <!-- <div class="col-sm">
                            <div class="d-flex justify-content-sm-end">
                                <div class="search-box ms-2">
                                    <input type="text" class="form-control search" placeholder="Search...">
                                    <i class="ri-search-line search-icon"></i>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <div class="table-responsive table-card mt-3 mb-1">
                        <table class="table align-middle table-nowrap" id="customerTable">
                            <thead class="table-light">
                                <tr>
                                    <th>Sr. No.</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Banner</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php if($banners->isEmpty()): ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td> <!-- Serial number -->
                                    <td><?php echo e($row->title); ?></td> <!-- Title -->
                                    <td>
                                        <span class="badge 
                                            <?php if($row->status == 'active'): ?> 
                                                bg-success-subtle text-success 
                                            <?php else: ?> 
                                                bg-danger-subtle text-danger 
                                            <?php endif; ?> text-uppercase">
                                            <?php echo e(ucfirst($row->status)); ?>

                                        </span> <!-- Status with conditional badge styling -->
                                    </td>
                                    <td class="image">
                                        <img src="<?php echo e($row->image ? url('public/uploads/banners/' . $row->image) : asset('default-image.jpg')); ?>" height="50px" width="70px">
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" 
                                                    data-id="<?php echo e($row->id); ?>" 
                                                    data-title="<?php echo e($row->title); ?>" 
                                                    data-content="<?php echo e($row->content); ?>"
                                                    data-link="<?php echo e($row->link); ?>"
                                                    data-status="<?php echo e($row->status); ?>">
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="remove">
                                                <a href="<?php echo e(route('banner.delete', $row->id)); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this?')">Remove</a>
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
                        <?php echo e($banners->links('vendor.pagination.bootstrap-5')); ?>

                    </div>
                </div>
            </div><!-- end card -->
        </div>
        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->

<!-- Add/Edit Modal -->
<div class="live-preview">
    <div class="modal fade" id="exampleModalgrid" tabindex="-1" aria-labelledby="exampleModalgridLabel">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Add/Update Banner</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add/Edit Modal Form -->
                    <form id="bannerForm" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?> <!-- Include CSRF token for protection -->
                        <input type="hidden" id="bannerId" name="id"> <!-- Hidden input for banner ID (for editing) -->

                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="bannerTitle" class="form-label">Title</label>
                                    <input type="text" name="title" class="form-control" id="bannerTitle" placeholder="Enter banner title" required>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="bannerLink" class="form-label">Link</label>
                                    <input type="url" name="link" class="form-control" id="bannerLink" placeholder="Enter Banner Link" required>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="bannerContent" class="form-label">Content</label>
                                    <textarea name="content" class="form-control" id="bannerContent" placeholder="Enter small content" required></textarea>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="bannerImage" class="form-label">Banner Image</label>
                                    <input type="file" name="image" class="form-control" id="bannerImage" >
                                </div>
                            </div><!-- end col -->
                            <div class="row">
                                <div class="col-xxl-12">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-control" id="bannerStatus" name="status">
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
                            </div><!-- end col -->
                        </div><!-- end row -->
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
                <p>Are you sure you want to delete this banner?</p>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Include SweetAlert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<!-- =============== Banner Section Start ============== -->
<script>
    $(document).ready(function() {
        $('#bannerForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this); // Create FormData to handle file upload
            var actionUrl;
            var method;

            // Check if it's an add or edit action
            if ($('#bannerId').val() === "") {
                // Add banner
                actionUrl = "<?php echo e(route('banner.store')); ?>";
                method = 'POST';
            } else {
                // Edit banner
                var bannerId = $('#bannerId').val();
                actionUrl = "<?php echo e(route('banner.update', '')); ?>/" + bannerId;
                method = 'POST';
            }

            // AJAX request
            $.ajax({
                url: actionUrl,
                type: method,
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response.success) {
                        $('#exampleModalgrid').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: response.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                        location.reload(); // Reload page to update the table
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: response.message,
                        });
                    }
                },
                error: function(xhr) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error!',
                        text: xhr.responseJSON.message,
                    });
                }
            });
        });

        // Handle edit action
        $('.edit-item-btn').on('click', function() {
            var bannerId = $(this).data('id');
            var bannerTitle = $(this).data('title');
            var bannerContent = $(this).data('content');
            var bannerLink = $(this).data('link');
            var bannerStatus = $(this).data('status');

            // Populate form fields with the data for editing
            $('#bannerId').val(bannerId);
            $('#bannerTitle').val(bannerTitle);
            $('#bannerContent').val(bannerContent);
            $('#bannerLink').val(bannerLink);
            $('#bannerStatus').val(bannerStatus);
        });
    });
</script>
<!-- =============== Banner Section End ============== -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/backend/admin/banners/index.blade.php ENDPATH**/ ?>