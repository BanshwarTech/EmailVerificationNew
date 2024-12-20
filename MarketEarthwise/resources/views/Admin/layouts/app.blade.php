@if (session('ADMIN_LOGIN') && session('ADMIN_LOGIN') == true)





    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta content="width=device-width, initial-scale=1.0" name="viewport">

        <title>@yield('page_title') - EarthwishMarket </title>
        <meta content="" name="description">
        <meta content="" name="keywords">

        <!-- Favicons -->
        <link href="{{ asset('assets-admin/img/favicon.png') }}" rel="icon">
        <link href="{{ asset('assets-admin/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

        <!-- Google Fonts -->
        <link href="{{ asset('https://fonts.gstatic.com') }}" rel="preconnect">
        <link
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
            rel="stylesheet">

        <!-- Vendor CSS Files -->
        <link href="{{ asset('assets-admin/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-admin/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-admin/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-admin/vendor/quill/quill.snow.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-admin/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-admin/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
        <link href="{{ asset('assets-admin/vendor/simple-datatables/style.css') }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
        <!-- Template Main CSS File -->
        <link href="{{ asset('assets-admin/css/style.css') }}" rel="stylesheet">


        <style>
            .error-message {
                font-size: 10px;
                color: red;
                font-weight: bold;
            }

            .form-floating .eye-icon {
                position: absolute;
                top: 50%;
                right: 10px;
                transform: translateY(-50%);
                cursor: pointer;
            }
        </style>
    </head>

    <body>

        <!-- ======= Header ======= -->
        <header id="header" class="header fixed-top d-flex align-items-center">

            <div class="d-flex align-items-center justify-content-between">
                <a href="index.html" class="logo d-flex align-items-center">
                    <img src="{{ asset('assets-admin/img/logo.png') }}') }}" alt="">
                    <span class="d-none d-lg-block">EarthwishMarket</span>
                </a>
                <i class="bi bi-list toggle-sidebar-btn"></i>
            </div><!-- End Logo -->

            <div class="search-bar">
                <form class="search-form d-flex align-items-center" method="POST" action="#">
                    <input type="text" name="query" placeholder="Search" title="Enter search keyword">
                    <button type="submit" title="Search"><i class="bi bi-search"></i></button>
                </form>
            </div><!-- End Search Bar -->

            <nav class="header-nav ms-auto">
                <ul class="d-flex align-items-center">

                    <li class="nav-item d-block d-lg-none">
                        <a class="nav-link nav-icon search-bar-toggle " href="#">
                            <i class="bi bi-search"></i>
                        </a>
                    </li><!-- End Search Icon-->

                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-bell"></i>
                            <span class="badge bg-primary badge-number">4</span>
                        </a><!-- End Notification Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                            <li class="dropdown-header">
                                You have 4 new notifications
                                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View
                                        all</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-exclamation-circle text-warning"></i>
                                <div>
                                    <h4>Lorem Ipsum</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>30 min. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-x-circle text-danger"></i>
                                <div>
                                    <h4>Atque rerum nesciunt</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>1 hr. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-check-circle text-success"></i>
                                <div>
                                    <h4>Sit rerum fuga</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>2 hrs. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="notification-item">
                                <i class="bi bi-info-circle text-primary"></i>
                                <div>
                                    <h4>Dicta reprehenderit</h4>
                                    <p>Quae dolorem earum veritatis oditseno</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </li>

                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li class="dropdown-footer">
                                <a href="#">Show all notifications</a>
                            </li>

                        </ul><!-- End Notification Dropdown Items -->

                    </li><!-- End Notification Nav -->

                    <li class="nav-item dropdown">

                        <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-chat-left-text"></i>
                            <span class="badge bg-success badge-number">3</span>
                        </a><!-- End Messages Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                            <li class="dropdown-header">
                                You have 3 new messages
                                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View
                                        all</span></a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="{{ asset('assets-admin/img/messages-1.jpg') }}" alt=""
                                        class="rounded-circle">
                                    <div>
                                        <h4>Maria Hudson</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>4 hrs. ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="{{ asset('assets-admin/img/messages-2.jpg') }}" alt=""
                                        class="rounded-circle">
                                    <div>
                                        <h4>Anna Nelson</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>6 hrs. ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="message-item">
                                <a href="#">
                                    <img src="{{ asset('assets-admin/img/messages-3.jpg') }}" alt=""
                                        class="rounded-circle">
                                    <div>
                                        <h4>David Muldon</h4>
                                        <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                        <p>8 hrs. ago</p>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li class="dropdown-footer">
                                <a href="#">Show all messages</a>
                            </li>

                        </ul><!-- End Messages Dropdown Items -->

                    </li><!-- End Messages Nav -->

                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            <img src="{{ asset('assets-admin/img/profile-img.jpg') }}" alt="Profile"
                                class="rounded-circle">
                            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6>Kevin Anderson</h6>
                                <span>Web Designer</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="">
                                    <i class="bi bi-person"></i>
                                    <span>My Profile</span>
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <a class="dropdown-item d-flex align-items-center" href="{{ url('admin/logout') }}">
                                    <i class="bi bi-box-arrow-right"></i>Sign
                                    Out
                                </a>
                            </li>

                        </ul><!-- End Profile Dropdown Items -->
                    </li><!-- End Profile Nav -->

                </ul>
            </nav><!-- End Icons Navigation -->

        </header><!-- End Header -->

        <!-- ======= Sidebar ======= -->
        <aside id="sidebar" class="sidebar">

            <ul class="sidebar-nav" id="sidebar-nav">

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/dashboard') ? 'active' : '' }}"
                        href="{{ url('admin/dashboard') }}">
                        <i class="fa fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/order') || Request::is('admin/order/order_detail') || Request::is('admin/order/order_detail/{id}') ? 'active' : '' }}"
                        href="{{ url('admin/order') }}">
                        <i class="fa fa-box"></i>
                        <span>Orders</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/blog') || Request::is('admin/blog/manage_blog') ? 'active' : '' }}"
                        href="{{ url('admin/blog') }}">
                        <i class="fa fa-pen"></i>
                        <span>Blog</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/homebanner') || Request::is('admin/homebanner/manage_homebanner') ? 'active' : '' }}"
                        href="{{ url('admin/homebanner') }}">
                        <i class="fa fa-sliders-h"></i>
                        <span>Slider</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/banner') || Request::is('admin/banner/manage_banner') ? 'active' : '' }}"
                        href="{{ url('admin/banner') }}">
                        <i class="fa fa-image"></i>
                        <span>Banner</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/category') || Request::is('admin/category/manage_category') ? 'active' : '' }}"
                        href="{{ url('admin/category') }}">
                        <i class="fa fa-th-large"></i>
                        <span>Category</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/coupon') || Request::is('admin/coupon/manage_coupon') ? 'active' : '' }}"
                        href="{{ url('admin/coupon') }}">
                        <i class="fa fa-ticket-alt"></i>
                        <span>Coupon</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/size') || Request::is('admin/size/manage_size') ? 'active' : '' }}"
                        href="{{ url('admin/size') }}">
                        <i class="fa fa-ruler"></i>
                        <span>Size</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/color') || Request::is('admin/color/manage_color') ? 'active' : '' }}"
                        href="{{ url('admin/color') }}">
                        <i class="fa fa-palette"></i>
                        <span>Color</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/brand') || Request::is('admin/brand/manage_brand') ? 'active' : '' }}"
                        href="{{ url('admin/brand') }}">
                        <i class="fa fa-cogs"></i>
                        <span>Brand</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/tax') || Request::is('admin/tax/manage_tax') ? 'active' : '' }}"
                        href="{{ url('admin/tax') }}">
                        <i class="fa fa-percent"></i>
                        <span>Tax</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/product') || Request::is('admin/product/manage_product') ? 'active' : '' }}"
                        href="{{ url('admin/product') }}">
                        <i class="fa fa-cube"></i>
                        <span>Product</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/mail-config') || Request::is('admin/product/manage_product') ? 'active' : '' }}"
                        href="{{ url('admin/mail-config') }}">
                        <i class="fa fa-cogs"></i>
                        <span>Mail Configuration</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link collapsed{{ Request::is('admin/razor-pay') ? 'active' : '' }}"
                        href="{{ url('admin/razor-pay') }}">
                        <i class="fa fa-credit-card"></i>
                        <span>Razorpay Configuration</span>
                    </a>
                </li>

            </ul>


        </aside><!-- End Sidebar-->

        <main id="main" class="main">


            @section('admin-content')
            @show
            @if (session('successMessage') || session('errorMessage'))
                <div class="toast-container position-fixed top-0 end-0 p-3">
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
        </main><!-- End #main -->

        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="copyright">
                &copy; Copyright <strong><span>EarthwishMarket</span></strong>. All Rights Reserved
            </div>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
                Designed by <a href="">BootstrapMade</a>
            </div>
        </footer><!-- End Footer -->

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
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- Template Main JS File -->
        <script src="{{ asset('assets-admin/js/main.js') }}"></script>
        <script>
            setTimeout(function() {
                document.querySelector('.alert').remove();
            }, 8000);
            document.addEventListener('DOMContentLoaded', function() {
                const toastElList = [].slice.call(document.querySelectorAll('.toast'));
                const toastList = toastElList.map(function(toastEl) {
                    return new bootstrap.Toast(toastEl);
                });
                toastList.forEach(toast => toast.show());
            });


            function togglePassword() {
                const passwordInput = document.getElementById('MAIL_PASSWORD');
                const toggleIcon = document.getElementById('toggleIcon');
                const isPassword = passwordInput.type === 'password';

                passwordInput.type = isPassword ? 'text' : 'password';
                toggleIcon.className = isPassword ? 'bi bi-eye' : 'bi bi-eye-slash';
            }
        </script>
    </body>

    </html>
@else
    <script type="text/javascript">
        setTimeout(function() {
            window.location.href = '/admin';
        }, 2000);
    </script>
@endif
