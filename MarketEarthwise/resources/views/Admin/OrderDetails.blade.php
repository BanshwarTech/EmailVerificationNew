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
                    <li class="breadcrumb-item">Order - {{ $orders_details[0]->order_id }} </li>

                </ol>
            </nav>
        </div>
        <div>
            <a href="{{ url('admin/order') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Back
            </a>

        </div>
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

                            <select class="form-control m-b-10 mt-4" id="order_status_value"
                                onchange="update_order_status({{ $orders_details[0]->id }})">
                                <?php foreach ($order_status as $list): ?>
                                <option value="<?= htmlspecialchars($list->id, ENT_QUOTES, 'UTF-8') ?>"
                                    <?= $orders_details[0]->order_status == $list->id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($list->orders_status, ENT_QUOTES, 'UTF-8') ?>
                                </option>
                                <?php endforeach; ?>
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
                            <select class="form-control m-b-10" id="payment_status"
                                onchange="update_payment_status({{ $orders_details[0]->id }})">
                                <?php foreach ($payment_status as $status): ?>
                                <option value="<?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?>"
                                    <?= $orders_details[0]->payment_status == $status ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($status, ENT_QUOTES, 'UTF-8') ?>
                                </option>
                                <?php endforeach; ?>
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
                            <table class="table datatable table-striped">
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
                                            $tax_id = $list->tax_id;
                                            $tax_value = $list->tax_value;
                                            $tax_desc = $list->tax_desc;
                                            // % price
                                            $perPrice = round(($totalAmt * $tax_value) / 100);
                                            if ($tax_id !== null && $tax_value !== null) {
                                                $totalAmt += $perPrice;
                                            }
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
                                            <td>{{ number_format($list->price * $list->qty) }}</td>
                                        </tr>
                                    @endforeach

                                    @if ($orders_details[0]->coupon_code > 0)
                                        @php
                                            $type = $orders_details[0]->type;
                                            $couponValue = 0;
                                            $finalAmt = 0;
                                            $type_sign = '';
                                            if ($type == 'value') {
                                                $finalAmt = $totalAmt - $couponValue;
                                                $couponValue = '₹' . $orders_details[0]->coupon_value;
                                            } elseif ($type == 'per') {
                                                $discount = ($totalAmt * $orders_details[0]->coupon_value) / 100;
                                                $finalAmt = $totalAmt - $discount;
                                                $couponValue = $orders_details[0]->coupon_value . '%';
                                            } else {
                                                $finalAmt = $totalAmt;
                                                $couponValue = 0;
                                            }
                                        @endphp
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2">
                                                <b>Coupon
                                                    <span
                                                        class="coupon_apply_txt">({{ $orders_details[0]->coupon_code }})</span>
                                                </b>
                                            </td>
                                            <td><strong>{{ $couponValue }}</strong>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2"><strong>TAX({{ $tax_desc }})</strong></td>
                                            <td><strong>₹{{ number_format($perPrice) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2"><b>Total</b></td>
                                            <td><strong>₹{{ number_format($list->total_amt) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2"><strong>Final Total</strong></td>
                                            <td><strong>₹{{ number_format($finalAmt) }}</strong></td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2"><strong>TAX({{ $tax_desc }})</strong></td>
                                            <td><strong>₹{{ number_format($perPrice) }}</strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="4">&nbsp;</td>
                                            <td colspan="2"><b>Final Total</b></td>
                                            <td><strong>₹{{ number_format($totalAmt) }}</strong></td>
                                        </tr>
                                    @endif
                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </section>


@endsection
