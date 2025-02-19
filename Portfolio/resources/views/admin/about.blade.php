@extends('admin.Includes.app')
@section('page_title', 'About Details')
@section('content')

    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> @yield('page_title')</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Introduction
                        </div>

                        <div class="card-body">
                            @foreach ($about as $ab)
                                <div class="row align-items-center">
                                    <!-- Form Section (Left Side) -->
                                    <div class="col-lg-10 col-md-10 col-12">
                                        <form action="{{ route('admin.about.manage', $ab->id) }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="text" name="id" value="{{ $ab->id }}" hidden>
                                            <div class="row g-3">
                                                <div class="form-floating col-lg-6">
                                                    <input type="text" name="name" id="name" class="form-control"
                                                        placeholder="Name" value="{{ $ab->name }}">
                                                    <label for="name">Name</label>
                                                    @error('name')
                                                        <div class="message">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-floating col-lg-6">
                                                    <input type="file" name="profile" id="profile" class="form-control"
                                                        placeholder="Profile">
                                                    <label for="profile">Profile</label>
                                                    @error('profile')
                                                        <div class="message">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-floating col-lg-6">
                                                    <input type="text" name="role" id="role" class="form-control"
                                                        placeholder="Role" value="{{ $ab->role }}">
                                                    <label for="role">Role</label>
                                                    @error('role')
                                                        <div class="message">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-floating col-lg-6">
                                                    <input type="number" name="experience" id="experience"
                                                        class="form-control" placeholder="Experience"
                                                        value="{{ $ab->experience }}">
                                                    <label for="experience">Experience</label>
                                                    @error('experience')
                                                        <div class="message">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-floating col-lg-12">
                                                    <textarea name="tagline" id="editor" class="form-control" placeholder="Tagline">{{ $ab->tagline }}</textarea>
                                                    <label for="tagline">Tagline</label>
                                                    @error('tagline')
                                                        <div class="message">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary mt-2" value="Submit">
                                        </form>
                                    </div>

                                    <!-- Image Section (Right Side) -->
                                    <div class="col-lg-2 col-md-2 col-12 text-center h-75">
                                        <img src="{{ asset('storage/uploads/about/' . $ab->profile_image) }}"
                                            alt="{{ $ab->profile_image }}" class="img-fluid rounded w-75">
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    </div>
                </div>
                {{-- <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Call to Action </div>
                        <div class="card-body">

                        </div>

                    </div>
                </div> --}}
            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->

@endsection
