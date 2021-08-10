@extends('admin.layouts.includes.dashboard')

@section('content')
    <style>
        .select2-container {
            width: 85% !important;
        }
    </style>

    @include('admin.layouts.includes.page-content-header')

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-secondary card-outline">
                <form action="{{ route('users.store') }}" method="POST">
                    @csrf
                    <div class="card-body">

                        <div class="row">
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label for="name">Name</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-user"></span>
                                    </div>
                                    <input type="text" class="form-control" name="name" id="name">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label for="email">Email</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-envelope"></span>
                                    </div>
                                    <input type="email" class="form-control" name="email" id="email" autocomplete="username">
                                </div>
                            </div>

                            <div class="col-xs-6 col-sm-6 col-md-6">
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
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label for="confirm-password">Confirm Password</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text fa fa-key"></span>
                                    </div>
                                    {!! Form::password('confirm-password', array('class' => 'form-control')) !!}
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-6 col-md-6">
                                <label for="role">Role</label>
                                <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text fa fa-user-secret"></span>
                                </div>
                                    {!! Form::select('roles[]', $roles,[], array('class' => 'form-control select-multiple-role', 'multiple')) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-secondary btn-wd">
                                <span class="material-icons">
                                    save_alt
                                </span>
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.select-multiple-role').select2();
        });
    </script>
@endsection
