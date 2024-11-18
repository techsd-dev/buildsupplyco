
<?php $__env->startSection('title', 'Wishlist'); ?>
<?php $__env->startSection('content'); ?>

<!-- Wishlist Area -->
<div class="wishlist-area py-5">
    <div class="container">
        <h2 class="text-center mb-4">Your Wishlist</h2>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="table-responsive shadow rounded">
                    <table class="wishlist-table table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th class="text-center">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if($wishlistItems->isEmpty()): ?>
                            <tr>
                                <td colspan="4" class="text-center py-5">
                                    <h5>Your wishlist is currently empty.</h5>
                                    <a href="<?php echo e(url('/')); ?>" class="btn btn-primary mt-3">Continue Shopping</a>
                                </td>
                            </tr>
                            <?php else: ?>
                            <?php $__currentLoopData = $wishlistItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td class="p-3">
                                    <a href="<?php echo e(route('product.details', $item->product->slug)); ?>">
                                        <img src="<?php echo e(asset('public/uploads/products/' . $item->product->prd_image)); ?>" alt="<?php echo e($item->product->prd_name); ?>" class="img-thumbnail" style="width: 80px; height: auto;">
                                    </a>
                                </td>
                                <td>
                                    <h5 class="mb-1">
                                        <a href="<?php echo e(route('product.details', $item->product->slug)); ?>" class="text-dark"><?php echo e($item->product->prd_name); ?></a>
                                    </h5>
                                    <small class="text-muted">In stock</small>
                                </td>
                                <td class="fw-bold">₹<?php echo e($item->product->prd_discount_price); ?></td>
                                <td class="text-center">
                                    <form action="<?php echo e(route('wishlist.remove')); ?>" method="POST" class="d-inline">
                                        <?php echo csrf_field(); ?>
                                        <input type="hidden" name="id" value="<?php echo e($item->id); ?>">
                                        <button type="submit" onclick="return confirm('Remove this item from the wishlist?');" class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash-alt"></i> Remove
                                        </button>
                                    </form>

                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <?php if(!$wishlistItems->isEmpty()): ?>
                <div class="text-end mt-4">
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-primary">Continue Shopping</a>
                    <a href="<?php echo e(route('checkout.index')); ?>" class="btn btn-primary">Proceed to Checkout</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<!-- End of Wishlist Area -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/frontend/pages/products/wishlist.blade.php ENDPATH**/ ?>