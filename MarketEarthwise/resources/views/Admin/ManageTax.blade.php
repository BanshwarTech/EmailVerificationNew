@extends('Admin.layouts.app')
@section('page_title', 'Manage Taxes')
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
            <a href="{{ url('admin/tax') }}" class="btn btn-primary">
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


                        <form class="row g-3 needs-validation" method="post" action="{{ route('tax.manage_tax_process') }}"
                            novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}" />
                            <div class="col-md-6">
                                <label for="tax_value" class="form-label">Tax Value</label>
                                <input type="text" class="form-control" id="tax_value" name="tax_value"
                                    value="{{ $tax_value }}" required>
                                <div class="valid-feedback"> </div>
                            </div>
                            <div class="col-md-6">
                                <label for="tax_desc" class="form-label">Tax Desc</label>
                                <input type="text" class="form-control" id="tax_desc" name="tax_desc"
                                    value="{{ $tax_desc }}" required>
                                <div class="valid-feedback"> </div>
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
