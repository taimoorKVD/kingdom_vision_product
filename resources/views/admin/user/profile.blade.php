@extends('admin.layouts.includes.dashboard')

@section('content')
    <style>
        /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Firefox */
        input[type=number] {
            -moz-appearance: textfield;
        }
        .select2-container {
            width: 85% !important;
        }
        .select2-container--default.select2-container--disabled .select2-selection--single {
            background-color: #fff !important;
        }

        .form-control:disabled, .form-control[readonly] {
            background-color: #fff !important;
        }
    </style>
    @php
        $profile_pic = auth()->user()->profile_photo ? url('storage/app/'.auth()->user()->profile_photo) : url('storage/app/'.config('app.logo'));
    @endphp

    <div class="row">
        <div class="col-md-12">
            <div class="card card-secondary card-outline">
                <form id="profile_form" class="form-horizontal" enctype="multipart/form-data">
                    @csrf

                <div class="card-body">
                    <div class="text-center">
                        <div id="logo-container" class="form-group">
                            <div class="position-relative preview">
                                <span data-toggle="#logo-container"
                                      class="material-icons position-absolute remove_preview text-secondary {{ isset(auth()->user()->profile_photo) ? '' : 'd-none' }}"
                                      style="display:none; margin-left: 10%; cursor: pointer;">cancel</span>
                                <label for="logo_image" class="pointer mb-0">
                                    <img class="preview_image profile-user-img img-circle"
                                         src="{{ isset(auth()->user()->profile_photo) ? url('storage/app/'.auth()->user()->profile_photo) : url('storage/app/public/default_images/upload.png') }}"
                                         alt="{{ auth()->user()->name }}"/>
                                </label>
                                <input class="delete_image" type="hidden" name="delete_logo" value="">
                                <input id="logo_image" class="userfile d-none" type="file"
                                       name="profile_pic"
                                       onchange="readURL(this,'#logo-container');">
                            </div>
                            <div class="text-danger upload_msg"></div>
                        </div>
                    </div>
                    <h3 class="profile-username text-center">{{ ucfirst(auth()->user()->name) }}</h3>
                    <p class="text-muted text-center">
                        <span class="badge badge-success">Admin</span>
                    </p>
                </div>
                <hr>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="name">Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-user"></span>
                                    </div>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="{{ auth()->user()->name }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="email">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-envelope"></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email" autocomplete="username"
                                           value="{{ auth()->user()->email }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="password">Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-key"></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" id="password" autocomplete="new-password"
                                           onblur="this.setAttribute('readonly', 'readonly');"
                                           onfocus="this.removeAttribute('readonly');" readonly>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <label for="dob">Date of Birth</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-calendar-alt"></span>
                                    </div>
                                    <input type="date" class="form-control" name="dob" id="dob" value="{{ auth()->user()->dob }}">
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <label for="age">Age</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-child"></span>
                                    </div>
                                    <input type="number" class="form-control" name="age" id="age" value="{{ auth()->user()->age }}" readonly>
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <label for="address">Address</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-address-card"></span>
                                    </div>
                                    <input type="text" class="form-control" name="address" id="address" value="{{ auth()->user()->address }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="country">Country</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-flag"></span>
                                    </div>
                                    <select class="form-control select2" name="country" id="country">
                                        @if($countries->count() > 0)
                                            <option value="" selected disabled>Select your country</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ auth()->user()->country == $country->id ? 'selected' : null }}>{{ $country->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="state">State</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-flag"></span>
                                    </div>
                                    <input type="text" class="form-control" id="current_state" value="{{ isset($state->name) && !empty($state->name) ? $state->name : null }}">
                                    <input type="hidden" name="state" value="{{ isset($state->id) && !empty($state->id) ? $state->id : null }}">
                                    <select class="form-control d-none" name="state" id="state">
                                        <option value="" selected disabled>Select your state</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="city">City</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-city"></span>
                                    </div>
                                    <input type="text" class="form-control" id="current_city" value="{{ isset($city->name) && !empty($city->name) ? $city->name : null }}">
                                    <input type="hidden" name="city" value="{{ isset($city->id) && !empty($city->id) ? $city->id : null }}">
                                    <select class="form-control d-none" name="city" id="city" disabled>
                                        <option value="" selected disabled>Select your city</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <label for="zipcode">Zipcode</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-map-pin"></span>
                                    </div>
                                    <input type="text" class="form-control" name="zipcode" id="zipcode" value="{{ auth()->user()->zip }}">
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="phone_number">Phone No#</label>
                                    <input type="hidden" name="phone_prefix" id="phone_prefix">
                                    <input type="tel" class="form-control" id="phone_number" name="phone_number" value="{{ auth()->user()->phone_prefix.auth()->user()->phone_number }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="javascript:void(0)" class="btn btn-secondary btn-sm mr-1" id="reload-btn">
                            <span class="fas fa-circle-notch fa-spin d-none" id="reload-spinner"></span>
                            <span id="reload-text">Reload</span>
                        </a>
                        <button type="submit" class="btn btn-success btn-sm"
                                id="submit_gen_set_form">
                            <span class="fas fa-circle-notch fa-spin d-none" id="save-spinner"></span>
                            <span id="save-text">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="{{ asset('css/intlTelInput.css') }}">
@endsection
@section('scripts')
    <script src="{{ asset('js/intlTelInput-jquery.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        $(document).ready(function ($) {
            $('.select2').select2();

            flatpickr("#dob", {
                /*enableTime:true,
                enableSeconds: true,*/
            });

            $("#phone_number").intlTelInput({
                separateDialCode:true,
                preferredCountries: ["pk"],
            });

            $('#dob').on('change', function() {
                var dob = new Date($(this).val());
                var today = new Date();
                var age = Math.floor((today-dob) / (365.25 * 24 * 60 * 60 * 1000));
                $('#age').val(age);
                if(age <= 18) {
                    $(this).val('');
                    $('#age').val('');
                    Toast.fire({
                        icon: 'info',
                        title: 'Age should be greater than 17',
                    });
                }
            });

            $('#profile_form').submit(function (e) {
                e.preventDefault();

                $('#submit_gen_set_form').attr('disabled', true);
                $('#reload-btn').addClass('d-none');
                $('#save-spinner').removeClass('d-none');
                $('#save-text').text('Updating...');
                $('#phone_prefix').val($('.iti__selected-dial-code').text());

                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/update-profile') }}",
                    data: new FormData(this),
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        if (data.resp) {
                            Toast.fire({
                                icon: 'success',
                                title: data.msg,
                            });
                            setTimeout(function () {
                                location.reload();
                            }, 2800);

                        } else {
                            Swal.fire({
                                icon: 'warning',
                                title: 'Error',
                                text: data.msg,
                            });
                        }
                        $('#submit_gen_set_form').attr('disabled', false);
                        $('#save-spinner').addClass('d-none');
                        $('#save-text').text('Update');
                    },
                });
            });

            /*===============================
              GET STATES, COUNTRY WISE
         ===============================*/
            $('#country').on('change', function () {
                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/fetch-states') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "country_id": $(this).val(),
                    },
                    success: function (resp) {
                        if(resp.resp) {
                            $('#state').empty().prop("disabled", false);
                            $.each(resp.states, function(value, key) {
                                $('#state').append($("<option></option>").attr("value", key.id).text(key.name));
                            });
                            $('#state').css('width','87%');
                            $('#state').select2();
                            $('#current_state').remove();
                        }
                    }
                });
            });

            /*===============================
                  GET CITIES, STATE WISE
             ===============================*/
            $('#state').on('change', function () {
                console.log($(this).val());

                $.ajax({
                    type: 'POST',
                    url: "{{ url('admin/fetch-cities') }}",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "state_id": $(this).val(),
                    },
                    success: function (resp) {
                        if(resp.resp) {
                            $('#city').empty().prop("disabled", false);
                            $.each(resp.cities, function(value, key) {
                                $('#city').append($("<option></option>").attr("value", key.id).text(key.name));
                            });
                            $('#city').css('width','85%');
                            $('#city').select2();
                            $('#current_city').remove();
                        }
                    }
                });
            });

            /*===============================
              RELOAD BUTTON
         ===============================*/
            $('#reload-btn').on('click', function () {
                $('#reload-spinner').removeClass('d-none');
                $('#reload-text').text('Reloading...');
                $('#submit_gen_set_form').attr('disabled', true);
                setTimeout(function () {
                    location.reload();
                }, 1000);
            });
        });

        /*===============================
              Image Upload
         ===============================*/

        @if($profile_pic)
        $(document).ready(function () {
            setUserImage('{{ $profile_pic }}', '#logo-container');
        });
        @endif

        function readURL(input, form_name) {
            let upload_msg = $(form_name).find('.upload_msg');
            let preview_image = $(form_name).find('.preview_image');
            let remove_preview = $(form_name).find('.remove_preview');
            let userfile = $(form_name).find('.userfile');

            if (typeof input.files[0] === 'undefined') {
                $('.remove_preview').trigger('click');
                return false;
            }

            if (input.files && input.files[0]) {
                let limit = parseInt("{{ config('constant.max_img_size') }}");
                if (input.files[0].size > limit) {
                    userfile.val('');
                    preview_image.prop('src', '{{ asset('storage/app/public/default_images/upload.png') }}');
                    // remove_preview.css('display', 'none');
                    upload_msg.html('<p class="upload_error">File size should not exceed 1MB.</p>');
                    return false;
                }

                let reader = new FileReader();
                let ext = input.files[0].name.split('.').pop().toLowerCase();
                if (ext === 'jpg' || ext === 'jpeg' || ext === 'png' || ext === 'gif') {
                    if (upload_msg.find('p').hasClass('upload_error')) {
                        upload_msg.find('p').remove();
                    }
                    reader.onload = function (e) {
                        let image = new Image();
                        image.src = e.target.result;
                        image.onload = function () {
                            preview_image.prop('src', e.target.result);
                            // remove_preview.css('display', 'block');
                        };
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    userfile.val('');
                    preview_image.prop('src', '{{ url('storage/app/public/default_images/upload.png') }}');
                    // remove_preview.css('display', 'none');
                    upload_msg.html('<p class="upload_error">Only JPEG and PNG formats are allowed.</p>');
                }
            }
        }

        function setUserImage(url, target) {
            $(target).find('.remove_preview').show();
            $(target).prop('src', url);
        }

        $('.remove_preview').on('click', function () {
            let target = $($(this).data('toggle'));
            target.find('.preview_image').prop('src', '{{ url('storage/app/public/default_images/upload.png') }}');
            $(this).css('display', 'none');
            target.find('.userfile').val('');
            if ($(this).data('toggle') === $(this).data('toggle')) {
                target.find('.delete_image').val('1');
            }
        });
    </script>
@endsection
