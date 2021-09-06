@extends('admin.layouts.includes.dashboard')

@section('content')
    <!-- col-md-12 -->
    <div class="col-md-12">

        @include('admin.layouts.includes.page-content-header')

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

                                    <label for="email_type">Choose email type</label>
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text fa fa-envelope"></span>
                                        </div>
                                        <select id="email_type" class="form-control" name="email_type">
                                            <option {{ $emailKey == "Smtp" ? 'selected' : '' }} value="Smtp">
                                                Smtp {{ $emailKey == "Smtp" ? '(activated)' : '' }}</option>
                                            <option {{ $emailKey == "Mailtrap" ? 'selected' : '' }} value="Mailtrap">
                                                Mailtrap {{ $emailKey == "Mailtrap" ? '(activated)' : '' }}</option>
                                            <option {{ $emailKey == "Sendgrid" ? 'selected' : '' }} value="Sendgrid">
                                                Sendgrid {{ $emailKey == "Sendgrid" ? '(activated)' : '' }}</option>
                                        </select>
                                    </div>

                                    {{-- Gmail & Mailtrap --}}
                                    <div id="form-content">
                                        @include('admin.partial.loading-table')
                                    </div>
                                    {{-- End Gmail & Mailtrap --}}

                                    <div class="row">
                                        <div class="col-md-12">
                                            <hr>
                                            <div class="form-group d-flex justify-content-end">
                                                <button type="submit" class="btn btn-secondary btn-wd"
                                                        id="submit-email-config-form">
                                                    <span class="fas fa-circle-notch fa-spin d-none" id="spinner"></span>
                                                    <span id="save-text">
                                                        <span class="material-icons">
                                                            save_alt
                                                        </span>
                                                        Save
                                                    </span>
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
                                            <label for="to">To</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fa fa-user"></span>
                                                </div>
                                                <input type="text" name="to" class="form-control" id="to">
                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <label for="subject">Subject</label>
                                            <div class="input-group mb-3">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text fa fa-sticky-note"></span>
                                                </div>
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
                                                <button type="submit" class="btn btn-secondary btn-wd"
                                                        id="submit_email_connect">
                                                    <span class="fas fa-circle-notch fa-spin d-none" id="send-spinner"></span>
                                                    <span id="send-text">
                                                        <span class="material-icons">
                                                            send
                                                        </span>
                                                        Send
                                                    </span>
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
                                        <a href="{{ route('settings.index') }}" class="btn btn-secondary btn-wd">
                                            <span class="material-icons">
                                                check_circle_outline
                                            </span>
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
    <link href="{{ asset('admin-panel/css/step-progress-bar.css') }}" rel="stylesheet">
@endsection

@section('scripts')
    <script src="{{ asset('admin-panel/js/step-progress-bar.js') }}"></script>
    <script>
        $(document).ready(function () {
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

        /*
            End Email FORM LOAD
        */
        let loading;
        function load_records(page, url){
            $('#form-content').html(loading);
            url = url ? url : "{{ route('settings.fetch_email_config') }}?email_type="+document.getElementById("email_type").value;
            axios.get(url).then((response)=>{
                $('#form-content').html(response.data);
            })
        }

        document.addEventListener("DOMContentLoaded", ()=>{
            loading = $('#form-content').html();
            load_records(1);
        });

        document.getElementById("email_type").addEventListener('change',(e)=>{
            e.preventDefault();
            load_records(1);
        });

        $(document).on('click','.page-item:not(.active) .page-link',function (e) {
            e.preventDefault();
            let href = $(this).prop('href');
            load_records(null,href);
        });

        function reload_current_page(){
            let url,page = 1;
            if($(document).find('.page-item.active .page-link').length){
                page = parseInt($(document).find('.page-item.active .page-link').text());
            }
            url = "{{ route('settings.fetch_email_config') }}?email_type="+document.getElementById("email_type").value;
            load_records(page,url);
        }
        /*
            End Email FORM LOAD
        */
    </script>
@endsection
