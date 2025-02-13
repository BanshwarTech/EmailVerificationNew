@extends('admin.Includes.app')
@section('page_title', 'Accounts')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms /</span> Account</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">

                        <div class="card-body">
                            <form action="{{ route('admin.account.add') }}" class=" row" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-floating col-12 col-lg-6">
                                    <input type="file" class="form-control" id="account_related_image"
                                        name="account_related_image" />
                                    <label for="account_related_image">Account Image</label>
                                    <div id="account_related_image" class="form-text">
                                        We'll never share your details with anyone else.
                                    </div>
                                </div>
                                <div class="form-floating col-12 col-lg-6">
                                    <input type="text" class="form-control" id="account_name" placeholder="google"
                                        name="account_name" />
                                    <label for="account_name">Account Name</label>
                                    @error('account_name')
                                        <div class="message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating col-12 col-lg-6">
                                    <input type="text" class="form-control" id="account_id" placeholder="google id"
                                        name="account_id" />
                                    <label for="account_id">Account Id</label>

                                    @error('account_id')
                                        <div class="message">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-floating col-12 col-lg-6">
                                    <input type="text" class="form-control" id="account_link" placeholder="google id"
                                        name="account_link" />
                                    <label for="account_id">Account Link</label>
                                </div>

                                <div class="form-check ms-4 mt-2">
                                    <input class="form-check-input" type="radio" value="other" id="other"
                                        name="account_type">
                                    <label class="form-check-label" for="other"> Other </label>
                                </div>
                                <div class="form-check ms-4 mt-2">
                                    <input class="form-check-input" type="radio" value="social" id="social"
                                        name="account_type">
                                    <label class="form-check-label" for="social"> Social </label>
                                </div>

                                <input type="submit" class="btn btn-primary ms-2 me-2 col-3 mt-3" value="Submit" />
                            </form>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
@endsection
