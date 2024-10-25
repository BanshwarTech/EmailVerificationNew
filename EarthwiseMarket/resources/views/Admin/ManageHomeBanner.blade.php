@extends('Admin.layouts.app')
@section('page_title', 'Manage Home Banner')
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
            <a href="{{ url('admin/homebanner') }}" class="btn btn-primary">
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
                            action="{{ route('homebanner.manage_homebanner_process') }}" novalidate
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}" />
                            <div class="col-md-12">
                                <label for="title" class="form-label">Title</label>
                                <textarea id="title" name="title" class="tinymce-editor">{{ $title }}</textarea>
                            </div>
                            <div class="col-md-12">
                                <label for="subtitle" class="form-label">Sub Title</label>
                                <textarea id="subtitle" name="subtitle" class="tinymce-editor">{{ $subtitle }}</textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="btn_txt" class="form-label">Btn Text</label>
                                <input id="btn_txt" name="btn_txt" class="form-control" value="{{ $btn_txt }}">
                            </div>

                            <div class="col-md-4">
                                <label for="btn_link" class="form-label">Btn Link</label>
                                <input id="btn_link" value="{{ $btn_link }}" name="btn_link" type="text"
                                    class="form-control">
                            </div>
                            <div class="col-md-4">
                                <label for="image" class="control-label "> Image</label>
                                <input type="file" id="image" name="image" class="form-control">
                                @error('image')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror


                                @if ($image != '')
                                    <a href="{{ asset('storage/media/banner/' . $image) }}" target="_blank"><img
                                            width="100px" src="{{ asset('storage/media/banner/' . $image) }}" /></a>
                                @endif
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
