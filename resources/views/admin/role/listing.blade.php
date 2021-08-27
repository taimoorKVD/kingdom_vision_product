<table class="table table-sm table-bordered table-striped table-hover" id="listing_table">
    <thead>
    <tr>
        <th width="80px" class="text-center">
            <div class="form-check">
                <input class="form-check-input role-checkbox-all" type="checkbox" id="check_all">
                <label class="form-check-label" for="check_all"></label>
            </div>
        </th>
        <th width="80px">No#</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    </thead>
    <tbody>
    @if($roles->count() > 0)
        @foreach ($roles as $role)
            <tr>
                <td class="text-center">
                    <div class="form-check">
                        <input class="form-check-input role-checkbox" name="role_ids[]" type="checkbox" value="{{ $role->id }}" id="role-{{ $role->id }}">
                        <label class="form-check-label" for="role-{{ $role->id }}"></label>
                    </div>
                </td>
                <td>{{ ++$i }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a href="{{ route('roles.show',$role->id) }}">
                        <span class="material-icons">
                            visibility
                        </span>
                    </a>
                    @can('roles.edit')
                        |
                        <a href="{{ route('roles.edit',$role->id) }}">
                            <span class="material-icons">
                                edit
                            </span>
                        </a>
                    @endcan

                    @can('roles.delete')
                        |
                        <a href="javascript:void(0)" onclick="handleDelete( {{ $role->id }} )">
                            <span class="material-icons">
                                delete
                            </span>
                        </a>
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
        <td></td>
        <td><b>No#</b></td>
        <td><b>Name</b></td>
        <td><b>Action</b></td>
    </tr>
    </tfoot>
</table>
<div class="pagination-links">
    {{ $roles->links('admin.partial.pagination') }}
</div>
