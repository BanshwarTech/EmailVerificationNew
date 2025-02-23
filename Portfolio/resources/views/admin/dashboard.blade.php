@extends('admin.Includes.app')
@section('page_title', 'Dashboard')
@section('content')
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-7">
                                <div class="card-body">
                                    <h5 class="card-title text-primary">Congratulations {{ session('ADMIN_NAME') }}! 🎉
                                    </h5>
                                    <p class="mb-4">
                                        You have done <span class="fw-bold">72%</span> more sales today.
                                        Check your new badge in
                                        your profile.
                                    </p>

                                    <a href="javascript:;" class="btn btn-sm btn-outline-primary">View
                                        Badges</a>
                                </div>
                            </div>
                            <div class="col-sm-5 text-center text-sm-left">
                                <div class="card-body pb-0 px-0 px-md-4">
                                    <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}"
                                        height="140" alt="View Badge User"
                                        data-app-dark-img="illustrations/man-with-laptop-dark')}}"
                                        data-app-light-img="illustrations/man-with-laptop-light')}}" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Active Header Menus
                        </div>

                        <div class="card-body">
                            @foreach ($menu as $m)
                                <form action="{{ route('update.menu', $m->id) }}" method="POST">
                                    @csrf

                                    <div class="form-check form-switch mb-2">
                                        <input type="hidden" name="Home" value="0">
                                        <input class="form-check-input" type="checkbox" name="Home"
                                            id="homeSwitch{{ $m->id }}" value="1"
                                            {{ $m->Home ? 'checked' : '' }} onchange="this.form.submit()">
                                        <label class="form-check-label" for="homeSwitch{{ $m->id }}">Enable
                                            Home</label>
                                    </div>

                                    <div class="form-check form-switch mb-2">
                                        <input type="hidden" name="About" value="0">
                                        <input class="form-check-input" type="checkbox" name="About"
                                            id="aboutSwitch{{ $m->id }}" value="1"
                                            {{ $m->About ? 'checked' : '' }} onchange="this.form.submit()">
                                        <label class="form-check-label" for="aboutSwitch{{ $m->id }}">Enable
                                            About</label>
                                    </div>

                                    <div class="form-check form-switch mb-2">
                                        <input type="hidden" name="Skill" value="0">
                                        <input class="form-check-input" type="checkbox" name="Skill"
                                            id="skillSwitch{{ $m->id }}" value="1"
                                            {{ $m->Skill ? 'checked' : '' }} onchange="this.form.submit()">
                                        <label class="form-check-label" for="skillSwitch{{ $m->id }}">Enable
                                            Skill</label>
                                    </div>

                                    <div class="form-check form-switch mb-2">
                                        <input type="hidden" name="EduExp" value="0">
                                        <input class="form-check-input" type="checkbox" name="EduExp"
                                            id="eduExpSwitch{{ $m->id }}" value="1"
                                            {{ $m->EduExp ? 'checked' : '' }} onchange="this.form.submit()">
                                        <label class="form-check-label" for="eduExpSwitch{{ $m->id }}">Enable
                                            Education & Experience</label>
                                    </div>

                                    <div class="form-check form-switch mb-2">
                                        <input type="hidden" name="Project" value="0">
                                        <input class="form-check-input" type="checkbox" name="Project"
                                            id="projectSwitch{{ $m->id }}" value="1"
                                            {{ $m->Project ? 'checked' : '' }} onchange="this.form.submit()">
                                        <label class="form-check-label" for="projectSwitch{{ $m->id }}">Enable
                                            Projects</label>
                                    </div>

                                    <div class="form-check form-switch mb-2">
                                        <input type="hidden" name="Contact" value="0">
                                        <input class="form-check-input" type="checkbox" name="Contact"
                                            id="contactSwitch{{ $m->id }}" value="1"
                                            {{ $m->Contact ? 'checked' : '' }} onchange="this.form.submit()">
                                        <label class="form-check-label" for="contactSwitch{{ $m->id }}">Enable
                                            Contact</label>
                                    </div>
                                </form>
                            @endforeach




                        </div>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Update Login Password
                        </div>

                        <div class="card-body">
                            @foreach ($login as $log)
                                <form action="{{ route('update.login.password', $log->id) }}" method="POST"
                                    class="row g-3">
                                    @csrf

                                    <div class="form-floating col-lg-6">
                                        <input type="text" name="name" id="name" class="form-control ms-2"
                                            placeholder="Name" value="{{ $log->name }}">
                                        <label for="name">Name</label>
                                        @error('name')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating col-lg-6">
                                        <input type="email" name="email" id="email" class="form-control ms-2"
                                            placeholder="Email" value="{{ $log->email }}">
                                        <label for="email">Email</label>
                                        @error('email')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-floating position-relative">
                                        <input type="password" name="password" id="password" class="form-control ms-2"
                                            placeholder="New Password" value="{{ $log->password }}">
                                        <label for="password">Password <sup class="text-danger fw-bold">If changing the
                                                password,
                                                remove the old one first. Otherwise, you may lose access.</sup></label>

                                        <!-- Toggle Button -->
                                        <span onclick="togglePassword()"
                                            class="position-absolute top-50 end-0 translate-middle-y me-3 cursor-pointer">
                                            <i id="toggleIcon" class="fa-solid fa-eye-slash"></i>
                                        </span>

                                        @error('password')
                                            <div class="text-danger small">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <input type="submit" value="Update Password" class="btn btn-primary">
                                </form>
                            @endforeach





                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->
        <!-- Footer -->
        {{-- <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
                </div>
                <div>
                    <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blank">License</a>
                    <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More
                        Themes</a>

                    <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                        target="_blank" class="footer-link me-4">Documentation</a>

                    <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                        class="footer-link me-4">Support</a>
                </div>
            </div>
        </footer> --}}
        <!-- / Footer -->
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
        <div class="content-backdrop fade"></div>
    </div>
@endsection
