<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Admin Login</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet"><!-- Vendor CSS Files -->
    <link href="{{ asset('assets-admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <!-- Template Main CSS File -->
    <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">
    <style>
        body {
            background-image: url('storage/media/login-background-img.png');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .form-floating .eye-icon {
            position: absolute;
            top: 50%;
            right: 10px;
            transform: translateY(-50%);
            cursor: pointer;
        }

        .card {
            backdrop-filter: blur(5px) brightness(0.8) contrast(1.2);
            background-color: rgba(65, 48, 30, 0.5);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .message {
            font-size: 12px;
            margin-bottom: -13px;
            color: red;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <main>
        <div class="container">

            <section
                class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                            <div class="d-flex justify-content-center py-4">
                                <a href="{{ url('/') }}" class="logo d-flex align-items-center w-auto">
                                    <img src="assets/img/logo.png" alt="">
                                    <span class="d-none d-lg-block text-white">EarthwishMarket</span>
                                </a>
                            </div><!-- End Logo -->

                            <div class="card mb-3">

                                <div class="card-body">

                                    <div class=" pb-2">
                                        <h5 class="card-title fs-4 text-light"><span>Welcome Back
                                                &#128075;</span><br>Continue to Your Account</h5>

                                    </div>


                                    <form class="row g-3" method="post" action="{{ route('admin.auth') }}">
                                        @csrf
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="text" name="useremail" class="form-control"
                                                    id="youruseremail">

                                                <label for="youruseremail"
                                                    class="form-label text-black">Username</label>
                                                @error('useremail')
                                                    <div class="message">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-floating position-relative">
                                                <input type="password" name="password" class="form-control"
                                                    id="yourPassword">
                                                @error('password')
                                                    <div class=" message pb-0 ">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                                <label for="yourPassword" class="form-label text-black">Password</label>
                                                <span class="eye-icon" onclick="togglePassword()">
                                                    <i id="toggleIcon" class="bi bi-eye-slash"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" type="checkbox" name="remember"
                                                    value="true" id="rememberMe" checked>
                                                <label class="form-check-label text-white fs-6"
                                                    for="rememberMe">Remember
                                                    me</label>
                                            </div>
                                            @error('remember')
                                                <div class="message" style="font-size: 12px;">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100" type="submit">Continue<i
                                                    class="bx bxs-chevron-right"></i></button>
                                        </div>
                                        <div class="col-12">
                                            <p class="small mb-0 text-white">Don't have account? <a
                                                    href="{{ url('/') }}">back
                                                    to home</a></p>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            @if (session('successMessage') || session('errorMessage'))
                                <div class="toast-container position-fixed bottom-0 end-0 p-3">
                                    <div class="toast @if (session('successMessage')) bg-success text-white @else bg-danger text-white @endif"
                                        role="alert" aria-live="assertive" aria-atomic="true">
                                        <div class="toast-header">
                                            @if (session('successMessage'))
                                                <i class="bi bi-check-circle-fill"></i>
                                            @else
                                                <i class="bx bxs-info-circle"></i>
                                            @endif
                                            &nbsp;&nbsp;
                                            <strong class="me-auto">
                                                @if (session('successMessage'))
                                                    Success
                                                @else
                                                    Error
                                                @endif
                                            </strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="toast"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="toast-body">
                                            {{ session('successMessage') ?? session('errorMessage') }}
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            </section>

        </div>
    </main><!-- End #main -->

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets-admin/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('assets-admin/vendor/php-email-form/validate.js') }}"></script>
    <!-- Template Main JS File -->
    <script src="{{ asset('assets-admin/js/main.js') }}"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastElList = [].slice.call(document.querySelectorAll('.toast'));
            const toastList = toastElList.map(function(toastEl) {
                return new bootstrap.Toast(toastEl);
            });
            toastList.forEach(toast => toast.show());
        });

        function togglePassword() {
            const passwordInput = document.getElementById('yourPassword');
            const toggleIcon = document.getElementById('toggleIcon');
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            toggleIcon.className = isPassword ? 'bi bi-eye' : 'bi bi-eye-slash';
        }
    </script>
</body>

</html>
