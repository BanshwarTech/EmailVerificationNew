@extends('Admin.layouts.app')
@section('page_title', 'Manage Blogs')
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
            <a href="{{ url('admin/blog') }}" class="btn btn-primary">
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
                            action="{{ route('blog.manage_blog_process') }}" novalidate enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}" />
                            <div class="col-md-12">
                                <label for="image" class="control-label "> Image</label>
                                <input type="file" id="image" name="image" class="form-control">
                                @error('image')
                                    <div class="text-danger"> {{ $message }}</div>
                                @enderror


                                @if ($image != '')
                                    <a href="{{ asset('storage/media/blog/' . $image) }}" target="_blank"><img
                                            width="100px" src="{{ asset('storage/media/blog/' . $image) }}" /></a>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <textarea id="title" name="title" class="tinymce-editor">{{ $title }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="content_before_blockquote" class="form-label">Content Before
                                    Blockquote</label>
                                <textarea id="content_before_blockquote" name="content_before_blockquote" class="tinymce-editor">{{ $content_before_blockquote }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="blockquote" class="form-label">Blockquote</label>
                                <textarea id="blockquote" name="blockquote" class="tinymce-editor">{{ $blockquote }}</textarea>
                            </div>
                            <div class="col-md-6">
                                <label for="content_after_blockquote" class="form-label">Content After
                                    Blockquote</label>
                                <textarea id="content_after_blockquote" name="content_after_blockquote" class="tinymce-editor">{{ $content_after_blockquote }}</textarea>
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
