@extends('admin.Includes.app')
@section('page_title', 'Project')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> @yield('page_title') </h4>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        project
                    </div>
                    <div class="card-body">


                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <th class="text-white">#</th>
                                        <th class="text-white">Title</th>
                                        <th class="text-white">Description</th>
                                        <th class="text-white">Link</th>
                                        <th class="text-white">Github Link</th>
                                        <th class="text-white">Completion Date</th>
                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($project->count() > 0)
                                        @foreach ($project as $index => $pro)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $pro->title }} <img
                                                        src="{{ asset('storage/uploads/project/' . $pro->image) }}"
                                                        alt="" height="30" width="50"></td>
                                                <td>{{ $pro->description }}</td>
                                                <td>{{ $pro->link }}</td>
                                                <td>{{ $pro->github_link }}</td>
                                                <td>{{ $pro->completion_date }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.project.manage', $pro->id) }}">
                                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                                            </a>
                                                            <a class="dropdown-item delete-btn"
                                                                data-url="{{ route('admin.project.delete', ['id' => $pro->id]) }}">
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
                                {{ $project->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
