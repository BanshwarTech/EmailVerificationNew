@extends('Admin.layouts.app')
@section('page_title', ' Blog')
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
            <a href="{{ url('admin/blog/manage_blog') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Manage Blogs
            </a>

        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <p></p>
                        @if (session('successMessage'))
                            <div class="alert alert-success">
                                {{ session('successMessage') }}
                            </div>
                        @endif
                        @if (session('errorMessage'))
                            <div class="alert alert-danger">
                                {{ session('errorMessage') }}
                            </div>
                        @endif
                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $index => $list)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $list->title }}</td>
                                        <td>
                                            @if ($list->image != '')
                                                <img width="100px" src="{{ asset('storage/media/blog/' . $list->image) }}"
                                                    style="height:55px;width:55px;border-radius:10%;"
                                                    alt="{{ $list->image }}" />
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/blog/manage_blog/') }}/{{ $list->id }}"><button
                                                    type="button" class="btn btn-success">Edit</button></a>

                                            @if ($list->status == 1)
                                                <a href="{{ url('admin/blog/status/0') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-primary">Active</button></a>
                                            @elseif($list->status == 0)
                                                <a href="{{ url('admin/blog/status/1') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-warning">Deactive</button></a>
                                            @endif

                                            <a href="{{ url('admin/blog/delete/') }}/{{ $list->id }}"><button
                                                    type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
