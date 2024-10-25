@extends('Admin.layouts.app')
@section('page_title', 'Color')
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
            <a href="{{ url('admin/color/manage_color') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Manage Color
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
                                    <th>Color</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($color as $index => $list)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $list->color }}</td>
                                        <td>
                                            <a href="{{ url('admin/color/manage_color/') }}/{{ $list->id }}"><button
                                                    type="button" class="btn btn-success">Edit</button></a>

                                            @if ($list->status == 1)
                                                <a href="{{ url('admin/color/status/0') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-primary">Active</button></a>
                                            @elseif($list->status == 0)
                                                <a href="{{ url('admin/color/status/1') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-warning">Deactive</button></a>
                                            @endif

                                            <a href="{{ url('admin/color/delete/') }}/{{ $list->id }}"><button
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
