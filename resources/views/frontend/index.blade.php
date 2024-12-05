@extends('frontend.layouts.master')
@section('title', 'Home Page')
@section('content')
<style>
	.product-wishlist.added i {
		background-color: red;
	}
</style>
<!--slider-area start-->
<div class="slider-area">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12">
				<div class="main-slider mt-30 mt-sm-0">
					@foreach($banners as $banner)
					<div class="slider-single" style="background-image:url('{{ url('public/uploads/banners/' . $banner->image) }}');">
						<!--<div class="d-table d-none">-->
						<!--	<div class="slider-caption">-->
						<!--		<h4>{{ $banner->title }}</h4>-->
						<!--		{{--<h2 class="cssanimation leDoorCloseLeft sequence">{{ $banner->title }}</h2>--}}-->
						<!--		<p>{{ $banner->content }}</p>-->
						<!-- <div class="slider-product-price">
						     			<del>$599</del>-->
						<!--			<span>$499</span>-->
						<!--		</div> -->
						<!--		<a href="{{ $banner->link }}" target="_blank" class="btn-common mt-43">Buy Now</a>-->
						<!--	</div>-->
						<!--</div>-->
					</div>
					@endforeach
				</div>
			</div>
			<div class="col-xl-4 d-none">
				<div class="row mt-30">
					@foreach($subBanners as $index => $banner)
					<div class="col-lg-6 col-sm-6 pl-05">
						<div class="banner-sm hover-effect 
                    @if($index % 2 == 1) mt-sm-20 @endif 
                    @if($index >= 2) mt-20 @endif">
							<img src="{{ asset('public/uploads/banners/' . $banner->image) }}" alt="{{ $banner->title }}" />
							<div class="banner-info">
								<h4>{{ $banner->title }}</h4>
								<p>{!! $banner->content !!}</p>
							</div>
						</div>
					</div>
					@endforeach
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
							@foreach($products as $prod)
							<div class="col-lg-12">
								<div class="product-single product-deal">
									<div class="product-title">
										<small><a href="#">{{ $prod->category->name }}</a></small>
										<h4><a href="{{ route('product.details', $prod->slug) }}">{{ $prod->prd_name }}</a></h4>
									</div>
									<div class="product-thumb">
										<a href="{{ route('product.details', $prod->slug) }}"><img src="{{ url('public/uploads/products/' . ($prod->prd_image ?? 'default.jpg')) }}" alt="" /></a>
										<!-- <div class="downsale"><span>-</span>₹{{ $prod->prd_discount_price ?? 0 }}</div> -->
										<div class="product-quick-view">
											<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
										</div>
									</div>
									<div class="product-price-rating">
										<div class="pull-left">
											<span>₹{{ $prod->prd_price ?? 0 }}</span>
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
										<span>Available: <span>{{ $prod->qty }}</span></span>
									</div>
									<div class="product-countdown">
										<div data-countdown="2010/08/01"></div>
									</div>
								</div>
							</div>
							@endforeach
						</div>
					</div>
					<!--product-ad-->
					<div class="sidebar-single mt-30 d-none d-xl-block">
						<a href="{{ url('/') }}"><img src="{{ asset('public\uploads\1729684498_electrcl.jpeg') }}" alt="" /></a>
					</div>
					<!--latest-products-->
					<div class="single-sidebar products-list mt-35">
						<div class="section-title mb-30">
							<h3>Latest Items</h3>
						</div>
						<div class="one-carousel dots-none">
							<div>
								<ul class="list-none">
									@foreach($products as $prod2)
									<li>
										<div class="product-single style-2">
											<div class="row align-items-center m-0">
												<div class="col-lg-4 p-0">
													<div class="product-thumb">
														<a href="{{ route('product.details', $prod2->slug) }}"><img src="{{ url('public/uploads/products/' . ($prod2->prd_image ?? 'default.jpg')) }}" alt="" /></a>
													</div>
												</div>
												<div class="col-lg-8 p-0">
													<div class="product-title">
														<h4><a href="{{ route('product.details', $prod2->slug) }}">{{ $prod2->prd_name }}</a></h4>
													</div>
													<div class="product-price-rating">
														<span>{{ $prod2->prd_discount_price }}</span>
														<del>{{ $prod2->prd_price }}</del>
													</div>
												</div>
											</div>
										</div>
									</li>
									@endforeach
								</ul>
							</div>
							<div>
								<ul class="list-none">
									@foreach($products as $prod2)
									<li>
										<div class="product-single style-2">
											<div class="row align-items-center m-0">
												<div class="col-lg-4 p-0">
													<div class="product-thumb">
														<a href="{{ route('product.details', $prod2->slug) }}"><img src="{{ url('public/uploads/products/' . ($prod2->prd_image ?? 'default.jpg')) }}" alt="" /></a>
													</div>
												</div>
												<div class="col-lg-8 p-0">
													<div class="product-title">
														<h4><a href="{{ route('product.details', $prod2->slug) }}">{{ $prod2->prd_name }}</a></h4>
													</div>
													<div class="product-price-rating">
														<span>{{ $prod2->prd_discount_price }}</span>
														<del>{{ $prod2->prd_price }}</del>
													</div>
												</div>
											</div>
										</div>
									</li>
									@endforeach
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
										<img src="{{ asset('public/frontend/assets/images/icons/bank-loan.jpg') }}" alt="" />
									</div>
									<div class="support-text">
										<strong>Free Delivery</strong>
										<p>For all order over 99$</p>
									</div>
								</li>
								<li>
									<div class="support-icon">
										<img src="{{ asset('public/frontend/assets/images/icons/bank-liquidity.jpg') }}" alt="" />
									</div>
									<div class="support-text">
										<strong>30 Days Return</strong>
										<p>If goods have Problems</p>
									</div>
								</li>
								<li>
									<div class="support-icon">
										<img src="{{ asset('public/frontend/assets/images/icons/bank-credit-card.jpg') }}" alt="" />
									</div>
									<div class="support-text">
										<strong>Secure Payment</strong>
										<p>100% secure payment</p>
									</div>
								</li>
								<li>
									<div class="support-icon">
										<img src="{{ asset('public/frontend/assets/images/icons/bank-support.jpg') }}" alt="" />
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
						@foreach($categories as $row)
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="{{ route('prodList',$row->slug) }}"><img src="{{ url('public/uploads/categories/',$row->images) }}" alt="" /></a>
								<h4><a href="{{ route('prodList',$row->slug) }}">{{ $row->name }}</a></h4>
							</div>
						</div>
						@endforeach
						<!-- <div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="{{ asset('public/frontend/assets/images/products/category/2.png') }}" alt="" /></a>
								<h4><a href="#">Headphones</a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="{{ asset('public/frontend/assets/images/products/category/3.png') }}" alt="" /></a>
								<h4><a href="#">Smart phone & Tablets</a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="{{ asset('public/frontend/assets/images/products/category/4.png') }}" alt="" /></a>
								<h4><a href="#">Camera & Photography </a></h4>
							</div>
						</div>
						 <div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="{{ asset('public/frontend/assets/images/products/category/3.png') }}" alt="" /></a>
								<h4><a href="#">Smart phone & Tablets</a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="{{ asset('public/frontend/assets/images/products/category/4.png') }}" alt="" /></a>
								<h4><a href="#">Camera & Photography </a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="{{ asset('public/frontend/assets/images/products/category/3.png') }}" alt="" /></a>
								<h4><a href="#">Smart phone & Tablets</a></h4>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="single-product-cat">
								<a href="#"><img src="{{ asset('public/frontend/assets/images/products/category/4.png') }}" alt="" /></a>
								<h4><a href="#">Camera & Photography </a></h4>
							</div>
						</div> -->
					</div>
				</div>
				<!--products-tab-->
				{{--<div class="products-tab mt-35">
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
											<small><a href="#">Iphone</a></small>
											<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
										</div>
										<div class="product-thumb">
											<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/3.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/3.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
				<small><a href="#">Iphone</a></small>
				<h4><a href="#">Samsung CF591 Series Curved 27-Inch FHD Monitor</a></h4>
			</div>
			<div class="product-thumb">
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/3.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/3.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/3.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/3.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/2.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/1.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/2.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/3.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/4.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/5.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/6.jpg') }}" alt="" /></a>
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
					<small><a href="#">Camera</a></small>
					<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
				</div>
				<div class="product-thumb">
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/1.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/2.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/3.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/4.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/5.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/6.jpg') }}" alt="" /></a>
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
	</div>
	<div class="col-lg-3">
		<!--single-product-->
		<div class="product-single">
			<div class="product-title">
				<small><a href="#">Electronics</a></small>
				<h4><a href="#">iPATROL Riley V2 Bonus Bundle - WiFi</a></h4>
			</div>
			<div class="product-thumb">
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/5.jpg') }}" alt="" /></a>
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
				<a href="#"><img src="{{ asset('public/frontend/assets/images/products/6.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/5.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/6.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/7.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/8.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/5.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/6.jpg') }}" alt="" /></a>
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
					<small><a href="#">Camera</a></small>
					<h4><a href="#">Blue Yeti USB Microphone Blackout Edition</a></h4>
				</div>
				<div class="product-thumb">
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/5.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/6.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/7.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/8.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/5.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/6.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/7.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/shop/8.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/5.jpg') }}" alt="" /></a>
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
					<a href="#"><img src="{{ asset('public/frontend/assets/images/products/6.jpg') }}" alt="" /></a>
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
	</div>
</div>
</div>
</div>--}}
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
		@foreach($products2 as $row)
		<div class="col-lg-3">
			<div class="product-single">
				<div class="product-title">
					<small><a href="{{ route('product.details', $row->slug) }}">{{ $row->category->name }}</a></small>
					<h4><a href="{{ route('product.details', $row->slug) }}">{{ $row->prd_name }}</a></h4>
				</div>
				<div class="product-thumb">
					<a href="{{ route('product.details', $row->slug) }}"><img src="{{ url('public/uploads/products/' . ($row->prd_image ?? 'default.jpg')) }}" alt="" /></a>
					<div class="downsale"><span>-</span>₹0</div>
					<div class="product-quick-view">
						<a href="javascript:void(0);" data-toggle="modal" data-target="#quick-view">quick view</a>
					</div>
				</div>
				<div class="product-price-rating">
					<span>₹{{ $row->prd_discount_price }}</span>
					<del>₹{{ $row->prd_price }}</del>
				</div>
				<div class="product-action">
					<a href="{{ route('checkout.index', ['product_id' => $row->id]) }}" class="product-buy-now">Buy Now</a>
					<a href="javascript:void(0);" class="add-to-cart" data-product-id="{{ $row->id }}">Add to Cart</a>
					<a href="javascript:void(0);" data-product-id="{{ $row->id }}" class="product-wishlist"><i class="ti-heart"></i></a>
					<input type="hidden" value="1" min="1" class="product-quantity" />
				</div>
			</div>
		</div>
		@endforeach
	</div>
