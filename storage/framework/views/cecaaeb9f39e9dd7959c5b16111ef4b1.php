
<?php $__env->startSection('title'); ?> Return & Shipment Policy <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Return & Shipment Policy</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Form to create product -->
                                            <form action="<?php echo e(route('return.n.shpmnt.policy.store')); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data->id ?? ''); ?>">
                                                <div class="row">
                                                    <!-- Product Name -->
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <input type="text" name="title" class="form-control" value="<?php echo e($data->title ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">Title</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <!-- Product Description -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <textarea name="description" class="form-control" id="descriptionInput1" placeholder="Enter  description"><?php echo $data->description ?? ''; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <!-- Product Name -->
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <input type="text" name="title1" class="form-control" value="<?php echo e($data->title1 ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">Title Two</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <!-- Product Description -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <textarea name="description1" class="form-control" id="descriptionInput2" placeholder="Enter  description two"><?php echo $data->description1 ?? ''; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <!-- Submit Button -->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                        <!-- End of form -->
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end row -->
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->
</div><!-- end row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="<?php echo e(URL::asset('public/build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js')); ?>"></script>
<script>
    $(document).ready(function() {
        // Initialize CKEditor for both description fields
        ClassicEditor
            .create(document.querySelector('#descriptionInput1'))
            .catch(error => {
                console.error('Error initializing editor for descriptionInput1:', error);
            });

        ClassicEditor
            .create(document.querySelector('#descriptionInput2'))
            .catch(error => {
                console.error('Error initializing editor for descriptionInput2:', error);
            });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Laravel\corporate\resources\views/backend/admin/contentmanagemnt/return_n_shipment_policy.blade.php ENDPATH**/ ?>