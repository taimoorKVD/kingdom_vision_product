@extends('admin.layouts.includes.dashboard')

@section('content')

    @include('admin.partial.alert')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h3>Roles</h3>
                    </div>
                    <div class="float-right">
                        @can('roles.create')
                            <a class="btn btn-success btn-sm" href="{{ route('roles.create') }}"> Create New Role</a>
                        @endcan
                    </div>
                </div>

                <div class="card-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th width="80px">No#</th>
                            <th>Name</th>
                            <th width="280px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($roles->count() > 0)
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        <a class="btn-info btn-sm mr-1" href="{{ route('roles.show',$role->id) }}">
                                            <i class="fa fa-eye"></i>
                                        </a>

                                        @can('roles.edit')
                                            <a class="btn-warning btn-sm mr-1" href="{{ route('roles.edit',$role->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        @endcan

                                        @can('roles.delete')
                                            <button class="btn-danger btn-sm" onclick="handleDelete( {{ $role->id }} )">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                            <input type="hidden" value="{!! url('admin/roles') !!}" id="deleteMe">
                                        @endcan

                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="3" align="center">No record found.</td>
                            </tr>
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><b>No#</b></td>
                            <td><b>Name</b></td>
                            <td><b>Action</b></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>

                @if($roles->count() > 0)
                <div class="card-footer">
                    {!! $roles->render() !!}
                </div>
                @endif
            </div>
        </div>
    </div>

    @include('admin.partial.modal')

@endsection
