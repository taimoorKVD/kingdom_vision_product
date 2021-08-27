<?php

namespace App\Repositories;

use App\Models\Admin\City;
use App\Models\Admin\Country;
use App\Models\Admin\State;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileRepository
{
    public function get_countries() {
        return Country::all();
    }

    public function get_states() {
        $states = State::where('country_id', request()->country_id)->get();
        if($states->count() > 0) {
            return [ 'resp' => true, 'states' => $states];
        }
        return [ 'resp' => false, 'msg' => 'No state found.' ];
    }

    public function get_cities() {
        $cities = City::where('state_id', request()->state_id)->get();
        if($cities->count() > 0) {
            return [ 'resp' => true, 'cities' => $cities];
        }
        return [ 'resp' => false, 'msg' => 'No cities found.' ];
    }

    public function update() {
        $update_profile = User::find(auth()->user()->id);
        $update_profile->name = request()->name;
        $update_profile->email = request()->email;
        $update_profile->dob = request()->dob;
        $update_profile->age = request()->age;
        $update_profile->address = request()->address;
        $update_profile->country = request()->country;
        $update_profile->state = request()->state;
        $update_profile->city = request()->city;
        $update_profile->zip = request()->zipcode;
        $update_profile->phone_prefix = request()->phone_prefix;
        $update_profile->phone_number = request()->phone_number;

        if (request()->file('profile_pic')) {
            $profile_pic = request()->profile_pic->store('profile');
            $update_profile->profile_photo = $profile_pic;
        }

        if(request()->filled('delete_logo')) {
            Storage::delete($update_profile->profile_photo);
            $update_profile->profile_photo = null;
        }

        if(request()->password) {
            $update_profile->password = Hash::make(request()->password);
        }

        try {
            $update_profile->save();
            return ['resp' => true, 'msg' => response('okay', 200)];
        } catch (\Exception $e) {
            return ['resp' => false, 'msg' => $e->getMessage()];
        }
    }
}
