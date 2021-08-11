<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\SettingRepository;
use App\Models\Admin\Setting;

class SettingController extends Controller
{
    public function __construct(SettingRepository $settingRepository) {
        $this->middleware('auth');
        $this->settingRepository = $settingRepository;
    }

    public function index() {
        $resp = Setting::where('name', 'active_email')->get()->first();
        $email_key = "empty";
        $email_value = null;
        if($resp)
        {
            $email = json_decode($resp->value, true);
            $email_key = $email['type'];
            $email_value = $email;
        }
        return view ('admin.settings.email-configuration')
            ->withEmailKey($email_key)
            ->withEmailValue($email_value)
            ->withTitle('Settings > Email Configurations');

    }

    public function store() {
        $resp = $this->settingRepository->email_configuration(request()->all());
        if(!$resp['resp']) {
            return ['resp' => false, 'msg' => $resp['msg']];
        }
        return ['resp' => true, 'msg' => 'Email configuration is stored successfully.'];
    }

    public function email_connectivity_testing() {
        $resp = $this->settingRepository->check_email_connectivity(request()->all());
        if(!$resp['resp']) {
            return ['resp' => false, 'msg' => $resp['msg'] , 'config' => $resp['config']];
        }
        return ['resp' => true, 'msg' => 'Email is configured successfully.'];
    }

    public function get_email_config() {
        return $this->settingRepository->fetch_email_configurations(request()->all());
    }

    public function general_settings()
    {
        return view('admin.settings.general_settings')
            ->withTimezones($this->settingRepository->get_timezones())
            ->withCurrentTimezone($this->settingRepository->get_current_timezone())
            ->withTitle('Settings > General Settings');;
    }

    public function update_general_settings()
    {
        $resp = $this->settingRepository->update_general_settings(request()->all());
        if(!$resp['resp']) {
            return ['resp' => false, 'msg' => $resp['msg']];
        }
        \Artisan::call('cache:clear');
        return ['resp' => true, 'msg' => 'Successfully Updated'];
    }

    public function fetch_email_config() {
        return view('admin.settings.load-email-form')
            ->withEmailValue($this->settingRepository->fetch_email_configurations(request()->all()));
    }
}
