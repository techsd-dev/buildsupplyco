
<?php $__env->startSection('title', 'Terms and Conditions'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--content-area start-->
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <section id="terms-and-conditions">
                <h2><?php echo e($data->title); ?></h2>
                <?php echo $data->description; ?>

            </section>
        </div>
    </div>
</div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/frontend/pages/termsncond.blade.php ENDPATH**/ ?>