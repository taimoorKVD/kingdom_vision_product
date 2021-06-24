<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckRoleRequest;
use App\Repositories\RoleRepository;

use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    private $roleRepository;

    function __construct(RoleRepository $roleRepository)
    {
        $this->middleware('permission:roles.list|roles.create|roles.edit|roles.delete', ['only' => ['index','store']]);
        $this->middleware('permission:roles.create', ['only' => ['create','store']]);
        $this->middleware('permission:roles.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:roles.delete', ['only' => ['destroy']]);
        $this->roleRepository = $roleRepository;
    }

    public function index()
    {
        return view('role.paginate')
            ->withRoles($this->roleRepository->fetchAll())
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('role.create')
            ->withPermissions($this->roleRepository->show());
    }

    public function store(CheckRoleRequest $crr)
    {
        $response = $this->roleRepository->store(request()->all());
        if(!$response){
            return redirect()
                ->back()
                ->with('error-message','Something went wrong! Try again.');
        }

        return redirect()
            ->route('roles.index')
            ->with('success-message','Role created successfully');
    }

    public function show(Role $role)
    {
        return view('role.show')
            ->withRole($role)
            ->withPermissions($this->roleRepository->show($role));
    }

    public function edit(Role $role)
    {
        return view('role.edit')
        ->withRole($role)
        ->withPermissions($this->roleRepository->edit());
    }

    public function update(CheckRoleRequest $crr, Role $role)
    {
        $response = $this->roleRepository->update($role, request()->all());
        if(!$response){
            return redirect()
                ->back()
                ->with('error-message','Something went wrong.');
        }

        return redirect()
            ->route('roles.index')
            ->with('success-message','Role updated successfully');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()
            ->route('roles.index')
            ->with('success-message','Role deleted successfully');
    }
}
