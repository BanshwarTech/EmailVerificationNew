<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/97ebc2bc67.js" crossorigin="anonymous"></script>
    <!-- Include jQuery (Required for Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr CSS & JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        $(document).ready(function() {
            toastr.options = {
                "progressBar": true,
                "positionClass": "toast-bottom-left",
                "closeButton": true,
                "timeOut": "5000" // 5 seconds
            };

            @if (session()->has('success'))
                toastr.success("{{ session('success') }}");
                <?php session()->forget('success'); ?>
            @endif

            @if (session()->has('error'))
                toastr.error("{{ session('error') }}");
                <?php session()->forget('error'); ?>
            @endif
        });
    </script>


    <style>
        .divider:after,
        .divider:before {
            content: "";
            flex: 1;
            height: 1px;
            background: #eee;
        }

        .h-custom {
            height: calc(100% - 73px);
        }

        @media (max-width: 450px) {
            .h-custom {
                height: 100%;
            }
        }

        .input-group-text {
            cursor: pointer;
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
    <section class="vh-100">
        <div class="container-fluid h-custom">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-md-9 col-lg-6 col-xl-5">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
                        class="img-fluid" alt="Sample image">
                </div>
                <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
                    <form action="{{ route('admin.login.process') }}" method="post">
                        @csrf
                        <div class=" d-flex align-items-center my-4">
                            <p class="text-center fw-bold mx-3 mb-0">Admin Login</p>
                        </div>

                        <!-- Email input -->
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="floatingInput" name="useremail">
                            <label for="floatingInput">Email address</label>
                            @error('useremail')
                                <div class="message">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password input -->
                        <div class="input-group mb-3">
                            <div class="form-floating">
                                <input type="password" class="form-control" id="password" name="userpassword">
                                <label for="password">Password</label>
                                @error('userpassword')
                                    <div class="message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <span class="input-group-text" onclick="togglePassword()">
                                <i id="toggleIcon" class="fa-solid fa-eye-slash"></i>
                            </span>
                        </div>

                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Checkbox -->
                            <div class="form-check mb-0">
                                <input class="form-check-input me-2" type="checkbox" name="remember-me" />
                                <label class="form-check-label" for="form2Example3">
                                    Remember me
                                </label>
                                @error('remember-me')
                                    <div class="message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <a href="#!" class="text-body">Forgot password?</a>
                        </div>

                        <div class="text-center text-lg-start mt-4 pt-2">
                            <button type="submit" data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-primary btn-lg"
                                style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                            <p class="small fw-bold mt-2 pt-1 mb-0">Back to Home <a href="{{ route('home') }}"
                                    class="link-danger">Home</a></p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
        <div
            class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
            <!-- Copyright -->
            <div class="text-white mb-3 mb-md-0">
                Copyright © {{ date('Y') }}. All rights reserved.
            </div>

            <!-- Copyright -->

            <!-- Right -->
            <div>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#!" class="text-white me-4">
                    <i class="fab fa-google"></i>
                </a>
                <a href="#!" class="text-white">
                    <i class="fab fa-linkedin-in"></i>
                </a>
            </div>
            <!-- Right -->
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>





    <script>
        function togglePassword() {
            let passwordField = document.getElementById("password");
            let toggleIcon = document.getElementById("toggleIcon");

            if (passwordField.type === "password") {
                passwordField.type = "text";
                toggleIcon.classList.remove("fa-eye-slash");
                toggleIcon.classList.add("fa-eye");
            } else {
                passwordField.type = "password";
                toggleIcon.classList.remove("fa-eye");
                toggleIcon.classList.add("fa-eye-slash");
            }
        }
    </script>


</body>

</html>
