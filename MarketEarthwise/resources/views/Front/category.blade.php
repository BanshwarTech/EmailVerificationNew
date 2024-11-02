@extends('Front.layouts.app')
@section('page_title', 'category')
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

    <!-- ...:::: Start Shop Section:::... -->
    <div class="shop-section">
        <div class="container">
            <div class="row flex-column-reverse flex-lg-row">
                <div class="col-lg-3">
                    <!-- Start Sidebar Area -->
                    <div class="siderbar-section" data-aos="fade-up" data-aos-delay="0">

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">CATEGORIES</h6>
                            <div class="sidebar-content">
                                <ul class="sidebar-menu">
                                    <li>
                                        <ul class="sidebar-menu-collapse">
                                            @foreach ($categories_left as $parent)
                                                <!-- Start Single Menu Collapse List -->
                                                <li class="sidebar-menu-collapse-list">
                                                    <div class="accordion">
                                                        @php
                                                            // Filter child categories for this parent
                                                            $children = $child_categories->filter(function (
                                                                $child,
                                                            ) use ($parent) {
                                                                return $child->parent_category_id == $parent->id;
                                                            });
                                                        @endphp

                                                        <a href="{{ url('category/' . $parent->category_slug) }}"
                                                            class="accordion-title collapsed" data-bs-toggle="collapse"
                                                            data-bs-target="#{{ $parent->category_slug }}"
                                                            aria-expanded="false">
                                                            {{ $parent->category_name }}
                                                            @if ($children->isNotEmpty())
                                                                <i class="ion-ios-arrow-right"></i>
                                                                <!-- Show icon if children exist -->
                                                            @endif
                                                        </a>

                                                        @if ($children->isNotEmpty())
                                                            <div id="{{ $parent->category_slug }}" class="collapse">
                                                                <ul class="accordion-category-list">
                                                                    @foreach ($children as $child)
                                                                        <li>
                                                                            <a
                                                                                href="{{ url('category/' . $child->category_slug) }}">{{ $child->category_name }}</a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                            </div>
                                                        @endif
                                                    </div>
                                                </li>
                                                <!-- End Single Menu Collapse List -->
                                            @endforeach



                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">FILTER BY PRICE</h6>
                            <div class="sidebar-content">
                                <form action="">
                                    <!-- Single range slider with fixed bounds -->
                                    <div>
                                        <input type="range" id="slider" class="accent" min="100" max="2000"
                                            value="200" step="1" oninput="updateSliderValues()">
                                    </div>

                                    <!-- Display current slider range values -->
                                    <div class="filter-type-price" style="margin-top:0px; ">
                                        <label for="amount">Selected Price Range:</label>
                                        <span id="skip-value-lower" class="example-val">100.00</span> -
                                        <span id="skip-value-upper" class="example-val">2000.00</span>
                                    </div>

                                    <!-- Filter button -->
                                    <button class="aa-filter-btn" type="button"
                                        onclick="sort_price_filter()">Filter</button>
                                </form>

                                <style>
                                    /* Styling for the slider */
                                    .accent {
                                        accent-color: #B19361 !important;
                                    }


                                    .accent::-webkit-slider-thumb {
                                        -webkit-appearance: none;
                                        appearance: none;
                                        width: 18px;
                                        height: 18px;
                                        background-color: #B19361 !important;
                                        border-radius: 50%;
                                        cursor: pointer;
                                    }

                                    .accent::-moz-range-thumb {
                                        width: 18px;
                                        height: 18px;
                                        background-color: #B19361 !important;
                                        border-radius: 50%;
                                        cursor: pointer;
                                    }
                                </style>

                                <script>
                                    // Retrieve elements
                                    const slider = document.getElementById("slider");
                                    const lowerValueDisplay = document.getElementById("skip-value-lower");
                                    const upperValueDisplay = document.getElementById("skip-value-upper");

                                    // Function to update displayed slider range values
                                    function updateSliderValues() {
                                        const currentValue = parseInt(slider.value);
                                        const minPrice = parseInt(slider.min);

                                        // Update lower and upper range displays
                                        lowerValueDisplay.textContent = minPrice.toFixed(2);
                                        upperValueDisplay.textContent = currentValue.toFixed(2);

                                        // Update slider background to reflect selected range
                                        const minPercent = ((currentValue - minPrice) / (slider.max - minPrice)) * 100;
                                        slider.style.background =
                                            `linear-gradient(to right, #007bff 0%, #007bff ${minPercent}%, #e5e5e5 ${minPercent}%)`;
                                    }

                                    // Function to simulate filtering with the selected range
                                    function sort_price_filter() {
                                        const minPrice = slider.min;
                                        const selectedPrice = slider.value;
                                        console.log(`Filtering between prices: ${minPrice} - ${selectedPrice}`);
                                    }

                                    // Initialize display values on load
                                    updateSliderValues();
                                </script>








                            </div>
                        </div> <!-- End Single Sidebar Widget -->



                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">SELECT BY COLOR</h6>
                            <div class="sidebar-content">
                                <div class="filter-type-select">
                                    <ul>
                                        @foreach ($colors as $color)
                                            <li>
                                                <label class="checkbox-default" for="color-{{ strtolower($color->color) }}">
                                                    <input type="checkbox" id="color-{{ strtolower($color->color) }}"
                                                        onclick="setColor('{{ $color->id }}', '{{ in_array($color->id, $colorFilterArr) ? '1' : '0' }}')"
                                                        {{ in_array($color->id, $colorFilterArr) ? 'checked' : '' }}>
                                                    <span>{{ ucfirst($color->color) }} ({{ $color->count ?? 0 }})</span>
                                                </label>
                                            </li>
                                        @endforeach

                                    </ul>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <h6 class="sidebar-title">Tag products</h6>
                            <div class="sidebar-content">
                                <div class="tag-link">
                                    <a href="#">asian</a>
                                    <a href="#">brown</a>
                                    <a href="#">euro</a>
                                    <a href="#">fashion</a>
                                    <a href="#">hat</a>
                                    <a href="#">t-shirt</a>
                                    <a href="#">teen</a>
                                    <a href="#">travel</a>
                                    <a href="#">white</a>
                                </div>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                        <!-- Start Single Sidebar Widget -->
                        <div class="sidebar-single-widget">
                            <div class="sidebar-content">
                                <a href="product-details-default.html" class="sidebar-banner img-hover-zoom">
                                    <img class="img-fluid" src="" alt="">
                                </a>
                            </div>
                        </div> <!-- End Single Sidebar Widget -->

                    </div> <!-- End Sidebar Area -->
                </div>
                <div class="col-lg-9">
                    <!-- Start Shop Product Sorting Section -->
                    <div class="shop-sort-section">
                        <div class="container">
                            <div class="row" style="margin-top: -52px;">
                                <!-- Start Sort Wrapper Box -->
                                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                    data-aos="fade-up" data-aos-delay="0">
                                    <!-- Start Sort tab Button -->
                                    <div class="sort-tablist d-flex align-items-center">
                                        <ul class="tablist nav sort-tab-btn">
                                            <li><a class="nav-link active" data-bs-toggle="tab" href="#layout-3-grid"><img
                                                        src="{{ asset('assets/images/icons/bkg_grid.png') }}"
                                                        alt=""></a></li>
                                            <li><a class="nav-link" data-bs-toggle="tab" href="#layout-list"><img
                                                        src="{{ asset('assets/images/icons/bkg_list.png') }}"
                                                        alt=""></a></li>

                                        </ul>

                                        <!-- Start Page Amount -->
                                        <div class="page-amount ml-2">
                                            <span>Showing 1–9 of 21 results</span>
                                        </div> <!-- End Page Amount -->
                                    </div> <!-- End Sort tab Button -->

                                    <!-- Start Sort Select Option -->
                                    <div class="sort-select-list d-flex align-items-center">
                                        <label class="mr-2">Sort By:</label>
                                        <form action="#">
                                            <fieldset>
                                                <select name="" onchange="sort_by()" id="sort_by_value">
                                                    <option value="" selected="Default">Default</option>
                                                    <option value="name">Sort by name</option>
                                                    <option value="price_asc">Sort by price: low to high</option>
                                                    <option value="price_desc">Sort by price: high to low</option>
                                                    <option value="date">Sort by date</option>
                                                </select>
                                            </fieldset>
                                        </form>

                                    </div> <!-- End Sort Select Option -->
                                </div> <!-- Start Sort Wrapper Box -->
                            </div>
                        </div>
                    </div> <!-- End Section Content -->
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
                                        <!-- Start List View Product -->
                                        <div class="tab-pane sort-layout-single" id="layout-list"
                                            style="margin-top: 40px;">
                                            <div class="row">
                                                <div class="col-12">
                                                    @if (isset($product[0]))
                                                        @foreach ($product as $productAttr)
                                                            <!-- Start Product Defautlt Single -->
                                                            <div class="product-list-single product-color--golden">
                                                                <a href="{{ url('product-details/' . $productAttr->slug) }}"
                                                                    class="image-link">
                                                                    <img src="{{ asset('storage/media/product/' . $productAttr->image) }}"
                                                                        alt="{{ $productAttr->name }}"
                                                                        style="height:296px;width:257px;"></a>
                                                                <div class="product-list-content">
                                                                    <h5 class="product-list-link"><a
                                                                            href="{{ url('product-details/' . $productAttr->slug) }}">{{ $productAttr->name }}</a>
                                                                    </h5>
                                                                    <ul class="review-star">
                                                                        <li class="fill"><i
                                                                                class="ion-android-star"></i></li>
                                                                        <li class="fill"><i
                                                                                class="ion-android-star"></i></li>
                                                                        <li class="fill"><i
                                                                                class="ion-android-star"></i></li>
                                                                        <li class="fill"><i
                                                                                class="ion-android-star"></i></li>
                                                                        <li class="empty"><i
                                                                                class="ion-android-star"></i></li>
                                                                    </ul>
                                                                    <span
                                                                        class="product-list-price"><del>&#8377;{{ $product_attr[$productAttr->id][0]->mrp }}</del>
                                                                        &#8377;{{ $product_attr[$productAttr->id][0]->price }}</span>

                                                                    <p>{!! $productAttr->short_desc !!}</p>
                                                                    <div class="product-action-icon-link-list">

                                                                        <a href="javascript:void(0)"
                                                                            onclick="home_add_to_cart('{{ $productAttr->id }}','{{ $product_attr[$productAttr->id][0]->size }}','{{ $product_attr[$productAttr->id][0]->color }}')"
                                                                            class="btn btn-lg btn-black-default-hover">Add
                                                                            to
                                                                            Cart</a>
                                                                        <a href="{{ url('/add_to_wishlist/' . $productAttr->id . '/' . $product_attr[$productAttr->id][0]->size . '/' . $product_attr[$productAttr->id][0]->color) }}"
                                                                            class="btn btn-lg btn-black-default-hover"><i
                                                                                class="icon-heart"></i></a>
                                                                        <a href="compare.html"
                                                                            class="btn btn-lg btn-black-default-hover"><i
                                                                                class="icon-shuffle"></i></a>
                                                                    </div>
                                                                </div>
                                                            </div> <!-- End Product Defautlt Single -->
                                                        @endforeach
                                                    @else
                                                        <div class="product-list-single product-color--golden">
                                                            No data found
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div> <!-- End List View Product -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- End Tab Wrapper -->

                    <!-- Start Pagination -->
                    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                        <ul>
                            <li><a class="active" href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
                        </ul>
                    </div> <!-- End Pagination -->
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

    <form id="categoryFilter">
        <input type="hidden" id="sort" name="sort" value="{{ $sort }}" />
        <input type="hidden" id="filter_price_start" name="filter_price_start" value="{{ $filter_price_start }}" />
        <input type="hidden" id="filter_price_end" name="filter_price_end" value="{{ $filter_price_end }}" />
        <input type="hidden" id="color_filter" name="color_filter" value="{{ $color_filter }}" />
    </form>

@endsection
