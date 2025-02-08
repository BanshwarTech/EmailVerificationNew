@extends('Admin.layouts.app')
@section('page_title', 'Order')
@section('admin-content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>@yield('page_title')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item">@yield('page_title')</li>
                </ol>
            </nav>
        </div>
        {{-- <div>
            <a href="{{ url('admin/banner/manage_banner') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Manage Banner
            </a>

        </div> --}}
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p></p>
                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Order ID</th>
                                        <th>Customer Details</th>
                                        <th>Amt</th>
                                        <th>Order Status</th>
                                        <th>Payment Status</th>
                                        <th>Payment Type</th>
                                        <th>Order Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $index => $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td> <!-- Display the count -->
                                            <td>
                                                <a href="{{ url('/admin/order/order_detail/' . $list->id) }}"
                                                    class="btn btn-secondary btn-sm " title="View Order Details">
                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <i class="bi bi-eye-fill"></i>&nbsp;{{ $list->order_id }}

                                                    </div>
                                                </a>
                                            </td>
                                            <td>
                                                {{ $list->name }}<br />
                                                {{ $list->email }}<br />
                                                {{ $list->mobile }}<br />
                                                {{ $list->address }},{{ $list->city }},{{ $list->state }},{{ $list->pincode }}
                                            </td>
                                            <td>{{ $list->total_amt }}</td>
                                            <td>{{ $list->orders_status }}</td>
                                            <td>{{ $list->payment_status }}</td>
                                            <td>{{ $list->payment_type }}</td>
                                            <td>{{ $list->added_on }}</td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
