@extends('admin.Includes.app')
@section('page_title', 'Connection')
@section('content')

    <style>
        i {
            font-size: 25px;
            color: #3B5998;
        }
    </style>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Account Settings / </span> Connections
            </h4>

            <div class="row">
                <div class="col-md-12">
                    <ul class="nav nav-pills flex-column flex-md-row mb-3">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin.home.data') }}"><i class="bx bx-user me-1"></i>
                                Account</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('admin.home.connection') }}"><i
                                    class="bx bx-link-alt me-1"></i>
                                Connections</a>
                        </li>
                    </ul>
                    <div class="row">
                        <div class="col-md-6 col-12 mb-md-0 mb-4">
                            <div class="card">
                                <h5 class="card-header">Connected Accounts</h5>
                                <div class="card-body">
                                    <p>Display content from your connected accounts on your site</p>
                                    <!-- Connections -->
                                    @foreach ($accounts as $account)
                                        @if ($account->account_type === 'other')
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('storage/uploads/account/' . $account->account_related_image) }}"
                                                        alt="{{ $account->account_related_image }}" class="me-3"
                                                        height="30" />
                                                </div>
                                                <div class="flex-grow-1 row">
                                                    <div class="col-9 mb-sm-0 mb-2">
                                                        <h6 class="mb-0">{{ $account->account_name }}</h6>
                                                        <small class="text-muted">{{ $account->account_id }}</small>
                                                    </div>
                                                    <div class="col-3 text-end">
                                                        <div class="form-check form-switch">

                                                            <input class="form-check-input float-end" type="checkbox"
                                                                role="switch"
                                                                {{ $account->is_del == 0 ? 'checked' : '' }} />


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach

                                    <!-- /Connections -->
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="card">
                                <h5 class="card-header">Social Accounts</h5>
                                <div class="card-body">
                                    <p>Display content from social accounts on your site</p>
                                    <!-- Social Accounts -->
                                    @foreach ($accounts as $account)
                                        @if ($account->account_type === 'social')
                                            <div class="d-flex mb-3">
                                                <div class="flex-shrink-0">
                                                    <img src="{{ asset('storage/uploads/account/' . $account->account_related_image) }}"
                                                        alt="{{ $account->account_related_image }}" class="me-3"
                                                        height="30" />
                                                </div>
                                                <div class="flex-grow-1 row">
                                                    <div class="col-8 col-sm-7 mb-sm-0 mb-2">
                                                        <h6 class="mb-0">{{ $account->account_name }}</h6>
                                                        <small class="text-muted">{{ $account->account_id }}</small>
                                                    </div>
                                                    <div class="col-4 col-sm-5 text-end">
                                                        <a href="{{ $account->account_link }}"
                                                            class="btn btn-icon btn-outline-secondary">
                                                            <i class="bx bx-link-alt"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                    <!-- /Social Accounts -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
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
                    <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                    <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/"
                        target="_blank" class="footer-link me-4">Documentation</a>

                    <a href="https://github.com/themeselection/sneat-html-admin-template-free/issues" target="_blank"
                        class="footer-link me-4">Support</a>
                </div>
            </div>
        </footer>
        <!-- / Footer -->

        <div class="content-backdrop fade"></div>
    </div>
    <!-- Content wrapper -->
@endsection
