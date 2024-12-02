
<?php $__env->startSection('title', 'Home Page'); ?>
<?php $__env->startSection('content'); ?>
<!--slider-area start-->
<div class="slider-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12">
				<div class="main-slider mt-30 mt-sm-0">
					<?php $__currentLoopData = $banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="slider-single" style="background-image:url('<?php echo e(url('public/uploads/banners/' . $banner->image)); ?>');">
						<!--<div class="d-table d-none">-->
						<!--	<div class="slider-caption">-->
						<!--		<h4><?php echo e($banner->title); ?></h4>-->
						<!--		-->
						<!--		<p><?php echo e($banner->content); ?></p>-->
						<!-- <div class="slider-product-price">
						<!--			<del>$599</del>-->
						<!--			<span>$499</span>-->
						<!--		</div> -->
						<!--		<a href="<?php echo e($banner->link); ?>" target="_blank" class="btn-common mt-43">Buy Now</a>-->
						<!--	</div>-->
						<!--</div>-->
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
			<div class="col-xl-4 d-none">
				<div class="row mt-30">
					<?php $__currentLoopData = $subBanners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-6 col-sm-6 pl-05">
						<div class="banner-sm hover-effect 
                    <?php if($index % 2 == 1): ?> mt-sm-20 <?php endif; ?> 
                    <?php if($index >= 2): ?> mt-20 <?php endif; ?>">
							<img src="<?php echo e(asset('public/uploads/banners/' . $banner->image)); ?>" alt="<?php echo e($banner->title); ?>" />
							<div class="banner-info">
								<h4><?php echo e($banner->title); ?></h4>
								<p><?php echo $banner->content; ?></p>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--slider-area end-->

