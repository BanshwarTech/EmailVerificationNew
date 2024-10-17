@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="card p-0">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <a href="#">Users</a>
                        <a href="{{ route('add-user') }}">Add New User</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl.</th>
                                <th>Role</th>
                                <th>Name</th>
                                <th>Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($user as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->usertype }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
