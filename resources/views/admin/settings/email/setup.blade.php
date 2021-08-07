@extends('admin.layouts.includes.dashboard')

@section('content')
    <!-- col-md-12 -->
    <div class="col-md-12">

        @include('admin.partial.alert')

        <div class="card card-secondary card-outline">

            <div id="main-div" class="p-3">

                <ul id="progressbar">
                    <li class="active" id="step1">
                        <strong>Email Configuration</strong>
                    </li>
                    <li id="step2" style="margin-left:120px ">
                        <strong>Connectivity Testing</strong>
                    </li>
                    <li id="step3" style="margin-left:90px ">
                        <strong>Finish Setup</strong>
                    </li>
                </ul>

                <div class="progress">
                    <div class="progress-bar progress-width" style="width: 33%;"></div>
                </div>

                <div class="card-body">

                    <!-- tab-content -->
                    <div class="tab-content">

                        <!-- email-config -->
                        <div class="tab-pane active" id="step1-form">
                            <form method="POST" id="email-config-form" action="javascript:void(0)">
                                @csrf
                                <div class="card card-body">

                                    <div class="form-group">
                                        <label for="email_type">Choose email type</label>
                                        <select id="email_type" class="form-control" name="email_type">
                                            <option {{ $emailKey == "default" ? 'selected' : '' }} value="default">
                                                Default {{ $emailKey == "default" ? '(activated)' : '' }}</option>
                                            <option {{ $emailKey == "Gmail" ? 'selected' : '' }} value="Gmail">
                                                Gmail {{ $emailKey == "Gmail" ? '(activated)' : '' }}</option>
                                            <option {{ $emailKey == "Mailtrap" ? 'selected' : '' }} value="Mailtrap">
                                                Mailtrap {{ $emailKey == "Mailtrap" ? '(activated)' : '' }}</option>
                                            <option {{ $emailKey == "Sendgrid" ? 'selected' : '' }} value="Sendgrid">
                                                Sendgrid {{ $emailKey == "Sendgrid" ? '(activated)' : '' }}</option>
                                        </select>
                                    </div>

                                    {{-- Gmail & Mailtrap --}}
                                    <div class="row {{ $emailKey !== "default" && $emailKey !== "empty" ? '' : 'd-none' }}"
                                         id="email_config_form">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="driver">Driver</label>
                                                <input type="text" class="form-control clear driver" id="driver" name="driver"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['driver'] : '' }}">
                                                <div class="invalid-feedback d-none">
                                                    The driver field is empty.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="host">Host</label>
                                                <input type="text" class="form-control clear host" id="host" name="host"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['host'] : '' }}">
                                                <div class="invalid-feedback d-none">
                                                    The host field is empty.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="port">Port</label>
                                                <input type="text" class="form-control clear port" id="port" name="port"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['port'] : '' }}">
                                                <div class="invalid-feedback d-none">
                                                    The port field is empty.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control clear username" id="username"
                                                       name="username"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['username'] : '' }}">
                                                <div class="invalid-feedback d-none user-error-msg">
                                                    The username field is empty.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control clear secret" id="password"
                                                       name="password"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['password'] : '' }}">
                                                <div class="invalid-feedback d-none pass-error-msg">
                                                    The password field is empty.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="encryption">Encryption</label>
                                                <input type="text" class="form-control clear encryption" id="encryption"
                                                       name="encryption"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['encryption'] : '' }}">
                                                <div class="invalid-feedback d-none">
                                                    The encryption field is empty.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="address">From Address</label>
                                                <input type="text" class="form-control clear address" id="address"
                                                       name="address"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['from']['address'] : '' }}">
                                                <div class="invalid-feedback d-none">
                                                    The driver field is empty.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">App Name</label>
                                                <input type="text" class="form-control clear name" id="name" name="name"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['from']['name'] : '' }}">
                                                <div class="invalid-feedback d-none">
                                                    The app name field is empty.
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    {{-- End Gmail & Mailtrap --}}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <div class="form-group d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success btn-sm"
                                                        id="submit-email-config-form">
                                                    <span class="fas fa-circle-notch fa-spin d-none" id="spinner"></span>
                                                    <span id="save-text">Save</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                        <!-- /.email-config -->

                        <!-- connection-testing -->
                        <div id="step2-form" class="tab-pane">
                            <form id="email-connection-test" action="javascript:void(0)"
                                  method="POST">
                                @csrf
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="to">To</label>
                                                <input type="text" name="to" class="form-control" id="to">
                                                <div class="invalid-feedback">
                                                    The to field is empty.
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label for="subject">Subject</label>
                                                <input type="text" name="subject" class="form-control" id="subject">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="body">Content</label>
                                                <textarea id="body" type="text" name="body" class="form-control" style="resize: none;"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <hr>
                                            <div class="form-group d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success btn-sm"
                                                        id="submit_email_connect">
                                                    <span class="fas fa-circle-notch fa-spin d-none" id="send-spinner"></span>
                                                    <span id="send-text">Send</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.connection-testing -->

                        <!-- finish -->
                        <div id="step3-form" class="tab-pane">
                            <div class="finish">
                                <div class="card card-body">
                                    <center>
                                        <h5 class="finish-setup-title"></h5>
                                        <p class="finish-setup-msg"></p>
                                        <a href="{{ route('settings.index') }}" class="btn btn-success btn-sm">
                                            Finish
                                        </a>
                                    </center>
                                </div>
                            </div>
                        </div>
                        <!-- /.finish -->

                    </div>
                    <!-- /.tab-content -->

                </div>
                <!-- /.card-body -->

            </div>
            <!-- /.main-div -->
        </div>
        <!-- /.card -->

    </div>
    <!-- /.col-md-12 -->
@endsection

