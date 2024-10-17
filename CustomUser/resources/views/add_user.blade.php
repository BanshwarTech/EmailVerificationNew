@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 class="text-center">This is store user section</h3>
        <div class="row">
            <div class="card p-0">
                <div class="card-header ">
                    <h4 class="h4 fw-bold">Add New User</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('store.user') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-6 form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter your name">
                            </div>
                            <div class="col-6 form-group">
                                <label for="email">Email</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Enter your email">
                            </div>
                            <div class="col-6 form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" id="password" class="form-control"
                                    placeholder="Enter your password">
                            </div>
                            <div class="col-6 form-group">
                                <label for="">Select Role</label>
                                <select class="form-select" name="usertype" id="usertype">
                                    <option value="" selected="" disabled="">Select Role</option>
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>
                                </select>
                            </div>
                            <div class="col-6 form-group mt-3">
                                <button class="btn btn-primary btn-sm" type="submit">
                                    Submit
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
