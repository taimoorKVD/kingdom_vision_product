<?php

namespace App\Repositories;

use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

use App\Http\Helper\Admin\ListingHelper;
use App\User;
use Spatie\Permission\Models\Role;

class UserRepository
{
    public function user_listing() {
        $per_page = ListingHelper::per_page();
        $query = User::select('*', DB::raw("(SELECT count(users.id) FROM users) AS total_users"));

        /*
         * SEARCH USER BY NAME
         * CREATED AT 7 AUG, 2021
         * */
        if(request()->name){
            $name = request()->name;
            $query = $query->where(function ($q) use ($name) {
                $q->where('name', 'like', "%$name%");
            });
        }

        /*
         * SEARCH USER BY EMAIL
         * CREATED AT 7 AUG, 2021
         * */
        if(request()->email){
            $email = request()->email;
            $query = $query->where(function ($q) use ($email) {
                $q->where('email', 'like', "%$email%");
            });
        }

        /*
         * SEARCH USER BY ROLE NAME
         * CREATED AT 7 AUG, 2021
         * */
        if(request()->role) {
            $role_name = request()->role;
            return User::whereHas('roles', function ($q) use ($role_name) {
                return $q->where('name', 'like', "%$role_name%");
            })->paginate($per_page);
        }

        /*
         * SEARCH USER BY ANYTHING
         * CREATED AT 7 AUG, 2021
         *
         * */
        if(request()->search){
            $search = request()->search;
            $query = $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%$search%")
                    ->orWhere('email', 'like', "%$search%")
                    ->orWhere('phone_number', 'like', "%$search%")
                    ->orWhere('dob', 'like', "%$search%")
                    ->orWhere('age', 'like', "%$search%")
                    ->orWhere('created_at', 'like', "%$search%");
            });
        }

        $query = ListingHelper::filter('users',request()->except(['name','email']),$query);
        return $query->orderByRaw("CASE WHEN total_users > 0 THEN 1 ELSE 2 END ASC")
            ->orderBy('total_users', 'desc')->paginate($per_page)
            ->appends(request()->query());
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
        $user->status = isset(request()->status) && !empty(request()->status) ? request()->status : 0;
        if(!$user->update()){
            return false;
        }
        $user->syncModel();
        $user->assignRole(request()->roles);

        return true;
    }
}
