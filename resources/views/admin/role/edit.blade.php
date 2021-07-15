@extends('admin.layouts.includes.dashboard')

@section('content')

    @include('admin.partial.alert')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h3>Edit Role</h3>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-info btn-sm" href="{{ route('roles.index') }}"> Back</a>
                    </div>
                </div>

                {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-5">
                            <table class="table table-borderless w-100">
                                <tbody>
                                <tr>
                                    <th width="150">
                                        <label class="required">Role</label>
                                    </th>
                                    <td>
                                        <input type="text" name="name" class="form-control alpha-only" value="{{ $role->name }}">
                                        <div id="name" class="invalid-feedback"></div>
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
                        <a href="" class="btn btn-secondary btn-sm">Reload</a>
                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
