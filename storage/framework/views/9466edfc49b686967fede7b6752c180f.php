
<?php $__env->startSection('title'); ?> Faqs <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<!-- Include SweetAlert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<?php echo $__env->make('backend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Faqs List</h4>
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
                                    <th>Qs.</th>
                                    <th>Ans.</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="list form-check-all">
                                <?php if($faqs->isEmpty()): ?>
                                <tr>
                                    <td colspan="5" class="text-center">
                                        <lord-icon src="https://cdn.lordicon.com/msoeawqm.json" trigger="loop" colors="primary:#121331,secondary:#08a88a" style="width:75px;height:75px"></lord-icon>
                                        <h5 class="mt-2">Sorry! No Data Found</h5>
                                    </td>
                                </tr>
                                <?php else: ?>
                                <?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php 
                                 $split = str_split($row->ans, 80);
                                 $ans = $split[0].'...';
                                ?> 
                                <tr>
                                    <td><?php echo e($key + 1); ?></td> <!-- Serial number -->
                                    <td><?php echo e($row->question); ?></td> <!-- Title -->
                                    <td title="<?php echo $row->ans; ?>"><?php echo e($ans); ?></td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <div class="edit">
                                                <button class="btn btn-sm btn-success edit-item-btn" data-bs-toggle="modal" data-bs-target="#exampleModalgrid" 
                                                    data-id="<?php echo e($row->id); ?>" 
                                                    data-question="<?php echo e($row->question); ?>" 
                                                    data-ans="<?php echo e($row->ans); ?>">
                                                    Edit
                                                </button>
                                            </div>
                                            <div class="remove">
                                                <a href="<?php echo e(route('faqs.delete', $row->id)); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure want to delete this?')">Remove</a>
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
                        <?php echo e($faqs->links('vendor.pagination.bootstrap-5')); ?>

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
                    <h5 class="modal-title" id="exampleModalgridLabel">Add/Update Faqs</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Add/Edit Modal Form -->
                    <form id="faqsForm" method="POST" >
                        <?php echo csrf_field(); ?> <!-- Include CSRF token for protection -->
                        <input type="hidden" id="faqsId" name="id"> <!-- Hidden input for Faqs ID (for editing) -->

                        <div class="row g-3">
                            <div class="col-xxl-12">
                                <div>
                                    <label for="question" class="form-label">Question</label>
                                    <input type="text" name="question" class="form-control" id="question" placeholder="Enter question" required>
                                </div>
                            </div><!-- end col -->

                            <div class="col-xxl-12">
                                <div>
                                    <label for="ans" class="form-label">Answer</label>
                                    <input type="text" name="ans" class="form-control" id="ans" placeholder="Enter Answer" required>
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
                <p>Are you sure you want to delete this Faqs?</p>
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

<!-- =============== Faqs Section Start ============== -->
<script>
    $(document).ready(function() {
        $('#faqsForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this); // Create FormData to handle file upload
            var actionUrl;
            var method;

            // Check if it's an add or edit action
            if ($('#faqsId').val() === "") {
                // Add Faqs
                actionUrl = "<?php echo e(route('faqs.store')); ?>";
                method = 'POST';
            } else {
                // Edit Faqs
                var faqsId = $('#faqsId').val();
                actionUrl = "<?php echo e(route('faqs.update', '')); ?>/" + faqsId;
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
                        question: 'Error!',
                        text: xhr.responseJSON.message,
                    });
                }
            });
        });

        // Handle edit action
        $('.edit-item-btn').on('click', function() {
            var faqsId = $(this).data('id');
            var question = $(this).data('question');
            var ans = $(this).data('ans');

            // Populate form fields with the data for editing
            $('#faqsId').val(faqsId);
            $('#question').val(question);
            $('#ans').val(ans);
        });
    });
</script>
<!-- =============== Faqs Section End ============== -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/backend/admin/faqs/index.blade.php ENDPATH**/ ?>