<!--products-area start-->
<div class="products-area mt-47 mt-sm-37">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-2 col-lg-3">
				<div class="sidebar">
					<!--product-deal-->
					<div class="sidebar-single">
						<div class="section-title">
							<h3>Deal off the week</h3>
						</div>
						<div class="row product-deals">
							<!--single-deal-->
							<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<div class="col-lg-12">
								<div class="product-single product-deal">
									<div class="product-title">
										<small><a href="#"><?php echo e($prod->category->name); ?></a></small>
										<h4><a href="<?php echo e(route('product.details', $prod->slug)); ?>"><?php echo e($prod->prd_name); ?></a></h4>
									</div>
									<div class="product-thumb">
										<a href="<?php echo e(route('product.details', $prod->slug)); ?>"><img src="<?php echo e(url('public/uploads/products/' . ($prod->prd_image ?? 'default.jpg'))); ?>" alt="" /></a>
										<!-- <div class="downsale"><span>-</span>₹<?php echo e($prod->prd_discount_price ?? 0); ?></div> -->
										<div class="product-quick-view">
											<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
										</div>
									</div>
									<div class="product-price-rating">
										<div class="pull-left">
											<span>₹<?php echo e($prod->prd_price ?? 0); ?></span>
										</div>
										<div class="pull-right">
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
											<i class="fa fa-star-o"></i>
										</div>
									</div>
									<div class="product-availability">
										<div class="progress">
											<div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width:60%;">
											</div>
										</div>
										<!-- <span>Already Sold: <span>20</span></span> -->
										<span>Available: <span><?php echo e($prod->qty); ?></span></span>
									</div>
									<div class="product-countdown">
										<div data-countdown="2010/08/01"></div>
									</div>
								</div>
							</div>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</div>
					</div>
					<!--product-ad-->
					<div class="sidebar-single mt-30 d-none d-xl-block">
						<a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('public\uploads\1729684498_electrcl.jpeg')); ?>" alt="" /></a>
					</div>
					<!--latest-products-->
					<div class="single-sidebar products-list mt-35">
						<div class="section-title mb-30">
							<h3>Latest Items</h3>
						</div>
						<div class="one-carousel dots-none">
							<div>
								<ul class="list-none">
									<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li>
										<div class="product-single style-2">
											<div class="row align-items-center m-0">
												<div class="col-lg-4 p-0">
													<div class="product-thumb">
														<a href="<?php echo e(route('product.details', $prod2->slug)); ?>"><img src="<?php echo e(url('public/uploads/products/' . ($prod2->prd_image ?? 'default.jpg'))); ?>" alt="" /></a>
													</div>
												</div>
												<div class="col-lg-8 p-0">
													<div class="product-title">
														<h4><a href="<?php echo e(route('product.details', $prod2->slug)); ?>"><?php echo e($prod2->prd_name); ?></a></h4>
													</div>
													<div class="product-price-rating">
														<span><?php echo e($prod2->prd_discount_price); ?></span>
														<del><?php echo e($prod2->prd_price); ?></del>
													</div>
												</div>
											</div>
										</div>
									</li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
							<div>
								<ul class="list-none">
									<?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $prod2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<li>
										<div class="product-single style-2">
											<div class="row align-items-center m-0">
												<div class="col-lg-4 p-0">
													<div class="product-thumb">
														<a href="<?php echo e(route('product.details', $prod2->slug)); ?>"><img src="<?php echo e(url('public/uploads/products/' . ($prod2->prd_image ?? 'default.jpg'))); ?>" alt="" /></a>
													</div>
												</div>
												<div class="col-lg-8 p-0">
													<div class="product-title">
														<h4><a href="<?php echo e(route('product.details', $prod2->slug)); ?>"><?php echo e($prod2->prd_name); ?></a></h4>
													</div>
													<div class="product-price-rating">
														<span><?php echo e($prod2->prd_discount_price); ?></span>
														<del><?php echo e($prod2->prd_price); ?></del>
													</div>
												</div>
											</div>
										</div>
									</li>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</ul>
							</div>
						</div>
					</div>
					<!--store-supports-->
					<div class="single-sidebar mt-30">
						<div class="store-supports">
							<ul class="list-none">
								<li>
									<div class="support-icon">
										<img src="<?php echo e(asset('public/frontend/assets/images/icons/bank-loan.jpg')); ?>" alt="" />
									</div>
									<div class="support-text">
										<strong>Free Delivery</strong>
										<p>For all order over 99$</p>
									</div>
								</li>
								<li>
									<div class="support-icon">
										<img src="<?php echo e(asset('public/frontend/assets/images/icons/bank-liquidity.jpg')); ?>" alt="" />
									</div>
									<div class="support-text">
										<strong>30 Days Return</strong>
										<p>If goods have Problems</p>
									</div>
								</li>
								<li>
									<div class="support-icon">
										<img src="<?php echo e(asset('public/frontend/assets/images/icons/bank-credit-card.jpg')); ?>" alt="" />
									</div>
									<div class="support-text">
										<strong>Secure Payment</strong>
										<p>100% secure payment</p>
									</div>
								</li>
								<li>
									<div class="support-icon">
										<img src="<?php echo e(asset('public/frontend/assets/images/icons/bank-support.jpg')); ?>" alt="" />
									</div>
									<div class="support-text">
										<strong>24/7 Support</strong>
										<p>Dedicated support</p>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-10 col-lg-9 fix">
				<!--product-categories-->
				<div class="product-categories mt-sm-40">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h3>Top Categories</h3>
							</div>
						</div>
					</div>
					<div class="row product-categories-carousel mt-30">
						<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="<?php echo e(route('prodList',$row->slug)); ?>"><img src="<?php echo e(url('public/uploads/categories/',$row->images)); ?>" alt="" /></a>
								<h4><a href="<?php echo e(route('prodList',$row->slug)); ?>"><?php echo e($row->name); ?></a></h4>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						<!-- <div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/category/2.png')); ?>" alt="" /></a>
								<h4><a href="#">Headphones</a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/category/3.png')); ?>" alt="" /></a>
								<h4><a href="#">Smart phone & Tablets</a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/category/4.png')); ?>" alt="" /></a>
								<h4><a href="#">Camera & Photography </a></h4>
							</div>
						</div>
						 <div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/category/3.png')); ?>" alt="" /></a>
								<h4><a href="#">Smart phone & Tablets</a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/category/4.png')); ?>" alt="" /></a>
								<h4><a href="#">Camera & Photography </a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/category/3.png')); ?>" alt="" /></a>
								<h4><a href="#">Smart phone & Tablets</a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/category/4.png')); ?>" alt="" /></a>
								<h4><a href="#">Camera & Photography </a></h4>
							</div>
						</div> -->
					</div>
				</div>
				<!--products-tab-->
				<div class="products-tab mt-35">
					<div class="product-nav-tabs">
						<ul class="nav nav-tabs">
							<li><a class="active" data-toggle="tab" href="#new-arrivals">New Arrivals</a></li>
							<li><a data-toggle="tab" href="#on-sale">On Sale</a></li>
							<li><a data-toggle="tab" href="#best-rated">Best Rated</a></li>
						</ul>
					</div>
					<div class="tab-content pb-40">
						<div id="new-arrivals" class="tab-pane fade in show active">
							<div class="row product-carousel cv-visible">
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/1.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/2.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/3.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/4.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/5.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/6.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/7.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/8.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/8.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/1.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/2.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/2.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/3.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/3.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/2.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/2.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="on-sale" class="tab-pane fade">
							<div class="row product-carousel cv-visible">
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/1.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/2.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/3.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/5.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/6.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/7.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/8.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/1.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/2.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/3.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/5.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/6.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/7.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/8.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div id="best-rated" class="tab-pane fade">
							<div class="row product-carousel cv-visible">
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/5.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/6.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/7.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/8.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/5.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/6.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/7.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/8.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/5.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Camera</a></small>
											<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/6.jpg')); ?>" alt="" /></a>
											<div class="downsale"><span>-</span>$25</div>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<span>$195.00</span>
											<del>$229.99</del>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/7.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/8.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/5.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Electronics</a></small>
											<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/6.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$195.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
								<div class="col-lg-3">
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/7.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
									<!--single-product-->
									<div class="product-single">
										<div class="product-title">
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/8.jpg')); ?>" alt="" /></a>
											<div class="product-quick-view">
												<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
											</div>
										</div>
										<div class="product-price-rating">
											<div class="pull-left">
												<span>$395.00</span>
											</div>
											<div class="pull-right">
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<div class="product-action">
											<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
											<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
											<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--best sellers-->
				<div class="best-sellers mt-minus-40">
					<div class="row">
						<div class="col-lg-12">
							<div class="section-title">
								<h3>Best Sellers</h3>
							</div>
						</div>
					</div>
					<div class="row best-seller cv-visible">
						<?php $__currentLoopData = $products2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<div class="col-lg-3">
							<div class="product-single">
								<div class="product-title">
									<small><a href="<?php echo e(route('product.details', $row->slug)); ?>"><?php echo e($row->category->name); ?></a></small>
									<h4><a href="<?php echo e(route('product.details', $row->slug)); ?>"><?php echo e($row->prd_name); ?></a></h4>
								</div>
								<div class="product-thumb">
									<a href="<?php echo e(route('product.details', $row->slug)); ?>"><img src="<?php echo e(url('public/uploads/products/' . ($row->prd_image ?? 'default.jpg'))); ?>" alt="" /></a>
									<div class="downsale"><span>-</span>₹0</div>
									<div class="product-quick-view">
										<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
									</div>
								</div>
								<div class="product-price-rating">
									<span>₹<?php echo e($row->prd_discount_price); ?></span>
									<del>₹<?php echo e($row->prd_price); ?></del>
								</div>
								<div class="product-action">
									<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
									<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
									<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
				<!--banner-section-->
				<div class="row mt-40">
					<div class="col-xl-4 col-lg-6">
						<div class="banner-sm hover-effect">
							<img src="<?php echo e(asset('public/frontend/assets/images/banners/md/1.jpg')); ?>" alt="" />
							<div class="banner-info">
								<div class="product-value">
									<span>$195.00</span>
									<del>$229.99</del>
								</div>
								<p>Sale Up To <strong>25% <br /> Off</strong> Bosch Home</p>
								<a href="#" class="btn-common width-115">Buy Now</a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 mt-sm-30">
						<div class="banner-sm hover-effect">
							<img src="<?php echo e(asset('public/frontend/assets/images/banners/md/2.jpg')); ?>" alt="" />
							<div class="banner-info">
								<div class="product-value">
									<span>$345.00</span>
									<del>$429.99</del>
								</div>
								<p>Extra <strong>30% Off</strong><br /> All Sale Style</p>
								<a href="#" class="btn-common width-115">Buy Now</a>
							</div>
						</div>
					</div>
					<div class="col-xl-4 col-lg-6 d-none d-xl-block">
						<div class="banner-sm hover-effect">
							<img src="<?php echo e(asset('public/frontend/assets/images/banners/md/3.jpg')); ?>" alt="" />
							<div class="banner-info">
								<div class="product-value">
									<span>$345.00</span>
									<del>$429.99</del>
								</div>
								<p>iPATROL <strong>Riley V2</strong><br /> Bonus Bundle</p>
								<a href="#" class="btn-common width-115">Buy Now</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--products-area end-->

