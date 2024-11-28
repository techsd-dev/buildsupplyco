
<?php $__env->startSection('title', 'Faqs'); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!--about-area start-->
<div class="faq-area mt-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="accordion">
					<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="heading<?php echo e($index); ?>">
						  <h5 class="mb-0">
							<a href="#collapse<?php echo e($index); ?>" class="btn btn-link" data-toggle="collapse" aria-expanded="<?php echo e($index == 0 ? 'true' : 'false'); ?>" aria-controls="collapse<?php echo e($index); ?>">
								<?php echo e($faq['question']); ?>

								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>

						<div id="collapse<?php echo e($index); ?>" class="collapse <?php echo e($index == 0 ? 'show' : ''); ?>" aria-labelledby="heading<?php echo e($index); ?>" data-parent="#accordion">
						  <div class="card-body">
							<p><?php echo e($faq['ans']); ?></p>
						  </div>
						</div>
					  </div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--faq-area end-->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/frontend/pages/faqs.blade.php ENDPATH**/ ?>