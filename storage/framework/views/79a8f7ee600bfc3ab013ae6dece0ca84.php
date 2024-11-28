
<?php $__env->startSection('title', $product->prd_name); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('frontend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!--product-details-area start-->
<div class="product-details-area mt-20">
    <div class="container-fluid">
        <div class="product-details">
            <div class="row">
                <!-- Thumbnail Images Section (Main Image and Additional Images) -->
                <div class="col-lg-1 col-md-2">
                    <ul class="nav nav-tabs products-nav-tabs">
                        <li>
                            <a class="active" data-toggle="tab" href="#main-image">
                                <img src="<?php echo e(asset('public/uploads/products/' . $product->prd_image)); ?>" alt="<?php echo e($product->prd_name); ?>" />
                            </a>
                        </li>
                        <?php if($product->prd_images): ?>
                        <?php $__currentLoopData = explode(',', $product->prd_images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a data-toggle="tab" href="#product-<?php echo e($index + 1); ?>">
                                <img src="<?php echo e(asset('public/uploads/products/' . $image)); ?>" alt="<?php echo e($product->prd_name); ?> - Image <?php echo e($index + 1); ?>" />
                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </ul>
                </div>

                <!-- Product Images Display Section -->
                <div class="col-lg-4 col-md-6">
                    <div class="tab-content">
                        <div id="main-image" class="tab-pane fade in show active">
                            <div class="product-details-thumb">
                                <a class="venobox" data-gall="myGallery" href="<?php echo e(asset('public/uploads/products/' . $product->prd_image)); ?>">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                                <img src="<?php echo e(asset('public/uploads/products/' . $product->prd_image)); ?>" alt="<?php echo e($product->prd_name); ?>" />
                            </div>
                        </div>
                        <?php if($product->prd_images): ?>
                        <?php $__currentLoopData = explode(',', $product->prd_images); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div id="product-<?php echo e($index + 1); ?>" class="tab-pane fade">
                            <div class="product-details-thumb">
                                <a class="venobox" data-gall="myGallery" href="<?php echo e(asset('public/uploads/products/' . $image)); ?>">
                                    <i class="fa fa-search-plus"></i>
                                </a>
                                <img src="<?php echo e(asset('public/uploads/products/' . $image)); ?>" alt="<?php echo e($product->prd_name); ?> - Image <?php echo e($index + 1); ?>" />
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Product Information Section -->
                <div class="col-lg-7 mt-sm-50">
                    <div class="row">
                        <div class="col-lg-8 col-md-7">
                            <div class="product-details-desc">
                                <h2><?php echo e($product->prd_name); ?></h2>
                                <ul><?php echo $product->prd_description; ?></ul>
                                <div class="product-meta">
                                    <ul class="list-none">
                                        <li>SKU: <?php echo e($product->slug); ?><span>|</span></li>
                                        <li>Category: <a href="#"><?php echo e($product->category->name); ?></a> <span>|</span></li>
                                        <li>Brand: <a href="#"><?php echo e($product->brand->name); ?></a></li>
                                    </ul>
                                </div>

                                <!-- Social Share Links -->
                                <div class="social-icons style-5">
                                    <span>Share Link:</span>
                                    <?php
                                    $shareUrl = urlencode(route('product.details', $product->slug));
                                    $shareTitle = urlencode($product->prd_name);
                                    ?>
                                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e($shareUrl); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                                    <a href="https://twitter.com/intent/tweet?url=<?php echo e($shareUrl); ?>&text=<?php echo e($shareTitle); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php echo e($shareUrl); ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
                                    <a href="https://pinterest.com/pin/create/button/?url=<?php echo e($shareUrl); ?>&media=<?php echo e(asset('public/uploads/products/' . $product->prd_image)); ?>&description=<?php echo e($shareTitle); ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Product Actions (like Price, Add to Cart) -->
                        <div class="col-lg-4 col-md-5">
                            <div class="product-action stuck text-left">
                                <div class="free-delivery">
                                    <a href="#"><i class="ti-truck"></i> Free Delivery</a>
                                </div>
                                <div class="product-price-rating">
                                    
                                    <span>₹<?php echo e($product->prd_price); ?></span>
                                    <div class="pull-right">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <div class="product-quantity mt-15">
                                    <label>Quantity:</label>
                                    <input type="number" min="0" value="1" />
                                </div>
                                <div class="add-to-get mt-50">
                                    <button id="add-to-cart-btn" data-product-id="<?php echo e($product->id); ?>" class="btn btn-sacondary btn-block add-to-cart">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--product-details-area end-->
<script>
   document.getElementById('add-to-cart-btn').addEventListener('click', function() {
    let productId = this.getAttribute('data-product-id');
    let quantity = document.querySelector('input[type="number"]').value;

    fetch("<?php echo e(route('cart.add')); ?>", {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                product_id: productId,
                quantity: quantity
            })
        })
        .then(response => {
            if (response.headers.get('Content-Type').includes('text/html')) {
                throw new Error('Please log in to add products to the cart');
            }
            if (!response.ok) {
                return response.json().then(data => {
                    throw new Error(data.error || 'An error occurred');
                });
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert(data.success);
                window.location.reload();
            } else {
                alert(data.error);
            }
        })
        .catch(error => alert(error.message));
});

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/frontend/pages/products/details.blade.php ENDPATH**/ ?>