@section('css')
    <link href="{{ asset('css/step-progress-bar.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('js/step-progress-bar.js') }}"></script>
    <script>
        $(document).ready(function () {
            /*
            Email type
            */
            $('#email_type').on('change', function () {
                $('#email_config_form').removeClass('d-none');
                if ($(this).val() === "default") {
                    $('#email_config_form').addClass('d-none');
                }

                $('.clear').val('').removeClass('is-invalid');
                $.ajax({
                    url: "{{ route('settings.get-email-config') }}",
                    type:"GET",
                    data:{
                        "email_type": $(this).val()
                    },
                    success:function(resp){
                        if(resp)
                        {
                            let frmSmtp = $('#email-config-form');
                            frmSmtp.find('input[name=driver]').val(resp.driver);
                            frmSmtp.find('input[name=host]').val(resp.host);
                            frmSmtp.find('input[name=port]').val(resp.port);
                            frmSmtp.find('input[name=username]').val(resp.username);
                            frmSmtp.find('input[name=password]').val(resp.password);
                            frmSmtp.find('input[name=encryption]').val(resp.encryption);
                            frmSmtp.find('input[name=address]').val(resp.from.address);
                            frmSmtp.find('input[name=name]').val(resp.from.name);
                        }
                    },
                });
            });
            /*
             End Email type
             */

            /*
             Email Configuration From
             */
            $("#email-config-form").submit(function(e){
                e.preventDefault();

                $(this).attr('disabled', true);
                $('#spinner').removeClass('d-none');
                $('#save-text').text('Saving...');
                $('#password').removeClass('is-invalid');
                $.ajax({
                    url: "{{ route('settings.store') }}",
                    type:'POST',
                    data:$(this).serialize(),
                    success: function(data) {
                        if(data.resp === true)
                        {
                            Toast.fire({
                                icon: 'success',
                                title: data.msg,
                            });

                            $('#step1').removeClass('active');
                            $('#step2').addClass('active');

                            $('#step1-form').removeClass('active');
                            $('#step2-form').addClass('active');
                            $('.progress-width').css('width', '67%');

                        }else{
                            var error = '';
                            for (let i = 0; i < data.msg.msg.length; ++i) {
                                error += data.msg.msg[i] + "\n";
                            }

                            Swal.fire({
                                icon: 'warning',
                                title: 'Error',
                                text: error,
                            });

                            var formFields = $('#email-config-form :input[type=text]');
                            $(formFields).each(function(i) {
                                var fieldClassName = formFields[i].name;
                                $('.'+fieldClassName).removeClass('is-invalid');
                                if($('.'+fieldClassName).val() === '')
                                {
                                    $('.'+fieldClassName).addClass('is-invalid');
                                    $('.'+fieldClassName).removeClass('d-none');
                                }
                            });

                            if($('#password').val() === '')
                            {
                                $('#password').addClass('is-invalid');
                                $('#password').removeClass('d-none');
                            }

                            $('.invalid-feedback').removeClass('d-none');
                            $('#submit-email-config-form').attr('disabled', false);
                            $('#spinner').addClass('d-none');
                            $('#save-text').text('Save');
                        }
                    }
                });
            });
            /*
             Email Configuration From
             */

            /*
            Connectivity form submit
            */
            $("#email-connection-test").submit(function(e){
                e.preventDefault();

                $('#submit_email_connect').attr('disabled', true);
                $('#send-spinner').removeClass('d-none');
                $('#send-text').text('Sending...');
                $('#to').removeClass('is-invalid');
                $.ajax({
                    url: "{{ route('settings.test-email-connectivity') }}",
                    type:'POST',
                    data: $(this).serialize(),
                    success: function(data) {
                        console.log(data);
                        if(data.resp === true)
                        {
                            Toast.fire({
                                icon: 'success',
                                title: data.msg,
                            });

                            $('#email-connection-test').trigger("reset");

                            $('#step2').removeClass('active');
                            $('#step3').addClass('active');

                            $('#step2-form').removeClass('active');
                            $('#step3-form').addClass('active');
                            $('.progress-width').css('width', '100%');

                            $('.finish-setup-title').text('Congratulations');
                            $('.finish-setup-msg').text('Email configuration setup is successfully completed.');
                        }else{
                            var error = '';
                            for (let i = 0; i < data.msg.length; ++i) {
                                error += data.msg[i];
                            }

                            Swal.fire({
                                icon: 'warning',
                                title: 'Error',
                                text: error,
                            });

                            if(!data.config)
                            {
                                $('.progress-width').css('width', '33%');
                                $('#step1').addClass('active');
                                $('#step1-form').addClass('active');
                                $('#step2').removeClass('active');
                                $('#step2-form').removeClass('active');
                                $('#email-connection-test').trigger("reset");
                                $("#submit_email_connect").attr('disabled', false);
                                $('#send-spinner').addClass('d-none');
                                $('#send-text').text('Send');
                                $('#submit-email-config-form').attr('disabled', false);
                                $('#spinner').addClass('d-none');
                                $('#save-text').text('Save');
                                $('.username').addClass('is-invalid');
                                $('.username').removeClass('d-none');
                                $('.user-error-msg').text('Username is not authorized.');
                                $('#password').addClass('is-invalid');
                                $('#password').removeClass('d-none');
                                $('.pass-error-msg').text('Password is not authorized.');
                                return false;
                            }

                            if($('#to').val() === '')
                            {
                                    $('#to').addClass('is-invalid');
                                    $('#to').removeClass('d-none');
                                    $('#submit_email_connect').attr('disabled', false);
                                    $('#send-spinner').addClass('d-none');
                                    $('#send-text').text('Send');
                            }
                        }
                    }
                });

            });
            /*
            End Connectivity form submit
            */
        });
    </script>
@endsection
