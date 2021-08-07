<table class="table table-sm table-bordered table-striped table-hover">
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
        <td><b>No#</b></td>
        <td><b>Name</b></td>
        <td><b>Action</b></td>
    </tr>
    </tfoot>
</table>
<div class="pagination-links">
    {{ $roles->links('admin.partial.pagination') }}
</div>
