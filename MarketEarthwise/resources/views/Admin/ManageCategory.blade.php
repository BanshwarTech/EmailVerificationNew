@extends('Admin.layouts.app')
@section('page_title', 'Manage Category')
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
            <a href="{{ url('admin/category') }}" class="btn btn-primary">
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
                            action="{{ route('category.manage_category_process') }}" novalidate
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}" />
                            <div class="col-md-4">
                                <label for="category_name" class="form-label">Category Name</label>
                                <input type="text" class="form-control" id="category_name" name="category_name"
                                    value="{{ $category_name }}" required>
                                <div class="valid-feedback"> </div>
                            </div>

                            <div class="col-md-4">
                                <label for="parent_category_id" class="control-label mb-1">Parent Category</label>
                                <select id="parent_category_id" name="parent_category_id" class="form-select" required>
                                    <option value="0">Select Categories</option>
                                    @foreach ($category as $list)
                                        @if ($parent_category_id == $list->id)
                                            <option selected value="{{ $list->id }}">
                                            @else
                                            <option value="{{ $list->id }}">
                                        @endif
                                        {{ $list->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="category_slug" class="form-label">Category Slug</label>
                                <input type="text" class="form-control" id="category_slug" name="category_slug"
                                    value="{{ $category_slug }}" required>
                                @error('category_slug')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="image" class="control-label "> Image</label>
                                <input type="file" id="category_image" name="category_image" class="form-control">
                                @error('category_image')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror


                                @if ($category_image != '')
                                    <a href="{{ asset('storage/media/category/' . $category_image) }}" target="_blank"><img
                                            width="100px"
                                            src="{{ asset('storage/media/category/' . $category_image) }}" /></a>
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
