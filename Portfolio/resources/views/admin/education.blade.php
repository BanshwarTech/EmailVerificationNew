@extends('admin.Includes.app')
@section('page_title', 'Education')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> @yield('page_title') </h4>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Education
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.manage.education') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <input type="hidden" name="id" value="{{ $id }}" />
                                <!-- Job Title -->
                                <div class="form-floating col-lg-4">
                                    <input type="text" name="degree" id="degree" class="form-control"
                                        placeholder="Job Title" value="{{ old('degree', $degree ?? '') }}">
                                    <label for="degree">Degree</label>
                                    @error('degree')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Institution -->
                                <div class="form-floating col-lg-4">
                                    <input type="text" name="institution" id="institution" class="form-control"
                                        placeholder="Institution" value="{{ old('institution', $institution ?? '') }}">
                                    <label for="institution">Institution</label>
                                    @error('institution')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Location -->
                                <div class="form-floating col-lg-4">
                                    <input type="text" name="location" id="location" class="form-control"
                                        placeholder="Location" value="{{ old('location', $location ?? '') }}"
                                        placeholder="location">
                                    <label for="location">Location</label>
                                    @error('location')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Duration -->
                                <div class="form-floating col-lg-6">
                                    <input type="text" name="duration" id="duration" class="form-control"
                                        value="{{ old('duration', $duration ?? '') }}" placeholder="duration">
                                    <label for="duration">Duration</label>
                                    @error('duration')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>
                                <!-- Division -->
                                <div class="form-floating col-lg-6">
                                    <input type="text" name="division" id="division" class="form-control"
                                        value="{{ old('division', $division ?? '') }}" placeholder="division">
                                    <label for="division">Division</label>
                                    @error('division')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Details -->
                                <div class="form-floating col-lg-12">
                                    <textarea name="details" id="details" class="form-control" placeholder="details" rows="3">{{ old('details', $details ?? '') }}</textarea>
                                    <label for="details">Details</label>
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
                                        <th class="text-white">Degree</th>
                                        <th class="text-white">Institution</th>
                                        <th class="text-white">Location</th>
                                        <th class="text-white">Location</th>
                                        <th class="text-white">Duration</th>
                                        <th class="text-white">Details</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($education->count() > 0)
                                        @foreach ($education as $index => $edu)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $edu->degree }}</td>
                                                <td>{{ $edu->institution }}</td>
                                                <td>{{ $edu->location }}</td>
                                                <td>{{ $edu->location }}</td>
                                                <td>{{ $edu->duration }}</td>
                                                <td>{{ $edu->details }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.about.education', $edu->id) }}">
                                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                                            </a>

                                                            {{-- <a class="dropdown-item delete-btn"
                                                                data-url="{{ route('admin.about.education.delete', ['id' => $edu->id]) }}">
                                                                <i class="bx bx-trash me-1"></i> Delete
                                                            </a> --}}
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
                                {{ $education->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
