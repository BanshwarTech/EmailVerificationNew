@extends('Admin.layouts.app')
@section('page_title', 'Taxes')
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
            <a href="{{ url('admin/tax/manage_tax') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Manage tax
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

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Tax Value</th>
                                    <th>Tax Desc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tax as $index => $list)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $list->tax_value }}</td>
                                        <td>{{ $list->tax_desc }}</td>
                                        <td>
                                            <a href="{{ url('admin/tax/manage_tax/') }}/{{ $list->id }}"><button
                                                    type="button" class="btn btn-success">Edit</button></a>

                                            @if ($list->status == 1)
                                                <a href="{{ url('admin/tax/status/0') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-primary">Active</button></a>
                                            @elseif($list->status == 0)
                                                <a href="{{ url('admin/tax/status/1') }}/{{ $list->id }}"><button
                                                        type="button" class="btn btn-warning">Deactive</button></a>
                                            @endif

                                            <a href="{{ url('admin/tax/delete/') }}/{{ $list->id }}"><button
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