<!--products-tab start-->
<div class="products-tab-area mt-45 mt-sm-40">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 pr-0">
				<div class="section-title">
					<h3>Electronics</h3>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 pl-0">
				<div class="product-nav-tabs style-3">
					<ul class="nav nav-tabs text-right">
						<li><a class="active" data-toggle="tab" href="#all-accessories">All Accessories</a></li>
						<li><a data-toggle="tab" href="#phone-tablet">Phone & Tablet</a></li>
						<li><a data-toggle="tab" href="#video-cemra">Video Cameras</a></li>
						<li><a data-toggle="tab" href="#laptop-computers">Laptops & Computers </a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="tab-content">
			<div id="all-accessories" class="tab-pane active">
				<div class="row product-carousel-fullwidth cv-visible">
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/14.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/3.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/6.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/1.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/2.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/3.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="phone-tablet" class="tab-pane fade">
				<div class="row product-carousel-fullwidth cv-visible">
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/1.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/3.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/6.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/1.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/3.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/6.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="video-cemra" class="tab-pane fade">
				<div class="row product-carousel-fullwidth cv-visible">
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/8.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/6.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/7.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/8.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/6.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/7.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="laptop-computers" class="tab-pane fade">
				<div class="row product-carousel-fullwidth cv-visible">
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/8.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/9.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/10.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/11.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/8.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/9.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/10.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/11.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--products-tab end-->

