<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helper\Admin\ListingHelper;
use App\Http\Requests\CheckRoleRequest;

use App\Repositories\PaginationRepository;
use App\Repositories\RoleRepository;

use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    private $roleRepository, $paginationRepository;

    function __construct(RoleRepository $roleRepository, PaginationRepository $paginationRepository)
    {
        $this->middleware('auth');
        $this->middleware('permission:roles.list|roles.create|roles.edit|roles.delete', ['only' => ['index','store']]);
        $this->middleware('permission:roles.create', ['only' => ['create','store']]);
        $this->middleware('permission:roles.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:roles.delete', ['only' => ['destroy']]);
        $this->roleRepository = $roleRepository;
        $this->paginationRepository = $paginationRepository;
    }

    public function index()
    {
        return view('admin.role.index')
            ->withTitle('Roles')
            ->withSingularTitle('role')
            ->withBulkDeleteRoute('role.bulk_delete')
            ->withPdfExportRoute('role.export_pdf')
            ->withExcelExportRoute('role.export_excel')
            ->withCurrPaginate(ListingHelper::paginate_per_page('role'))
            ->withAddBtnRoute(route('roles.create'));
    }

    public function listing()
    {
        return view('admin.role.listing')
            ->withRoles($this->roleRepository->role_listing(request()->all()))
            ->withI((request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.role.create')
            ->withPermissions($this->roleRepository->show())
            ->withTitle('Roles > Add New Role')
            ->withBackBtnRoute(route('roles.index'));
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
        return view('admin.role.show')
            ->withRole($role)
            ->withTitle('Roles > Show Role')
            ->withBackBtnRoute(route('roles.index'))
            ->withPermissions($this->roleRepository->show($role));
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit')
            ->withRole($role)
            ->withTitle('Roles > Edit Role')
            ->withBackBtnRoute(route('roles.index'))
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

    public function bulk_delete() {
        return $this->roleRepository->bulk_deletion(request()->all());
    }

    public function export_pdf() {
        return response()->download($this->roleRepository->get_pdf())->deleteFileAfterSend(true);
    }

    public function export_excel() {
        return $this->roleRepository->get_excel();
    }
}
