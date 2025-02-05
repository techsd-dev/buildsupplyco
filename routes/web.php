<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CommonController;
use App\Http\Controllers\Admin\Products\BrandController;
use App\Http\Controllers\Admin\Products\CategoryController;
use App\Http\Controllers\Admin\Products\ProductController;
use App\Http\Controllers\Admin\Products\SubCategoryController;
use App\Http\Controllers\Admin\CareerController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\PhonePecontroller;
use App\Http\Controllers\RazorpayPaymentController;
use App\Http\Controllers\WishlistController;
use App\Models\Product;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
//Language Translation
// Route::get('index/{locale}', [App\Http\Controllers\HomeController::class, 'lang']);


//Update User Details
Route::post('/update-profile/{id}', [App\Http\Controllers\HomeController::class, 'updateProfile'])->name('updateProfile');
Route::post('/update-password/{id}', [App\Http\Controllers\HomeController::class, 'updatePassword'])->name('updatePassword');

// Route::get('{any}', [App\Http\Controllers\HomeController::class, 'index'])->name('index');
// Route::get('/', [App\Http\Controllers\HomeController::class, 'root'])->name('root');
Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::prefix('admin')->group(function () {
    // Dashboard route
    Route::get('/dashboard', [AdminController::class, 'index'])->name('home-page');

    // Banners routes
    Route::get('/banners', [BannerController::class, 'index'])->name('banners');
    Route::post('/banner/store', [BannerController::class, 'store'])->name('banner.store');
    Route::post('/banner/update/{id}', [BannerController::class, 'update'])->name('banner.update');
    Route::get('banner/delete/{id}', [BannerController::class, 'destroy'])->name('banner.delete');
    Route::get('banner/filter', [BannerController::class, 'bannerFilter'])->name('banner.search');
    
    // Careers routes
    Route::get('/careers', [CareerController::class, 'index'])->name('careers');
    Route::post('/career/store', [CareerController::class, 'store'])->name('career.store');
    Route::post('/career/update/{id}', [CareerController::class, 'update'])->name('career.update');
    Route::get('career/delete/{id}', [CareerController::class, 'destroy'])->name('career.delete');
    Route::get('career/filter', [CareerController::class, 'careerFilter'])->name('career.search');
    Route::get('job/seekers', [CareerController::class, 'jobSeekers'])->name('jobSeekers');
    
    // Faqs routes
    Route::get('/faqs', [FaqController::class, 'index'])->name('admin.faqs');
    Route::post('/faqs/store', [FaqController::class, 'store'])->name('faqs.store');
    Route::post('/faqs/update/{id}', [FaqController::class, 'update'])->name('faqs.update');
    Route::get('faqs/delete/{id}', [FaqController::class, 'destroy'])->name('faqs.delete');
    Route::get('faqs/filter', [FaqController::class, 'faqFilter'])->name('faqs.search');
    
    // Categories routes
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
    Route::post('/category/store', [CategoryController::class, 'storeOrUpdate'])->name('category.storeOrUpdate');
    Route::post('category/delete', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::get('category/filter', [CategoryController::class, 'categoryFilter'])->name('category.search');
    
    // Brand routes
    Route::get('/brands', [BrandController::class, 'index'])->name('brands');
    Route::post('/brands/store', [BrandController::class, 'storeOrUpdate'])->name('brands.storeOrUpdate');
    Route::post('brands/delete', [BrandController::class, 'destroy'])->name('brands.delete');
    Route::get('brands/filter', [BrandController::class, 'brandsFilter'])->name('brands.search');

    // Brands routes
    // Route::get('/brands', [BrandController::class, 'index'])->name('brands');
    // Route::post('/brands/store', [BrandController::class, 'store'])->name('brands.store');
    // Route::post('/brands/update/{id}', [BrandController::class, 'update'])->name('brands.update');
    // Route::post('brands/delete', [BrandController::class, 'destroy'])->name('brands.delete');
    // Route::get('brands/filter', [BrandController::class, 'brandsFilter'])->name('brands.search');

    // Sub Categories routes
    Route::get('/sub-categories', [SubCategoryController::class, 'index'])->name('sub.categories');
    Route::post('/subcategory/save', [SubCategoryController::class, 'storeOrUpdate'])->name('sub.category.save');
    Route::post('/subcategory/delete', [SubCategoryController::class, 'destroy'])->name('sub.category.delete');
    Route::get('/subcategory/search', [SubCategoryController::class, 'search'])->name('sub.category.search');

    // Product routes 
    Route::get('products', [ProductController::class, 'index'])->name('products');
    Route::get('products-create', [ProductController::class, 'create'])->name('product.create');
    Route::post('products-store', [ProductController::class, 'store'])->name('product.store');
    Route::get('products-edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::get('get-subcategories', [ProductController::class, 'getSubcategories'])->name('get.subcategories');
    Route::post('products-delete', [ProductController::class, 'destroy'])->name('products.delete');

    // Content Management
    Route::get('terms-and-conditions', [CommonController::class, 'terms'])->name('terms.n.condi');
    Route::post('terms-and-conditions-store', [CommonController::class, 'termsStore'])->name('terms.store');
    Route::get('privacy-policy', [CommonController::class, 'privacy'])->name('privacy.policy');
    Route::post('privacy-policy-store', [CommonController::class, 'privacyStore'])->name('privacy.policy.store');
    
    Route::get('settings', [CommonController::class, 'settings'])->name('settings');
    Route::post('settings-store', [CommonController::class, 'settingsStore'])->name('settings.store');

    Route::get('return-and-shipment-policy', [CommonController::class, 'returnNShipmentPlcy'])->name('return.n.ship.policy');
    Route::post('return-and-shipment-policy-store', [CommonController::class, 'returnNShipmentPlcyStore'])->name('return.n.shpmnt.policy.store');

    Route::get('vulnerability-disclosure-policy', [CommonController::class, 'vulnerabilityDisclosuePolicy'])->name('vulnerability.disclosue.policy');
    Route::post('vulnerability-disclosue-policy-store', [CommonController::class, 'vulnerabilityDisclosuePolicyStore'])->name('disclosue.store');
    
    Route::get('about-us', [CommonController::class, 'aboutUs'])->name('admn.about.us');
    Route::post('about-us-store', [CommonController::class, 'aboutUsStore'])->name('about.us.store');

    Route::get('contact-us', [CommonController::class, 'contactUs'])->name('admin.contact.us');
    Route::get('orders', [OrderController::class, 'orders'])->name('orders');
    Route::get('orders-details/{id}', [OrderController::class, 'viewOrderDetails'])->name('orders.details');
    Route::post('/orders-update-status/{orderId}', [OrderController::class, 'updateStatus'])->name('orders.updateStatus');
    Route::get('/trasanction-history', [OrderController::class, 'trHistory'])->name('tr.history');
    Route::get('/recieve-message-from-vendor', [OrderController::class, 'rcvMsgFrmVndr'])->name('rcvMsgFrmVndr');
});

// Frontend routes
Route::get('/user-register', [RegisterController::class, 'userRegisterForm'])->name('user.register.form');
Route::post('/user-register', [RegisterController::class, 'userRegister'])->name('user.register'); 
Route::get('/user-verify-otp', [RegisterController::class, 'verifyOtpPage'])->name('verifyOtpPage'); 
Route::post('/verify-otp', [RegisterController::class, 'verifyOtp'])->name('user.otp.verify'); 
Route::get('/forget-password', [ForgotPasswordController::class, 'forgetPasswordForm'])->name('forget.password'); 
Route::post('/forget-password-send-email', [ForgotPasswordController::class, 'forgetPasswordSendEmail'])->name('forget.password.send.email'); 
Route::get('/forget-password-reset-form', [ForgotPasswordController::class, 'forgetPasswordResetForm'])->name('password.reset.form'); 
Route::post('/forget-password-reset', [ForgotPasswordController::class, 'forgetPasswordReset'])->name('forget.password.reset'); 
Route::get('/user-login', [LoginController::class, 'userLogin'])->name('user.login');
// supports, Faqs,about us etc.
Route::get('about-us', [FrontendController::class, 'aboutUs'])->name('about.us');
Route::get('contact-us', [FrontendController::class, 'contactUs'])->name('contact.us');
Route::post('contact-us-query-store', [FrontendController::class, 'contactUsQueryStore'])->name('contact.us.query.store');
Route::get('faqs', [FrontendController::class, 'faqs'])->name('faqs');
Route::get('vulnerability-disclosure-policy', [FrontendController::class, 'vulnerabilityDisclosurePolicy'])->name('v.d.policy');
Route::get('return-and-shipment-policy', [FrontendController::class, 'returnAndShipmentPolicy'])->name('r.n.s.policy');
Route::get('privacy-policy', [FrontendController::class, 'privacyPolicy'])->name('prvcy.plcy');
Route::get('terms-and-conditions', [FrontendController::class, 'termsAndConditions'])->name('trms.n.condi');
// Products routes 
Route::get('products/{slug}', [FrontendController::class, 'productList'])->name('prodList');
Route::get('products-by-brand/{slug}', [FrontendController::class, 'productListFilterByBrand'])->name('by.brnd.prodList');
Route::get('/product-quick-view/{id}', [FrontendController::class, 'productQuickView']);
Route::get('/product-details/{slug}', [FrontendController::class, 'productDetails'])->name('product.details');

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
// Auth routes start 
Route::middleware('auth')->group(function () {
    Route::get('/user-dashboard', [UserController::class, 'index'])->name('users-dashboard');
    Route::post('/update-auth-users-profile', [UserController::class, 'updateProfile'])->name('update.auth.users.profile');
    Route::post('/user-address-save', [UserController::class, 'updateAddress'])->name('user.address.save');
    Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.update');
    Route::post('/cart/remove', [CartController::class, 'remove'])->name('cart.remove');
    // Route::get('/cart-checkout', [CartController::class, 'chackout'])->name('checkout');
    Route::post('/cart/apply-coupon', [CartController::class, 'applyCoupon'])->name('cart.applyCoupon');
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    // return success page after order 
    Route::get('/order-success', function () {
        return view('frontend.pages.products.order-success');
    })->name('order.success');
});
// Auth routes end 
Route::post('/save-location', [FrontendController::class, 'saveLocation'])->name('save.location');
// payment 
Route::post('phonepe', [PhonePeController::class, 'phonePe'])->name('order.n.phonepe');
Route::post('phonepe-response', [PhonePecontroller::class, 'response'])->name('response');
Route::get('careers', [FrontendController::class, 'careersList'])->name('fr.careers');
Route::get('careers-details/{slug}', [FrontendController::class, 'careersDetails'])->name('fr.details');
Route::post('/wishlist/add', [WishlistController::class, 'addToWishlist'])->name('wishlist.add');
Route::post('/wishlist/remove', [WishlistController::class, 'removeFromWishlist'])->name('wishlist.remove');
Route::get('/wishlists', [WishlistController::class, 'index'])->name('wishlist.index');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/get-subcategories/{id}', [FrontendController::class, 'getSubcategories'])->name('getSubcategories');
Route::post('/apply-job', [FrontendController::class, 'storeJobApplication'])->name('applyJob');
// razorpay rotues 
Route::post('razorpay-process', [RazorpayPaymentController::class, 'processPayment']);
Route::post('razorpay-process-response', [RazorpayPaymentController::class, 'processResponse']);




