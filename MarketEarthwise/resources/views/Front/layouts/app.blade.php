<!DOCTYPE html>
<html lang="zxx">


<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>@yield('page_title')</title>

    <!-- ::::::::::::::Favicon icon::::::::::::::-->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/png">

    <!-- ::::::::::::::All CSS Files here :::::::::::::: -->
    <!-- Vendor CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/ionicons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/simple-line-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-ui.min.css') }}">

    <!-- Plugin CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/venobox.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/jquery.lineProgressbar.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/aos.min.css') }}">
    <!-- Include jQuery (if not already included) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>




    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <style>
        body {
            font-family: Georgia, 'Times New Roman', Times, serif;
        }

        /* Custom styles for Toastr */
        .toast-success {
            background-color: #28a745;
            /* Green */
        }

        .toast-error {
            background-color: #dc3545;
            /* Red */
        }

        .toast-warning {
            background-color: #ffc107;
            /* Yellow */
        }

        .toast-info {
            background-color: #17a2b8;
            /* Blue */
        }
    </style>


</head>

<body>
    @include('Front.layouts.header')


    <!-- Start Offcanvas Mobile Menu Section -->
    <div id="offcanvas-wishlish" class="offcanvas offcanvas-rightside offcanvas-add-cart-section">
        <!-- Start Offcanvas Header -->
        <div class="offcanvas-header text-right">
            <button class="offcanvas-close"><i class="ion-android-close"></i></button>
        </div> <!-- ENd Offcanvas Header -->

        <!-- Start Offcanvas Mobile Menu Wrapper -->
        <div class="offcanvas-wishlist-wrapper">
            @php
                $getAddToWishlistTotalItem = getAddToWishlistTotalItem();
                $totalWishlistItem = count($getAddToWishlistTotalItem);
                $totalPrice = 0;
            @endphp
            @if ($totalWishlistItem > 0)
                <h4 class="offcanvas-title">Wishlist</h4>
                <ul class="offcanvas-wishlist">
                    @foreach ($getAddToWishlistTotalItem as $wishlistItem)
                        <li class="offcanvas-wishlist-item-single">
                            <div class="offcanvas-wishlist-item-block">
                                <a href="#" class="offcanvas-wishlist-item-image-link">
                                    <img src="{{ asset('storage/media/product_attr/' . $wishlistItem->attr_image) }}"
                                        alt="" class="offcanvas-cart-image">
                                </a>
                                <div class="offcanvas-wishlist-item-content">
                                    <a href="#"
                                        class="offcanvas-wishlist-item-link">{{ $wishlistItem->name }}</a>
                                    <div class="offcanvas-wishlist-item-details">
                                        <span
                                            class="offcanvas-wishlist-item-details-price">&#8377;{{ $wishlistItem->price }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="offcanvas-wishlist-item-delete text-right">
                                <a href="{{ url('/remove/' . $wishlistItem->id) }}"
                                    class="offcanvas-wishlist-item-delete"><i class="fa fa-trash-o"></i></a>
                            </div>
                        </li>
                    @endforeach
                </ul>
                <ul class="offcanvas-wishlist-action-button">
                    <li><a href="{{ route('wishlist') }}" class="btn btn-block btn-green">View wishlist</a></li>
                </ul>
            @endif
        </div> <!-- End Offcanvas Mobile Menu Wrapper -->

    </div> <!-- End Offcanvas Mobile Menu Section -->

    <!-- Start Offcanvas Search Bar Section -->
    <div id="search" class="search-modal">
        <button type="button" class="close">×</button>
        <form>
            <input type="search" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-lg btn-green">Search</button>
        </form>
    </div>
    <!-- End Offcanvas Search Bar Section -->

    <!-- Offcanvas Overlay -->
    <div class="offcanvas-overlay"></div>



    @section('content')
    @show

    <!-- Start Footer Section -->
    <footer class="footer-section footer-bg section-top-gap-100">
        <div class="footer-wrapper">
            <!-- Start Footer Top -->
            <div class="footer-top" style="margin-top:-100px; ">
                <div class="container">
                    <div class="row mb-n6">
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--green" data-aos="fade-up"
                                data-aos-delay="0">
                                <h5 class="title">INFORMATION</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">Delivery Information</a></li>
                                    <li><a href="#">Terms & Conditions</a></li>
                                    <li><a href="contact-us.html">Contact</a></li>
                                    <li><a href="#">Returns</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--green" data-aos="fade-up"
                                data-aos-delay="200">
                                <h5 class="title">MY ACCOUNT</h5>
                                <ul class="footer-nav">
                                    <li><a href="my-account.html">My account</a></li>
                                    <li><a href="wishlist.html">Wishlist</a></li>
                                    <li><a href="privacy-policy.html">Privacy Policy</a></li>
                                    <li><a href="faq.html">Frequently Questions</a></li>
                                    <li><a href="#">Order History</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--green" data-aos="fade-up"
                                data-aos-delay="400">
                                <h5 class="title">CATEGORIES</h5>
                                <ul class="footer-nav">
                                    <li><a href="#">Decorative</a></li>
                                    <li><a href="#">Kitchen utensils</a></li>
                                    <li><a href="#">Chair & Bar stools</a></li>
                                    <li><a href="#">Sofas and Armchairs</a></li>
                                    <li><a href="#">Interior lighting</a></li>
                                </ul>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-6">
                            <!-- Start Footer Single Item -->
                            <div class="footer-widget-single-item footer-widget-color--green" data-aos="fade-up"
                                data-aos-delay="600">
                                <h5 class="title">ABOUT US</h5>
                                <div class="footer-about">
                                    <p>We are a team of designers and developers that create high quality Magento,
                                        Prestashop, Opencart.</p>

                                    <address>
                                        <span>Address: Your address goes here.</span>
                                        <span>Email: demo@example.com</span>
                                    </address>
                                </div>
                            </div>
                            <!-- End Footer Single Item -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Footer Top -->


            <hr>
            <!-- Start Footer Bottom -->
            <div class="footer-bottom">
                <div class="container">
                    <div class="row justify-content-between align-items-center align-items-center flex-column flex-md-row mb-n6"
                        style="margin-top:-30px;">
                        <div class="col-auto">
                            <div class="footer-copyright">
                                <p class="copyright-text">&copy; 2021 <a href="index.html">therankme</a>. Made with
                                    <i class="fa fa-heart text-danger"></i> by <a href="https://therankme.com/"
                                        target="_blank">therankme</a>
                                </p>

                            </div>
                        </div>
                        <div class="col-auto ">
                            <div class="footer-payment">
                                <div class="image">
                                    <img src="{{ asset('assets/images/company-logo/payment.png') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Start Footer Bottom -->
        </div>
    </footer>
    <!-- End Footer Section -->

    <!-- material-scrolltop button -->
    <button class="material-scrolltop" type="button"></button>

    <!-- Start Modal Add cart -->
    <div class="modal fade" id="modalAddcart" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col text-right">
                                <button type="button" class="close modal-close" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    <span aria-hidden="true"> <i class="fa fa-times"></i></span>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="modal-add-cart-product-img">
                                            <img class="img-fluid"
                                                src="{{ asset('assets/images/product/default/home-1/default-1.jpg') }}"
                                                alt="">

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="modal-add-cart-info"><i class="fa fa-check-square"></i>Added to
                                            cart
                                            successfully!</div>
                                        <div class="modal-add-cart-product-cart-buttons">
                                            <a href="{{ route('cart') }}">View Cart</a>
                                            <a href="{{ route('checkout') }}">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5 modal-border">
                                <ul class="modal-add-cart-product-shipping-info">
                                    <li> <strong><i class="icon-shopping-cart"></i> There Are 5 Items In Your
                                            Cart.</strong></li>
                                    <li> <strong>TOTAL PRICE: </strong> <span>$187.00</span></li>
                                    <li class="modal-continue-button"><a href="#"
                                            data-bs-dismiss="modal">CONTINUE
                                            SHOPPING</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Modal Add cart -->



    <!-- ::::::::::::::All JS Files here :::::::::::::: -->
    <!-- Global Vendor, plugins JS -->
    <script src="{{ asset('assets/js/vendor/modernizr-3.11.2.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-3.5.1.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>

    <!--Plugins JS-->
    <script src="{{ asset('assets/js/plugins/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/material-scrolltop.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.zoom.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/venobox.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.lineProgressbar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/aos.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.instagramFeed.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/ajax-mail.js') }}"></script>


    {{-- <script src="{{ asset('assets/js/vendor/vendor.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/plugins.min.js') }}"></script> --}}

    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>


</html>
