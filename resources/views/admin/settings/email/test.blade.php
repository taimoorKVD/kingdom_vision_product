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
                                                Default {{ $emailKey == "default" ? '(active)' : '' }}</option>
                                            <option {{ $emailKey == "Gmail" ? 'selected' : '' }} value="Gmail">
                                                Gmail {{ $emailKey == "Gmail" ? '(active)' : '' }}</option>
                                            <option {{ $emailKey == "Mailtrap" ? 'selected' : '' }} value="Mailtrap">
                                                Mailtrap {{ $emailKey == "Mailtrap" ? '(active)' : '' }}</option>
                                        </select>
                                    </div>

                                    <div class="row {{ $emailKey != "default" ? '' : 'd-none' }}"
                                         id="email_config_form">

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="driver">Driver</label>
                                                <input type="text" class="form-control clear" id="driver" name="driver"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['driver'] : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="host">Host</label>
                                                <input type="text" class="form-control clear" id="host" name="host"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['host'] : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="port">Port</label>
                                                <input type="text" class="form-control clear" id="port" name="port"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['port'] : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control clear" id="username"
                                                       name="username"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['username'] : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" class="form-control clear" id="password"
                                                       name="password"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['password'] : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="encryption">Encryption</label>
                                                <input type="text" class="form-control clear" id="encryption"
                                                       name="encryption"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['encryption'] : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="address">From Address</label>
                                                <input type="text" class="form-control clear" id="address"
                                                       name="address"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['from']['address'] : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">App Name</label>
                                                <input type="text" class="form-control clear" id="name" name="name"
                                                       value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['from']['name'] : '' }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row default_row {{ $emailKey != "default" ? 'd-none' : '' }}">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="default_username">Username</label>
                                                <input type="text" class="form-control clear" id="default_username"
                                                       name="default_username"
                                                       value="{{ isset($emailValue) && !empty($emailValue) && $emailKey == "default" ? $emailValue['username'] : '' }}">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="default_password">Password</label>
                                                <input type="password" class="form-control clear" id="default_password"
                                                       name="default_password"
                                                       value="{{ isset($emailValue) && !empty($emailValue) && $emailKey == "default" ? $emailValue['password'] : '' }}">
                                            </div>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <div class="form-group d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success btn-sm"
                                                        id="submit-email-config-form">Save
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
                                <div class="card card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="to">To</label>
                                                <input type="text" name="to" class="form-control" id="to">
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
                                                <input id="content" type="hidden" name="content">
                                                <trix-editor input="content"></trix-editor>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <hr>
                                            <div class="form-group d-flex justify-content-end">
                                                <button type="submit" class="btn btn-success btn-sm"
                                                        id="submit_email_connect">Send
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"/>

@endsection

@push('js')

    <script src="{{ asset('js/step-progress-bar.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>

<script>
    $(document).ready(function () {

        /*
        Email type
        */
        $('#email_type').on('change', function () {
            if ($(this).val() != "default") {
                $('#email_config_form').removeClass('d-none');
                $('.default_row').addClass('d-none');

            } else {
                $('#email_config_form').addClass('d-none');
                $('.default_row').removeClass('d-none');

            }
            $('.clear').val('');
            $.ajax({
                url: "{{ route('settings.get-email-config') }}",
                type:"GET",
                data:{
                    "_token": "{{ csrf_token() }}",
                    "email_type": $(this).val()
                },
                success:function(resp){
                    if(resp)
                    {
                        console.log(resp);
                        $('input[name=driver]').val(resp.driver);
                        $('input[name=host]').val(resp.host);
                        $('input[name=port]').val(resp.port);
                        $('input[name=username]').val(resp.username);
                        $('input[name=password]').val(resp.password);
                        $('input[name=encryption]').val(resp.encryption);
                        $('input[name=address]').val(resp.from.address);
                        $('input[name=name]').val(resp.from.name);

                        /*for default config*/
                        $('input[name=default_username]').val(resp.username);
                        $('input[name=default_password]').val(resp.password);
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
        {{--{{ route('settings.email-configure') }}--}}
        $("#submit-email-config-form").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var form_data = $('#email-config-form').serialize();
            $.ajax({
                url: "{{ route('settings.email-configure') }}",
                type:'POST',
                data:form_data,
                success: function(data) {
                    console.log(data);
                    if(data.resp === true)
                    {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        });

                        $('#step1').removeClass('active');
                        $('#step2').addClass('active');

                        $('#step1-form').removeClass('active');
                        $('#step2-form').addClass('active');
                        $('.progress-width').css('width', '67%');

                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Error',
                            text: data.msg,
                        });
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
        $("#submit_email_connect").click(function(e){
            e.preventDefault();

            var _token = $("input[name='_token']").val();
            var to = $("input[name='to']").val();
            var subj = $("input[name='subject']").val();
            var body = $("input[name='content']").val();

            $.ajax({
                url: "{{ route('settings.test-email-connectivity') }}",
                type:'POST',
                data: {
                    _token:_token,
                    to:to,
                    subj:subj,
                    body:body
                },
                success: function(data) {
                    console.log(data);
                    if(data.resp === true)
                    {
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: data.msg,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        $('#email-connection-test').trigger("reset");

                        $('#step2').removeClass('active');
                        $('#step3').addClass('active');

                        $('#step2-form').removeClass('active');
                        $('#step3-form').addClass('active');
                        $('.progress-width').css('width', '100%');

                        $('.finish-setup-title').text('Congratulations');
                        $('.finish-setup-msg').text('Email configuration setup is successfully completed.');

                        setTimeout(function () {
                            window.location.href = "{{ route('settings.index') }}"
                        }, 3000);
                    }else{
                        Swal.fire({
                            icon: 'warning',
                            title: 'Error',
                            text: data.msg,
                        });
                    }
                }
            });

        });
        /*
        End Connectivity form submit
        */
    });
</script>
@endpush
