
<?php $__env->startSection('title'); ?> About Us <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php echo $__env->make('backend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">About Us</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="listjs-table" id="aboutUsList">
                    <div class="row g-4 mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Form to update About Us -->
                                            <form action="<?php echo e(route('about.us.store')); ?>" method="POST" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>

                                                <!-- Hidden field for ID -->
                                                <input type="hidden" name="id" value="<?php echo e($data->id ?? ''); ?>">

                                                <!-- Banner Title -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <input type="text" name="bnr_title" class="form-control" value="<?php echo e($data->bnr_title ?? ''); ?>" id="bnrTitleInput" required>
                                                            <label for="bnrTitleInput">Banner Title</label>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <!-- Banner Content -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <textarea name="bnr_content" class="form-control" id="" required><?php echo $data->bnr_content ?? ''; ?></textarea>
                                                            <label for="">Banner Content</label>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <!-- Main Content -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <textarea name="main_content" class="form-control" id="mainContentInput" required><?php echo $data->main_content ?? ''; ?></textarea>
                                                            <label for="mainContentInput">Main Content</label>
                                                        </div>
                                                    </div>
                                                </div><br>

                                                <!-- First Image Upload -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="firstImageInput">First Image</label>
                                                        <input type="file" name="image" class="form-control" id="firstImageInput">
                                                        <?php if(isset($data->image)): ?>
                                                            <img src="<?php echo e(asset('public/uploads/about/' . $data->image)); ?>" alt="First Image" height="50px" width="100" class="mt-2">
                                                        <?php endif; ?>
                                                    </div>
                                                </div><br>

                                                <!-- Banner Image Upload -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="bannerImageInput">Banner Image</label>
                                                        <input type="file" name="banner" class="form-control" id="bannerImageInput">
                                                        <?php if(isset($data->banner)): ?>
                                                            <img src="<?php echo e(asset('public/uploads/about/' . $data->banner)); ?>" alt="Banner Image" width="100" height="50px" class="mt-2">
                                                        <?php endif; ?>
                                                    </div>
                                                </div><br>

                                                <!-- Submit Button -->
                                                <div class="row">
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
        // Initialize CKEditor for main content
        ClassicEditor.create(document.querySelector('#')).catch(error => console.error(error));
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/backend/admin/contentmanagemnt/aboutus.blade.php ENDPATH**/ ?>