<!--products-tab start-->
<div class="products-tab-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-3 col-md-3 pr-0">
				<div class="section-title">
					<h3>Home & Appliances</h3>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 pl-0">
				<div class="product-nav-tabs style-3">
					<ul class="nav nav-tabs text-right">
						<li><a class="active" data-toggle="tab" href="#accessories">All Accessories</a></li>
						<li><a data-toggle="tab" href="#tv-fridge">TVs/Fridge/Laundry</a></li>
						<li><a data-toggle="tab" href="#kitchen-appliance">Kitchen Appliance</a></li>
						<li><a data-toggle="tab" href="#seasonal-appliances">Seasonal Appliances</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="tab-content">
			<div id="accessories" class="tab-pane active">
				<div class="row product-carousel-fullwidth cv-visible">
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/15.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/16.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/17.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/18.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/19.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/20.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/3.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="tv-fridge" class="tab-pane fade">
				<div class="row product-carousel-fullwidth cv-visible">
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/1.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/2.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/3.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/1.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/2.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/3.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/4.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="kitchen-appliance" class="tab-pane fade">
				<div class="row product-carousel-fullwidth cv-visible">
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/15.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/16.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/17.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/18.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/15.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/16.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/17.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/18.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div id="seasonal-appliances" class="tab-pane fade">
				<div class="row product-carousel-fullwidth cv-visible">
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/5.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/6.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/7.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/8.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Camera</a></small>
								<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/5.jpg')); ?>" alt="" /></a>
								<div class="downsale"><span>-</span>$25</div>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<span>$195.00</span>
								<del>$229.99</del>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Iphone</a></small>
								<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/6.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$395.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Electronics</a></small>
								<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/7.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$195.00</span>
								</div>
								<div class="pull-right">
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
									<i class="fa fa-star-o"></i>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">Macbook</a></small>
								<h4><a href="#">Swivl C Series RobotSW3322-C1 </a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/shop/8.jpg')); ?>" alt="" /></a>
								<div class="product-quick-view">
									<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
								</div>
							</div>
							<div class="product-price-rating">
								<div class="pull-left">
									<span>$255.00</span>
									<del>329.99</del>
								</div>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--products-tab end-->