</div>
<!--banner-section-->
<div class="row mt-40">
	@foreach($products2->take(3) as $row)
	<div class="col-xl-4 col-lg-6">
		<div class="banner-sm hover-effect">
			<img src="{{ url('public/uploads/products/' . ($row->prd_image ?? 'default.jpg')) }}" alt="" />
			<div class="banner-info">
				<div class="product-value">
					<span>₹{{ $row->prd_price }}</span>
					<!-- <del>$229.99</del> -->
				</div>
				<p>Sale Up To <strong>0% <br /> Off</strong> {{ $row->prd_name }}</p>
				<a href="{{ route('product.details', $row->slug) }}" class="btn-common width-115">Buy Now</a>
			</div>
		</div>
	</div>
	@endforeach
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
						@foreach($categories->take(7) as $key => $category)
						<li>
							<a class="" data-toggle="tab" href="#category-{{ $category->id }}">
								{{ $category->name }}
							</a>
						</li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		<div class="tab-content">
			<!-- "All" tab content -->
			<div id="category-all" class="tab-pane active">
				<div class="row product-carousel-fullwidth cv-visible">
					@if($productsByCat->isNotEmpty())
					@foreach($productsByCat as $product)
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">{{ $categories->firstWhere('id', $product->category_id)->name }}</a></small>
								<h4><a href="#">{{ $product->prd_name }}</a></h4>
							</div>
							<div class="product-thumb">
								<a href="#"><img src="{{ asset('public/uploads/products/' . $product->prd_image) }}" alt="{{ $product->prd_name }}" /></a>
								<div class="product-quick-view"></div>
							</div>
							<div class="product-price-rating">
								<span>${{ $product->prd_price }}</span>
								@if($product->prd_discount_price)
								<del>${{ $product->prd_discount_price }}</del>
								@endif
							</div>
							<div class="product-action">
							    <a href="{{ route('checkout.index', ['product_id' => $product->id]) }}" class="product-buy-now">Buy Now</a>
								<a href="javascript:void(0);" class="add-to-cart" data-product-id="{{ $product->id }}">Add to Cart</a>
								<a href="javascript:void(0);" data-product-id="{{ $product->id }}" class="product-wishlist"><i class="ti-heart"></i></a>
								<input type="hidden" value="1" min="1" class="product-quantity" />
							</div>
						</div>
					</div>
					@endforeach
					@else
					<div class="col-12 text-center">
						<p>No products found.</p>
					</div>
					@endif
				</div>
			</div>

			<!-- Individual category tabs -->
			@foreach($categories as $key => $category)
			<div id="category-{{ $category->id }}" class="tab-pane fade">
				<div class="row product-carousel-fullwidth cv-visible">
					@if($productsByCat->where('category_id', $category->id)->isNotEmpty())
					@foreach($productsByCat->where('category_id', $category->id) as $product)
					<div class="col-lg-3">
						<div class="product-single">
							<div class="product-title">
								<small><a href="#">{{ $category->name }}</a></small>
								<h4><a href="{{ route('product.details', $product->slug) }}">{{ $product->prd_name }}</a></h4>
							</div>
							<div class="product-thumb">
								<a href="{{ route('product.details', $product->slug) }}"><img src="{{ asset('public/uploads/products/' . $product->prd_image) }}" alt="{{ $product->prd_name }}" /></a>
								<div class="product-quick-view"></div>
							</div>
							<div class="product-price-rating">
								<span>${{ $product->prd_price }}</span>
								@if($product->prd_discount_price)
								<del>${{ $product->prd_discount_price }}</del>
								@endif
							</div>
							<div class="product-action">
							   <a href="{{ route('checkout.index', ['product_id' => $product->id]) }}" class="product-buy-now">Buy Now</a>
								<a href="javascript:void(0);" class="add-to-cart" data-product-id="{{ $product->id }}">Add to Cart</a>
								<a href="javascript:void(0);" data-product-id="{{ $product->id }}" class="product-wishlist"><i class="ti-heart"></i></a>
								<input type="hidden" value="1" min="1" class="product-quantity" />
							</div>
						</div>
					</div>
					@endforeach
					@else
					<div class="col-12 text-center text-danger">
						<p>No products found in this category.</p>
					</div>
					@endif
				</div>
			</div>
			@endforeach
		</div>
	</div>
