<?php echo $__env->make('frontend.layouts.css', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
$settings = App\Models\Setting::find(1);
$brands = App\Models\Brand::orderBy('id', 'DESC')->limit(4)->get();
$categories = App\Models\Category::orderBy('id', 'DESC')->limit(5)->get();
$categoriesForFilter = App\Models\Category::orderBy('id', 'DESC')->get();
$subCategories = App\Models\SubCategory::orderBy('id', 'DESC')->get();
?>

<body>
	<!--[if lte IE 9]>
	<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
	<![endif]-->

	<!--header-area start-->

	<header class="header-area">
		<div class="desktop-header">
			<!--header-top-->
			<div class="header-top">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-6">
							<div class="topbar-left">
								<ul class="list-none">
									<li>SHOP EVENTS & SAVE UP TO <span>65% OFF!</span></li>
									<li>Call Us: <span>001-1234-88888</span></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="topbar-right">
								<div class="social-icons pull-right">
									<a href="<?php echo e($settings->fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
									<a href="<?php echo e($settings->twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
									<a href="<?php echo e($settings->insta); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
									<a href="<?php echo e($settings->ytb); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
								</div>
								<!-- <div class="currency-bar lang-bar pull-right">
									<ul>
										<li><a href="#"><img src="<?php echo e(asset('public/frontend/assets/images/icons/gb.png')); ?>" alt="" />English <i class="fa fa-angle-down"></i></a>
											<ul>
												<li><a href="#">French</a></li>
												<li><a href="#">Chinese</a></li>
											</ul>
										</li>
										<li><span class="br">|</span></li>
									</ul>
								</div>
								<div class="currency-bar pull-right">
									<ul>
										<li><a href="#">USD <i class="fa fa-angle-down"></i></a>
											<ul>
												<li><a href="#">EUR</a></li>
												<li><a href="#">AUD</a></li>
											</ul>
										</li>
										<li><span>|</span></li>
									</ul>
								</div> -->
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--header-bottom-->
			<div class="sticker header-bottom">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="col-lg-2">
							<div class="logo">
								<a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('public/frontend/assets/images/logo.png')); ?>" alt="logo" /></a>
							</div>
						</div>
						<div class="col-lg-8">
							<div class="mainmenu">
								<nav>
									<ul>
										<li><a href="<?php echo e(url('/')); ?>">Home</a>
										</li>
										<!-- <li><a href="<?php echo e(url('/')); ?>">Home <b class="caret"></b></a>
											<ul class="submenu">
												<li><a href="<?php echo e(url('/')); ?>">Home</a></li>
											</ul>
										</li> -->
										<li>
											<a href="#">
												<!-- <span class="text-label label-featured">Featured</span> -->
												Categories
												<b class="caret"></b>
											</a>
											<ul class="mega-menu">
												<li class="megamenu-single">
													<span class="mega-menu-title">Categories</span>
													<ul>
														<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
														<li><a href="<?php echo e(route('prodList', $cat->slug)); ?>"><?php echo e($cat->name); ?></a></li>
														<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
													</ul>
												</li>
												<li class="megamenu-single">
													<span class="mega-menu-title">Featured</span>
													<ul>
														<li><a href="<?php echo e(route('wishlist.index')); ?>">Wishlist</a></li>
														<li><a href="<?php echo e(route('cart.index')); ?>">Shopping Cart</a></li>
														<li><a href="<?php echo e(route('checkout.index')); ?>">Checkout</a></li>
														<li><a href="#">Other</a></li>
													</ul>
												</li>
												<li class="megamenu-single">
													<span class="mega-menu-title">Resources</span>
													<ul>
														<li><a href="<?php echo e(route('about.us')); ?>">About </a></li>
														<li><a href="<?php echo e(route('faqs')); ?>">FAQ</a></li>
														<!-- <li><a href="coming-soon.html">Coming Soon</a></li>
														<li><a href="404.html">404 Error</a></li> -->
													</ul>
												</li>
												<li class="megamenu-single">
													<span class="mega-menu-title">Information</span>
													<ul>
														<li><a href="<?php echo e(route('fr.careers')); ?>">Careers</a></li>
														<li><a href="<?php echo e(route('contact.us')); ?>">Contact Us</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<!-- <li>
											<a href="#">
												<span class="text-label label-hot">Hot</span>
												Pages
												<b class="caret"></b>
											</a>
											<ul class="submenu">
												<li><a href="<?php echo e(route('about.us')); ?>">About Us</a></li>
												<li><a href="faq.html">FAQ</a></li>
												<li><a href="coming-soon.html">Coming Soon</a></li>
												<li><a href="404.html">404 Eror</a></li>
											</ul>
										</li> -->
										<li><a href="#">Our Brands <b class="caret"></b></a>
											<ul class="submenu">
												<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li><a href="<?php echo e(route('by.brnd.prodList', $brand->id)); ?>"><?php echo e($brand->name); ?></a></li>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</ul>
										</li>
										<li><a href="<?php echo e(route('about.us')); ?>">About Us</a></li>
										<li><a href="<?php echo e(route('contact.us')); ?>">Contact</a></li>
										<li><a href="<?php echo e(route('fr.careers')); ?>">Careers</a></li>
									</ul>
								</nav>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="register-login pull-right">
								<?php if(Auth::check()): ?>
								<a href="<?php echo e(url('user-dashboard')); ?>" class="btn btn-sm btn-success text-white"><strong><i class="fa fa-user"></i></strong>
									Profile
								</a>
								<?php else: ?>
								<a href="<?php echo e(route('user.register.form')); ?>">Register</a>
								<span>/</span>
								<a href="<?php echo e(route('user.login')); ?>">Sign in</a>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--products-search-->
			<div class="products-search">
				<div class="container-fluid">
					<div class="row ">

						<div class="col-xl-2 col-lg-3 ">
							<div class="collapse-menu mt-0">
								<ul>
									<li><a href="javascript:void(0);" class="vm-menu"><i class="fa fa-navicon"></i><span>Categories</span></a>
										<ul class="vm-dropdown d-hidden" style="display: none;">
											<?php $__currentLoopData = $categoriesForFilter; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li class="category-item" data-id="<?php echo e($row->id); ?>" data-slug="<?php echo e($row->slug); ?>">
												<a href="#"><i class="fa fa-laptop"></i><?php echo e($row->name); ?> <b class="caret"></b></a>
												<ul class="mega-menu subcategory-list" style="display: none;">
													<!-- Subcategories will be dynamically loaded here -->
												</ul>
											</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-xl-6 col-lg-6">
							<!-- <div class="search-box">
								<select>
									<option>All Categories</option>
									<option>Computer</option>
									<option>TV & Smart box</option>
									<option>Camera & Photography</option>
									<option>Headphones</option>
								</select>
								<input type="text" placeholder="What do you need?" />
								<button>Search</button>
							</div> -->
						</div>
						<div class="col-xl-4 col-lg-3">
							<div class="mini-cart pull-right">
								<ul>
									<li><a href="#" title="Track Your Order"><i class="ti-truck"></i></a></li>
									<li>
										<a href="<?php echo e(route('wishlist.index')); ?>">
											<i class="icon_heart_alt"></i>
											<?php if(auth()->guard()->check()): ?>
											<span><?php echo e(Auth::user()->wishlist->count()); ?></span>
											<?php else: ?>
											<span>0</span>
											<?php endif; ?>
										</a>
									</li>

									<!-- resources/views/frontend/partials/header.blade.php -->

									<?php
									use App\Models\Cart;
									use Illuminate\Support\Facades\Auth;

									$cartItems = Auth::check() ? Cart::where('user_id', Auth::id())->with('product')->get() : collect();

									$totalPrice = $cartItems->sum(function ($item) {
									return $item->product->prd_price * $item->quantity;
									});
									?>

									<li>
										<a href="javascript:void(0);" class="minicart-icon">
											<i class="icon_bag_alt"></i>
											<span class="total-price">₹<?php echo e($totalPrice); ?></span>
											<span class="cart-count"><?php echo e($cartItems->count()); ?></span>
										</a>
										<div class="cart-dropdown">
											<ul>
												<?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<li>
													<div class="mini-cart-thumb">
														<a href="#"><img src="<?php echo e(asset('public/uploads/products/' . $item->product->prd_image)); ?>" alt="" /></a>
													</div>
													<div class="mini-cart-heading">
														<span>₹<?php echo e($item->product->prd_price); ?> x <?php echo e($item->quantity); ?></span>
														<h5><a href="#"><?php echo e($item->product->prd_name); ?></a></h5>
													</div>
													<div class="mini-cart-remove">
														<form action="<?php echo e(route('cart.remove')); ?>" method="POST">
															<?php echo csrf_field(); ?>
															<input type="hidden" name="id" value="<?php echo e($item->id); ?>">
															<button onclick="return confirm('Are sure want to remove from cart?');" type="submit" class="btn btn-sm btn-danger"><i class="ti-close"></i></button>
														</form>
													</div>
												</li>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</ul>
											<div class="minicart-total fix">
												<span class="pull-left">Total:</span>
												<span class="pull-right">₹<?php echo e($totalPrice); ?></span>
											</div>
											<div class="mini-cart-checkout">
												<a href="<?php echo e(route('cart.index')); ?>" class="btn-common view-cart">VIEW CART</a>
												<a href="<?php echo e(route('checkout.index')); ?>" class="btn-common checkout mt-10">CHECK OUT</a>
											</div>
										</div>
									</li>

								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--mobile-header-->
		<div class="sticker mobile-header">
			<div class="container-fluid">
				<!--logo and cart-->
				<div class="row align-items-center">
					<div class="col-sm-4 col-6">
						<div class="logo">
							<a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('public/frontend/assets/images/logo.png')); ?>" alt="logo" /></a>
						</div>
					</div>
					<div class="col-sm-8 col-6">
						<div class="mini-cart text-right">
							<ul>
								<li>
									<a href="<?php echo e(route('wishlist.index')); ?>">
										<i class="icon_heart_alt"></i>
										<?php if(auth()->guard()->check()): ?>
										<span><?php echo e(Auth::user()->wishlist->count()); ?></span>
										<?php else: ?>
										<span>0</span>
										<?php endif; ?>
									</a>
								</li>
								<li>
									<a href="javascript:void(0);" class="minicart-icon">
										<i class="icon_bag_alt"></i>
										<span class="total-price">$<?php echo e($totalPrice); ?></span>
										<span class="cart-count"><?php echo e($cartItems->count()); ?></span>
									</a>
									<div class="cart-dropdown">
										<ul>
											<?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li>
												<div class="mini-cart-thumb">
													<a href="#"><img src="<?php echo e(asset('public/uploads/products/' . $item->product->prd_image)); ?>" alt="" /></a>
												</div>
												<div class="mini-cart-heading">
													<span>$<?php echo e($item->product->prd_discount_price); ?> x <?php echo e($item->quantity); ?></span>
													<h5><a href="#"><?php echo e($item->product->prd_name); ?></a></h5>
												</div>
												<div class="mini-cart-remove">
													<form action="<?php echo e(route('cart.remove')); ?>" method="POST">
														<?php echo csrf_field(); ?>
														<input type="hidden" name="id" value="<?php echo e($item->id); ?>">
														<button onclick="return confirm('Are sure want to remove from cart?');" type="submit" class="btn btn-sm btn-danger"><i class="ti-close"></i></button>
													</form>
												</div>
											</li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
										<div class="minicart-total fix">
											<span class="pull-left">Total:</span>
											<span class="pull-right">$<?php echo e($totalPrice); ?></span>
										</div>
										<div class="mini-cart-checkout">
											<a href="<?php echo e(route('cart.index')); ?>" class="btn-common view-cart">VIEW CART</a>
											<a href="<?php echo e(route('checkout.index')); ?>" class="btn-common checkout mt-10">CHECK OUT</a>
										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!--search-box-->
				<div class="row align-items-center">
					<div class="col-sm-12">
						<!-- <div class="search-box mt-sm-15">
							<select>
								<option>All Categories</option>
								<option>Computer</option>
								<option>TV & Smart box</option>
								<option>Camera & Photography</option>
								<option>Headphones</option>
							</select>
							<input type="text" placeholder="What do you need?" />
							<button>Search</button>
						</div> -->
					</div>
				</div>
				<!--site-menu-->
				<div class="row mt-sm-10">
					<div class="col-lg-12">
						<a href="#my-menu" class="mmenu-icon pull-left"><i class="fa fa-bars"></i></a>

						<div class="mainmenu">
							<nav id="my-menu">
								<ul>
									<li><a href="<?php echo e(url('/')); ?>">Home <b class="caret"></b></a>
									</li>
									<!-- <li>
										<a href="#">
											<span class="text-label label-featured">Featured</span>
											Shop
											<b class="caret"></b>
										</a>
										<ul>
											<li>
												<span class="mega-menu-title">Shop Page</span>
												<ul>
													<li><a href="shop.html">Shop Grid</a></li>
													<li><a href="shop-list.html">Shop List</a></li>
													<li><a href="shop-list-col-3.html">Shop Column 3</a></li>
													<li><a href="product-details.html">Product Details</a></li>
													<li><a href="poduct-details-sidebar.html">Product Details Sidebar</a></li>
												</ul>
											</li>
											<li>
												<span class="mega-menu-title">Features</span>
												<ul>
													<li><a href="wishlist.html">Wishlist</a></li>
													<li><a href="shopping-cart.html">Shopping Cart</a></li>
													<li><a href="shop-compare.html">Shop Compare</a></li>
													<li><a href="checkout.html">Checkout</a></li>
												</ul>
											</li>
											<li>
												<span class="mega-menu-title">Pages</span>
												<ul>
													<li><a href="<?php echo e(route('about.us')); ?>">About </a></li>
													<li><a href="faq.html">FAQ</a></li>
													<li><a href="coming-soon.html">Coming Soon</a></li>
													<li><a href="404.html">404 Error</a></li>
												</ul>
											</li>
											<li>
												<span class="mega-menu-title">Blog</span>
												<ul>
													<li><a href="blog.html">Blog List</a></li>
													<li><a href="blog-grid.html">Blog Grid</a></li>
													<li><a href="blog-fullwidth.html">Blog Fullwidth</a></li>
													<li><a href="blog-details.html">Blog Details</a></li>
												</ul>
											</li>
										</ul>
									</li> -->
									<li>
										<a href="#">
											<span class="text-label label-hot"></span>
											Category
											<b class="caret"></b>
										</a>
										<ul class="submenu">
											<?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li><a href="<?php echo e(route('prodList', $cat->slug)); ?>"><?php echo e($cat->name); ?></a></li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</li>
									<li><a href="#">Our Brands <b class="caret"></b></a>
										<ul class="submenu">
											<?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<li><a href="<?php echo e(route('by.brnd.prodList', $brand->id)); ?>"><?php echo e($brand->name); ?></a></li>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</ul>
									</li>
									<li><a href="<?php echo e(route('wishlist.index')); ?>">Wishlist</a></li>
									<li><a href="<?php echo e(route('cart.index')); ?>">Shopping Cart</a></li>
									<li><a href="<?php echo e(route('checkout.index')); ?>">Checkout</a></li>
									<li><a href="<?php echo e(route('faqs')); ?>">FAQ</a></li>
									<li><a href="<?php echo e(route('fr.careers')); ?>">Careers</a></li>
									<li><a href="<?php echo e(route('about.us')); ?>">About Us</a></li>
									<li><a href="<?php echo e(route('contact.us')); ?>">Contact</a></li>
								</ul>
							</nav>
						</div>

						<!--category-->
						<div class="collapse-menu mt-0 pull-right">
							<ul>
								<li><a href="javascript:void(0);" class="vm-menu"><i class="fa fa-navicon"></i><span>Menus</span></a>
									<ul class="vm-dropdown">
										<li><a href="#"><i class="fa fa-laptop"></i>Computer <b class="caret"></b></a>
											<ul class="mega-menu">
												<li class="megamenu-single">
													<span class="mega-menu-title">Shop Page</span>
													<ul>
														<li><a href="#">Products Block Top</a></li>
														<li><a href="#">Products Block Bottom</a></li>
														<li><a href="#">Shop Grid 5 Column</a></li>
														<li><a href="#">Shop List</a></li>
														<li><a href="#">Shop width Normal</a></li>
														<li><a href="#">Shop List Normal</a></li>
													</ul>
												</li>
												<li class="megamenu-single">
													<span class="mega-menu-title">Featured</span>
													<ul>
														<li><a href="#">Thumbnails Left</a></li>
														<li><a href="#">Thumbnails Right</a></li>
														<li><a href="#">Thumbnails Bottom</a></li>
														<li><a href="#">Thumbnails Full</a></li>
														<li><a href="#">Single 2 Colums</a></li>
														<li><a href="#">Tabs Content</a></li>
													</ul>
												</li>
												<li class="megamenu-single">
													<span class="mega-menu-title">Shop Page</span>
													<ul>
														<li><a href="#">Simple Product</a></li>
														<li><a href="#">Grouped Product</a></li>
														<li><a href="#">Variable Product</a></li>
														<li><a href="#">External Product</a></li>
														<li><a href="#">My account</a></li>
														<li><a href="#">Checkout</a></li>
													</ul>
												</li>
												<li class="megamenu-single">
													<span class="mega-menu-title">Features</span>
													<ul>
														<li><a href="#">Detail with Video</a></li>
														<li><a href="#">Variations Swatches</a></li>
														<li><a href="#">With Countdown Timer</a></li>
														<li><a href="#">Catalog Mode</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li><a href="#"><i class="fa fa-desktop"></i>TV & Smart box <b class="caret"></b></a>
											<ul class="mega-menu">
												<li class="megamenu-single">
													<span class="mega-menu-title">Shop Page</span>
													<ul>
														<li><a href="#">Products Block Top</a></li>
														<li><a href="#">Products Block Bottom</a></li>
														<li><a href="#">Shop Grid 5 Column</a></li>
														<li><a href="#">Shop List</a></li>
														<li><a href="#">Shop width Normal</a></li>
														<li><a href="#">Shop List Normal</a></li>
													</ul>
												</li>
												<li class="megamenu-single">
													<span class="mega-menu-title">Featured</span>
													<ul>
														<li><a href="#">Thumbnails Left</a></li>
														<li><a href="#">Thumbnails Right</a></li>
														<li><a href="#">Thumbnails Bottom</a></li>
														<li><a href="#">Thumbnails Full</a></li>
														<li><a href="#">Single 2 Colums</a></li>
														<li><a href="#">Detail with Accessories</a></li>
														<li><a href="#">Tabs Content</a></li>
														<li><a href="#">Accordion Tabs</a></li>
													</ul>
												</li>
											</ul>
										</li>
										<li><a href="#"><i class="fa fa-camera"></i>Camera & Photography</a></li>
										<li><a href="#"><i class="fa fa-headphones"></i>Headphones</a></li>
										<li><a href="#"><i class="fa fa-music"></i>Musical Instruments</a></li>
										<li><a href="#"><i class="fa fa-mobile"></i>Smart phone & Tablets</a></li>
										<li><a href="#"><i class="fa fa-flash"></i>Accessories</a></li>
										<li><a href="#"><i class="fa fa-microphone"></i>Home Audio & Theater</a></li>
										<li><a href="#"><i class="fa fa-print"></i>Printer</a></li>
										<li><a href="#"><i class="fa fa-fax"></i>Fax machine</a></li>
										<li><a href="#"><i class="fa fa-spoon"></i>Household goods</a></li>
										<li><a href="#"><i class="fa fa-clock-o"></i>Watch</a></li>
										<li><a href="#"><i class="fa fa-random"></i>Other</a></li>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!--header-area end-->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		document.querySelectorAll('.remove-cart-item').forEach(button => {
			button.addEventListener('click', function() {
				const itemId = this.getAttribute('data-id');

				if (confirm("Are you sure you want to remove this item from your cart?")) {
					fetch("<?php echo e(url('/cart/remove')); ?>", {
							method: 'POST',
							headers: {
								'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>',
								'Content-Type': 'application/json'
							},
							body: JSON.stringify({
								id: itemId
							}) // Include the item ID in the body
						})
						.then(response => response.json())
						.then(data => {
							if (data.success) {
								alert(data.message);
								location.reload(); // Reload the page to update the cart
							} else {
								alert('Failed to remove item.');
							}
						})
						.catch(error => console.error('Error:', error));
				}
			});
		});

		$(document).ready(function() {
			$('.category-item').on('mouseenter', function() {
				const categoryId = $(this).data('id');
				const categorySlug = $(this).data('slug');
				const subcategoryList = $(this).find('.subcategory-list');
				var routeProductList = "<?php echo e(route('prodList', ['slug' => ':slug'])); ?>";

				// Clear previous subcategories
				subcategoryList.empty();
				const baseUrl = "<?php echo e(url('/get-subcategories')); ?>";
				// Make AJAX call to fetch subcategories
				$.ajax({
					url: `${baseUrl}/${categoryId}`, // Dynamic URL
					type: 'GET',
					success: function(response) {
						// Populate subcategory list
						if (response.subCategories.length > 0) {
							response.subCategories.forEach(subCat => {
								const url = routeProductList.replace(':slug', subCat.slug);
								subcategoryList.append(`<li><a href="${url}">${subCat.name}</a></li>`);
							});
						} else {
							subcategoryList.append('<li><a href="#">No Subcategories</a></li>');
						}
						subcategoryList.show(); // Show subcategories
					},
					error: function(xhr) {
						console.error('Error fetching subcategories:', xhr);
					}
				});
			});

			$('.category-item').on('mouseleave', function() {
				const subcategoryList = $(this).find('.subcategory-list');
				subcategoryList.hide(); // Hide the subcategories on mouse leave
			});
		});
	</script>

	<?php echo $__env->make('frontend.flash', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplyco\resources\views/frontend/layouts/header.blade.php ENDPATH**/ ?>