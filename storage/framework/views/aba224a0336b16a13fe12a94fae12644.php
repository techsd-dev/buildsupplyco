
	<!-- modernizr js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/vendor/modernizr-3.6.0.min.js')); ?>"></script>
	<!-- jquery-3.3.1 version -->
	<script src="<?php echo e(asset('public/frontend/assets/js/vendor/jquery-3.2.1.min.js')); ?>"></script>
	<!-- bootstra.min js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/bootstrap.min.js')); ?>"></script>
	<!-- mmenu js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/jquery.mmenu.js')); ?>"></script>
	<!-- easing js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/jquery.easing.min.js')); ?>"></script>
	<!-- perfect-scrollbar js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/perfect-scrollbar.min.js')); ?>"></script>
	<!---slick-js-->
	<script src="<?php echo e(asset('public/frontend/assets/js/slick.min.js')); ?>"></script>
	<!---letteranimation-js-->
	<script src="<?php echo e(asset('public/frontend/assets/js/letteranimation.min.js')); ?>"></script>
	<!-- jquery-ui js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/jquery-ui.min.js')); ?>"></script>
	<!-- jquery.countdown js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/jquery.countdown.min.js')); ?>"></script>
	<!-- venobox js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/venobox.min.js')); ?>"></script>
	<!-- plugins js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/plugins.js')); ?>"></script>
	<!-- main js -->
	<script src="<?php echo e(asset('public/frontend/assets/js/main.js')); ?>"></script>

	<!-- Modal -->
	<div class="modal fade" id="quick-view" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="product-details-thumb" id="">
                            <img src="<?php echo e(asset('public/frontend/assets/images/products/default.jpg')); ?>" alt="Product Image" id="productImage" />
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="product-details-desc">
                            <h2>Product Name</h2>
                            <span id="descriptionprd"></span>
                            <div class="product-meta">
                                <ul class="list-none">
                                    <li>Category: <span class="categories"></span></li>
                                    <li>Brand: <span id="brand"></span></li>
                                </ul>
                            </div>
                            <div class="product-price-rating">
                                <div><del>Original Price</del></div>
                                <span>Price</span>
                                <!-- <div class="pull-right">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div> -->
                            </div>
                            <!-- <div class="product-colors mt-20">
                                <label>Select Color:</label>
                                <ul class="list-none">
                                    <li>Red</li>
                                </ul>
                            </div> -->
                            <div class="product-quantity mt-15">
                                <label>Quantity:</label>
								<span id="qty"></span>
                                <!-- <input type="number" value="1" /> -->
                            </div>
                            <!-- <div class="add-to-get mt-50">
                                <a href="#" class="add-to-cart">Add to Cart</a>
                                <a href="#" class="add-to-cart compare">+ Add to Compare</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>

</html><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/frontend/layouts/js.blade.php ENDPATH**/ ?>