</div>
<!--products-tab end-->

<!--recently-viewed-products-start-->
<div class="recent-viewed-products">
	<div class="container-fluid">
		<div class="row">
			<div class="col-xl-12 mt-sm-40">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h3>Recently Viewed Products</h3>
						</div>
					</div>
				</div>
				<div class="row recent-products mlr-minus-12">
					@foreach($productsByCat as $product)
					<div class="col-lg-4">
						<!--single-product-->
						<div class="product-single style-2">
							<div class="row align-items-center">
								<div class="col-lg-6 p-0">
									<div class="product-thumb">
										<a href="{{ route('product.details', $product->slug) }}"><img src="{{ asset('public/uploads/products/' . $product->prd_image) }}" alt="" /></a>
									</div>
								</div>
								<div class="col-lg-6 p-0">
									<div class="product-title">
										<small><a href="{{ route('product.details', $product->slug) }}">{{ $category->name }}</a></small>
										<h4><a href="{{ route('product.details', $product->slug) }}">{{ $product->prd_name }}</a></h4>
									</div>
									<div class="product-price-rating">
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
										<i class="fa fa-star-o"></i>
									</div>
									<div class="product-price-rating">
										<span>${{ $product->prd_price }}</span>
										@if($product->prd_discount_price)
										<del>${{ $product->prd_discount_price }}</del>
										@endif
									</div>
								</div>
							</div>
						</div>
						<!--single-product-->
					</div>
					@endforeach
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
					@foreach($brands as $row)
					<div class="brand-item" title="{{ $row->name }}">
						<a href="{{ route('by.brnd.prodList', $row->slug) }}">
							<img class="brand-static" src="{{ url('public/uploads/brands/',$row->image) }}" alt="" />
						</a>
					</div>
					@endforeach
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
			fetch("{{ route('cart.add') }}", {
					method: 'POST',
					headers: {
						'X-CSRF-TOKEN': '{{ csrf_token() }}',
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

	// add to wishlist 
	$(document).on('click', '.product-wishlist', function() {
		let productId = $(this).data('product-id');
		let action = $(this).hasClass('added') ? 'remove' : 'add';

		$.ajax({
			url: action === 'add' ? "{{ route('wishlist.add') }}" : "{{ route('wishlist.remove') }}",
			method: 'POST',
			data: {
				product_id: productId,
				_token: '{{ csrf_token() }}'
			},
			success: function(response) {
				if (response.status === 'success') {
					let message = action === 'add' ? 'Added to wishlist!' : 'Removed from wishlist!';
					alert(response.message);
					window.location.reload();
					if (action === 'add') {
						$(`.product-wishlist[data-product-id="${productId}"]`).addClass('added');
					} else {
						$(`.product-wishlist[data-product-id="${productId}"]`).removeClass('added');
					}
				} else {
					alert(response.message);
				}
			}
		});
	});
</script>
@endsection