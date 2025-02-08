@extends('Front.layouts.app')
@section('page_title', 'Order Detail')
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
                    <div class="col-12 col-md-6">
                        <div class="order_detail">
                            <h3>Details Address</h3>
                            {{ $orders_details[0]->name }}({{ $orders_details[0]->mobile }})
                            <br />{{ $orders_details[0]->address }}<br />{{ $orders_details[0]->city }}</br>{{ $orders_details[0]->state }}</br />{{ $orders_details[0]->pincode }}
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="order_detail">
                            <h3>Order Details</h3>
                            Order Status: {{ $orders_details[0]->orders_status }}<br />
                            Payment Status: {{ $orders_details[0]->payment_status }}<br />
                            Payment Type: {{ $orders_details[0]->payment_type }}<br />
                            <?php
                            if ($orders_details[0]->payment_id != '') {
                                echo 'Payment ID: ' . $orders_details[0]->payment_id;
                            }
                            ?>
                        </div>
                        <b>Track Details</b>:
                        {{ $orders_details[0]->track_details }}
                    </div>
                    <div class="col-12 mt-5">
                        <div class="table_desc">

                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
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
                                    </thead> <!-- End Cart Table Head -->
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
                                                // echo $totalAmt .
                                                //     '<br/>' .
                                                //     $tax_id .
                                                //     '<br/>' .
                                                //     $tax_value .
                                                //     '<br/>' .
                                                //     $tax_desc .
                                                //     '<br/>';
                                                // % price
                                                $perPrice = round(($totalAmt * $tax_value) / 100);
                                                // echo 'tax Price' . $perPrice . '<br/>';
                                                if ($tax_id !== null && $tax_value !== null) {
                                                    $totalAmt += $perPrice;
                                                }
                                                // echo 'TOtal Prrice with tax : ' . $perPrice . '<br/>';
                                            @endphp
                                            <tr>
                                                <td>{{ $list->pname }}</td>
                                                <td><img src='{{ asset('storage/media/product_attr/' . $list->attr_image) }}'
                                                        height="50px" />
                                                </td>
                                                <td>{{ $list->size }}</td>
                                                <td>{{ $list->color }}</td>
                                                <td>₹{{ $list->price }}</td>
                                                <td>{{ $list->qty }}</td>
                                                <td>₹{{ number_format($list->price * $list->qty) }}</td>
                                            </tr>
                                        @endforeach

                                        @if ($orders_details[0]->coupon_value > 0)
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
                                                <td><strong>₹{{ number_format($perPrice, 2) }}</strong></td>
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
                                                <td><strong>₹{{ number_format(round($perPrice, 2), 2) }}</strong></td>
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
        </div> <!-- End Cart Table -->


    </div> <!-- ...:::: End Cart Section:::... -->
@endsection
