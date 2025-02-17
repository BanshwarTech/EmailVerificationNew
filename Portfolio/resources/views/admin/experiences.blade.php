@extends('admin.Includes.app')
@section('page_title', 'Background & Experieces')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> @yield('page_title') </h4>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Background & Experience
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.manage.experience') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <input type="hidden" name="id" value="{{ $id }}" />
                                <!-- Job Title -->
                                <div class="form-floating col-lg-4">
                                    <input type="text" name="job_title" id="job_title" class="form-control"
                                        placeholder="Job Title" value="{{ old('job_title', $job_title ?? '') }}">
                                    <label for="job_title">Job Title</label>
                                    @error('job_title')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Company Name -->
                                <div class="form-floating col-lg-4">
                                    <input type="text" name="company_name" id="company_name" class="form-control"
                                        placeholder="Company Name" value="{{ old('company_name', $company_name ?? '') }}">
                                    <label for="company_name">Company Name</label>
                                    @error('company_name')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Location -->
                                <div class="form-floating col-lg-4">
                                    <input type="text" name="location" id="location" class="form-control"
                                        placeholder="Location" value="{{ old('location', $location ?? '') }}">
                                    <label for="location">Location</label>
                                </div>

                                <!-- Start Date -->
                                <div class="form-floating col-lg-6">
                                    <input type="date" name="start_date" id="start_date" class="form-control"
                                        value="{{ old('start_date', $start_date ?? '') }}">
                                    <label for="start_date">Start Date</label>
                                    @error('start_date')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- End Date -->
                                <div class="form-floating col-lg-6">
                                    <input type="date" name="end_date" id="end_date" class="form-control"
                                        value="{{ old('end_date', $end_date ?? '') }}">
                                    <label for="end_date">End Date</label>
                                </div>

                                <!-- Description -->
                                <div class="form-floating col-lg-12">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description" rows="3">{{ old('description', $description ?? '') }}</textarea>
                                    <label for="description">Description</label>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary col-3 mt-2"
                                value="{{ isset($id) && $id > 0 ? 'Update' : 'Submit' }}" />
                        </form>

                        <hr>
                        @if ($id > 0)
                            <style>
                                .table-responsive {
                                    display: none;
                                }
                            </style>
                        @endif

                        <div class="table-responsive">
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
                                </thead>
                                <tbody>
                                    @if ($experiences->count() > 0)
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
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.about.experience', $exp->id) }}">
                                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                                            </a>

                                                            <a class="dropdown-item delete-btn"
                                                                data-url="{{ route('admin.about.exp.delete', ['id' => $exp->id]) }}">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td colspan="8" class="text-center  fw-bold">
                                                No Data Found
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class=" mt-2">
                                {{ $experiences->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
