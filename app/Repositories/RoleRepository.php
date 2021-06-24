<?php


namespace App\Repositories;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleRepository
{
    public function fetchAll(){
        return Role::orderBy('created_at','DESC')
            ->paginate(10);
    }

    public function show()
    {
        return Permission::where('name','LIKE','%s.list')
            ->get();
    }

    public function store()
    {
        $role = new Role();
        $role->name = strtolower(request()->name);
        $role->guard_name = 'web';
        if (!$role->save()){
            return false;
        }

        $input = request()->except('_token','name');
        foreach ($input as $module => $array){
            foreach ($array as $operation => $bool){
                $role->givePermissionTo("{$module}.{$operation}");
            }
        }

        return true;
    }

    public function edit(){
        return Permission::where('name','LIKE','%s.list')
            ->get();
    }

    public function update($role){
        $role->name = strtolower(request()->name);
        if(!$role->save())
            return false;

        $permissionNames = $role->getPermissionNames();
        foreach ($permissionNames as $permissionName){
            $role->revokePermissionTo($permissionName);
        }

        $input = request()->except('_token','_method','name');
        foreach ($input as $module => $array){
            foreach ($array as $operation => $bool){
                $role->givePermissionTo("{$module}.{$operation}");
            }
        }
        return true;
    }
}
