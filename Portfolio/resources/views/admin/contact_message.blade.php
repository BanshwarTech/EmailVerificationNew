@extends('admin.Includes.app')
@section('page_title', 'Contact Message')
@section('content')
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Contact /</span> @yield('page_title') </h4>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header">
                            Index
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <tbody>
                                    @foreach ($contact_messsage as $index => $item)
                                        <tr>
                                            <td>
                                                <div class="icheck-primary">
                                                    <input type="checkbox" value="" id="check1">
                                                    <label for="check1"></label>
                                                </div>
                                            </td>
                                            <td class="mailbox-name"><a
                                                    href="{{ route('admin.contact.read.message', $item->id) }}">{{ $item->name }}</a>
                                            </td>
                                            <td class="mailbox-subject"><b>{{ $item->subject }}</b>
                                            </td>
                                            <td class="mailbox-date">{{ $item->minutes_ago }} mins ago</td>


                                        </tr>
                                    @endforeach

                                </tbody>
                        </div>


                    </div>
                </div>
            </div>
        </div>
        <!-- / Content -->

    </div>
    <!-- Content wrapper -->
@endsection
