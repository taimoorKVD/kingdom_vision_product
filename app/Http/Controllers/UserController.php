<?php

namespace App\Http\Controllers;

use App\Http\Requests\CheckUserRequest;
use App\Repositories\UserRepository;
use App\User;

use Illuminate\Http\Request;

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
        return view('admin.user.paginate')
            ->withUsers($this->userRepository->all())
            ->withI((request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('admin.user.create')->withRoles(Role::pluck('name','name')->all());
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
        return view('admin.user.show')->withUser($user);
    }

    public function edit(User $user)
    {
        return view('admin.user.edit')
            ->withUser($user)
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
