<table class="table table-sm table-bordered table-hover table-striped" id="listing_table">
    <thead>
    <tr>
        <th class="text-center">
            <div class="form-check">
                <input class="form-check-input user-checkbox-all" type="checkbox" id="check_all">
                <label class="form-check-label" for="check_all"></label>
            </div>
        </th>
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
                <td class="text-center">
                    <div class="form-check">
                        <input class="form-check-input user-checkbox" name="user_ids[]" type="checkbox" value="{{ $user->id }}" id="user-{{ $user->id }}">
                        <label class="form-check-label" for="user-{{ $user->id }}"></label>
                    </div>
                </td>
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
                    <a class="" href="{{ route('users.show',$user->id) }}">
                        <span class="material-icons">visibility</span>
                    </a>
                    |
                    <a class="" href="{{ route('users.edit',$user->id) }}">
                        <span class="material-icons">
                            edit
                        </span>
                    </a>
                    |
                    <a href="javascript:void(0)" class="" onclick="handleDelete( {{ $user->id }} )">
                        <span class="material-icons">
                            delete
                        </span>
                    </a>
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
        <td></td>
        <td><b>No#</b></td>
        <td><b>Name</b></td>
        <td><b>Email</b></td>
        <td><b>Role</b></td>
        <td width="280px"><b>Action</b></td>
    </tr>
    </tfoot>
</table>
<div class="pagination-links">
    {{ $users->links('admin.partial.pagination') }}
</div>
