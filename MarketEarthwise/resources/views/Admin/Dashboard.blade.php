@extends('Admin.layouts.app')
@section('page_title', 'Dashboard')
@section('admin-content')
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-12">
                <div class="row">

                    <!-- Sales Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card sales-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>
                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Sales <span>| Today</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-cart"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>145</h6>
                                        <span class="text-success small pt-1 fw-bold">12%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Sales Card -->

                    <!-- Revenue Card -->
                    <div class="col-xxl-4 col-md-4">
                        <div class="card info-card revenue-card">

                            <div class="filter">
                                <a class="icon" href="#" data-bs-toggle="dropdown"><i
                                        class="bi bi-three-dots"></i></a>
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                    <li class="dropdown-header text-start">
                                        <h6>Filter</h6>
                                    </li>

                                    <li><a class="dropdown-item" href="#">Today</a></li>
                                    <li><a class="dropdown-item" href="#">This Month</a></li>
                                    <li><a class="dropdown-item" href="#">This Year</a></li>
                                </ul>
                            </div>

                            <div class="card-body">
                                <h5 class="card-title">Revenue <span>| This Month</span></h5>

                                <div class="d-flex align-items-center">
                                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                        <i class="bi bi-currency-dollar"></i>
                                    </div>
                                    <div class="ps-3">
                                        <h6>$3,264</h6>
                                        <span class="text-success small pt-1 fw-bold">8%</span> <span
                                            class="text-muted small pt-2 ps-1">increase</span>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div><!-- End Revenue Card -->

                    <div class="col-xxl-12 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">User Details</div>
                                @php
                                    foreach ($data as $results) {
                                        print_r($results);
                                    }

                                @endphp
                                <form class="row g-3" method="post" action="{{ route('profile.update') }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <input type="hidden" value="{{ $data[0]->id }}" name="id">
                                    <div class="col-12 col-md-6 col-xxl-6 ">
                                        <div class="form-floating shadow-sm">
                                            <input type="text" class="form-control" name="username" id="username"
                                                value="{{ $data[0]->name }}" placeholder="Enter Username">
                                            <label for="username" class="form-label ms-1">User Name</label>
                                            @error('username')
                                                <div class="error-message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xxl-6">
                                        <div class="form-floating shadow-sm">
                                            <input type="text" class="form-control" name="useremail" id="useremail"
                                                value="{{ $data[0]->email }}" placeholder="Enter Useremail">
                                            <label for="useremail" class="form-label ms-1">Usermail</label>
                                            @error('useremail')
                                                <div class="error-message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xxl-6">
                                        <div class="form-floating shadow-sm">
                                            <input type="password" class="form-control" name="password" id="pass"
                                                value="{{ $data[0]->password }}" placeholder="Enter UserPassword">
                                            <label for="password" class="form-label ms-1">User Password</label>
                                            <span class="eye-icon" onclick="togglePass()">
                                                <i id="toggleIcon" class="bi bi-eye-slash"></i>
                                            </span>
                                            @error('password')
                                                <div class="error-message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-6 col-xxl-6">
                                        <div class="form-floating shadow-sm">
                                            <input type="file" class="form-control" name="profile" id="profile">
                                            <label for="profile" class="form-label ms-1">User Profile</label>
                                        </div>
                                        @error('profile')
                                            <div class="error-message">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6 col-xxl-6 form-floating">
                                        <input type="submit" value="Update" class="btn btn-primary btn-sm">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div><!-- End Left side columns -->

        </div>
    </section>

    <script>
        function togglePass() {
            const passwordInput = document.getElementById('pass');
            const toggleIcon = document.getElementById('toggleIcon');
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            toggleIcon.className = isPassword ? 'bi bi-eye' : 'bi bi-eye-slash';
        }
    </script>
@endsection
