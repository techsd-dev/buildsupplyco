<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index" class="logo logo-dark">
            <span class="logo-sm">
            <strong> BuildSupplyPro</strong>
                <!-- <img src="{{ URL::asset('public/build/images/logo-sm.png') }}" alt="" height="22"> -->
            </span>
            <span class="logo-lg">
                <strong> BuildSupplyPro</strong>
                <!-- <img src="{{ URL::asset('public/build/images/logo-dark.png') }}" alt="" height="17"> -->
            </span>
        </a>
        <!-- Light Logo-->
        <a href="index" class="logo logo-light">
            <span class="logo-sm">
                <img src="{{ URL::asset('public/build/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('public/build/images/logo-light.png') }}" alt="" height="17">
            </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">

            <div id="two-column-menu">
            </div>
            <ul class="navbar-nav" id="navbar-nav">
                <li class="menu-title"><span>@lang('translation.menu')</span></li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarDashboards" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarDashboards">
                        <i class="ri-dashboard-2-line"></i> <span>@lang('translation.dashboards')</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarDashboards">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('home-page') }}" class="nav-link">Home</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#banners" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="banners">
                        <i class="ri-dashboard-2-line"></i> <span>Banner Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="banners">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('banners') }}" class="nav-link">Banners</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end banners Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#careers" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="careers">
                        <i class="ri-dashboard-2-line"></i> <span>Careers & Faqs Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="careers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('careers') }}" class="nav-link">Careers</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="careers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('jobSeekers') }}" class="nav-link">Job Seekers List</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="careers">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.faqs') }}" class="nav-link">Faqs</a>
                            </li>
                        </ul>
                    </div>
                </li>
                 <!-- end orders Menu -->
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#orders" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="orders">
                        <i class="ri-dashboard-2-line"></i> <span>Order Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="orders">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('orders') }}" class="nav-link">Orders</a>
                            </li>
                        </ul>
                    </div>
                </li>
                 <!-- end orders Menu -->


                <li class="nav-item">
                    <a class="nav-link menu-link" href="#sidebarApps" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarApps">
                        <i class="ri-apps-2-line"></i> <span>Products Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="sidebarApps">
                        <ul class="nav nav-sm flex-column">

                            <li class="nav-item">
                                <a href="{{ route('categories') }}" class="nav-link">Category</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('sub.categories') }}" class="nav-link">Sub Category</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="apps-chat" class="nav-link">Child Category</a>
                            </li> -->
                            <li class="nav-item">
                                <a href="{{ route('brands') }}" class="nav-link">Brands</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('products') }}" class="nav-link">Products</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Sidebar -->
                </li>
                <li class="nav-item">
                    <a class="nav-link menu-link" href="#contentManagement" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="contentManagement">
                        <i class="ri-dashboard-2-line"></i> <span>Content Management</span>
                    </a>
                    <div class="collapse menu-dropdown" id="contentManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admn.about.us') }}" class="nav-link">About Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="contentManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('terms.n.condi') }}" class="nav-link">Terms & Conditions</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="contentManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('privacy.policy') }}" class="nav-link">Privacy Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="contentManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('admin.contact.us') }}" class="nav-link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="contentManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('return.n.ship.policy') }}" class="nav-link">Return & Shipment Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="contentManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('vulnerability.disclosue.policy') }}" class="nav-link">Vulnerability Disclosure Policy</a>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse menu-dropdown" id="contentManagement">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a href="{{ route('settings') }}" class="nav-link">Settings</a>
                            </li>
                        </ul>
                    </div>
                </li> <!-- end Dashboard Menu -->
        </div>
        <div class="sidebar-background"></div>
    </div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>