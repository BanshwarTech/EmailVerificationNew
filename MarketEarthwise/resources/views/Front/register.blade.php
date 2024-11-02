@extends('Front.layouts.app')
@section('page_title', 'Register')
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


                <!--register area start-->
                <div class="col-lg-12 col-md-6">
                    <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                        <h3>Register</h3>
                        <form action="{{ route('RegisterProcess') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-6 default-form-box">
                                    <label>Name <span>*</span></label>
                                    <input type="text" name="name" id="name" placeholder="Enter your name" />
                                </div>
                                <div class="col-6 default-form-box">
                                    <label>Email <span>*</span></label>
                                    <input type="email" name="email" id="email" placeholder="enter your email"
                                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
                                        title="Please enter a valid email address">
                                </div>
                                <div class="col-6 default-form-box">
                                    <label>Mobile Number <span>*</span></label>
                                    <input type="number" name="mobile" id="mobile" pattern="[6-9][0-9]{9}"
                                        placeholder="Enter 10-digit mobile number" maxlength="10"
                                        title="Please enter a valid 10-digit mobile number" required
                                        oninput="this.value = this.value.replace(/[^0-9]/g, '');">
                                </div>
                                <div class="col-6 default-form-box">
                                    <label>Passwords <span>*</span></label>
                                    <input type="password" name="password" id="password" placeholder="enter password"
                                        pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
                                        title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                                </div>
                            </div>

                            <div class="">
                                <button class="btn btn-md btn-black-default-hover mb-1" type="submit">Register</button><br>
                                <span>Already have an account? <a href="{{ url('/login') }}" class="text-primary"> Log
                                        in</a></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->
    <script>
        setTimeout(function() {
            document.querySelector('.alert').remove();
        }, 8000);
    </script>
@endsection
