@extends('admin.Includes.app')
@section('page_title', 'Personal Interests')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> @yield('page_title') </h4>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        Personal Interests </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.manage.interests') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <div class="row g-3">
                                <!-- Title -->
                                <div class="form-floating ms-0 col-lg-6">
                                    <input type="text" name="interest_name" id="interest_name" class="form-control"
                                        placeholder="Interest Name" value="{{ $interest_name }}">
                                    <label for="interest_name" class="ms-0">Interest Name</label>
                                    @error('interest_name')
                                        <div class="message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- Description -->
                                <div class="form-floating ms-0 col-lg-6">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $description }}</textarea>
                                    <label for="description" class="ms-0">Description</label>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary  me-2 col-3 mt-2" value="Submit" />
                        </form>
                        <hr>
                        <div class="table-responsive text-nowrap">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr class="text-nowrap">
                                        <td class="text-white">#</td>
                                        <th class="text-white">Interest Name</th>
                                        <th class="text-white">Description</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($hobbies->count() > 0)
                                        @foreach ($hobbies as $index => $interest)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $interest->interest_name }}</td>
                                                <td>{{ $interest->description }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.about.interests', $interest->id) }}"><i
                                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item delete-btn"
                                                                data-url="{{ route('admin.about.interests.delete', ['id' => $interest->id]) }}">
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
                                                No Experience Data Found
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <div class=" mt-2">
                                {{ $hobbies->links('pagination::bootstrap-5') }}
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
