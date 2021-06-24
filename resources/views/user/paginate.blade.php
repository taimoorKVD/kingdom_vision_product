@extends('layouts.includes.dashboard')

@section('content')

    @include('partial.alert')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-secondary card-outline">
                <div class="card-header">
                    <div class="card-title float-left">
                        <h3>Users</h3>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-success btn-sm" href="{{ route('users.create') }}">Create New User</a>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                        <tr>
                            <th>No#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th width="280px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($users->count() > 0)
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $role)
                                                <label class="badge badge-success">{{ $role }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <a class="btn-info btn-sm" href="{{ route('users.show',$user->id) }}"><i class="fa fa-eye"></i></a>
                                        <a class="btn-warning btn-sm" href="{{ route('users.edit',$user->id) }}"><i class="fa fa-edit"></i></a>

                                        <button class="btn-danger btn-sm" onclick="handleDelete( {{ $user->id }} )">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                        <input type="hidden" value="{!! url('admin/users') !!}" id="deleteMe">
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="5" align="center">No record found.</td>
                            </tr>
                        @endif
                        </tbody>
                        <tfoot>
                        <tr>
                            <td><b>No#</b></td>
                            <td><b>Name</b></td>
                            <td><b>Email</b></td>
                            <td><b>Role</b></td>
                            <td width="280px"><b>Action</b></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
                @if($users->count() > 0)
                    <div class="card-footer">
                        <div class="float-right">
                            {!! $users->render() !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @include('partial.modal')

@endsection
