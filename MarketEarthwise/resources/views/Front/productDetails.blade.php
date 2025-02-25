@extends('Front.layouts.app')
@section('page_title', 'Product Details')
@section('content')

    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">@yield('page_title')</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="{{ route('index') }}">Home</a></li>
                                    <li class="active" aria-current="page">@yield('page_title')</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    <!-- Start Product Details Section -->
    <div class="product-details-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-6" style="    margin-top: -36px;">
                    <div class="product-details-gallery-area" data-aos="fade-up" data-aos-delay="0">
                        <!-- Start Large Image -->
                        <div class="product-large-image product-large-image-horaizontal swiper-container">
                            <div class="swiper-wrapper simpleLens-big-image-container">

                                <div class="product-image-large-image swiper-slide zoom-image-hover img-responsive">
                                    <img src="{{ asset('storage/media/product/' . $product[0]->image) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <!-- End Large Image -->
                        <!-- Start Thumbnail Image -->
                        <div class="product-image-thumb product-image-thumb-horizontal swiper-container pos-relative mt-5">
                            <div class="swiper-wrapper">

                                @if (isset($product_images[$product[0]->id][0]))

                                    @foreach ($product_images[$product[0]->id] as $list)
                                        <div class="product-image-thumb-single swiper-slide">
                                            <img class="img-fluid"
                                                src="{{ asset('storage/media/product_images/' . $list->images) }}"
                                                alt="">
                                        </div>
                                    @endforeach

                                @endif
                            </div>
                            <!-- Add Arrows -->
                            <div class="gallery-thumb-arrow swiper-button-next"></div>
                            <div class="gallery-thumb-arrow swiper-button-prev"></div>
                        </div>
                        <!-- End Thumbnail Image -->
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6">
                    <div class="product-details-content-area product-details--golden" data-aos="fade-up"
                        data-aos-delay="200">
                        <!-- Start  Product Details Text Area-->
                        <div class="product-details-text">
                            <h5 class="title" style="font-size: 25px;">{{ $product[0]->name }}</h5>
                            <div class="d-flex align-items-center">
                                <ul class="review-star">
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="fill"><i class="ion-android-star"></i></li>
                                    <li class="empty"><i class="ion-android-star"></i></li>
                                </ul>
                                <a href="#" class="customer-review ml-2">(customer review )</a>
                            </div>
                            <div class="price-row " style="margin-bottom: 10px;">
                                <div class="price">&#8377;{{ $product_attr[$product[0]->id][0]->price }}</div>

                                <div class="" style="margin-top: 14px;">
                                    <del>&#8377;{{ $product_attr[$product[0]->id][0]->mrp }}</del>
                                </div>

                            </div>
                            <style>
                                .price-row {
                                    display: flex;
                                    gap: 10px;
                                }
                            </style>
                            <p style="margin-top: -20px">{!! $product[0]->short_desc !!}</p>
                        </div> <!-- End  Product Details Text Area-->
                        <!-- Start Product Variable Area -->
                        <div class="product-details-variable" style="margin-top: -20px">
                            <h4 class="title">Available Options</h4>
                            <div class="variable-single-item">
                                <div class="product-stock" style="margin-top:-20px;">
                                    <span class="product-stock-in">
                                        <i class="ion-checkmark-circled"> </i></span> <span>200</span> IN STOCK
                                </div>
                            </div>
                            <!-- Product Variable Single Item -->
                            <div class="variable-single-item">
                                @if ($product_attr[$product[0]->id][0]->size_id > 0)
                                    <div class="variable-single-item">
                                        <span>Size</span>
                                        <select class="product-variable-size" style="display: none;">
                                            @php
                                                $arrSize = [];
                                                foreach ($product_attr[$product[0]->id] as $attr) {
                                                    $arrSize[] = $attr->size;
                                                }
                                                $arrSize = array_unique($arrSize);
                                            @endphp
                                            @foreach ($arrSize as $attr)
                                                @if ($attr != '')
                                                    <option value="{{ $attr }}">{{ $attr }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        <div class="nice-select product-variable-size" tabindex="0">
                                            <span class="current">Select Size</span>
                                            <ul class="list">
                                                @foreach ($arrSize as $attr)
                                                    @if ($attr != '')
                                                        <li data-value="{{ $attr }}" class="option"
                                                            onclick="showColor('{{ $attr }}')">
                                                            {{ $attr }}
                                                        </li>
                                                    @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <!-- Product Variable Single Item -->
                            <div class="variable-single-item">
                                @if ($product_attr[$product[0]->id][0]->color_id > 0)
                                    <div class="variable-single-item">
                                        <span>Color</span>
                                        <div class="product-variable-color">
                                            @foreach ($product_attr[$product[0]->id] as $attr)
                                                @if ($attr->color != '')
                                                    <label
                                                        class="product-color-{{ strtolower($attr->color) }} product_color size_{{ $attr->size }}"
                                                        class="color-option">
                                                        <input name="product-color" type="radio"
                                                            onclick="change_product_color_image('{{ asset('storage/media/product_attr/' . $attr->attr_image) }}', '{{ $attr->color }}',{{ $attr->qty }},{{ $attr->mrp }},{{ $attr->price }})">
                                                        <span class="product-color-{{ strtolower($attr->color) }}"
                                                            style="background-color: {{ strtolower($attr->color) }}; width: 30px; height: 30px; display: inline-block; border: 1px solid #ccc;"><img
                                                                src="{{ asset('storage/media/product_attr/' . $attr->attr_image) }}"
                                                                alt="" height="29px" width="29px"></span>
                                                    </label>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endif

                            </div>


                            <div class="d-flex align-items-center ">
                                <div class="variable-single-item ">
                                    <span>Quantity</span>
                                    <form action="">
                                        <select id="qty" name="qty">
                                            @for ($i = 1; $i < 11; $i++)
                                                <option value="{{ $i }}">{{ $i }}</option>
                                            @endfor
                                        </select>
                                    </form>
                                </div>

                                <div class="product-add-to-cart-btn m-3">
                                    <a href="javascript:void(0)"
                                        onclick="add_to_cart('{{ $product[0]->id }}','{{ $product_attr[$product[0]->id][0]->size_id }}','{{ $product_attr[$product[0]->id][0]->color_id }}')">+
                                        Add To
                                        Cart</a>
                                </div>

                            </div>
                            <div id="add_to_cart_msg" style="color:red"></div>
                            <!-- Start  Product Details Meta Area-->
                            <div class="product-details-meta mb-20">
                                <a href="wishlist.html" class="icon-space-right"><i class="icon-heart"></i>Add to
                                    wishlist</a>
                                <a href="compare.html" class="icon-space-right"><i class="icon-refresh"></i>Compare</a>
                            </div> <!-- End  Product Details Meta Area-->
                        </div> <!-- End Product Variable Area -->

                        <!-- Start  Product Details Catagories Area-->
                        <div class="product-details-catagory mb-2">
                            <span class="title">CATEGORIES:</span>
                            <ul>
                                <li><a href="#">{{ $product[0]->category_id }}</a></li>
                            </ul>
                        </div> <!-- End  Product Details Catagories Area-->


                        <!-- Start  Product Details Social Area-->
                        <div class="product-details-social">
                            <span class="title">SHARE THIS PRODUCT:</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div> <!-- End  Product Details Social Area-->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Product Details Section -->
    <!-- Start Product Content Tab Section -->
    <div class="product-details-content-tab-section section-top-gap-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="product-details-content-tab-wrapper" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Product Details Tab Button -->
                        <ul class="nav tablist product-details-content-tab-btn d-flex justify-content-center">
                            <li><a class="nav-link active" data-bs-toggle="tab" href="#description">
                                    Description
                                </a></li>
                            <li><a class="nav-link" data-bs-toggle="tab" href="#specification">
                                    Specification
                                </a></li>
                            <li><a class="nav-link" data-bs-toggle="tab" href="#review">
                                    Reviews
                                </a></li>
                        </ul> <!-- End Product Details Tab Button -->

                        <!-- Start Product Details Tab Content -->
                        <div class="product-details-content-tab">
                            <div class="tab-content">
                                <!-- Start Product Details Tab Content Singel -->
                                <div class="tab-pane active show" id="description">
                                    <div class="single-tab-content-item">
                                        <p>{!! $product[0]->desc !!}</p>
                                    </div>
                                </div> <!-- End Product Details Tab Content Singel -->
                                <!-- Start Product Details Tab Content Singel -->
                                <div class="tab-pane" id="specification">
                                    <div class="single-tab-content-item">
                                        <p>{!! $product[0]->technical_specification !!}</p>
                                    </div>
                                </div> <!-- End Product Details Tab Content Singel -->
                                <!-- Start Product Details Tab Content Singel -->
                                <div class="tab-pane" id="review">
                                    <div class="single-tab-content-item">
                                        <!-- Start - Review Comment -->
                                        <ul class="comment">
                                            <!-- Start - Review Comment list-->
                                            <li class="comment-list">
                                                <div class="comment-wrapper">
                                                    <div class="comment-img">
                                                        <img src="assets/images/user/image-1.png" alt="">
                                                    </div>
                                                    <div class="comment-content">
                                                        <div class="comment-content-top">
                                                            <div class="comment-content-left">
                                                                <h6 class="comment-name">Kaedyn Fraser</h6>
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
                                                            <div class="comment-content-right">
                                                                <a href="#"><i class="fa fa-reply"></i>Reply</a>
                                                            </div>
                                                        </div>

                                                        <div class="para-content">
                                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                                                Tempora inventore dolorem a unde modi iste odio amet,
                                                                fugit fuga aliquam, voluptatem maiores animi dolor nulla
                                                                magnam ea! Dignissimos aspernatur cumque nam quod sint
                                                                provident modi alias culpa, inventore deserunt
                                                                accusantium amet earum soluta consequatur quasi eum eius
                                                                laboriosam, maiores praesentium explicabo enim dolores
                                                                quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam
                                                                officia, saepe repellat. </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li> <!-- End - Review Comment list-->
                                        </ul> <!-- End - Review Comment -->
                                        <div class="review-form">
                                            <div class="review-form-text-top">
                                                <h5>ADD A REVIEW</h5>
                                                <p>Your email address will not be published. Required fields are marked
                                                    *</p>
                                            </div>

                                            <form action="#" method="post">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="default-form-box">
                                                            <label for="comment-name">Your name <span>*</span></label>
                                                            <input id="comment-name" type="text"
                                                                placeholder="Enter your name" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="default-form-box">
                                                            <label for="comment-email">Your Email <span>*</span></label>
                                                            <input id="comment-email" type="email"
                                                                placeholder="Enter your email" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="default-form-box">
                                                            <label for="comment-review-text">Your review
                                                                <span>*</span></label>
                                                            <textarea id="comment-review-text" placeholder="Write a review" required></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button class="btn btn-md btn-black-default-hover"
                                                            type="submit">Submit</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- End Product Details Tab Content Singel -->
                            </div>
                        </div> <!-- End Product Details Tab Content -->

                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End Product Content Tab Section -->
    <!-- Start Product Default Slider Section -->
    <div class="product-default-slider-section section-top-gap-100 section-fluid">
        <!-- Start Section Content Text Area -->
        <div class="section-title-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-content-gap">
                            <div class="secton-content">
                                <h3 class="section-title">RELATED PRODUCTS</h3>
                                <p>Browse the collection of our related products.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Section Content Text Area -->
        <div class="product-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product-slider-default-1row default-slider-nav-arrow">
                            <!-- Slider main container -->
                            <div class="swiper-container product-default-slider-4grid-1row">
                                <!-- Additional required wrapper -->
                                <div class="swiper-wrapper">
                                    <!-- End Product Default Single Item -->
                                    @if (isset($related_product[0]))
                                        @foreach ($related_product as $productArr)
                                            <!-- Start Product Default Single Item -->
                                            <div class="product-default-single-item product-color--golden swiper-slide">
                                                <div class="image-box">
                                                    <a href="{{ url('/product-details/' . $productArr->slug) }}"
                                                        class="image-link">
                                                        <img src="{{ asset('storage/media/' . $productArr->image) }}"
                                                            alt="">
                                                    </a>
                                                    <div class="action-link">
                                                        <div class="action-link-left">
                                                            <a href="#" href="javascript:void(0)"
                                                                onclick="add_to_cart('{{ $product[0]->id }}','{{ $product_attr[$product[0]->id][0]->size_id }}','{{ $product_attr[$product[0]->id][0]->color_id }}')">Add
                                                                to Cart</a>
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
                                                                href="{{ url('/product-details/' . $productArr->slug) }}">{{ $productArr->name }}</a>
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
                                                        <span
                                                            class="price">&#8377;{{ $related_product_attr[$productArr->id][0]->price }}</span>
                                                        &nbsp;&nbsp;<del><span
                                                                class="discount-price">&#8377;{{ $related_product_attr[$productArr->id][0]->mrp }}</span></del>
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
                                    @else
                                        <div class="product-default-single-item product-color--golden swiper-slide">
                                            No data found
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

    <form id="frmAddToCart">
        <input type="hidden" id="size_id" name="size_id" />
        <input type="hidden" id="color_id" name="color_id" />
        <input type="hidden" id="pqty" name="pqty" />
        <input type="hidden" id="product_id" name="product_id" />
        @csrf
    </form>
@endsection
