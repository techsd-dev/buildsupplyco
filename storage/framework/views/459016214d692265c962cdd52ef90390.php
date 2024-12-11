
<?php $__env->startSection('title'); ?> Career <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<?php echo $__env->make('backend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Career List</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <form action="<?php echo e(route('careers')); ?>" method="GET">
                    <div class="row g-3 mb-3">
                        <div class="col-sm-4">
                            <input type="text" name="designation" class="form-control" placeholder="Search by Designation" value="<?php echo e(request('designation')); ?>">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="job_location" class="form-control" placeholder="Search by Job Location" value="<?php echo e(request('job_location')); ?>">
                        </div>
                        <div class="col-sm-4">
                            <input type="text" name="qualification" class="form-control" placeholder="Search by Qualification" value="<?php echo e(request('qualification')); ?>">
                        </div>
                        <div class="col-sm-4">
                            <button type="submit" class="btn btn-primary w-100">Filter</button>
                        </div>
                        <div class="col-sm-4">
                            <a href="<?php echo e(route('careers')); ?>" class="btn btn-secondary w-100">Reset</a>
                        </div>
                    </div>
                </form>
            </div>

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
                                    <th>Designation</th>
                                    <th>Job Location</th>
                                    <th>Qualification</th>
                                    <th>Exprience</th>
                                    <th>CV</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php if($careers->isEmpty()): ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php $__currentLoopData = $careers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($key + 1); ?></td>
                                    <td><?php echo e($row->designation); ?></td>
                                    <td><?php echo e($row->job_location); ?></td>
                                    <td><?php echo e($row->qualification); ?></td>
                                    <td><?php echo e($row->experience); ?></td>

                                    <td class="cv-logo">
                                        <a href="<?php echo e(url('public/uploads/careers/' . $row->image)); ?>" download><strong>Download CV</strong>
                                        </a>
                                    </td>

                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#exampleModalgrid"
                                                    data-id="<?php echo e($row->id); ?>"
                                                    data-designation="<?php echo e($row->designation); ?>"
                                                    data-job_location="<?php echo e($row->job_location); ?>"
                                                    data-qualification="<?php echo e($row->qualification); ?>"
                                                    data-overview="<?php echo e($row->overview); ?>"
                                                    data-roles_n_responsibilities="<?php echo e($row->roles_n_responsibilities); ?>"
                                                    data-experience="<?php echo e($row->experience); ?>">
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="remove">
                                                <a href="<?php echo e(route('career.delete', $row->id)); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this?')">Remove</a>
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
                        <?php echo e($careers->links('vendor.pagination.bootstrap-5')); ?>

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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalgridLabel">Add/Update Career</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add/Edit Modal Form -->
                    <form id="careeForm" method="POST" enctype="multipart/form-data">
                        <?php echo csrf_field(); ?> <!-- Include CSRF token for protection -->
                        <input type="hidden" id="careerId" name="id"> <!-- Hidden input for Career ID (for editing) -->

                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="designation" class="form-label">Designation</label>
                                    <input type="text" name="designation" class="form-control" id="designation" placeholder="Enter Career Designation" required>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="job_location" class="form-label">Jo Location</label>
                                    <input type="text" name="job_location" class="form-control" id="job_location" placeholder="Enter Job Location" required>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="experience" class="form-label">Experience</label>
                                    <input type="text" name="experience" class="form-control" id="experience" placeholder="Enter Job Location" required>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="overview" class="form-label">Overview</label>
                                    <input type="text" name="overview" class="form-control" id="overview" placeholder="Enter Job Location" required>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="qualification" class="form-label">Qualification</label>
                                    <input type="text" name="qualification" class="form-control" id="qualification" placeholder="Enter Job Location" required>
                                </div>
                            </div><!-- end col -->
                            <div class="col-xxl-12">
                                <div>
                                    <label for="roles_n_responsibilities" class="form-label">Role & Responsibilities</label>
                                    <textarea name="roles_n_responsibilities" class="form-control" id="roles_n_responsibilities" placeholder="Enter small roles_n_responsibilities" required></textarea>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="Cv" class="form-label">Cv uploade</label>
                                    <input type="file" name="image" class="form-control" id="Cv">
                                </div>
                            </div><!-- end col -->
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
                <p>Are you sure you want to delete this?</p>
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

<!-- =============== Career Section Start ============== -->
<script>
    $(document).ready(function() {
        $('#careeForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this); // Create FormData to handle file upload
            var actionUrl;
            var method;

            // Check if it's an add or edit action
            if ($('#careerId').val() === "") {
                // Add career
                actionUrl = "<?php echo e(route('career.store')); ?>";
                method = 'POST';
            } else {
                // Edit career
                var careerId = $('#careerId').val();
                actionUrl = "<?php echo e(route('career.update', '')); ?>/" + careerId;
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
            var careerId = $(this).data('id');
            var designation = $(this).data('designation');
            var qualification = $(this).data('qualification');
            var job_location = $(this).data('job_location');
            var experience = $(this).data('experience');
            var overview = $(this).data('overview');
            var roles_n_responsibilities = $(this).data('roles_n_responsibilities');

            // Populate form fields with the data for editing
            $('#careerId').val(careerId);
            $('#designation').val(designation);
            $('#qualification').val(qualification);
            $('#job_location').val(job_location);
            $('#experience').val(experience);
            $('#overview').val(overview);
            $('#roles_n_responsibilities').val(roles_n_responsibilities);
        });
    });
</script>
<!-- =============== Career Section End ============== -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/backend/admin/careers/index.blade.php ENDPATH**/ ?>