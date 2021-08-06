<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\ProfileRepository;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    private $profileRepository;
    public function __construct(ProfileRepository $profileRepository)
    {
        $this->middleware('auth');
        $this->profileRepository = $profileRepository;
    }

    public function index()
    {
        return view('admin.user.profile')
            ->withUser(auth()->user())
            ->withState(auth()->user()->current_state)
            ->withCity(auth()->user()->current_city)
            ->withCountries($this->profileRepository->get_countries());
    }

    public function update_profile()
    {
        $resp = $this->profileRepository->update(request()->all());
        if(!$resp['resp']) {
            return ['resp' => false, 'msg' => $resp['msg']];
        }
        return ['resp' => true, 'msg' => 'Profile successfully updated.'];
    }

    public function fetch_states() {
        $resp = $this->profileRepository->get_states(request()->all());
        if(!$resp['resp']) {
            return ['resp' => false, 'msg' => $resp['msg']];
        }
        return ['resp' => true, 'states' => $resp['states']];
    }

    public function fetch_cities() {
        $resp = $this->profileRepository->get_cities(request()->all());
        if(!$resp['resp']) {
            return ['resp' => false, 'msg' => $resp['msg']];
        }
        return ['resp' => true, 'cities' => $resp['cities']];
    }
}
