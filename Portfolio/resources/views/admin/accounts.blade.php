@extends('admin.Includes.app')
@section('page_title', 'Accounts')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Account / </span>Add Account</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">

                        <div class="card-body">

                            <form action="{{ route('admin.account.add') }}" class="row align-items-center" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-lg-10 col-md-10 col-12">
                                    <div class="row g-3">


                                        <input type="hidden" name="id" value="{{ $id }}">
                                        <div class="form-floating col-12 col-lg-6">
                                            <input type="file" class="form-control" id="account_related_image"
                                                name="account_related_image" />
                                            <label for="account_related_image">Account Image</label>
                                            <div id="account_related_image" class="form-text">
                                                We'll never share your details with anyone else.
                                            </div>
                                        </div>
                                        <div class="form-floating col-12 col-lg-6">
                                            <input type="text" class="form-control" id="account_name"
                                                placeholder="google" name="account_name" value="{{ $account_name }}" />
                                            <label for="account_name">Account Name</label>
                                            @error('account_name')
                                                <div class="message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating col-12 col-lg-6">
                                            <input type="text" class="form-control" id="account_id"
                                                placeholder="google id" name="account_id" value="{{ $account_id }}" />
                                            <label for="account_id">Account Id</label>

                                            @error('account_id')
                                                <div class="message">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-floating col-12 col-lg-6">
                                            <input type="text" class="form-control" id="account_link"
                                                placeholder="google id" name="account_link" value="{{ $account_link }}" />
                                            <label for="account_id">Account Link</label>
                                        </div>

                                        <div class="form-check ms-4 mt-2">
                                            <input class="form-check-input" type="radio" value="other" id="other"
                                                name="account_type"
                                                {{ isset($account_type) && $account_type == 'other' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="other"> Other </label>
                                        </div>
                                        <div class="form-check ms-4 mt-2">
                                            <input class="form-check-input" type="radio" value="social" id="social"
                                                name="account_type"
                                                {{ isset($account_type) && $account_type == 'social' ? 'checked' : '' }}>
                                            <label class="form-check-label" for="social"> Social </label>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary ms-2 me-2 col-3 mt-3" value="Submit" />
                                </div>
                                <div class="col-lg-2 col-md-2 col-12">
                                    <img src="{{ asset('storage/uploads/account/' . $account_related_image) }}"
                                        alt="image not found" class="img-fluid rounded">
                                </div>
                            </form> <!-- Image Section (Right Side) -->



                            <hr>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th class="text-white">#</th>
                                            <th class="text-white">Image</th>
                                            <th class="text-white">Account Name</th>
                                            <th class="text-white">Account Id </th>
                                            <th class="text-white">Account Link</th>
                                            <th class="text-white">Account Type</th>
                                            <th class="text-white">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($account->count() > 0)
                                            @foreach ($account as $index => $acc)
                                                <tr>
                                                    <td>{{ $index + 1 }}</td>
                                                    <td><img src="{{ asset('storage/uploads/account/' . $acc->account_related_image) }}"
                                                            alt=""> </td>
                                                    <td> {{ $acc->account_name }}</td>
                                                    <td> {{ $acc->account_id }}</td>
                                                    <td> {{ $acc->account_link }}</td>
                                                    <td> {{ $acc->account_type }}</td>
                                                    <td>
                                                        <div class="dropdown">
                                                            <button type="button"
                                                                class="btn p-0 dropdown-toggle hide-arrow"
                                                                data-bs-toggle="dropdown">
                                                                <i class="bx bx-dots-vertical-rounded"></i>
                                                            </button>
                                                            <div class="dropdown-menu">
                                                                <a class="dropdown-item"
                                                                    href="{{ route('admin.account', $acc->id) }}"><i
                                                                        class="bx bx-edit-alt me-1"></i> Edit</a>
                                                                <a class="dropdown-item delete-btn"
                                                                    data-url="{{ route('admin.account.delete', ['id' => $acc->id]) }}">
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
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
@endsection
