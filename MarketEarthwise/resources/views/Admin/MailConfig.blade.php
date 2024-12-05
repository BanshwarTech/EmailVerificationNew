@extends('Admin.layouts.app')
@section('page_title', ' Mail Config')
@section('admin-content')
    <div class="pagetitle d-flex justify-content-between align-items-center">
        <div>
            <h1>@yield('page_title')</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item">@yield('page_title')</li>
                </ol>
            </nav>
        </div>
    </div>
    <section class="section">
        <div class="row">


            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Mail Configuration</h5>


                        <form class="row g-3 " method="post" action="{{ route('Mail.Config.Process') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}" />
                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="text" class="form-control" id="MAIL_MAILER" name="MAIL_MAILER"
                                        value="{{ $data[0]->MAIL_MAILER ?? '' }}">
                                    <label for="MAIL_MAILER" class="form-label">MAIL MAILER</label>
                                </div>
                                @error('MAIL_MAILER')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="text" class="form-control" id="MAIL_HOST" name="MAIL_HOST"
                                        value="{{ $data[0]->MAIL_HOST ?? '' }}">
                                    <label for="MAIL_HOST" class="form-label">MAIL HOST</label>
                                </div>
                                @error('MAIL_HOST')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="text" class="form-control" id="MAIL_PORT" name="MAIL_PORT"
                                        value="{{ $data[0]->MAIL_PORT ?? '' }}">
                                    <label for="MAIL_PORT" class="form-label">MAIL PORT</label>
                                </div>
                                @error('MAIL_PORT')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="text" class="form-control" id="MAIL_USERNAME" name="MAIL_USERNAME"
                                        value="{{ $data[0]->MAIL_USERNAME ?? '' }}">
                                    <label for="MAIL_USERNAME" class="form-label">MAIL USERNAME</label>
                                </div>
                                @error('MAIL_USERNAME')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="password" class="form-control" id="MAIL_PASSWORD" name="MAIL_PASSWORD"
                                        value="{{ $data[0]->MAIL_PASSWORD ?? '' }}">
                                    <label for="MAIL_PASSWORD" class="form-label">MAIL PASSWORD</label>
                                    <span class="eye-icon" onclick="togglePassword()">
                                        <i id="toggleIcon" class="bi bi-eye-slash"></i>
                                    </span>
                                </div>
                                @error('MAIL_PASSWORD')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="text" class="form-control" id="MAIL_ENCRYPTION" name="MAIL_ENCRYPTION"
                                        value="{{ $data[0]->MAIL_ENCRYPTION ?? '' }}">
                                    <label for="MAIL_ENCRYPTION" class="form-label">MAIL ENCRYPTION</label>
                                </div>
                                @error('MAIL_ENCRYPTION')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="text" class="form-control" id="MAIL_FROM_ADDRESS"
                                        name="MAIL_FROM_ADDRESS" value="{{ $data[0]->MAIL_FROM_ADDRESS ?? '' }}">
                                    <label for="MAIL_FROM_ADDRESS" class="form-label">MAIL FROM ADDRESS</label>
                                </div>
                                @error('MAIL_FROM_ADDRESS')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="text" class="form-control" id="MAIL_FROM_NAME" name="MAIL_FROM_NAME"
                                        value="{{ $data[0]->MAIL_FROM_NAME ?? '' }}">
                                    <label for="MAIL_FROM_NAME" class="form-label">MAIL FROM NAME</label>
                                </div>
                                @error('MAIL_FROM_NAME')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form><!-- End Custom Styled Validation -->

                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
