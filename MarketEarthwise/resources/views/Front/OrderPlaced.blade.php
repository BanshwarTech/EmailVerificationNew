@extends('Front.layouts.app')
@section('page_title', 'Order Confimation')
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
                    <div class="div">
                        <img src="https://cdni.iconscout.com/illustration/premium/thumb/order-confirm-illustration-download-in-svg-png-gif-file-formats--online-booking-placed-shopping-pack-e-commerce-illustrations-5902811.png"
                            alt="" height="200px" width="200px"><br>


                        @if (isset($data) && $data->isNotEmpty())
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Order Confirmation Number</th>
                                        <th>Order ID</th>
                                        <th>Payment Status</th>
                                        <th>Payment ID</th>
                                        <th>Order Date</th>
                                        <!-- Add other order details here -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->order_id }}</td>
                                            <td>{{ $order->payment_status }}</td>
                                            <td>{{ $order->payment_id }}</td>
                                            <td>{{ $order->added_on }}</td>
                                            <!-- Display other details as needed -->
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        @else
                            <p>No order found.</p>
                        @endif
                        <a href="{{ route('myAccount') }}" class="btn  text-white mt-4"
                            style="background-color: #B19361;">Go to
                            Order</a>
                    </div>

                </div>
                <!--login area start-->


            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->


    <style>
        .customer-login {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 10px;
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
    </style>
@endsection
