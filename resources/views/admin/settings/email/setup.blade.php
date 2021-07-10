@extends('admin.layouts.includes.dashboard')

@section('content')

    <div class="col-md-12">

        @include('admin.partial.alert')

        <div class="card">
            <!-- card-header -->
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                    <li class="nav-item">
                        <a class="nav-link active" href="#email-config" data-toggle="tab">
                            Email Configuration
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#connection-testing" data-toggle="tab">
                            Connectivity Testing
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#finish" data-toggle="tab">
                            Finish
                        </a>
                    </li>
                </ul>
            </div>
            <!-- /.card-header -->

            <form action="{{ route('settings.email-configure') }}" method="POST">

                <!-- card-body -->
                <div class="card-body">
                    <!-- tab-content -->
                    <div class="tab-content">
                        <!-- email-config -->
                        <div class="tab-pane active" id="email-config">

                            @csrf
                            <div class="form-group">
                                <label for="email_type">Choose email type</label>
                                <select id="email_type" class="form-control" name="email_type">
                                    <option {{ $emailKey == "default" ? 'selected' : '' }} value="default">Default {{ $emailKey == "default" ? '(active)' : '' }}</option>
                                    <option {{ $emailKey == "Gmail" ? 'selected' : '' }} value="Gmail">Gmail {{ $emailKey == "Gmail" ? '(active)' : '' }}</option>
                                    <option {{ $emailKey == "Mailtrap" ? 'selected' : '' }} value="Mailtrap">Mailtrap {{ $emailKey == "Mailtrap" ? '(active)' : '' }}</option>
                                </select>
                            </div>

                            <div class="card card-body {{ $emailKey != "default" ? '' : 'd-none' }}" id="email_config_form">

                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="driver">Driver</label>
                                            <input type="text" class="form-control" id="driver" name="driver" value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['driver'] : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="host">Host</label>
                                            <input type="text" class="form-control" id="host" name="host" value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['host'] : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="port">Port</label>
                                            <input type="text" class="form-control" id="port" name="port" value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['port'] : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['username'] : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['password'] : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="encryption">Encryption</label>
                                            <input type="text" class="form-control" id="encryption" name="encryption" value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['encryption'] : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="address">From Address</label>
                                            <input type="text" class="form-control" id="address" name="address" value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['from']['address'] : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="name">App Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['from']['name'] : '' }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                            <select name="status" class="form-control" id="status">
                                                <option value="1">Active</option>
                                                <option value="0">Inactive</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <hr>

                            </div>

                        </div>
                        <!-- /.email-config -->

                        <!-- connection-testing -->
                        <div class="tab-pane" id="connection-testing">
                            <a href="{{ route('settings.test-email-configure') }}" class="btn btn-success btn-sm">Test email</a>
                        </div>
                        <!-- /.connection-testing -->

                        <!-- finish -->
                        <div class="tab-pane" id="finish">

                        </div>
                        <!-- /.finish -->

                    </div>
                    <!-- /.tab-content -->
                </div>
                <!-- /.card-body -->

                <!-- card-footer -->
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                </div>
                <!-- /.card-footer -->

            </form>

        </div>
        <!-- /.card -->
    </div>

    @endsection

@push('js')
    <script>
        $('#email_type').on('change', function(){
            if($(this).val() != "default"){
                $('#email_config_form').removeClass('d-none');
            }else{
                $('#email_config_form').addClass('d-none');
            }
        });
    </script>
    @endpush
