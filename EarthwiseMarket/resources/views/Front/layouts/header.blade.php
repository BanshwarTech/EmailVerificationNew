<header class="header-section d-none d-xl-block">
    <div class="header-wrapper">
        <!-- Start Header Top -->
        <div class="header-top header-top-bg--black section-fluid">
            <div class="container">
                <div class="col-12 d-flex align-items-center justify-content-between">
                    <div class="header-top-left">
                        <div
                            class="header-top-contact header-top-contact-color--white header-top-contact-hover-color--green">
                            <a href="tel:0123456789" class="icon-space-right"><i class="icon-call-in"></i>0123456789</a>
                            <a href="mailto:demo@example.com" class="icon-space-right"><i
                                    class="icon-envelope"></i>demo@example.com</a>
                        </div>
                    </div>
                    <div class="header-top-right">
                        <div
                            class="header-top-user-link header-top-user-link-color--white header-top-user-link-hover-color--green">
                            <a href="{{ url('/admin') }}">Admin</a>
                            <a href="{{ route('cart') }}">Cart</a>
                            @if (session()->has('FRONT_USER_LOGIN') && session('FRONT_USER_LOGIN') === true)
                                <a href="">Wishlist</a>
                                <a href="">My Order</a>
                                <a href="{{ url('/logout') }}">Logout ( {{ session('FRONT_USER_EMAIL') }} )</a>
                            @else
                                <a href="{{ url('/login') }}">Login</a>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Top -->
        <!-- Start Header Bottom -->
        <div class="header-bottom header-bottom-color--green section-fluid sticky-header sticky-color--white">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex align-items-center justify-content-between">
                        <!-- Start Header Logo -->
                        <div class="header-logo">
                            <div class="logo">
                                <a href="{{ route('index') }}"><img src="assets/images/logo/logo_black.png"
                                        alt=""></a>
                            </div>
                        </div>
                        <!-- End Header Logo -->

                        <!-- Start Header Main Menu -->
                        <div class="main-menu menu-color--black menu-hover-color--green">
                            <nav>
                                <ul>
                                    <li class="has-dropdown">
                                        <a class="active main-menu-link" href="{{ route('index') }}">Home </a>
                                    </li>
                                    <li class="has-dropdown has-megaitem">
                                        <a href="product-details-default.html">Categories <i
                                                class="fa fa-angle-down"></i></a>
                                        <!-- Mega Menu -->
                                        <div class="mega-menu">
                                            <ul class="mega-menu-inner">
                                                <!-- Mega Menu Sub Link -->
                                                <li class="mega-menu-item">
                                                    <a href="#" class="mega-menu-item-title">Shop Layouts</a>
                                                    <ul class="mega-menu-sub">
                                                        <li><a href="shop-grid-sidebar-left.html">Grid Left
                                                                Sidebar</a></li>
                                                        <li><a href="shop-grid-sidebar-right.html">Grid Right
                                                                Sidebar</a></li>
                                                        <li><a href="shop-full-width.html">Full Width</a></li>
                                                        <li><a href="shop-list-sidebar-left.html">List Left
                                                                Sidebar</a></li>
                                                        <li><a href="shop-list-sidebar-right.html">List Right
                                                                Sidebar</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                            <div class="menu-banner">
                                                <a href="#" class="menu-banner-link">
                                                    <img class="menu-banner-img"
                                                        src="assets/images/banner/menu-banner.jpg" alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </li>


                                </ul>
                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->

                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--black action-hover-color--green">
                            <li>
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="item-count">3</span>
                                </a>
                            </li>
                            <li>
                                <a href="#search">
                                    <i class="icon-magnifier"></i>
                                </a>
                            </li>
                        </ul>
                        <!-- End Header Action Link -->
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Bottom -->
    </div>
</header>

<!-- Start Mobile Header -->
<div class="mobile-header mobile-header-bg-color--white section-fluid d-lg-block d-xl-none">
    <div class="container">
        <div class="row">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!-- Start Mobile Left Side -->
                <div class="mobile-header-left">
                    <ul class="mobile-menu-logo">
                        <li>
                            <a href="{{ route('index') }}">
                                <div class="logo">
                                    <img src="assets/images/logo/logo_black.png" alt="">
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Left Side -->

                <!-- Start Mobile Right Side -->
                <div class="mobile-right-side">
                    <ul class="header-action-link action-color--black action-hover-color--green">
                        <li>
                            <a href="#search">
                                <i class="icon-magnifier"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                <i class="icon-heart"></i>
                                <span class="item-count">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                <i class="icon-bag"></i>
                                <span class="item-count">3</span>
                            </a>
                        </li>
                        <li>
                            <a href="#mobile-menu-offcanvas" class="offcanvas-toggle offside-menu">
                                <i class="icon-menu"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <!-- End Mobile Right Side -->
            </div>
        </div>
    </div>
</div>
<!-- End Mobile Header -->

