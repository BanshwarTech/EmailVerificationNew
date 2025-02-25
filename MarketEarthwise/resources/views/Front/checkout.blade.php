@extends('Front.layouts.app')
@section('page_title', 'checkout')
@section('content')
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
    </div>
    <div class="checkout-section">
        <div class="container">
            <div class="row">
                <!-- User Quick Action Form -->
                <div class="col-12">
                    @if (session()->has('FRONT_USER_LOGIN') == null)
                        <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="0">
                            <h3>
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                Returning customer?
                                <a class="Returning" href="#" data-bs-toggle="collapse"
                                    data-bs-target="#checkout_login" aria-expanded="true">Click here to login</a>
                            </h3>
                            <div id="checkout_login" class="collapse" data-parent="#checkout_login">
                                <div class="checkout_info">
                                    <p>If you have shopped with us before, please enter your details in the boxes below.
                                        If
                                        you are a new customer please proceed to the Billing &amp; Shipping section.</p>
                                    <form action="{{ route('LoginProcess') }}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form_group default-form-box">
                                                    <label>Username or email <span style="color:red;">*</span></label>
                                                    <input type="email" name="email" id="email"
                                                        placeholder="Enter your login email....">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class=" default-form-box">
                                                    <label>Password <span style="color:red;">*</span></label>
                                                    <input type="password" name="password" id="password"
                                                        placeholder=" Enter your login password....">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form_group group_3 default-form-box">
                                            <button class="btn btn-md btn-black-default-hover" type="submit">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- User Quick Action Form -->
            </div>
            <form method="post" action="{{ route('place.order') }}" enctype="multipart/form-data">
                @csrf
                <div class="user-actions accordion" data-aos="fade-up" data-aos-delay="200">
                    <h3>
                        <i class="fa fa-file-o" aria-hidden="true"></i>
                        Returning customer?
                        <a class="Returning" href="#" data-bs-toggle="collapse" data-bs-target="#checkout_coupon"
                            aria-expanded="true">Click here to enter your code</a>
                    </h3>
                    <div id="checkout_coupon" class="collapse checkout_coupon coupon_code" data-parent="#checkout_coupon"
                        style="margin-top: unset;border:none;">
                        <div class="checkout_info">
                            <input type="text" placeholder="Coupon Code" class="aa-coupon-code apply_coupon_code_box"
                                name="coupon_code" id="coupon_code">
                            <button class="btn btn-md btn-black-default-hover apply_coupon_code_box" type="button"
                                onclick="applyCouponCode()">Apply
                                coupon</button>
                            <div class="d-flex">
                                <div id="coupon_code_str" style="color:red;"></div>&nbsp;<div id="coupon_code_msg"></div>
                                <div class="hide show_coupon_box">
                                    <a href="javascript:void(0)" onclick="remove_coupon_code()"
                                        class="btn btn-md btn-black-default-hover remove_coupon_code_link">Remove</a>
                                </div>
                            </div>
                        </div>
                        <style>
                            .hide {
                                display: none;
                            }
                        </style>
                    </div>
                </div>
                <div class="checkout_form" data-aos="fade-up" data-aos-delay="400" style="margin-top: unset;">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="default-form-box">
                                        <label>Full Name <span style="color:red;">*</span></label>
                                        <input type="text" placeholder=" Name*" id="name"
                                            value="{{ $users['name'] }}" name="name">
                                        <span class="error-message" id="nameError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label>Phone<span style="color:red;">*</span></label>
                                        <input type="text" value="{{ $users['mobile'] }}" name="mobile"
                                            id="mobile" maxlength="10" pattern="\d{10}"
                                            title="Please enter exactly 10 digits"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189">
                                        <span class="error-message" id="mobileError"></span>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="default-form-box">
                                        <label> Email Address <span style="color:red;">*</span></label>
                                        <input type="text" id="email" value="{{ $users['email'] }}"
                                            name="email">
                                        <span class="error-message" id="emailError"></span>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="default-form-box">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="Company Name*" value="{{ $users['company'] }}"
                                            name="company">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="default-form-box">
                                        <label for="country">Country <span style="color:red;">*</span></label>
                                        <select class="country_option nice-select wide" name="country" id="country">
                                            <option value="NULL">Select Country</option>
                                        </select>
                                        <span class="error-message" id="countryError"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="default-form-box">
                                        <label>State <span style="color:red;">*</span></label>
                                        <input type="text" placeholder=" State*" value="{{ $users['state'] }}"
                                            id="state" name="state">
                                        <span class="error-message" id="stateError"></span>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="default-form-box">
                                        <label>City <span style="color:red;">*</span></label>
                                        <input type="text" placeholder=" City*" value="{{ $users['city'] }}"
                                            name="city" id="city">
                                        <span class="error-message" id="cityError"></span>
                                    </div>
                                </div>
                                <div class="col-4 ">
                                    <div class="default-form-box">
                                        <label for=""><span>Pincode</span></label>
                                        <input type="text" placeholder="pincode*" value="{{ $users['zip'] }}"
                                            id="pincode" name="zip" maxlength="6" pattern="\d{6}"
                                            title="Please enter exactly 6 digits"
                                            oninput="this.value = this.value.replace(/[^0-9]/g, '')"
                                            onkeydown="return event.keyCode !== 69 && event.keyCode !== 187 && event.keyCode !== 189">
                                        <span class="error-message" id="pincodeError"></span>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="default-form-box">
                                        <label>Street address <span style="color:red;">*</span></label>
                                        <textarea placeholder="House number and street name" name="address" id="address" style="height: 100px;"> {{ $users['address'] }}</textarea>
                                        <span class="error-message" id="addressError"></span>
                                    </div>
                                </div>
                                @if (session()->has('FRONT_USER_LOGIN') == null)
                                    <div class="col-12">
                                        <label class="checkbox-default" for="newAccount" data-bs-toggle="collapse"
                                            data-bs-target="#newAccountPassword">
                                            <input type="checkbox" id="newAccount">
                                            <span>Create an account?</span>
                                        </label>
                                        <div id="newAccountPassword" class="collapse mt-3"
                                            data-parent="#newAccountPassword">
                                            <div class="card-body1 default-form-box">
                                                <label> Account password <span style="color:red;">*</span></label>
                                                <input placeholder="password" type="password" name="password">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-12 mt-3">
                                    <div class="order-notes">
                                        <label for="order_note">Order Notes</label>
                                        <textarea id="order_note" placeholder="Notes about your order, e.g. special notes for delivery."></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="checkbox-default" for="newShipping" data-bs-toggle="collapse"
                                        data-bs-target="#anotherShipping">
                                        <input type="checkbox" id="newShipping">
                                        <span>Ship to a different address?</span>
                                    </label>

                                    <div id="anotherShipping" class="collapse mt-3" data-parent="#anotherShipping">
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="default-form-box">
                                                    <label>Full Name <span>*</span></label>
                                                    <input type="text" name="shipping_name" placeholder="Full Name">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="default-form-box">
                                                    <label>Phone <span>*</span></label>
                                                    <input type="text" name="shipping_phone" placeholder="Phone">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="default-form-box">
                                                    <label>Email Address <span>*</span></label>
                                                    <input type="email" name="shipping_email"
                                                        placeholder="Email Address">
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-6">
                                                <div class="default-form-box">
                                                    <label for="shipping_country">Shipping Country <span
                                                            style="color:red;">*</span></label>
                                                    <select class="country_option nice-select wide"
                                                        name="shipping_country" id="shipping_country">
                                                        <option value="NULL">Select Country</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="default-form-box">
                                                    <label>City <span>*</span></label>
                                                    <input type="text" name="shipping_city" placeholder="City">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="default-form-box">
                                                    <label>State <span>*</span></label>
                                                    <input type="text" name="shipping_state" placeholder="State">
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="default-form-box">
                                                    <label>Pincode <span>*</span></label>
                                                    <input type="text" name="shipping_pincode" placeholder="Pincode">
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-12">
                                                <div class="default-form-box">
                                                    <label>Street Address <span>*</span></label>
                                                    <textarea name="shipping_address" placeholder="House number and street name" style="height: 100px;"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <label class="checkbox-default" for="newAccount" data-bs-toggle="collapse"
                                data-bs-target="#newAccountPassword">
                                <input type="checkbox" id="newAccount">
                                <span>Create an account?</span>
                            </label>
                            <div id="newAccountPassword" class="collapse mt-3" data-parent="#newAccountPassword">
                                <div class="card-body1 default-form-box">
                                    <label> Account password <span>*</span></label>
                                    <input placeholder="password" type="password">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-md-12">
                            <h3>Your order</h3>
                            <div class="order_table table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                        @foreach ($cart_data as $list)
                                            @php
                                                $totalPrice = $totalPrice + $list->price * $list->qty;
                                                $gst = $list->tax_value;
                                            @endphp
                                            <tr>
                                                <td>
                                                    <span style="color:black;">{{ $list->name }} <strong> ×
                                                            {{ $list->qty }}</strong></span>
                                                    / <span class="cart_color"
                                                        style="color:{{ $list->color }};font-weight:bold;">{{ $list->color }}</span>
                                                </td>
                                                <td style="text-align: center;">
                                                    &#8377;{{ number_format($list->price * $list->qty, 2) }}</td>
                                            </tr>
                                        @endforeach
                                        @php
                                            $gstRate = $gst / 100;
                                            $gstAmount = $totalPrice * $gstRate;
                                            $totalPriceWithGst = $totalPrice + $gstAmount;
                                        @endphp
                                        <tr class="order_total">
                                            <td>GST({{ $gst }}%) </td>
                                            <td id="total_price" style="text-align: center;"><strong>
                                                    &#8377;{{ number_format($gstAmount, 2) }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="order_total">
                                            <th>Order Total</th>
                                            <td id="total_price" style="text-align: center;"><strong>
                                                    &#8377;{{ number_format($totalPriceWithGst, 2) }}
                                                </strong></td>
                                            <input type="hidden" value="{{ $totalPriceWithGst }}" name="totalPrice"
                                                id="totalPrice">
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment_method">
                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyCod">
                                        <input type="radio" id="cod" name="payment_type" value="cod"
                                            onchange="document.getElementById('paymentOption').value = 'cod';">
                                        <span>Cash on Delivery</span>
                                    </label>
                                </div>
                                <input type="hidden" id="paymentOption" name="paymentOption" value="">

                                <div class="panel-default">
                                    <label class="checkbox-default" for="currencyPaypal">
                                        <input type="radio" id="gateway" name="payment_type" value="gateway"
                                            onchange="document.getElementById('paymentOption').value = 'gateway';">
                                        <span>Razerpay</span>
                                    </label>
                                </div>
                                <span class="error-message" id="paymentTypeError"></span>
                                <div class="order_button pt-3">
                                    <div id="order_place_msg" style="color: red;"></div>
                                    <button class="btn btn-md btn-black-default-hover" type="Submit"
                                        class="aa-browse-btn" id="btnPlaceOrder">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <script src="{{ asset('country.js') }}"></script>
    <script>
        const customerCountry = "{{ $users['country'] ?? '' }}";
        const countrySelect = document.getElementById('country');
        countryList.forEach(function(country) {
            let option = document.createElement('option');
            option.value = country;
            option.text = country;
            if (country === customerCountry) {
                option.selected = true;
            }
            countrySelect.appendChild(option);
        });
        countrySelect.style.backgroundColor = 'lightblue';
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const shipCountry = document.getElementById("shipping_country");

            if (typeof shipping_country_list !== "undefined" && Array.isArray(shipping_country_list)) {
                shipping_country_list.forEach(function(shipping_country) {
                    let option = document.createElement("option");
                    option.value = shipping_country;
                    option.text = shipping_country;
                    shipCountry.appendChild(option);
                });
            } else {
                console.error("shipping_country_list is not defined or not an array.");
            }
        });
    </script>

    <style>
        .error-border {
            border: 1px solid red !important;
        }

        .error-message {
            color: red;
            font-size: 0.9em;
        }
    </style>
@endsection
