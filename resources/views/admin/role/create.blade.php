@extends('admin.layouts.includes.dashboard')

@section('content')

    @include('admin.layouts.includes.page-content-header')

    <div class="row">
        <div class="col-lg-12">
            <div class="card card-secondary card-outline">
                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="table table-borderless w-100">
                                <tbody>
                                <tr>
                                    <th width="150">
                                        <label class="required" for="role">Role</label>
                                    </th>
                                    <td>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text fa fa-user-secret"></span>
                                            </div>
                                        <input type="text" name="name" class="form-control alpha-only" id="role">
                                        <div id="name" class="invalid-feedback"></div>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @include('admin.role.permissions-checkbox')

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
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
