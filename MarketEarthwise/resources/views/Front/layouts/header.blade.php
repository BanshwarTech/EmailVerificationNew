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
                            <a href="{{ route('wishlist') }}">Wishlist</a>
                            @if (session()->has('FRONT_USER_LOGIN') && session('FRONT_USER_LOGIN') === true)
                                <a href="{{ route('myAccount') }}">My Account</a>
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
                                <a href="{{ route('index') }}"><img
                                        src="{{ asset('assets/images/logo/logo_black.png') }}" alt=""></a>
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
                                        <a href="{{ route('shop') }}">Shop <i class="fa fa-angle-down"></i></a>
                                        <!-- Mega Menu -->
                                        <div class="mega-menu">
                                            {!! getTopNavCat() !!}
                                            <div class="menu-banner">
                                                <a href="#" class="menu-banner-link">
                                                    <img class="menu-banner-img"
                                                        src="{{ asset('assets/images/banner/menu-banner.jpg') }}"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="{{ route('blog') }}">Blog</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('aboutUs') }}">About Us</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('contactUs') }}">Contact Us</a>
                                    </li>
                                </ul>

                            </nav>
                        </div>
                        <!-- End Header Main Menu Start -->

                        <!-- Start Header Action Link -->
                        <ul class="header-action-link action-color--black action-hover-color--green">
                            <li>
                                @php
                                    $getAddToWishlistTotalItem = getAddToWishlistTotalItem();
                                    $totalWishlistItem = count($getAddToWishlistTotalItem);
                                    $totalPrice = 0;
                                @endphp
                                <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                    <i class="icon-heart"></i>
                                    <span class="item-count">{{ $totalWishlistItem }}</span>
                                </a>
                            </li>
                            <li>
                                @php
                                    $getAddToCartTotalItem = getAddToCartTotalItem();
                                    $totalCartItem = count($getAddToCartTotalItem);
                                    $totalPrice = 0;
                                @endphp
                                <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                    <i class="icon-bag"></i>
                                    <span class="item-count">{{ $totalCartItem }}</span>
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
                                    <img src="{{ asset('assets/images/logo/logo_black.png') }}" alt="">
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
                            @php
                                $getAddToWishlistTotalItem = getAddToWishlistTotalItem();
                                $totalWishlistItem = count($getAddToWishlistTotalItem);
                                $totalPrice = 0;
                            @endphp
                            <a href="#offcanvas-wishlish" class="offcanvas-toggle">
                                <i class="icon-heart"></i>
                                <span class="item-count">{{ $totalWishlistItem }}</span>
                            </a>
                        </li>
                        <li>
                            @php
                                $getAddToCartTotalItem = getAddToCartTotalItem();
                                $totalCartItem = count($getAddToCartTotalItem);
                                $totalPrice = 0;
                            @endphp
                            <a href="#offcanvas-add-cart" class="offcanvas-toggle">
                                <i class="icon-bag"></i>
                                <span class="item-count">{{ $totalCartItem }}</span>
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
                        <a href="{{ route('index') }}"><span>Home</span></a>
                    </li>

                    <li>

                        <a href="{{ route('shop') }}"><span>Shop</span></a>
                        <ul class="mobile-sub-menu">
                            {!! getTopNavigationMobileCategories() !!}
                        </ul>
                    </li>

                    <li>
                        <a href="{{ route('aboutUs') }}">About Us</a>
                    </li>
                    <li>
                        <a href="{{ route('contactUs') }}">Contact Us</a>
                    </li>
                </ul>
            </div> <!-- End Mobile Menu Nav -->
        </div> <!-- End Mobile Menu -->

        <!-- Start Mobile contact Info -->
        <div class="mobile-contact-info">
            <div class="logo">
                <a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo/logo_white.png') }}"
                        alt=""></a>
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
                <li> <a href="{{ route('wishlist') }}">Wishlist</a></li>
                @if (session()->has('FRONT_USER_LOGIN') && session('FRONT_USER_LOGIN') === true)
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
            <a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo/logo_white.png') }}"
                    alt=""></a>
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
            <li> <a href="{{ route('wishlist') }}">Wishlist</a></li>
            @if (session()->has('FRONT_USER_LOGIN') && session('FRONT_USER_LOGIN') === true)
                <li><a href="{{ route('myAccount') }}">My Account</a></li>

                <li><a href="{{ url('/logout') }}">Logout ( {{ session('FRONT_USER_EMAIL') }} )</a></li>
            @else
                <li><a href="{{ url('/login') }}">Login</a></li>
            @endif
        </ul>
    </div>
    <!-- End Mobile contact Info -->
