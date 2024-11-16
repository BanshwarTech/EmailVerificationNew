@extends('Front.layouts.app')
@section('page_title', 'Login')
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
                        <h3>login</h3>

                        <form action="{{ route('LoginProcess') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-6 default-form-box">
                                    <label>Email Address<span>*</span></label>
                                    <input type="email" name="email" id="email"
                                        placeholder="Enter your login email....">
                                </div>
                                <div class="col-6 default-form-box">
                                    <label>Passwords <span>*</span></label>
                                    <input type="password" name="password" id="password"
                                        placeholder=" Enter your login password....">
                                </div>
                            </div>

                            <div class="">
                                <label class="checkbox-default mb-4" for="offer">
                                    <input type="checkbox" id="rememberme" name="rememberme">
                                    <span>Remember me</span>
                                </label><br>
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Login</button>

                                <div class="d-flex justify-content-between align-items-center ">
                                    <a href="{{ url('/forgot-password') }}" class="text-primary">Lost your password?</a>
                                    <!-- First link -->

                                    <span class="text-dark">
                                        Don't have an account? <a href="{{ route('Register') }}"
                                            class="text-decoration-none fw-bold text-primary">Create
                                            an
                                            account</a>
                                    </span>
                                </div>



                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->


            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->

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
