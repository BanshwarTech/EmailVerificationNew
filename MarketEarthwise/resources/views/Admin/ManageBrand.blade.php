@extends('Admin.layouts.app')
@section('page_title', 'Manage Brand')
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
        <div>
            <a href="{{ url('admin/brand') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> back
            </a>

        </div>
    </div>
    <section class="section">
        <div class="row">


            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>


                        <form class="row g-3 needs-validation" method="post"
                            action="{{ route('brand.manage_brand_process') }}" enctype="multipart/form-data" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}" />
                            <div class="col-md-6">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ $name }}" required>
                                <div class="valid-feedback"> </div>
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="form-label"> Image</label>
                                <input type="file" id="image" name="image" class="form-control">
                                @error('image')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror


                                @if ($image != '')
                                    <a href="{{ asset('storage/media/brand/' . $image) }}" target="_blank"><img
                                            width="100px" src="{{ asset('storage/media/brand/' . $image) }}" /></a>
                                @endif
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="is_home" id="is_home"
                                        {{ $is_home_selected }}>
                                    <label class="form-check-label" for="is_home">
                                        Show in Home Page
                                    </label>
                                    <div class="invalid-feedback"> </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </form><!-- End Custom Styled Validation -->

                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
