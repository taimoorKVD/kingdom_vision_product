{{-- Gmail & Mailtrap --}}
<div class="row"
     id="email_config_form">

    <div class="col-md-4">
        <label for="driver">Driver</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-hdd"></span>
            </div>
            <input type="text" class="form-control clear driver" id="driver" name="driver"
                   value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['driver'] : '' }}">
            <div class="invalid-feedback d-none">
                The driver field is empty.
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="host">Host</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-h-square"></span>
            </div>
            <input type="text" class="form-control clear host" id="host" name="host"
                   value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['host'] : '' }}">
            <div class="invalid-feedback d-none">
                The host field is empty.
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="port">Port</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-random"></span>
            </div>
            <input type="text" class="form-control clear port" id="port" name="port"
                   value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['port'] : '' }}">
            <div class="invalid-feedback d-none">
                The port field is empty.
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="username">Username</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-user"></span>
            </div>
            <input type="text" class="form-control clear username" id="username"
                   name="username" autocomplete="username"
                   value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['username'] : '' }}">
            <div class="invalid-feedback d-none user-error-msg">
                The username field is empty.
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="password">Password</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-key"></span>
            </div>
            <input type="password" class="form-control clear secret" id="password"
                   name="password" autocomplete="current-password"
                   value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['password'] : '' }}">
            <div class="invalid-feedback d-none pass-error-msg">
                The password field is empty.
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="encryption">Encryption</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-shield"></span>
            </div>
            <input type="text" class="form-control clear encryption" id="encryption"
                   name="encryption"
                   value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['encryption'] : '' }}">
            <div class="invalid-feedback d-none">
                The encryption field is empty.
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="address">From Address</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-map-marked"></span>
            </div>
            <input type="text" class="form-control clear address" id="address"
                   name="address"
                   value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['from']['address'] : '' }}">
            <div class="invalid-feedback d-none">
                The driver field is empty.
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <label for="name">App Name</label>
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text fa fa-id-card"></span>
            </div>
            <input type="text" class="form-control clear name" id="name" name="name"
                   value="{{ isset($emailValue) && !empty($emailValue) ? $emailValue['from']['name'] : '' }}">
            <div class="invalid-feedback d-none">
                The app name field is empty.
            </div>

        </div>
    </div>
</div>
{{-- End Gmail & Mailtrap --}}
