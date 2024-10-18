@extends('Front.layouts.app')
@section('page_title', 'Verification')
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
                <div class="col-lg-6 col-md-6">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>Verification Otp</h3>
                        <p id="message_error" style="color:red;"></p>
                        <p id="message_success" style="color:green;"></p>
                        <form method="post" id="verificationForm">
                            @csrf
                            <div class="row">
                                <div class="col-12 default-form-box">
                                    <input type="hidden" name="email" value="{{ $email }}">
                                    <input type="number" name="otp" placeholder="Enter OTP" required>

                                </div>
                            </div>
                            <div class="login_submit">
                                <p class="time"></p>
                                <div class="d-flex">
                                    <button type="submit" class="btn btn-md btn-black-default-hover mb-4"
                                        value="Verify">Verify</button> &nbsp;&nbsp;
                                    <button id="resendOtpVerification"
                                        class="btn btn-md btn-black-default-hover mb-4">Resend
                                        Verification OTP</button>
                                </div>


                            </div>



                        </form>
                    </div>
                </div>
                <!--login area start-->


            </div>
        </div>
    </div> <!-- ...:::: End Customer Login Section :::... -->






    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#verificationForm').submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('verifiedOtp') }}",
                    type: "POST",
                    data: formData,
                    success: function(res) {
                        if (res.success) {
                            alert(res.msg);
                            window.open("/login", "_self");
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                        }
                    }
                });

            });

            $('#resendOtpVerification').click(function() {
                $(this).text('Wait...');
                var userMail = @json($email);

                $.ajax({
                    url: "{{ route('resendOtp') }}",
                    type: "GET",
                    data: {
                        email: userMail
                    },
                    success: function(res) {
                        $('#resendOtpVerification').text('Resend Verification OTP');
                        if (res.success) {
                            timer();
                            $('#message_success').text(res.msg);
                            setTimeout(() => {
                                $('#message_success').text('');
                            }, 3000);
                        } else {
                            $('#message_error').text(res.msg);
                            setTimeout(() => {
                                $('#message_error').text('');
                            }, 3000);
                        }
                    }
                });

            });
        });

        function timer() {
            var seconds = 30;
            var minutes = 1;

            var timer = setInterval(() => {

                if (minutes < 0) {
                    $('.time').text('');
                    clearInterval(timer);
                } else {
                    let tempMinutes = minutes.toString().length > 1 ? minutes : '0' + minutes;
                    let tempSeconds = seconds.toString().length > 1 ? seconds : '0' + seconds;

                    $('.time').text(tempMinutes + ':' + tempSeconds);
                }

                if (seconds <= 0) {
                    minutes--;
                    seconds = 59;
                }

                seconds--;

            }, 1000);
        }

        timer();
    </script>
@endsection
