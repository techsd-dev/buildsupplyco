<!--footer-area start-->
<?php
$settings = App\Models\Setting::find(1);
$cat = App\Models\Category::orderBy('id', 'DESC')->limit(7)->get();
?>
<footer class="footer-area mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="company-info">
                    <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(asset('public/frontend/assets/images/logo.png')); ?>" height="140px" width="220px" alt="logo" /></a>
                    <p>101 E 129th St, East Chicago, <br /> IN 46312, US</p>
                    <p>Phone: 001-1234-88888</p>
                    <p>Email: info.buildsupplyco@gmail.com</p>
                </div>
            </div>
            <div class="col-lg-2 col-sm-6">
                <div class="fooer-widget">
                    <h4>Categories</h4>
                    <div class="footer-menu">
                        <ul>
                            <?php $__currentLoopData = $cat; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><a href="<?php echo e(route('prodList', $row->slug)); ?>"><?php echo e($row->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 mt-sm-45">
                <div class="fooer-widget">
                    <h4>Information</h4>
                    <div class="footer-menu">
                        <ul>
                            <li><a href="<?php echo e(route('about.us')); ?>">About Us</a></li>
                            <li><a href="<?php echo e(route('contact.us')); ?>">Contact Us</a></li>
                            <li><a href="<?php echo e(route('v.d.policy')); ?>">Vulnerability Disclosure Policy</a></li>
                            <li><a href="<?php echo e(route('prvcy.plcy')); ?>">Privacy Policy</a></li>
                            <li><a href="<?php echo e(route('r.n.s.policy')); ?>">Return & Shipment Policy</a></li>
                            <li><a href="<?php echo e(route('trms.n.condi')); ?>">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 mt-sm-45">
                <div class="fooer-widget">
                    <h4>Customer Care</h4>
                    <div class="footer-menu">
                        <ul>
                            <?php if(Auth::check()): ?>
                            <li><a href="<?php echo e(url('user-dashboard')); ?>">My Account</a></li>
                            <?php else: ?>
                            <a href="<?php echo e(route('user.login')); ?>">Sign in</a>
                            <?php endif; ?>
                            <li><a href="#">Order History</a></li>
                            <li><a href="<?php echo e(route('wishlist.index')); ?>">Wish List</a></li>
                            <li><a href="#">Customer Service</a></li>
                            <li><a href="#">Returns / Exchange</a></li>
                            <li><a href="<?php echo e(route('faqs')); ?>">FAQs</a></li>
                            <li><a href="#">Product Support</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-sm-45">
                <div class="footer-widget">
                    <div class="subscribe-form">
                        <h3>Sign Up to <strong>Newsletter</strong></h3>
                        <p>Subscribe our newsletter gor get notification about information discount.</p>
                        <input type="text" placeholder="Your email address" />
                        <button>Subscribe</button>
                    </div>
                    <div class="social-icons style-2">
                        <strong>GET IN TOUCH !</strong>
                        <a href="<?php echo e($settings->fb); ?>" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="<?php echo e($settings->twitter); ?>" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="<?php echo e($settings->insta); ?>" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="<?php echo e($settings->ytb); ?>" target="_blank"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p class="col-md-12 text-center">Copyright 2024 &copy; <a href="#">buildsupplyco</a>. All rights reserved.</p>
    </div>
</footer>
<!--footer-area end-->
<?php echo $__env->make('frontend.layouts.js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\buildsupplypro\resources\views/frontend/layouts/footer.blade.php ENDPATH**/ ?>