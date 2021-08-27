<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helper\Admin\ListingHelper;
use App\Http\Requests\CheckUserRequest;
use App\Repositories\UserRepository;
use App\User;

use Spatie\Permission\Models\Role;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\Admin\UsersExport;

class UserController extends Controller
{
    private $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('auth');
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        return view('admin.user.index')
            ->withTitle('Users')
            ->withSingularTitle('user')
            ->withBulkDeleteRoute('user.bulk_delete')
            ->withPdfExportRoute('user.export_pdf')
            ->withExcelExportRoute('user.export_excel')
            ->withCurrPaginate(ListingHelper::paginate_per_page('user'))
            ->withAddBtnRoute(route('users.create'));
    }

    public function listing()
    {
        return view('admin.user.listing')
            ->withUsers($this->userRepository->user_listing(request()->all()))
            ->withI((request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.user.create')
            ->withRoles(Role::pluck('name','name')->all())
            ->withTitle('Users > Add New User')
            ->withBackBtnRoute(route('users.index'));
    }

    public function store(CheckUserRequest $cur)
    {
        $response = $this->userRepository->store(request()->all());
        if(!$response){
            return redirect()
                ->back()
                ->with('error-message','Something went wrong.');
        }

        return redirect()
            ->route('users.index')
            ->with('success-message','User created successfully');
    }

    public function show(User $user)
    {
        return view('admin.user.show')
            ->withUser($user)
            ->withTitle('Users > View User')
            ->withBackBtnRoute(route('users.index'));
    }

    public function edit(User $user)
    {
        return view('admin.user.edit')
            ->withUser($user)
            ->withTitle('Users > Edit User')
            ->withBackBtnRoute(route('users.index'))
            ->withRoles(Role::pluck('name','name')->all())
            ->withUserRole($user->roles->pluck('name','name')->all());
    }

    public function update(CheckUserRequest $cur, User $user)
    {
        $response = $this->userRepository->update($user,request()->all());
        if(!$response){
            return redirect()
                ->back()
                ->with('error-message','Something went wrong.');
        }

        return redirect()
            ->route('users.index')
            ->with('success-message','User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()
            ->route('users.index')
            ->with('success-message','User deleted successfully');
    }

    public function bulk_delete() {
        return $this->userRepository->bulk_deletion(request()->all());
    }

    public function export_pdf() {
        return response()->download($this->userRepository->get_pdf())->deleteFileAfterSend(true);
    }

    public function export_excel() {
        return $this->userRepository->get_excel();
    }
}
