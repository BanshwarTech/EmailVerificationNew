@extends('admin.Includes.app')
@section('page_title', 'Contact Details')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contact /</span> @yield('page_title') </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Introduction
                        </div>

                        <div class="card-body">
                            @foreach ($contact as $con)
                                <!-- Form Section (Left Side) -->
                                <form action="{{ route('admin.contact.manage', $con->id) }}" method="POST">
                                    @csrf
                                    <input type="text" name="id" value="{{ $con->id }}" hidden>
                                    <div class="row g-3">
                                        <div class="form-floating col-lg-6">
                                            <input type="text" name="email" id="email" class="form-control"
                                                placeholder="Email" value="{{ $con->email }}">
                                            <label for="email">Email</label>
                                            @error('email')
                                                <div class="message">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating col-lg-6">
                                            <input type="text" name="phone" id="phone" class="form-control"
                                                placeholder="Phone" value="{{ $con->phone }}">
                                            <label for="phone">Phone</label>
                                            @error('phone')
                                                <div class="message">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-floating col-lg-12">
                                            <textarea name="address" id="address" class="form-control" placeholder="Address">{{ $con->address }}</textarea>
                                            <label for="address">Address</label>
                                            @error('address')
                                                <div class="message">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary mt-2" value="Submit">
                                </form>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
@endsection
