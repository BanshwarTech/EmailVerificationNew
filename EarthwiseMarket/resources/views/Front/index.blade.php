@extends('Front.layouts.app')
@section('page_title', 'Index')
@section('content')
    <!-- Start Hero Slider Section-->
    <div class="hero-slider-section">
        <!-- Slider main container -->
        <div class="hero-slider-active swiper-container">
            <!-- Additional required wrapper -->
            <div class="swiper-wrapper">
                @foreach ($home_banner as $banner)
                    <!-- Start Hero Single Slider Item -->
                    <div class="hero-single-slider-item swiper-slide">
                        <!-- Hero Slider Image -->
                        <div class="hero-slider-bg">
                            <img src="{{ asset('storage/media/banner/' . $banner->image) }}" alt="">
                        </div>
                        <!-- Hero Slider Content -->
                        <div class="hero-slider-wrapper">
                            <div class="container">
                                <div class="row">
                                    <div class="col-auto">
                                        <div class="hero-slider-content">
                                            <h4 class="subtitle">{!! $banner->subtitle !!}</h4>
                                            <h1 class="title">{!! $banner->title !!} </h1>
                                            <a href="{{ $banner->btn_link }}"
                                                class="btn btn-lg btn-outline-green">{{ $banner->btn_txt }} </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Hero Single Slider Item -->
                @endforeach

            </div>

            <!-- If we need pagination -->
            <div class="swiper-pagination active-color-green"></div>

            <!-- If we need navigation buttons -->
            <div class="swiper-button-prev d-none d-lg-block"></div>
            <div class="swiper-button-next d-none d-lg-block"></div>
        </div>
    </div>
    <!-- End Hero Slider Section-->


    <!-- Start Service Section -->
    <div class="service-promo-section section-top-gap-100">
        <div class="service-wrapper">
            <div class="container">
                <div class="row">
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="0">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-5.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">FREE SHIPPING</h6>
                                <p>Get 10% cash back, free shipping, free returns, and more at 1000+ top retailers!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="200">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-6.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">30 DAYS MONEY BACK</h6>
                                <p>100% satisfaction guaranteed, or get your money back within 30 days!</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="400">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-7.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">SAFE PAYMENT</h6>
                                <p>Pay with the world’s most popular and secure payment methods.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                    <!-- Start Service Promo Single Item -->
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="service-promo-single-item" data-aos="fade-up" data-aos-delay="600">
                            <div class="image">
                                <img src="assets/images/icons/service-promo-8.png" alt="">
                            </div>
                            <div class="content">
                                <h6 class="title">LOYALTY CUSTOMER</h6>
                                <p>Card for the other 30% of their purchases at a rate of 1% cash back.</p>
                            </div>
                        </div>
                    </div>
                    <!-- End Service Promo Single Item -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Service Section -->

    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">the New arrivals</h3>
                                <p>Preorder now to receive exclusive deals & gifts</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @foreach ($product as $p)
                                        <!-- Start Product Default Single Item -->
                                        <div class="product-default-single-item product-color--green swiper-slide">
                                            <div class="image-box">
                                                <a href="{{ url('/product-details/' . $p->slug) }}" class="image-link">
                                                    <img src="{{ asset('storage/media/product/' . $p->image) }}"
                                                        alt="">
                                                </a>
                                                <div class="action-link">
                                                    <div class="action-link-left">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalAddcart">Add to Cart</a>
                                                    </div>
                                                    <div class="action-link-right">
                                                        <a href="#" data-bs-toggle="modal"
                                                            data-bs-target="#modalQuickview"><i
                                                                class="icon-magnifier"></i></a>
                                                        <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                        <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="content">
                                                <div class="content-left">
                                                    <h6 class="title"><a
                                                            href="{{ url('/product-details/' . $p->slug) }}">{{ $p->name }}</a>
                                                    </h6>
                                                    <ul class="review-star">
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="fill"><i class="ion-android-star"></i></li>
                                                        <li class="empty"><i class="ion-android-star"></i></li>
                                                    </ul>
                                                </div>
                                                <div class="content-right">
                                                    <span class="price">&#8377;{{ $p->price }}</span>
                                                    &nbsp;&nbsp;<del><span
                                                            class="discount-price">&#8377;{{ $p->mrp }}</span></del>
                                                </div>
                                                <style>
                                                    .content-right {
                                                        display: flex;
                                                        justify-content: space-between;
                                                        /* or adjust based on your needs */
                                                    }
                                                </style>
                                            </div>
                                        </div>
                                        <!-- End Product Default Single Item -->
                                    @endforeach
                                </div>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Slider Section -->




    <!-- Start Banner Section -->
    <div class="banner-section section-top-gap-100">
        <div class="banner-wrapper clearfix">
            @foreach ($category as $cat)
                <!-- Start Banner Single Item -->
                <div class="banner-single-item banner-style-4 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="{{ asset('storage/media/category/' . $cat->category_image) }}"
                            alt="">
                    </div>
                    <a href="product-details-default.html" class="content">
                        <div class="inner">
                            <h4 class="title">{{ $cat->category_name }}</h4>
                            <h6 class="sub-title">20 products</h6>
                        </div>
                        <span class="round-btn"><i class="ion-ios-arrow-thin-right"></i></span>
                    </a>
                </div>
                <!-- End Banner Single Item -->
            @endforeach

        </div>
    </div>
    <!-- End Banner Section -->

    <!-- Start Product Default Tab Slider Section -->
    <div class="product-default-tab-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <ul class="tablist-default tablist nav">
                                <li><a class="nav-link active" data-bs-toggle="tab" href="#feature">FEATURED</a></li>
                                <li><a class="nav-link" data-bs-toggle="tab" href="#tranding">TRENDING</a></li>
                                <li><a class="nav-link" data-bs-toggle="tab" href="#discounted">DISCOUNTED</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content">
                            <!-- Start Tab Item Single Item -->
                            <div class="tab-pane active show" id="feature">
                                <div class="product-slider-default-1row default-slider-nav-arrow">

                                    <!-- Slider main container -->
                                    <div class="swiper-container product-default-slider-4grid-1row">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            <!-- End Product Default Single Item -->



                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <!-- End Tab Item Single Item -->
                            <!-- Start Tab Item Single Item -->
                            <div class="tab-pane" id="tranding">
                                <div class="product-slider-default-1row default-slider-nav-arrow">
                                    <!-- Slider main container -->
                                    <div class="swiper-container product-default-slider-4grid-1row">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">

                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <!-- End Tab Item Single Item -->
                            <!-- Start Tab Item Single Item -->
                            <div class="tab-pane" id="discounted">
                                <div class="product-slider-default-1row default-slider-nav-arrow">
                                    <!-- Slider main container -->
                                    <div class="swiper-container product-default-slider-4grid-1row">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">


                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <!-- End Tab Item Single Item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Default Tab Slider Section -->

    <!-- Start Company Logo Section -->
    <div class="company-logo-section section-top-gap-100 section-fluid">
        <div class="company-logo-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="company-logo-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div
                                class="swiper-container company-logo-slider swiper-container-initialized swiper-container-horizontal">
                                @foreach ($home_brand as $brand)
                                    <!-- Additional required wrapper -->
                                    <div class="swiper-wrapper" id="swiper-wrapper-4b749a288f915683" aria-live="polite"
                                        style="transform: translate3d(0px, 0px, 0px);">
                                        <!-- Start Company Logo Single Item -->
                                        <div class="company-logo-single-item swiper-slide swiper-slide-active"
                                            role="group" aria-label="1 / 8" style="width: 310px;">
                                            <div class="image"><img class="img-fluid"
                                                    src="{{ asset('storage/media/brand/' . $brand->image) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <!-- End Company Logo Single Item -->
                                    </div>
                                @endforeach

                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev d-none d-md-block swiper-button-disabled" tabindex="-1"
                                role="button" aria-label="Previous slide"
                                aria-controls="swiper-wrapper-4b749a288f915683" aria-disabled="true"></div>
                            <div class="swiper-button-next d-none d-md-block" tabindex="0" role="button"
                                aria-label="Next slide" aria-controls="swiper-wrapper-4b749a288f915683"
                                aria-disabled="false"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Company Logo Section -->
@endsection
