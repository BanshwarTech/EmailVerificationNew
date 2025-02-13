@extends('admin.Includes.app')
@section('page_title', 'About')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"> About</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Introduction
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="row">

                                    <div class="form-floating ms-0 col-lg-4">
                                        <input type="text" name="name" id="name" class="form-control"
                                            placeholder="Name">
                                        <label for="name" class="ms-0">Name</label>
                                    </div>
                                    <div class="form-floating ms-0 col-lg-4">
                                        <input type="file" name="profile" id="profile" class="form-control"
                                            placeholder="Profile    ">
                                        <label for="profile" class="ms-0">Name</label>
                                    </div>
                                    <div class="form-floating ms-0 col-lg-4">
                                        <input type="text" name="role" id="role" class="form-control"
                                            placeholder="role">
                                        <label for="role" class="ms-0">Role</label>
                                    </div>
                                    <div class="form-floating ms-0 col-lg-4 mt-3">
                                        <input type="text" name="experience" id="experience" class="form-control"
                                            placeholder="experience">
                                        <label for="experience" class="ms-0">Experience</label>
                                    </div>
                                    <div class="form-floating ms-0 col-lg-4 mt-3">
                                        <textarea name="tagline" id="tagline" cols="30" rows="10" class="form-control" placeholder="Tagline"></textarea>
                                        <label for="tagline" class="ms-0">Tagline</label>
                                    </div>
                                </div>
                                <input type="submit" class="btn btn-primary ms-2 me-2 col-3 mt-3" value="Submit" />
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Background & Experience
                        </div>
                        <div class="card-body">

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Technical Skills </div>
                        <div class="card-body">

                            <form action="">
                                <div class="row">
                                    <!-- Skill Name -->
                                    <div class="form-floating ms-0 col-lg-4 mt-3">
                                        <input type="text" name="skill_name" id="skill_name" class="form-control"
                                            placeholder="Skill Name">
                                        <label for="skill_name" class="ms-0">Skill Name</label>
                                    </div>

                                    <!-- Proficiency -->
                                    <div class="form-floating ms-0 col-lg-4 mt-3">
                                        <select name="proficiency" id="proficiency" class="form-control">
                                            <option value="">Select Proficiency</option>
                                            <option value="Beginner">Beginner</option>
                                            <option value="Intermediate">Intermediate</option>
                                            <option value="Advanced">Advanced</option>
                                            <option value="Expert">Expert</option>
                                        </select>
                                        <label for="proficiency" class="ms-0">Proficiency</label>
                                    </div>

                                    <!-- Experience (Years) -->
                                    <div class="form-floating ms-0 col-lg-4 mt-3">
                                        <input type="number" name="experience_years" id="experience_years"
                                            class="form-control" placeholder="Experience (Years)">
                                        <label for="experience_years" class="ms-0">Experience (Years)</label>
                                    </div>

                                    <!-- Category -->
                                    <div class="form-floating ms-0 col-lg-4 mt-3">
                                        <input type="text" name="category" id="category" class="form-control"
                                            placeholder="Category">
                                        <label for="category" class="ms-0">Category</label>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary ms-2 me-2 col-3 mt-3" value="Submit" />
                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            What You Offer </div>
                        <div class="card-body">

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Personal Interests </div>
                        <div class="card-body">

                        </div>

                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Call to Action </div>
                        <div class="card-body">

                        </div>

                    </div>
                </div>

            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
@endsection
