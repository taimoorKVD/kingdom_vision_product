<?php

namespace App\Repositories;

use App\User;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;

class UserRepository
{
    public function all()
    {
        return User::orderBy('created_at', 'desc')->paginate(10);
    }

    public function store()
    {
        $user = new User();
        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = Hash::make(request()->password);
        $user->phone_prefix = request()->phone_prefix;
        $user->phone_number = request()->phone_number;
        $user->zip = request()->zip;
        $user->state = request()->state;
        $user->city = request()->city;
        $user->country = request()->country;
        $user->profile_photo = request()->profile_photo;
        $user->status = request()->status ? 1 : 0;
        if(!$user->save()){
            return false;
        }
        $user->assignRole(request()->roles);

        return true;
    }

    public function update($user)
    {
        if(!empty(request()->password)){
            $user->password = Hash::make(request()->password);
        }

        $user->name = request()->name;
        $user->email = request()->email;
        $user->phone_prefix = request()->phone_prefix;
        $user->phone_number = request()->phone_number;
        $user->zip = request()->zip;
        $user->state = request()->state;
        $user->city = request()->city;
        $user->country = request()->country;
        $user->profile_photo = request()->profile_photo;
        $user->status = request()->status;
        if(!$user->update()){
            return false;
        }
        $user->syncModel();
        $user->assignRole(request()->roles);

        return true;
    }
}
