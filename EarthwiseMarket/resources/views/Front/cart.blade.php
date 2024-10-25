@extends('Front.layouts.app')

@section('page_title')
    @if ($list->isEmpty())
        Cart Empty
    @else
        Cart
    @endif
@endsection

@section('content')
    @if ($list->isEmpty())
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

        <!-- ...::::Start About Us Center Section:::... -->
        <div class="empty-cart-section section-fluid">
            <div class="emptycart-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-10 offset-md-1 col-xl-6 offset-xl-3">
                            <div class="emptycart-content text-center">
                                <div class="image">
                                    <img class="img-fluid" src="assets/images/emprt-cart/empty-cart.png" alt="">
                                </div>
                                <h4 class="title">Your Cart is Empty</h4>
                                <h6 class="sub-title">Sorry Mate... No item Found inside your cart!</h6>
                                <a href="shop-grid-sidebar-left.html" class="btn btn-lg btn-golden">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...::::End  About Us Center Section:::... -->
    @else
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

        <!-- ...:::: Start Cart Section:::... -->
        <div class="cart-section">
            <!-- Start Cart Table -->
            <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">

                                <div class="table_page table-responsive">
                                    <table>
                                        <!-- Start Cart Table Head -->
                                        <thead>
                                            <tr>
                                                <th class="product_remove">Delete</th>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                            </tr>
                                        </thead> <!-- End Cart Table Head -->
                                        <tbody>
                                            <!-- Start Cart Single Item-->
                                            @foreach ($list as $data)
                                                <tr id="cart_box{{ $data->attr_id }}">
                                                    <td class="product_remove"><a href="javascript:void(0)"
                                                            onclick="deleteCartProduct('{{ $data->pid }}','{{ $data->size }}','{{ $data->color }}','{{ $data->attr_id }}')"><i
                                                                class="fa fa-trash-o"></i></a>
                                                    </td>
                                                    <td class="product_thumb"><a
                                                            href="{{ url('/product-details/' . $data->slug) }}"><img
                                                                src="{{ asset('storage/media/product/' . $data->image) }}"
                                                                alt=""></a></td>
                                                    <td class="product_name"><a
                                                            href="{{ url('/product-details/' . $data->slug) }}">{{ $data->name }}</a>
                                                        @if ($data->size != '')
                                                            <br />SIZE: {{ $data->size }}
                                                        @endif
                                                        @if ($data->color != '')
                                                            <br />COLOR: {{ $data->color }}
                                                        @endif
                                                    </td>
                                                    <td class="product-price">&#8377;{{ $data->price }}</td>
                                                    <td class="product_quantity"><label>Quantity</label> <input
                                                            min="1" max="100" value="{{ $data->qty }}"
                                                            class="aa-cart-quantity" type="number"
                                                            id="qty{{ $data->attr_id }}"
                                                            onchange="updateQty('{{ $data->pid }}','{{ $data->size }}','{{ $data->color }}','{{ $data->attr_id }}','{{ $data->price }}')">
                                                    </td>
                                                    <td class="product_total" id="total_price_{{ $data->attr_id }}">
                                                        &#8377;{{ $data->price * $data->qty }}
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <!-- End Cart Single Item-->
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart_submit">
                                    <a class="btn btn-md btn-golden" href="{{ url('/checkout') }}">Proceed to Checkout</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- End Cart Table -->


        </div> <!-- ...:::: End Cart Section:::... -->
    @endif

    <input type="hidden" id="qty" value="1" />
    <form id="frmAddToCart">
        <input type="hidden" id="size_id" name="size_id" />
        <input type="hidden" id="color_id" name="color_id" />
        <input type="hidden" id="pqty" name="pqty" />
        <input type="hidden" id="product_id" name="product_id" />
        @csrf
    </form>
@endsection
