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
                                                class="btn btn-md btn-outline-green">{{ $banner->btn_txt }} </a>
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
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200" style="margin-top: unset;">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    @if (isset($product[0]))
                                        @foreach ($product as $productAttr)
                                            <!-- Start Product Default Single Item -->
                                            <div class="product-default-single-item product-color--golden swiper-slide">
                                                <div class="image-box">
                                                    <a href="{{ url('product-details/' . $productAttr->slug) }}"
                                                        class="image-link">
                                                        <img src="{{ asset('storage/media/product/' . $productAttr->image) }}"
                                                            alt="{{ $productAttr->name }}">

                                                    </a>
                                                    <div class="tag">
                                                        <span>sale</span>
                                                    </div>
                                                    <div class="action-link">
                                                        <div class="action-link-left">
                                                            <a href="javascript:void(0)"
                                                                onclick="home_add_to_cart('{{ $productAttr->id }}','{{ $product_attr[$productAttr->id][0]->size }}','{{ $product_attr[$productAttr->id][0]->color }}')">Add
                                                                to
                                                                Cart</a>
                                                        </div>
                                                        <div class="action-link-right">

                                                            <a
                                                                href="{{ url('/add_to_wishlist/' . $product[0]->id . '/' . $product_attr[$productAttr->id][0]->size . '/' . $product_attr[$productAttr->id][0]->color) }}"><i
                                                                    class="icon-heart"></i></a>
                                                            <a href="compare.html"><i class="icon-shuffle"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-left">
                                                        <h6 class="title">
                                                            <a
                                                                href="{{ url('product-details/' . $productAttr->slug) }}">{{ $productAttr->name }}</a>
                                                        </h6>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="content-right d-flex">
                                                        <span
                                                            class="price-min">&#8377;{{ $product_attr[$productAttr->id][0]->price }}</span>
                                                        &nbsp;<span
                                                            class="price-max"><del>&#8377;{{ $product_attr[$productAttr->id][0]->mrp }}</del></span>
                                                    </div>


                                                </div>
                                            </div>
                                            <!-- End Product Default Single Item -->
                                        @endforeach
                                    @else
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            No Data Found
                                        </div>
                                    @endif


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
            @foreach ($banners as $banner)
                <!-- Start Banner Single Item -->
                <div class="banner-single-item banner-style-4 banner-animation banner-color--green float-left"
                    data-aos="fade-up" data-aos-delay="0">
                    <div class="image">
                        <img class="img-fluid" src="{{ asset('storage/media/banner/' . $banner->image) }}" alt="">
                    </div>
                    <a href="product-details-default.html" class="content">
                        <div class="inner">
                            <h4 class="title">{{ $banner->banner_title }}</h4>
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
                                <li><a class="nav-link" data-bs-toggle="tab" href="#trending">TRENDING</a></li>
                                <li><a class="nav-link" data-bs-toggle="tab" href="#discounted">DISCOUNTED</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="200" style="margin-top: unset;">
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
                                            @if (isset($home_featured_product[0]))
                                                @foreach ($home_featured_product as $productAttr)
                                                    <!-- Start Product Default Single Item -->
                                                    <div
                                                        class="product-default-single-item product-color--golden swiper-slide">
                                                        <div class="image-box">
                                                            <a href="{{ url('product-details/' . $productAttr->slug) }}"
                                                                class="image-link">
                                                                <img src="{{ asset('storage/media/product/' . $productAttr->image) }}"
                                                                    alt="{{ $productAttr->name }}">

                                                            </a>
                                                            <div class="tag">
                                                                <span>sale</span>
                                                            </div>
                                                            <div class="action-link">
                                                                <div class="action-link-left">
                                                                    <a href="javascript:void(0)"
                                                                        onclick="home_add_to_cart('{{ $productAttr->id }}','{{ $product_attr[$productAttr->id][0]->size }}','{{ $product_attr[$productAttr->id][0]->color }}')">Add
                                                                        to
                                                                        Cart</a>
                                                                </div>
                                                                <div class="action-link-right">

                                                                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                                    <a href="compare.html"><i
                                                                            class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <div class="content-left">
                                                                <h6 class="title"><a
                                                                        href="{{ url('product-details/' . $productAttr->slug) }}">{{ $productAttr->name }}</a>
                                                                </h6>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="empty"><i class="ion-android-star"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="content-right d-flex">
                                                                <span
                                                                    class="price-min">&#8377;{{ $home_featured_product_attr[$productAttr->id][0]->price }}</span>
                                                                &nbsp;<span
                                                                    class="price-max"><del>&#8377;{{ $home_featured_product_attr[$productAttr->id][0]->mrp }}</del></span>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <!-- End Product Default Single Item -->
                                                @endforeach
                                            @else
                                                <div
                                                    class="product-default-single-item product-color--golden swiper-slide">
                                                    No Data Found
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    <!-- If we need navigation buttons -->
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <!-- End Tab Item Single Item -->
                            <!-- Start Tab Item Single Item -->
                            <div class="tab-pane" id="trending">
                                <div class="product-slider-default-1row default-slider-nav-arrow">
                                    <!-- Slider main container -->
                                    <div class="swiper-container product-default-slider-4grid-1row">
                                        <!-- Additional required wrapper -->
                                        <div class="swiper-wrapper">
                                            @if (isset($home_trending_product[0]))
                                                @foreach ($home_trending_product as $productAttr)
                                                    <!-- Start Product Default Single Item -->
                                                    <div
                                                        class="product-default-single-item product-color--golden swiper-slide">
                                                        <div class="image-box">
                                                            <a href="{{ url('product-details/' . $productAttr->slug) }}"
                                                                class="image-link">
                                                                <img src="{{ asset('storage/media/product/' . $productAttr->image) }}"
                                                                    alt="{{ $productAttr->name }}">

                                                            </a>
                                                            <div class="tag">
                                                                <span>sale</span>
                                                            </div>
                                                            <div class="action-link">
                                                                <div class="action-link-left">
                                                                    <a href="javascript:void(0)"
                                                                        onclick="home_add_to_cart('{{ $productAttr->id }}','{{ $product_attr[$productAttr->id][0]->size }}','{{ $product_attr[$productAttr->id][0]->color }}')">Add
                                                                        to
                                                                        Cart</a>
                                                                </div>
                                                                <div class="action-link-right">

                                                                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                                    <a href="compare.html"><i
                                                                            class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <div class="content-left">
                                                                <h6 class="title"><a
                                                                        href="{{ url('product-details/' . $productAttr->slug) }}">{{ $productAttr->name }}</a>
                                                                </h6>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="empty"><i class="ion-android-star"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="content-right d-flex">
                                                                <span
                                                                    class="price-min">&#8377;{{ $home_trending_product_attr[$productAttr->id][0]->price }}</span>
                                                                &nbsp;<span
                                                                    class="price-max"><del>&#8377;{{ $home_trending_product_attr[$productAttr->id][0]->mrp }}</del></span>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <!-- End Product Default Single Item -->
                                                @endforeach
                                            @else
                                                <div
                                                    class="product-default-single-item product-color--golden swiper-slide">
                                                    No Data Found
                                                </div>
                                            @endif
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
                                            @if (isset($home_discounted_product[0]))
                                                @foreach ($home_discounted_product as $productAttr)
                                                    <!-- Start Product Default Single Item -->
                                                    <div
                                                        class="product-default-single-item product-color--golden swiper-slide">
                                                        <div class="image-box">
                                                            <a href="{{ url('product-details/' . $productAttr->slug) }}"
                                                                class="image-link">
                                                                <img src="{{ asset('storage/media/product/' . $productAttr->image) }}"
                                                                    alt="{{ $productAttr->name }}">

                                                            </a>
                                                            <div class="tag">
                                                                <span>sale</span>
                                                            </div>
                                                            <div class="action-link">
                                                                <div class="action-link-left">
                                                                    <a href="javascript:void(0)"
                                                                        onclick="home_add_to_cart('{{ $productAttr->id }}','{{ $product_attr[$productAttr->id][0]->size }}','{{ $product_attr[$productAttr->id][0]->color }}')">Add
                                                                        to
                                                                        Cart</a>
                                                                </div>
                                                                <div class="action-link-right">

                                                                    <a href="wishlist.html"><i class="icon-heart"></i></a>
                                                                    <a href="compare.html"><i
                                                                            class="icon-shuffle"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="content">
                                                            <div class="content-left">
                                                                <h6 class="title"><a
                                                                        href="{{ url('product-details/' . $productAttr->slug) }}">{{ $productAttr->name }}</a>
                                                                </h6>
                                                                <ul class="review-star">
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="fill"><i class="ion-android-star"></i>
                                                                    </li>
                                                                    <li class="empty"><i class="ion-android-star"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <div class="content-right d-flex">
                                                                <span
                                                                    class="price-min">&#8377;{{ $home_discounted_product_attr[$productAttr->id][0]->price }}</span>
                                                                &nbsp;<span
                                                                    class="price-max"><del>&#8377;{{ $home_discounted_product_attr[$productAttr->id][0]->mrp }}</del></span>
                                                            </div>


                                                        </div>
                                                    </div>
                                                    <!-- End Product Default Single Item -->
                                                @endforeach
                                            @else
                                                <div
                                                    class="product-default-single-item product-color--golden swiper-slide">
                                                    No Data Found
                                                </div>
                                            @endif
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

    <div class="company-logo-section section-top-gap-100 section-fluid">
        <div class="company-logo-wrapper aos-init aos-animate" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="company-logo-slider default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div
                                class="swiper-container company-logo-slider swiper-container-initialized swiper-container-horizontal">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper" id="swiper-wrapper-7ebd44872181d13b" aria-live="polite"
                                    style="transform: translate3d(0px, 0px, 0px);">
                                    @foreach ($home_brand as $brand)
                                        <!-- Start Company Logo Single Item -->
                                        <div class="company-logo-single-item swiper-slide swiper-slide-active"
                                            role="group" aria-label="1 / 8" style="width: 352px;">
                                            <div class="image"><img class="img-fluid"
                                                    src="{{ asset('storage/media/brand/' . $brand->image) }}"
                                                    alt="">
                                            </div>
                                        </div>
                                        <!-- End Company Logo Single Item -->
                                    @endforeach


                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                            <!-- If we need navigation buttons -->
                            <div class="swiper-button-prev d-none d-md-block swiper-button-disabled" tabindex="-1"
                                role="button" aria-label="Previous slide"
                                aria-controls="swiper-wrapper-7ebd44872181d13b" aria-disabled="true"></div>
                            <div class="swiper-button-next d-none d-md-block" tabindex="0" role="button"
                                aria-label="Next slide" aria-controls="swiper-wrapper-7ebd44872181d13b"
                                aria-disabled="false"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" id="qty" value="1" />
    <form id="frmAddToCart">
        <input type="hidden" id="size_id" name="size_id" />
        <input type="hidden" id="color_id" name="color_id" />
        <input type="hidden" id="pqty" name="pqty" />
        <input type="hidden" id="product_id" name="product_id" />
        @csrf
    </form>
@endsection
