@extends('Front.layouts.app')
@section('page_title', 'My Account')
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
    <!-- ...:::: Start Account Dashboard Section:::... -->
    <div class="account-dashboard">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-3 col-lg-3">
                    <!-- Nav tabs -->
                    <div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
                        <ul role="tablist" class="nav flex-column dashboard-list">


                            <li><a href="#dashboard" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover active">Dashboard</a>
                            </li>
                            <li> <a href="#orders" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Orders</a></li>
                            <li><a href="#downloads" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Downloads</a></li>
                            <li><a href="#address" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Addresses</a></li>
                            <li><a href="#account-details" data-bs-toggle="tab"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">Account details</a>
                            </li>
                            <li><a href="{{ url('/logout') }}"
                                    class="nav-link btn btn-block btn-md btn-black-default-hover">logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-9">
                    <!-- Tab panes -->
                    <div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
                        <div class="tab-pane fade show active" id="dashboard">
                            <h4>Dashboard </h4>
                            <p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
                                    orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a
                                    href="#">Edit your password and account details.</a></p>
                        </div>
                        <div class="tab-pane fade" id="orders">
                            <h4>Orders</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Order Id</th>
                                            <th>Payment Status</th>
                                            <th>Total Amt</th>
                                            <th>Payment ID</th>
                                            <th>Placed At</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $list)
                                            <tr>
                                                <td class="order_id_btn"><a
                                                        href="{{ url('order_detail') }}/{{ $list->id }}"
                                                        class="text-primary">{{ $list->order_id }}</a>
                                                </td>
                                                <td>{{ $list->payment_status }}</td>
                                                <td>{{ $list->total_amt }}</td>
                                                <td>{{ $list->payment_id }}</td>

                                                <td>{{ $list->added_on }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="page-pagination text-center aos-init aos-animate" data-aos="fade-up"
                                    data-aos-delay="0">
                                    <ul>
                                        {{ $orders->links('pagination::bootstrap-5') }}

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="downloads">
                            <h4>Downloads</h4>
                            <div class="table_page table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Downloads</th>
                                            <th>Expires</th>
                                            <th>Download</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shopnovilla - Free Real Estate PSD Template</td>
                                            <td>May 10, 2018</td>
                                            <td><span class="danger">Expired</span></td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                        <tr>
                                            <td>Organic - ecommerce html template</td>
                                            <td>Sep 11, 2018</td>
                                            <td>Never</td>
                                            <td><a href="#" class="view">Click Here To Download Your File</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="address">
                            <p>The following addresses will be used on the checkout page by default.</p>
                            <h5 class="billing-address">Billing address</h5>
                            <a href="#" class="view">Edit</a>

                            @foreach ($addresses as $add)
                                <p><strong>{{ $add->name }}
                                    </strong></p>
                                <address style="margin-top: -20px !important;">
                                    {{ $add->address }}

                                </address>
                            @endforeach
                        </div>
                        <div class="tab-pane fade" id="account-details">
                            <h3>Account details </h3>
                            <div class="login">
                                <div class="login_form_container">
                                    <div class="account_login_form">
                                        <form action="{{ route('update.AccountDetails') }}" method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $id }}">
                                            <div class="input-radio mt-3">
                                                <span class="custom-radio">
                                                    <input type="radio" value="male" name="gender"
                                                        {{ $gender == 'male' ? 'checked' : '' }}> Mr.
                                                </span>
                                                <span class="custom-radio">
                                                    <input type="radio" value="female" name="gender"
                                                        {{ $gender == 'female' ? 'checked' : '' }}> Mrs.
                                                </span>
                                            </div>

                                            <div class="default-form-box mb-20">
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{ $name }}">
                                            </div>
                                            <div class="row">
                                                <div class="col-4 default-form-box mb-20">
                                                    <label>Email</label>
                                                    <input type="text" name="email" value="{{ $email }}">
                                                </div>
                                                <div class="col-4 default-form-box mb-20">
                                                    <label>Birthdate</label>
                                                    <input type="date" name="dob" value="{{ $dob }}">
                                                </div>
                                                <div class="col-4 default-form-box mb-20">
                                                    <label>Mobile Number</label>
                                                    <input type="number" name="mobile" value="{{ $mobile }}">
                                                </div>
                                            </div>

                                            <div class="default-form-box mb-20">
                                                <label>Address</label>
                                                <textarea rows="1" style="height: 80px;" name="address">{{ $address }}</textarea>
                                            </div>
                                            <div class="row">
                                                <div class="col-3 default-form-box mb-20">
                                                    <label>Country</label>
                                                    <input type="text" name="country" value="{{ $country }}">
                                                </div>
                                                <div class="col-3 default-form-box mb-20">
                                                    <label>City</label>
                                                    <input type="text" name="city" value="{{ $city }}">
                                                </div>
                                                <div class="col-3 default-form-box mb-20">
                                                    <label>State</label>
                                                    <input type="text" name="state" value="{{ $state }}">
                                                </div>
                                                <div class="col- default-form-box mb-20">
                                                    <label>ZipCode</label>
                                                    <input type="number" name="zip" value="{{ $zip }}">
                                                </div>
                                            </div>

                                            <div class="save_button mt-3">
                                                <button class="btn btn-md btn-black-default-hover"
                                                    type="submit">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Account Dashboard Section:::... -->
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
