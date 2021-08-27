@extends('admin.layouts.includes.dashboard')

@section('content')

    @include('admin.layouts.includes.page-content-header')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="card card-secondary card-outline">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6">
                            <table class="table table-borderless w-100">
                                <tbody>
                                <tr>
                                    <th width="150">
                                        <label>Role</label>
                                    </th>
                                    <td>
                                        <div class="show-field text-capitalize">{{ $role->name }}</div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @if($permissions->count())
                        <div class="row">
                            @foreach($permissions as $key => $permission)
                                @php
                                    $single_permission = strtolower(str_replace('.list','',$permission->name));
                                @endphp
                                <div class="col-md-5">
                                    <table class="table table-borderless w-100">
                                        <tbody>
                                        <tr>
                                            <th width="150" class="text-capitalize"><label>{{ str_replace('_',' ',$single_permission) }} Management</label></th>
                                            <td>
                                                <div class="show-field">
                                                    <table class="mb-0 table-sm">
                                                        <tr>
                                                            <th width="110"><label><span class="fa fa-plus"></span> Create:</label></th>
                                                            <td>{{ $role->hasPermissionTo("{$single_permission}.list") ? 'Yes' : 'No' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th><label><span class="fa fa-eye"></span> View:</label></th>
                                                            <td>{{ $role->hasPermissionTo("{$single_permission}.create") ? 'Yes' : 'No' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th><label><span class="fa fa-edit"></span> Update:</label></th>
                                                            <td>{{ $role->hasPermissionTo("{$single_permission}.edit") ? 'Yes' : 'No' }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th><label><span class="fa fa-trash"></span> Delete:</label></th>
                                                            <td>{{ $role->hasPermissionTo("{$single_permission}.delete") ? 'Yes' : 'No' }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if($key%2)
                                    <div class="offset-md-2"></div>
                                @endif
                            @endforeach
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>

@endsection
