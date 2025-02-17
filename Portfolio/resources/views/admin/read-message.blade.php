@extends('admin.Includes.app')
@section('page_title', 'Read Message')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contact /</span> @yield('page_title') </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header d-flex justify-content-between">
                            <span>Read Mail</span>
                            <a href="{{ route('admin.contact.message') }}">Back to Inbox</a>
                        </div>

                        <hr class="mt-0">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="mailbox-read-info">
                                <h5>Subject : {{ $message->subject }}</h5>
                                <h6 class=" d-flex justify-content-between">
                                    <span>From : <span class="text-primary">{{ $message->email }}</span></span>
                                    <span class="mailbox-read-time fw-bold"
                                        style="font-size: 12px !important;">{{ $message->created_at->format('d M. Y h:i A') }}
                                    </span>
                                </h6>
                            </div>
                            <!-- /.mailbox-read-info -->
                            <div class="mailbox-controls with-border text-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm" data-container="body"
                                        title="Delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm" data-container="body"
                                        title="Reply">
                                        <i class="fas fa-reply"></i>
                                    </button>
                                    <button type="button" class="btn btn-default btn-sm" data-container="body"
                                        title="Forward">
                                        <i class="fas fa-share"></i>
                                    </button>
                                </div>
                                <!-- /.btn-group -->
                                <button type="button" class="btn btn-default btn-sm" title="Print">
                                    <i class="fas fa-print"></i>
                                </button>
                            </div>
                            <!-- /.mailbox-controls -->
                            <div class="mailbox-read-message">
                                <p>Hello {{ $message->name }},</p>

                                <p>
                                    {{ $message->message }}
                                </p>

                                <p>Thanks,<br>{{ $message->name }}</p>
                            </div>
                            <!-- /.mailbox-read-message -->
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
@endsection