<!--recently-viewed-products-start-->
<div class="recent-viewed-products">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-2">
				<!--blog-list-widget-->
				<div class="sidebar-single">
					<div class="section-title">
						<h3>Latest Blogs</h3>
					</div>
					<div class="row blog-carousels mt-30">
						<div class="col-lg-12">
							<div class="blog-carousel">
								<div class="blog-carousel-thumb">
									<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/blog/sm/1.jpg')); ?>" alt="" /></a>
								</div>
								<div class="blog-carousel-desc">
									<small>22 Apr 2019</small>
									<h4><a href="#">A blender is a kitchen and laboratory appliance</a></h4>
									<a href="#" class="readmore">Read More </a>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="blog-carousel">
								<div class="blog-carousel-thumb">
									<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/blog/sm/2.jpg')); ?>" alt="" /></a>
								</div>
								<div class="blog-carousel-desc">
									<small>22 Apr 2019</small>
									<h4><a href="#">A blender is a kitchen and laboratory appliance</a></h4>
									<a href="#" class="readmore">Read More </a>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="blog-carousel">
								<div class="blog-carousel-thumb">
									<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/blog/sm/3.jpg')); ?>" alt="" /></a>
								</div>
								<div class="blog-carousel-desc">
									<small>22 Apr 2019</small>
									<h4><a href="#">A blender is a kitchen and laboratory appliance</a></h4>
									<a href="#" class="readmore">Read More </a>
								</div>
							</div>
						</div>
						<div class="col-lg-12">
							<div class="blog-carousel">
								<div class="blog-carousel-thumb">
									<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/blog/sm/1.jpg')); ?>" alt="" /></a>
								</div>
								<div class="blog-carousel-desc">
									<small>22 Apr 2019</small>
									<h4><a href="#">A blender is a kitchen and laboratory appliance</a></h4>
									<a href="#" class="readmore">Read More </a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-xl-10 mt-sm-40">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h3>Recently Viewed Products</h3>
						</div>
					</div>
				</div>
				<div class="row recent-products mlr-minus-12">
					<div class="col-lg-4">
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/2.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/4.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/21.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/23.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/9.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/12.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/4.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/4.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/5.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/5.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-lg-4">
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/6.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/products/6.jpg')); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="#">Electronics</a></small>
										<h4><a href="#">Vantech VP-153C Camera</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$195.00</span>
										<del>$229.99</del>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--recently-viewed-products-end-->

<!--brands-area start-->
<div class="container-fluid mt-50">
	<div class="brands-area">
		<div class="row">
			<div class="col-lg-12">
				<div class="brand-items">
					<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="brand-item" title="<?php echo e($row->name); ?>">
						<a href="<?php echo e(route('prodList',$row->slug)); ?>">
							<img class="brand-static" src="<?php echo e(url('public/uploads/categories/',$row->images)); ?>" alt="" />
						</a>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
<!--brands-area end-->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/frontend/index.blade.php ENDPATH**/ ?>