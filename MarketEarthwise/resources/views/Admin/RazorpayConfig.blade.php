@extends('Admin.layouts.app')
@section('page_title', ' Razorpay Config')
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
    </div>

    <section class="section">
        <div class="row">


            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Razorpay Configuration</h5>


                        <form class="row g-3 " method="post" action="{{ route('Razorpay.Config.Process') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ $data[0]->id }}" />
                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="text" class="form-control" id="RAZORPAY_KEY" name="RAZORPAY_KEY"
                                        value="{{ $data[0]->RAZORPAY_KEY ?? '' }}">
                                    <label for="RAZORPAY_KEY" class="form-label">RAZORPAY KEY</label>
                                </div>
                                @error('RAZORPAY_KEY')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating shadow-sm">
                                    <input type="text" class="form-control" id="RAZORPAY_SECRET" name="RAZORPAY_SECRET"
                                        value="{{ $data[0]->RAZORPAY_SECRET ?? '' }}">
                                    <label for="RAZORPAY_SECRET" class="form-label">RAZORPAY KEY</label>
                                </div>
                                @error('RAZORPAY_SECRET')
                                    <div class="error-message">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary" type="submit">Update</button>
                            </div>
                        </form><!-- End Custom Styled Validation -->

                    </div>
                </div>



            </div>
        </div>
    </section>
@endsection
