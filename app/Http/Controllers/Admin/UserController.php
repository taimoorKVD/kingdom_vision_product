<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CheckUserRequest;
use App\Repositories\UserRepository;
use App\User;

use Spatie\Permission\Models\Role;

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
}
