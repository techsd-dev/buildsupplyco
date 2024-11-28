
<?php $__env->startSection('title'); ?> Settings <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Settings</h4>
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
                                            <form action="<?php echo e(route('settings.store')); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>

                                                <input type="hidden" name="id" value="<?php echo e($data->id ?? ''); ?>">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="title" class="form-control" value="<?php echo e($data->title ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">Title</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="content" class="form-control" value="<?php echo e($data->content ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">Content</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="fb" class="form-control" value="<?php echo e($data->fb ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">Facebook</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="ytb" class="form-control" value="<?php echo e($data->ytb ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">YouTube</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-floating">
                                                            <input type="text" name="twitter" class="form-control" value="<?php echo e($data->twitter ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">Twitter</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-floating">
                                                            <input type="text" name="insta" class="form-control" value="<?php echo e($data->insta ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">Instagram</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-floating">
                                                            <input type="text" name="linkedin" class="form-control" value="<?php echo e($data->linkedin ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">LinkedIn</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="phone" class="form-control" value="<?php echo e($data->phone ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">Phone</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="email" class="form-control" value="<?php echo e($data->email ?? ''); ?>" id="productNameInput">
                                                            <label for="productNameInput">Email</label>
                                                        </div>
                                                    </div>
                                                </div><br>
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

        ClassicEditor
            .create(document.querySelector('#descriptionInput1'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/backend/admin/contentmanagemnt/settings.blade.php ENDPATH**/ ?>