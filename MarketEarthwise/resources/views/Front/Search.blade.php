@extends('Front.layouts.app')
@section('page_title', 'Search')
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
    <div class="shop-section">
        <div class="container">
            <div class="alert">
                <span style="font-weight: bold;"> Search by :</span> <span style="color:green;"> {{ $str }}</span>
            </div>
            <div class="row flex-column-reverse flex-lg-row-reverse">


                <div class="col-lg-12">
                    <!-- Start Tab Wrapper -->
                    <div class="sort-product-tab-wrapper">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="tab-content tab-animate-zoom">
                                        <!-- Start Grid View Product -->
                                        <div class="tab-pane active show sort-layout-single" id="layout-3-grid">
                                            <div class="row">
                                                <div class="col-xl-4 col-sm-6 col-12">
                                                    @if (isset($product[0]))
                                                        @foreach ($product as $productAttr)
                                                            <!-- Start Product Default Single Item -->
                                                            <div class="product-default-single-item product-color--golden"
                                                                data-aos="fade-up" data-aos-delay="0">
                                                                <div class="image-box">
                                                                    <a href="{{ url('product-details/' . $productAttr->slug) }}"
                                                                        class="image-link">
                                                                        <img src="{{ asset('storage/media/product/' . $productAttr->image) }}"
                                                                            alt="{{ $productAttr->name }}">

                                                                    </a>
                                                                    <div class="action-link">
                                                                        <div class="action-link-left">
                                                                            <a href="javascript:void(0)"
                                                                                onclick="home_add_to_cart('{{ $productAttr->id }}','{{ $product_attr[$productAttr->id][0]->size }}','{{ $product_attr[$productAttr->id][0]->color }}')">Add
                                                                                to
                                                                                Cart</a>
                                                                        </div>
                                                                        <div class="action-link-right">

                                                                            <a
                                                                                href="{{ url('/add_to_wishlist/' . $productAttr->id . '/' . $product_attr[$productAttr->id][0]->size . '/' . $product_attr[$productAttr->id][0]->color) }}"><i
                                                                                    class="icon-heart"></i></a>
                                                                            <a href="compare.html"><i
                                                                                    class="icon-shuffle"></i></a>
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
                                                                            <li class="fill"><i
                                                                                    class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="fill"><i
                                                                                    class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="fill"><i
                                                                                    class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="fill"><i
                                                                                    class="ion-android-star"></i>
                                                                            </li>
                                                                            <li class="empty"><i
                                                                                    class="ion-android-star"></i>
                                                                            </li>
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
                                                        <div class="product-default-single-item product-color--golden"
                                                            data-aos="fade-up" data-aos-delay="0">
                                                            No data found
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div> <!-- End Grid View Product -->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->


                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Shop Section:::... -->

    <input type="hidden" id="qty" value="1" />
    <form id="frmAddToCart">
        <input type="hidden" id="size_id" name="size_id" />
        <input type="hidden" id="color_id" name="color_id" />
        <input type="hidden" id="pqty" name="pqty" />
        <input type="hidden" id="product_id" name="product_id" />
        @csrf
    </form>
@endsection
