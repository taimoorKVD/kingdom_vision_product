@if($permissions->count())
    <div class="row">
        @foreach($permissions as $key=>$permission)
            @php
                $single_permission = strtolower(str_replace('.list','',$permission->name));
            @endphp
            <div class="col-md-5">
                <table class="table table-borderless w-100">
                    <tbody>
                    <tr>
                        <th width="150" class="text-capitalize"><label>{{ str_replace('_',' ',$single_permission) }} Management</label></th>
                        <td>
                            <div class="text-left">
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="{{$single_permission}}.list" {{ isset($role) && $role->hasPermissionTo("{$single_permission}.list") ? 'checked' : '' }} name="{{$single_permission}}[list]" value="1">
                                    <label class="custom-control-label" for="{{$single_permission}}.list">View</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="{{$single_permission}}.create" {{ isset($role) && $role->hasPermissionTo("{$single_permission}.create") ? 'checked' : '' }} name="{{$single_permission}}[create]" value="1">
                                    <label class="custom-control-label" for="{{$single_permission}}.create">Create</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="{{$single_permission}}.edit" {{ isset($role) && $role->hasPermissionTo("{$single_permission}.edit") ? 'checked' : '' }} name="{{$single_permission}}[edit]" value="1">
                                    <label class="custom-control-label" for="{{$single_permission}}.edit">Update</label>
                                </div>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="{{$single_permission}}.delete" {{ isset($role) && $role->hasPermissionTo("{$single_permission}.delete") ? 'checked' : '' }} name="{{$single_permission}}[delete]" value="1">
                                    <label class="custom-control-label" for="{{$single_permission}}.delete">Delete</label>
                                </div>
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
