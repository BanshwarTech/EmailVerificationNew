@extends('Admin.layouts.app')
@section('page_title', 'Order Details')
@section('admin-content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>@yield('page_title')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item">@yield('page_title')</li>
                    <li class="breadcrumb-item">Order - {{ $orders_details[0]->order_id }}</li>
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
                        <div class="card-header">
                            <h5 class="h5 text-black fw-bold">Update Order Status </h5>
                        </div>
                        <div class="form-floating">
                            <select class="form-control m-b-10 mt-4 " id="order_status"
                                onchange="update_order_status({{ $orders_details[0]->id }})">
                                <?php
                                foreach ($order_status as $list) {
                                    if ($orders_details[0]->order_status == $list->id) {
                                        echo "<option value='" . $list->id . "' selected>" . $list->orders_status . '</option>';
                                    } else {
                                        echo "<option value='$list->id'>" . $list->orders_status . '</option>';
                                    }
                                }
                                ?>
                            </select>
                            <label for="form-label">Update Order Status</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h5 class="h5 text-black fw-bold">Update Payment Status </h5>
                        </div>
                        <div class="form-floating mt-4">
                            <select class="form-control  m-b-10" id="payment_status"
                                onchange="update_payemnt_status({{ $orders_details[0]->id }})">
                                <?php
                                foreach ($payment_status as $list) {
                                    if ($orders_details[0]->payment_status == $list) {
                                        echo "<option value='$list' selected>$list</option>";
                                    } else {
                                        echo "<option value='$list'>$list</option>";
                                    }
                                }
                                ?>
                            </select>
                            <label for="form-label">Update Payment Status</label>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="card-header">
                            <h5 class="h5 text-black fw-bold">Update Track Details</h5>
                        </div>

                        <form method="post">
                            <div class="form-floating mt-4">
                                <textarea name="track_details" class="form-control  m-b-10" required>{{ $orders_details[0]->track_details }}</textarea>
                                <label for="form-label">Track Details</label>
                                <button type="submit" class="btn btn-success btn-sm mt-3">
                                    Update
                                </button>
                                @csrf
                            </div>
                        </form>


                    </div>
                </div>

                <div class="card">



                    <div class="card-body">
                        <div class="card-header">
                            <h5 class="h5 text-black fw-bold">Order Details</h5>
                        </div>
                        <div class="row mt-4 ms-2">
                            <div class="col-12 col-md-6">
                                <h6 class="text-black fw-bold text-decoration-underline">Details Address</h6>
                                <p>{{ $orders_details[0]->name }}({{ $orders_details[0]->mobile }})
                                    <br />{{ $orders_details[0]->address }}<br />{{ $orders_details[0]->city }}</br>{{ $orders_details[0]->state }}</br />{{ $orders_details[0]->pincode }}
                                </p>
                            </div>
                            <div class="col-12 col-md-6">
                                <h6 class="text-black fw-bold text-decoration-underline">Order Details</h6>
                                <ul>
                                    <li>Order Status: {{ $orders_details[0]->orders_status }}</li>
                                    <li>Payment Status: {{ $orders_details[0]->payment_status }}</li>
                                    <li>Payment Type: {{ $orders_details[0]->payment_type }}</li>
                                    <li>
                                        <?php
                                        if ($orders_details[0]->payment_id != '') {
                                            echo 'Payment ID: ' . $orders_details[0]->payment_id;
                                        }
                                        ?>
                                    </li>

                                </ul>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table datatable">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Image</th>
                                        <th>Size</th>
                                        <th>Color</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $totalAmt = 0;
                                    @endphp
                                    @foreach ($orders_details as $list)
                                        @php
                                            $totalAmt = $totalAmt + $list->price * $list->qty;
                                        @endphp
                                        <tr>
                                            <td>{{ $list->pname }}</td>
                                            <td><img src='{{ asset('storage/media/product_attr/' . $list->attr_image) }}'
                                                    height="50px" />
                                            </td>
                                            <td>{{ $list->size }}</td>
                                            <td>{{ $list->color }}</td>
                                            <td>{{ $list->price }}</td>
                                            <td>{{ $list->qty }}</td>
                                            <td>{{ $list->price * $list->qty }}</td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">&nbsp;</td>
                                        <td colspan="2"><b>Total</b></td>
                                        <td><b>{{ $totalAmt }}</b></td>
                                    </tr>
                                    @if ($orders_details[0]->coupon_value > 0)
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2">
                                                <b>Coupon
                                                    <span
                                                        class="coupon_apply_txt">({{ $orders_details[0]->coupon_code }})</span>
                                                </b>
                                            </td>
                                            <td>{{ $orders_details[0]->coupon_value }}</td>
                                        </tr>
                                        @php
                                            $totalAmt -= $orders_details[0]->coupon_value;
                                        @endphp
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2"><b>Final Total</b></td>
                                            <td>{{ $totalAmt }}</td>
                                        </tr>
                                    @endif
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