<!--  Start Offcanvas Mobile Menu Section -->
<div id="mobile-menu-offcanvas" class="offcanvas offcanvas-rightside offcanvas-mobile-menu-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <div class="offcanvas-mobile-menu-wrapper">
        <!-- Start Mobile Menu  -->
        <div class="mobile-menu-bottom">
            <!-- Start Mobile Menu Nav -->
            <div class="offcanvas-menu">
                <ul>
                    <li>
                        <a href="#"><span>Home</span></a>
                    </li>
                    <li>
                        <a href="#"><span>Shop</span></a>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Shop Layout</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="shop-grid-sidebar-left.html">Grid Left Sidebar</a></li>
                                    <li><a href="shop-grid-sidebar-right.html">Grid Right Sidebar</a></li>
                                    <li><a href="shop-full-width.html">Full Width</a></li>
                                    <li><a href="shop-list-sidebar-left.html">List Left Sidebar</a></li>
                                    <li><a href="shop-list-sidebar-right.html">List Right Sidebar</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Shop Pages</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="{{ route('cart') }}">Cart</a></li>
                                    <li><a href="empty-cart.html">Empty Cart</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="compare.html">Compare</a></li>
                                    <li><a href="checkout.html">Checkout</a></li>
                                    <li><a href="login.html">Login</a></li>
                                    <li><a href="my-account.html">My Account</a></li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="mobile-sub-menu">
                            <li>
                                <a href="#">Product Single</a>
                                <ul class="mobile-sub-menu">
                                    <li><a href="product-details-default.html">Product Default</a></li>
                                    <li><a href="product-details-variable.html">Product Variable</a></li>
                                    <li><a href="product-details-affiliate.html">Product Referral</a></li>
                                    <li><a href="product-details-group.html">Product Group</a></li>
                                    <li><a href="product-details-single-slide.html">Product Slider</a></li>
                                    <li><a href="product-details-tab-left.html">Product Tab Left</a></li>
                                    <li><a href="product-details-tab-right.html">Product Tab Right</a></li>
                                    <li><a href="product-details-gallery-left.html">Product Gallery Left</a></li>
                                    <li><a href="product-details-gallery-right.html">Product Gallery Right</a></li>
                                    <li><a href="product-details-sticky-left.html">Product Sticky Left</a></li>
                                    <li><a href="product-details-sticky-right.html">Product Sticky right</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>



                </ul>
            </div> <!-- End Mobile Menu Nav -->
        </div> <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="{{ route('index') }}"><img src="assets/images/logo/logo_white.png" alt=""></a>
            </div>

            <address class="address">
                <span>Address: Your address goes here.</span>
                <span>Call Us: 0123456789, 0123456789</span>
                <span>Email: demo@example.com</span>
            </address>

            <ul class="social-link">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>

            <ul class="user-link">
                <li><a href="{{ url('/admin') }}">Admin Login</a></li>
                <li><a href="{{ route('cart') }}">Cart</a></li>

                @if (session()->has('FRONT_USER_LOGIN') && session('FRONT_USER_LOGIN') === true)
                    <li> <a href="">Wishlist</a></li>
                    <li><a href="">My Order</a></li>
                    <li><a href="{{ url('/logout') }}">Logout ( {{ session('FRONT_USER_EMAIL') }} )</a></li>
                @else
                    <li><a href="{{ url('/login') }}">Login</a></li>
                @endif
            </ul>
        </div>
        <!-- End Mobile contact Info -->

    </div> <!-- End Offcanvas Mobile Menu Wrapper -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->

<!-- Start Offcanvas Mobile Menu Section -->
<div id="offcanvas-about" class="offcanvas offcanvas-rightside offcanvas-mobile-about-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->
    <!-- Start Offcanvas Mobile Menu Wrapper -->
    <!-- Start Mobile contact Info -->
    <div class="mobile-contact-info">
        <div class="logo">
            <a href="{{ route('index') }}"><img src="assets/images/logo/logo_white.png" alt=""></a>
        </div>

        <address class="address">
            <span>Address: Your address goes here.</span>
            <span>Call Us: 0123456789, 0123456789</span>
            <span>Email: demo@example.com</span>
        </address>

        <ul class="social-link">
            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
            <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
        </ul>

        <ul class="user-link">
            <li><a href="{{ url('/admin') }}">Admin Login</a></li>
            <li><a href="{{ route('cart') }}">Cart</a></li>
            @if (session()->has('FRONT_USER_LOGIN') && session('FRONT_USER_LOGIN') === true)
                <li> <a href="">Wishlist</a></li>
                <li><a href="">My Order</a></li>
                <li><a href="{{ url('/logout') }}">Logout ( {{ session('FRONT_USER_EMAIL') }} )</a></li>
            @else
                <li><a href="{{ url('/login') }}">Login</a></li>
            @endif
        </ul>
    </div>
    <!-- End Mobile contact Info -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
