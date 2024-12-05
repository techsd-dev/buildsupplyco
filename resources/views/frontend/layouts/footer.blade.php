<!--footer-area start-->
@php
$settings = App\Models\Setting::find(1);
$cat = App\Models\Category::orderBy('id', 'DESC')->limit(5)->get();
@endphp
<footer class="footer-area mt-50">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="company-info">
                    <a href="{{ url('/') }}"><img src="{{ asset('public/frontend/assets/images/logo.png') }}" height="140px" width="220px" alt="logo" /></a>
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
                            @foreach($cat as $row)
                            <li><a href="{{ route('prodList', $row->slug) }}">{{ $row->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 mt-sm-45">
                <div class="fooer-widget">
                    <h4>Information</h4>
                    <div class="footer-menu">
                        <ul>
                            <li><a href="{{ route('about.us') }}">About Us</a></li>
                            <li><a href="{{ route('contact.us') }}">Contact Us</a></li>
                            <li><a href="{{ route('v.d.policy') }}">Vulnerability Disclosure Policy</a></li>
                            <li><a href="{{ route('prvcy.plcy') }}">Privacy Policy</a></li>
                            <li><a href="{{ route('r.n.s.policy') }}">Return & Shipment Policy</a></li>
                            <li><a href="{{ route('trms.n.condi') }}">Terms & Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-2 col-sm-3 mt-sm-45">
                <div class="fooer-widget">
                    <h4>Customer Care</h4>
                    <div class="footer-menu">
                        <ul>
                            @if(Auth::check())
                            <li><a href="{{ url('user-dashboard') }}">My Account</a></li>
                            @else
                            <a href="{{ route('user.login') }}">Sign in</a>
                            @endif
                            <li><a href="{{ route('wishlist.index') }}">Wish List</a></li>
                            <li><a href="{{ route('faqs') }}">FAQs</a></li>
                            <!-- <li><a href="#">Order History</a></li>
                            <li><a href="#">Customer Service</a></li>
                            <li><a href="#">Returns / Exchange</a></li>
                            <li><a href="#">Product Support</a></li> -->
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 mt-sm-45">
                <div class="footer-widget">
                    <div class="subscribe-form">
                        <h3>My <strong>Store</strong></h3>
                        <p>Shop No. 16, Block D & E, Ocean Infrahights Pvt Ltd, Golden-I, Plot No.11, Techzone-4, Greater Noida West, Greater Noida,Gautam Buddha Nagar

</p>
                        <!-- <input type="text" placeholder="Your email address" /> -->
                        <strong>Store Timings: 10AM to 8PM</strong>
                        <!-- <button>Store Timings: 10AM to 8PM</button> -->
                    </div>
                    <div class="social-icons style-2">
                        <strong>GET IN TOUCH !</strong>
                        <a href="{{ $settings->fb }}" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="{{ $settings->twitter }}" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="{{ $settings->insta }}" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="{{ $settings->ytb }}" target="_blank"><i class="fa fa-youtube"></i></a>
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
@include('frontend.layouts.js')