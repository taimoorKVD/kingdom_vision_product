@extends('layouts.includes.dashboard')

@section('content')

    @include('partial.alert')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h3>Create New Role</h3>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-info btn-sm" href="{{ route('roles.index') }}"> Back</a>
                    </div>
                </div>

                {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
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
                                        <input type="text" name="name" class="form-control alpha-only">
                                        <div id="name" class="invalid-feedback"></div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    @include('role.permissions-checkbox')

                </div>

                <div class="card-footer">
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection
