@extends('Front.layouts.app')
@section('page_title', 'Wishlist')
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
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        <!-- Start Cart Single Item-->
                                        @foreach ($list as $data)
                                            <tr>
                                                <td class="product_remove">
                                                    <a href="{{ url('/remove/' . $data->id) }}"><i
                                                            class="fa fa-trash-o"></i></a>
                                                </td>
                                                <td class="product_thumb"><a
                                                        href="{{ url('/product-details/' . $data->slug) }}"><img
                                                            src="{{ asset('storage/media/product_attr/' . $data->attr_image) }}"
                                                            alt=""></a></td>
                                                <td class="product_name"><a
                                                        href="{{ url('/product-details/' . $data->slug) }}">{{ $data->name }}</a>
                                                    @if ($data->size != '')
                                                        <br /><strong>SIZE:</strong> {{ $data->size }}
                                                    @endif
                                                    @if ($data->color != '')
                                                        <br /><strong>COLOR:</strong> {{ $data->color }}
                                                    @endif
                                                </td>
                                                <td>
                                                    <span>&#8377;{{ $data->price }}</span>&nbsp;
                                                    <del><span>&#8377;{{ $data->mrp }}</span></del>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- End Cart Single Item-->
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->


    </div> <!-- ...:::: End Cart Section:::... -->
    @if (session('successMessage'))
        <script>
            toastr.success("{{ session('successMessage') }}", 'Success', {
                positionClass: 'toast-top-right',
                closeButton: true,
                progressBar: true
            });
        </script>
    @endif

    @if (session('errorMessage'))
        <script>
            toastr.error("{{ session('errorMessage') }}", 'Error', {
                positionClass: 'toast-top-right',
                closeButton: true,
                progressBar: true
            });
        </script>
    @endif
@endsection
