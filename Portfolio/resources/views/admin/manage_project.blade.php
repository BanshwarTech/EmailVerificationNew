@extends('admin.Includes.app')
@section('page_title', 'Manage Project')
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
                        <form action="{{ route('admin.project.process.manage') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row g-3">
                                <input type="text" name="id" value="{{ $id }}" hidden />
                                <!-- Job Title -->
                                <div class="form-floating col-lg-4">
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Job Title" value="{{ old('title', $title ?? '') }}">
                                    <label for="title">title</label>
                                    @error('title')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Image -->
                                <div class="form-floating col-lg-4">
                                    <input type="file" name="image" id="image" class="form-control"
                                        placeholder="image" value="{{ old('image', $image ?? '') }}">
                                    <label for="image">Image</label>
                                    @error('image')
                                        <div class="text-danger small">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Link -->
                                <div class="form-floating col-lg-4">
                                    <input type="text" name="link" id="link" class="form-control"
                                        placeholder="link" value="{{ old('link', $link ?? '') }}" placeholder="link">
                                    <label for="link">Link</label>
                                </div>
                                <!-- Github Link -->
                                <div class="form-floating col-lg-6">
                                    <input type="text" name="github_link" id="github_link" class="form-control"
                                        value="{{ old('github_link', $github_link ?? '') }}" placeholder="github_link">
                                    <label for="github_link">Github Link</label>
                                </div>
                                {{-- Completion Date --}}
                                <div class="form-floating col-lg-6">
                                    <input type="date" name="completion_date" id="completion_date" class="form-control"
                                        value="{{ old('completion_date', $completion_date ?? '') }}"
                                        placeholder="completion_date">
                                    <label for="completion_date">Completion Date</label>
                                </div>
                                <!-- Description -->
                                <div class="form-floating col-lg-12">
                                    <textarea name="description" id="description" class="form-control" placeholder="description" rows="3">{{ old('description', $description ?? '') }}</textarea>
                                    <label for="description">Description</label>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary col-3 mt-2"
                                value="{{ isset($id) && $id > 0 ? 'Update' : 'Submit' }}" />
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
