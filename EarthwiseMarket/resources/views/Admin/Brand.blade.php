@extends('Admin.layouts.app')
@section('page_title', ' Brand')
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
            <a href="{{ url('admin/brand/manage_brand') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Manage Brand
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
                                    <th>Name</th>
                                    <th>Image</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($data as $list)
                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>{{ $list->name }}</td>
                                        <td>
                                            @if ($list->image != '')
                                                <img width="100px"
                                                    src="{{ asset('public/storage/media/brand/' . $list->image) }}"
                                                    style="height:75px;width:75px;border-radius:50%;"
                                                    alt="{{ $list->image }}" />
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ url('admin/brand/manage_brand/') }}/{{ $list->id }}"><button
                                                    type="button" class="btn btn-success">Edit</button></a>

                                            @if ($list->status == 1)
                                                <a href="{{ url('admin/brand/status/0') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-primary">Active</button></a>
                                            @elseif($list->status == 0)
                                                <a href="{{ url('admin/brand/status/1') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-warning">Deactive</button></a>
                                            @endif

                                            <a href="{{ url('admin/brand/delete/') }}/{{ $list->id }}"><button
                                                    type="button" class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                    {{ $i++ }}
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
