
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
						     			<del>$599</del>-->
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
					<!-- <div class="single-sidebar mt-30">
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
					</div> -->
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
									<a href="javascript:void(0);" class="add-to-cart" data-product-id="<?php echo e($row->id); ?>">Add to Cart</a>
									<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
								</div>
							</div>
						</div>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</div>
				</div>
				<!--banner-section-->
				<div class="row mt-40">
					<?php $__currentLoopData = $products2->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-xl-4 col-lg-6">
						<div class="banner-sm hover-effect">
							<img src="<?php echo e(url('public/uploads/products/' . ($row->prd_image ?? 'default.jpg'))); ?>" alt="" />
							<div class="banner-info">
								<div class="product-value">
									<span>₹<?php echo e($row->prd_price); ?></span>
									<!-- <del>$229.99</del> -->
								</div>
								<p>Sale Up To <strong>0% <br /> Off</strong> <?php echo e($row->prd_name); ?></p>
								<a href="<?php echo e(route('product.details', $row->slug)); ?>" class="btn-common width-115">Buy Now</a>
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
					<h3>Products by Category</h3>
				</div>
			</div>
			<div class="col-lg-9 col-md-9 pl-0">
				<div class="product-nav-tabs style-3">
					<ul class="nav nav-tabs text-right">
						<!-- "All" option -->
						<li>
							<a class="active" data-toggle="tab" href="#category-all">All</a>
						</li>

						<!-- Display first 7 categories -->
						<?php $__currentLoopData = $categories->take(7); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li>
							<a class="" data-toggle="tab" href="#category-<?php echo e($category->id); ?>">
								<?php echo e($category->name); ?>

							</a>
						</li>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</ul>
				</div>
			</div>
		</div>
		<div class="tab-content">
			<!-- "All" tab content -->
			<div id="category-all" class="tab-pane active">
				<div class="row product-carousel-fullwidth cv-visible">
					<?php if($productsByCat->isNotEmpty()): ?>
					<?php $__currentLoopData = $productsByCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#"><?php echo e($categories->firstWhere('id', $product->category_id)->name); ?></a></small>
								<h4><a href="#"><?php echo e($product->prd_name); ?></a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="<?php echo e(asset('public/uploads/products/' . $product->prd_image)); ?>" alt="<?php echo e($product->prd_name); ?>" /></a>
								<div class="product-quick-view"></div>
							</div>
							<div class="product-price-rating">
								<span>$<?php echo e($product->prd_price); ?></span>
								<?php if($product->prd_discount_price): ?>
								<del>$<?php echo e($product->prd_discount_price); ?></del>
								<?php endif; ?>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart" data-product-id="<?php echo e($product->id); ?>">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
								<input type="hidden" value="1" min="1" class="product-quantity" />
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
					<div class="col-12 text-center">
						<p>No products found.</p>
					</div>
					<?php endif; ?>
				</div>
			</div>

			<!-- Individual category tabs -->
			<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<div id="category-<?php echo e($category->id); ?>" class="tab-pane fade">
				<div class="row product-carousel-fullwidth cv-visible">
					<?php if($productsByCat->where('category_id', $category->id)->isNotEmpty()): ?>
					<?php $__currentLoopData = $productsByCat->where('category_id', $category->id); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#"><?php echo e($category->name); ?></a></small>
								<h4><a href="<?php echo e(route('product.details', $product->slug)); ?>"><?php echo e($product->prd_name); ?></a></h4>
							</div>
							<div class="product-thumb">
								<a href="<?php echo e(route('product.details', $product->slug)); ?>"><img src="<?php echo e(asset('public/uploads/products/' . $product->prd_image)); ?>" alt="<?php echo e($product->prd_name); ?>" /></a>
								<div class="product-quick-view"></div>
							</div>
							<div class="product-price-rating">
								<span>$<?php echo e($product->prd_price); ?></span>
								<?php if($product->prd_discount_price): ?>
								<del>$<?php echo e($product->prd_discount_price); ?></del>
								<?php endif; ?>
							</div>
							<div class="product-action">
								<a href="javascript:void(0);" class="product-compare"><i class="ti-control-shuffle"></i></a>
								<a href="javascript:void(0);" class="add-to-cart" data-product-id="<?php echo e($product->id); ?>">Add to Cart</a>
								<a href="javascript:void(0);" class="product-wishlist"><i class="ti-heart"></i></a>
								<input type="hidden" value="1" min="1" class="product-quantity" />
							</div>
						</div>
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					<?php else: ?>
					<div class="col-12 text-center text-danger">
						<p>No products found in this category.</p>
					</div>
					<?php endif; ?>
				</div>
			</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		</div>
	</div>
</div>
<!--products-tab end-->



<!--products-tab start-->
<!-- <div class="products-tab-area">
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
</div> -->
<!--products-tab end-->

<!--recently-viewed-products-start-->
<div class="recent-viewed-products">
	<div class="container-fluid">
		<div class="row">
			<!-- <div class="col-xl-2">
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
			</div> -->
			<div class="col-xl-12 mt-sm-40">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h3>Recently Viewed Products</h3>
						</div>
					</div>
				</div>
				<div class="row recent-products mlr-minus-12">
					<?php $__currentLoopData = $productsByCat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<div class="col-lg-4">
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="<?php echo e(route('product.details', $product->slug)); ?>"><img src="<?php echo e(asset('public/uploads/products/' . $product->prd_image)); ?>" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="<?php echo e(route('product.details', $product->slug)); ?>"><?php echo e($category->name); ?></a></small>
										<h4><a href="<?php echo e(route('product.details', $product->slug)); ?>"><?php echo e($product->prd_name); ?></a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>$<?php echo e($product->prd_price); ?></span>
										<?php if($product->prd_discount_price): ?>
										<del>$<?php echo e($product->prd_discount_price); ?></del>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<!--single-product-->
						<!-- <div class="product-single style-2">
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
						</div> -->
					</div>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
	document.querySelectorAll('.add-to-cart').forEach(function(element) {
		element.addEventListener('click', function() {
			let productId = this.getAttribute('data-product-id');
			let quantity = document.querySelector('.product-quantity').value;
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
					}
				})
				.catch(error => {
					alert(error.message);
				});
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('frontend.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/frontend/index.blade.php ENDPATH**/ ?>