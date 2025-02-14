@extends('admin.Includes.app')
@section('page_title', 'Technical Skills')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span>@yield('page_title') </h4>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Technical Skills </div>
                    <div class="card-body">

                        <form action="{{ route('admin.about.manage.tech.skill') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <input type="hidden" name="id" value="{{ $id }}">
                                <!-- Skill Name -->
                                <div class="form-floating ms-0 col-lg-6 ">
                                    <input type="text" name="skill_name" id="skill_name" class="form-control"
                                        placeholder="Skill Name" value="{{ $skill_name }}">
                                    <label for="skill_name" class="ms-0">Skill Name</label>
                                    @error('skill_name')
                                        <div class="message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Proficiency -->
                                <div class="form-floating ms-0 col-lg-6 ">
                                    <select name="proficiency" id="proficiency" class="form-control">
                                        <option value="">Select Proficiency</option>
                                        <option value="Beginner"
                                            {{ isset($proficiency) && $proficiency == 'Beginner' ? 'selected' : '' }}>
                                            Beginner</option>
                                        <option value="Intermediate"
                                            {{ isset($proficiency) && $proficiency == 'Intermediate' ? 'selected' : '' }}>
                                            Intermediate</option>
                                        <option value="Advanced"
                                            {{ isset($proficiency) && $proficiency == 'Advanced' ? 'selected' : '' }}>
                                            Advanced</option>
                                        <option value="Expert"
                                            {{ isset($proficiency) && $proficiency == 'Expert' ? 'selected' : '' }}>Expert
                                        </option>
                                    </select>

                                    <label for="proficiency" class="ms-0">Proficiency</label>
                                    @error('proficiency')
                                        <div class="message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Experience (Years) -->
                                <div class="form-floating ms-0 col-lg-6 ">
                                    <input type="number" name="experience_years" id="experience_years" class="form-control"
                                        placeholder="Experience (Years)" value="{{ $experience_years }}">
                                    <label for="experience_years" class="ms-0">Experience (Years)</label>
                                </div>

                                <!-- Category -->
                                <div class="form-floating ms-0 col-lg-6 ">
                                    <input type="text" name="category" id="category" class="form-control"
                                        placeholder="Category" value="{{ $category }}">
                                    <label for="category" class="ms-0">Category</label>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary col-3 mt-2"
                                value="{{ isset($id) && $id > 0 ? 'Update' : 'Submit' }}" />
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="table-responsive text-nowrap">
                        <table class="table table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <td class="text-white">#</td>
                                    <th class="text-white">Skill Name</th>
                                    <th class="text-white">Proficiency</th>
                                    <th class="text-white">Experience Years</th>
                                    <th class="text-white">Category</th>
                                    <th class="text-white">Action</th>
                                </tr>
                            <tbody>
                                @foreach ($tech_skill as $index => $skills)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $skills->skill_name }}</td>
                                        <td>{{ $skills->proficiency }}</td>
                                        <td>{{ $skills->experience_years }}</td>
                                        <td>{{ $skills->category }}
                                        </td>

                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-vertical-rounded"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                        href="{{ route('admin.about.tech.skill', $skills->id) }}"><i
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
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
