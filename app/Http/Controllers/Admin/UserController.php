<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Helper\Admin\ListingHelper;
use App\Http\Requests\CheckUserRequest;
use App\Repositories\UserRepository;
use App\User;

use Spatie\Permission\Models\Role;
use PDF;

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
        try {
            $data = User::select('id','name','email','created_at')->get();
            set_time_limit(300);
            $pdf = PDF::loadView('admin.user.pdf.listing', ['data' => $data]);
            $path = public_path('pdf/');
            $fileName = time() . '.' . 'pdf';

            /* STORE PDF IN ROOT PUBLIC FOLDER */
            $pdf->save($path . '/' . $fileName);

            $pdf = public_path('pdf/' . $fileName);
            return response()->download($pdf)->deleteFileAfterSend(true);
        } catch (\Exception $e) {
            return ['status' => false, 'data' => $e->getMessage()];
        }
    }

    public function export_excel() {
        try {
            return ['resp' => true, 'excel' => 'success'];
        } catch (\Exception $e) {
            return ['resp' => false, 'msg' => $e->getMessage()];
        }
    }
}
