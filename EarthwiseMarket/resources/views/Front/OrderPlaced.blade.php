@extends('Front.layouts.app')
@section('page_title', 'Order Placed')
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
    <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-12 col-md-12">
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/order-confirm-illustration-download-in-svg-png-gif-file-formats--online-booking-placed-shopping-pack-e-commerce-illustrations-5902811.png?f=webp"
                        alt="" style="text-align: center">
                    <h2>Order Id:- {{ session()->get('ORDER_ID') }}</h2>
                </div>
                <!--login area start-->


            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->

@endsection
