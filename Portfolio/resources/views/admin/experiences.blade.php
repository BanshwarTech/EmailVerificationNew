@extends('admin.Includes.app')
@section('page_title', 'Background & Experieces')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span>@yield('page_title') </h4>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Background & Experience
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.manage.experience') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <!-- Job Title -->
                                <div class="form-floating ms-0 col-lg-4 ">
                                    <input type="text" name="job_title" id="job_title" class="form-control"
                                        placeholder="Job Title">
                                    <label for="job_title" class="ms-0">Job Title</label>
                                    @error('job_title')
                                        <div class="message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Company Name -->
                                <div class="form-floating ms-0 col-lg-4 ">
                                    <input type="text" name="company_name" id="company_name" class="form-control"
                                        placeholder="Company Name">
                                    <label for="company_name" class="ms-0">Company Name</label>
                                    @error('company_name')
                                        <div class="message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Location -->
                                <div class="form-floating ms-0 col-lg-4 ">
                                    <input type="text" name="location" id="location" class="form-control"
                                        placeholder="Location">
                                    <label for="location" class="ms-0">Location</label>
                                </div>

                                <!-- Start Date -->
                                <div class="form-floating ms-0 col-lg-6 ">
                                    <input type="date" name="start_date" id="start_date" class="form-control">
                                    <label for="start_date" class="ms-0">Start Date</label>
                                    @error('start_date')
                                        <div class="message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- End Date -->
                                <div class="form-floating ms-0 col-lg-6 ">
                                    <input type="date" name="end_date" id="end_date" class="form-control">
                                    <label for="end_date" class="ms-0">End Date</label>
                                </div>

                                <!-- Description -->
                                <div class="form-floating ms-0 col-lg-12 ">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description" rows="3"></textarea>
                                    <label for="description" class="ms-0">Description</label>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary  me-2 col-3 mt-2" value="Submit" />
                        </form>
                        <hr>
                        <div class="table-responsove">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-white">#</th>
                                        <th class="text-white">Job Title</th>
                                        <th class="text-white">Company Name</th>
                                        <th class="text-white">Location</th>
                                        <th class="text-white">Start Date</th>
                                        <th class="text-white">End Date</th>
                                        <th class="text-white">Description</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                <tbody>
                                    @foreach ($experiences as $index => $exp)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $exp->job_title }}</td>
                                            <td>{{ $exp->company_name }}</td>
                                            <td>{{ $exp->location }}</td>
                                            <td>{{ $exp->start_date }}</td>
                                            <td>{{ $exp->end_date }}</td>
                                            <td>{{ $exp->description }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                        data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-edit-alt me-1"></i> Edit</a>
                                                        <a class="dropdown-item" href="javascript:void(0);"><i
                                                                class="bx bx-trash me-1"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                </thead>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
