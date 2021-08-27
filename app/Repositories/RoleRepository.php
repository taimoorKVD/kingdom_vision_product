<?php

namespace App\Repositories;


use App\Http\Helper\Admin\ListingHelper;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Admin\RolesExport;

use PDF;

class RoleRepository
{
    public function role_listing() {
        $per_page = ListingHelper::paginate_per_page('role');
        $query = Role::select('*', DB::raw("(SELECT count(roles.id) FROM roles) AS total_roles"));

        /*
         * SEARCH ROLE BY NAME
         * CREATED AT 7 AUG, 2021
         * */
        if(request()->name){
            $name = request()->name;
            $query = $query->where(function ($q) use ($name) {
                $q->where('name', 'like', "%$name%");
            });
        }

        /*
         * SEARCH USER BY ANYTHING
         * CREATED AT 7 AUG, 2021
         *
         * */
        if(request()->search){
            $search = request()->search;
            $query = $query->where(function ($q) use ($search) {
                $q->where('id', 'like', "%$search%")
                    ->orWhere('name', 'like', "%$search%")
                    ->orWhere('guard_name', 'like', "%$search%")
                    ->orWhere('created_at', 'like', "%$search%");
            });
        }

        return $query->orderByRaw("CASE WHEN total_roles > 0 THEN 1 ELSE 2 END ASC")
            ->orderBy('total_roles', 'desc')->paginate($per_page)
            ->appends(request()->query());
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

    public function bulk_deletion() {
        try {
            if(isset(request()->deleteIds) && !empty(request()->deleteIds)) {
                foreach (request()->deleteIds as $id) {
                    $role = Role::find($id);
                    $role->delete();
                }
            }
            return response()->json([ 'status' => true, 'msg' => 'Bulk delete completed successfully' ]);
        } catch (\Exception $e) {
            return response()->json([ 'status' => false, 'msg' => $e->getMessage() ]);
        }
    }

    public function get_pdf() {
        try {
            $data = Role::select('id','name','created_at')->get();
            set_time_limit(300);
            $pdf = PDF::loadView('admin.role.pdf.listing', ['data' => $data]);
            $path = public_path('pdf/');
            $fileName = time() . '.' . 'pdf';

            /* STORE PDF IN ROOT PUBLIC FOLDER */
            $pdf->save($path . '/' . $fileName);

            return public_path('pdf/' . $fileName);
        } catch (\Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function get_excel() {
        try {
            return Excel::download(new RolesExport, 'roles.xlsx');
        } catch (\Exception $e) {
            return ['resp' => false, 'msg' => $e->getMessage()];
        }
    }
}
