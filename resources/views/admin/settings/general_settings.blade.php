@extends('admin.layouts.includes.dashboard')

@section('content')
    <style>
        .select2-container {
            width: 87% !important;
        }
    </style>
    @php
        $logo_url = url('storage/app/'.config('app.logo'));
        $favicon_url = url('storage/app/'.config('app.favicon'));
    @endphp

    <!-- col-md-12 -->
    <div class="col-md-12">

        @include('admin.layouts.includes.page-content-header')

        <div class="card card-secondary card-outline">
            <form id="general_settings_form" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless w-100">
                                <tr>
                                    <th>
                                        <label for="app_name">App Name:</label>
                                    </th>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-id-badge"></span>
                                            </div>
                                        <input type="text" id="app_name" class="form-control" name="app_name"
                                               value="{{ !empty(config('app.name')) ? config('app.name') : '' }}">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th>
                                        <label for="timezone">Timezone:</label>
                                    </th>
                                    <td>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-clock"></span>
                                            </div>
                                        <select id="timezone" name="timezone" class="form-control timezone_dropdown">
                                            @if($timezones->count() > 0)
                                                @foreach($timezones as $timezone)
                                                    <option
                                                        value="{{ $timezone->name }}" {{ config('app.timezone') == $timezone->name ? 'selected' : '' }}>
                                                        {{ $timezone->name }}
                                                        {{ config('app.timezone') == $timezone->name ? '(active)' : '' }}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>Logo:</label>
                                    </th>
                                    <td>
                                        <div id="logo-container" class="form-group">
                                            <div class="position-relative preview">
                                                <span data-toggle="#logo-container"
                                                      class="material-icons position-absolute remove_preview text-danger"
                                                      style="display:none; right: 40px; cursor: pointer;">close</span>
                                                <label for="logo_image" class="pointer mb-0">
                                                    <img style="max-width: 250px;" class="preview_image"
                                                         src="{{ url('storage/app/'.config('app.logo')) }}"
                                                         alt="{{ !empty(config('app.name')) ? config('app.name') : '' }}"/>
                                                </label>
                                                <input class="delete_image" type="hidden" name="delete_logo" value="">
                                                <input id="logo_image" class="userfile d-none" type="file"
                                                       name="app_logo"
                                                       onchange="readURL(this,'#logo-container');">
                                            </div>
                                            <div class="text-danger upload_msg"></div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th>
                                        <label>Favicon:</label>
                                    </th>
                                    <td>
                                        <div id="favicon-container" class="form-group">
                                            <div class="position-relative preview">
                                                <span data-toggle="#favicon-container" class="material-icons position-absolute remove_preview text-danger" style="display:none; right: 40px; cursor: pointer;">close</span>
                                                <label for="favicon_image" class="pointer mb-0">
                                                    <img style="max-width: 250px;" class="preview_image" src="{{ url('storage/app/'.config('app.favicon')) }}" alt="{{ !empty(config('app.name')) ? config('app.name') : '' }}"/>
                                                </label>
                                                <input class="delete_image" type="hidden" name="delete_favicon" value="">
                                                <input id="favicon_image" class="userfile d-none" type="file" name="app_favicon" onchange="readURL(this,'#favicon-container');">
                                            </div>
                                            <div class="text-danger upload_msg"></div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-sm-4 border-left">
                            <table class="table table-borderless w-100">
                                <tr>
                                    <th width="20px">
                                        <label for="excel">Excel:</label>
                                    </th>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="excel" name="excel" value="1" {{ isset($settings['excel']) && !empty($settings['excel']) && $settings['excel'] == "yes" ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="excel"></label>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th width="20px">
                                        <label for="pdf">Pdf:</label>
                                    </th>
                                    <td>
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="pdf" name="pdf" value="1" {{ isset($settings['pdf']) && !empty($settings['pdf']) && $settings['pdf'] == "yes" ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="pdf"></label>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                </div>
                <div class="card-footer d-flex justify-content-end">
                    <button type="submit" class="btn btn-secondary btn-wd"
                            id="submit_gen_set_form">
                        <span class="fas fa-circle-notch fa-spin d-none" id="save-spinner"></span>
                        <span id="save-text">
                            <span class="material-icons">
                                update
                            </span>
                            Update
                        </span>
                    </button>
                </div>
            </form>
        </div>

    </div>
    @endsection

@section('scripts')

    <script>
        $(document).ready(function () {

            $('.timezone_dropdown').select2();

            $('#general_settings_form').submit(function (e) {
                e.preventDefault();

                $('#submit_gen_set_form').attr('disabled', true);
                $('#save-spinner').removeClass('d-none');
                $('#save-text').text('Updating...');

                $.ajax({
                    type: 'POST',
                    url: "{{ route('settings.update_general_settings') }}",
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
        });

        /*===============================
              Image Upload
      ===============================*/

        @if($logo_url)
        $(document).ready(function () {
            setUserImage('{{ $logo_url }}', '#logo-container');
        });
        @endif

        @if($favicon_url)
        $(document).ready(function () {
            setUserImage('{{ $favicon_url }}', '#favicon-container');
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
                    remove_preview.css('display', 'none');
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
                            remove_preview.css('display', 'block');
                        };
                    };
                    reader.readAsDataURL(input.files[0]);
                } else {
                    userfile.val('');
                    preview_image.prop('src', '{{ asset('storage/app/public/default_images/upload.png') }}');
                    remove_preview.css('display', 'none');
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
