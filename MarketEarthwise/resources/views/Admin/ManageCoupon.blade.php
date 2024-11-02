@extends('Admin.layouts.app')
@section('page_title', 'Manage Coupon')
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
            <a href="{{ url('admin/coupon') }}" class="btn btn-primary">
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
                            action="{{ route('coupon.manage_coupon_process') }}" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}" />
                            <div class="col-md-6">
                                <label for="title" class="form-label">Title</label>
                                <input id="title" value="{{ $title }}" name="title" type="text"
                                    class="form-control" required>
                                <div class="valid-feedback"> </div>
                            </div>

                            <div class="col-md-6">
                                <label for="code" class="form-label">Code</label>
                                <input id="code" value="{{ $code }}" name="code" type="text"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                                @error('code')
                                    <div class="alert alert-danger" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="col-md-6">
                                <label for="value" class="form-label">value</label>
                                <input id="value" value="{{ $value }}" name="value" type="text"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="col-md-6">
                                <label for="type" class="form-label"> Type</label>
                                <select id="type" name="type" class="form-select" required>
                                    @if ($type == 'Value')
                                        <option value="Value" selected>Value</option>
                                        <option value="Per">Per</option>
                                    @elseif($type == 'Per')
                                        <option value="Value">Value</option>
                                        <option value="Per" selected>Per</option>
                                    @else
                                        <option value="Value">Value</option>
                                        <option value="Per">Per</option>
                                    @endif
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label for="min_order_amt" class="form-label">Min. Order Amt.</label>
                                <input id="min_order_amt" value="{{ $min_order_amt }}" name="min_order_amt" type="text"
                                    class="form-control" aria-required="true" aria-invalid="false" required>
                            </div>
                            <div class="col-md-6">
                                <label for="is_one_time" class="form-label"> Is One Type</label>
                                <select id="is_one_time" name="is_one_time" class="form-select" required>
                                    @if ($is_one_time == '1')
                                        <option value="1" selected>Yes</option>
                                        <option value="0">No</option>
                                    @else
                                        <option value="1">Yes</option>
                                        <option value="0" selected>No</option>
                                    @endif
                                </select>
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
