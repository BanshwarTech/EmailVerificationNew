@extends('admin.Includes.app')
@section('page_title', 'What You Offer')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">About /</span> @yield('page_title') </h4>
            <div class="col-md-12">
                <div class="card mb-4">
                    <div class="card-header">
                        What You Offer </div>
                    <div class="card-body">
                        <form action="{{ route('admin.about.manage.offer') }}" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $id }}">
                            <div class="row g-3">
                                <!-- Title -->
                                <div class="form-floating ms-0 col-lg-4 ">
                                    <input type="text" name="title" id="title" class="form-control"
                                        placeholder="Title" value="{{ $title }}">
                                    <label for="title" class="ms-0">Title</label>
                                    @error('title')
                                        <div class="message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Price -->
                                <div class="form-floating ms-0 col-lg-4 ">
                                    <input type="number" name="price" id="price" class="form-control"
                                        placeholder="Price" step="0.01" value="{{ $price }}">
                                    <label for="price" class="ms-0">Price</label>
                                </div>

                                <!-- Status -->
                                <div class="form-floating ms-0 col-lg-4 ">
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Select Status</option>
                                        <option value="Active"
                                            {{ isset($status) && $status == 'Active' ? 'selected' : '' }}>
                                            Active</option>
                                        <option value="Inactive"
                                            {{ isset($status) && $status == 'Inactive' ? 'selected' : '' }}>
                                            Inactive</option>
                                    </select>
                                    <label for="status" class="ms-0">Status</label>
                                </div>
                                <!-- Description -->
                                <div class="form-floating ms-0 col-lg-12 ">
                                    <textarea name="description" id="description" class="form-control" placeholder="Description">{{ $description }}</textarea>
                                    <label for="description" class="ms-0">Description</label>
                                </div>
                            </div>
                            <input type="submit" class="btn btn-primary  me-2 col-3 mt-2" value="Submit" />
                        </form>
                        <hr>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="table-dark">
                                    <tr>
                                        <td class="text-white">#</td>
                                        <th class="text-white">Title</th>
                                        <th class="text-white">Description</th>
                                        <th class="text-white">Price</th>
                                        <th class="text-white">Status</th>

                                        <th class="text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($offer->count() > 0)

                                        @foreach ($offer as $index => $services)
                                            <tr>
                                                <td>{{ $index + 1 }}</td>
                                                <td>{{ $services->title }}</td>
                                                <td>{{ $services->description }}</td>
                                                <td>{{ $services->price }}</td>
                                                <td>
                                                    @if ($services->status == 'Active')
                                                        <span class="badge bg-label-success me-1 text-success">Active</span>
                                                    @else
                                                        <span class="badge bg-label-danger me-1">Inactive</span>
                                                    @endif
                                                </td>

                                                <td>
                                                    <div class="dropdown">
                                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                            data-bs-toggle="dropdown">
                                                            <i class="bx bx-dots-vertical-rounded"></i>
                                                        </button>
                                                        <div class="dropdown-menu">
                                                            <a class="dropdown-item"
                                                                href="{{ route('admin.about.offer', $services->id) }}"><i
                                                                    class="bx bx-edit-alt me-1"></i> Edit</a>
                                                            <a class="dropdown-item delete-btn"
                                                                data-url="{{ route('admin.about.offer.delete', ['id' => $services->id]) }}">
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
                                {{ $offer->links('pagination::bootstrap-5') }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
