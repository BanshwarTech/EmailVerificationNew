@extends('Front.layouts.app')
@section('page_title', 'Chanage Password')
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
    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-12 col-md-12">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>Chanage Password</h3>

                        <form id="frmUpdatePassword">
                            @csrf
                            <div class="row">
                                <div class="col-6 default-form-box">
                                    <label>Password<span>*</span></label>
                                    <input type="Password" name="Password" id="Password" placeholder="Password">
                                </div>
                            </div>

                            <div class="">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit"
                                    id="btnUpdatePassword">Update
                                    Password</button>
                            </div>
                            <div id="thank_you_msg" class="field_error"></div>
                        </form>
                    </div>
                </div>
                <!--login area start-->


            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
@endsection