</div> <!-- ...:::: End Offcanvas Mobile Menu Section:::... -->
<!-- Start Offcanvas Addcart Section -->
<div id="offcanvas-add-cart" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
    <!-- Start Offcanvas Header -->
    <div class="offcanvas-header text-right">
        <button class="offcanvas-close"><i class="ion-android-close"></i></button>
    </div> <!-- End Offcanvas Header -->

    <!-- Start  Offcanvas Addcart Wrapper -->
    <div class="offcanvas-add-cart-wrapper">

        @if ($totalCartItem > 0)
            <h4 class="offcanvas-title">Shopping Cart</h4>
            <ul class="offcanvas-cart">
                @foreach ($getAddToCartTotalItem as $cartItem)
                    @php
                        $totalPrice = $totalPrice + $cartItem->qty * $cartItem->price;
                    @endphp
                    <li class="offcanvas-cart-item-single">
                        <div class="offcanvas-cart-item-block">
                            <a href="#" class="offcanvas-cart-item-image-link">
                                <img src="{{ asset('storage/media/product_attr/' . $cartItem->attr_image) }}"
                                    alt="" class="offcanvas-cart-image">
                            </a>
                            <div class="offcanvas-cart-item-content">
                                <a href="#" class="offcanvas-cart-item-link">{{ $cartItem->name }}</a>
                                <div class="offcanvas-cart-item-details">
                                    <span class="offcanvas-cart-item-details-quantity">{{ $cartItem->qty }} x
                                    </span>
                                    <span
                                        class="offcanvas-cart-item-details-price">&#8377;{{ $cartItem->price }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="offcanvas-cart-item-delete text-right">
                            <a href="javascript:void(0)"
                                onclick="deleteCartProduct('{{ $cartItem->pid }}','{{ $cartItem->size }}','{{ $cartItem->color }}','{{ $cartItem->attr_id }}')"
                                class="offcanvas-cart-item-delete"><i class="fa fa-trash-o"></i></a>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="offcanvas-cart-total-price">
                <span class="offcanvas-cart-total-price-text">Subtotal:</span>
                <span class="offcanvas-cart-total-price-value">&#8377;{{ $totalPrice }}</span>
            </div>
            <ul class="offcanvas-cart-action-button">
                <li><a href="{{ route('cart') }}" class="btn btn-block btn-green">View Cart</a></li>
                <li><a href="{{ route('checkout') }}" class=" btn btn-block btn-green mt-5">Checkout</a></li>
            </ul>
        @else
            <ul class="offcanvas-cart d-flex flex-column align-items-center">
                <div class="image">
                    <img class="img-fluid" src="{{ asset('assets/images/emprt-cart/empty-cart.png') }}"
                        alt="">
                </div>
                <h4 class="title" style="color:#B19361;">Your Cart is Empty</h4>
                <h6 class="sub-title" style="color:#777;">Sorry Mate... No item Found inside your cart!</h6>
                <a href="{{ url('/') }}" class="btn btn-sm btn-golden">Continue Shopping</a>
            </ul>
        @endif
    </div> <!-- End  Offcanvas Addcart Wrapper -->

</div> <!-- End  Offcanvas Addcart Section -->
