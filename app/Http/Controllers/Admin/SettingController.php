<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MyTestMail;
use App\Repositories\SettingRepository;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\Setting;

class SettingController extends Controller
{
    public function __construct(SettingRepository $settingRepository)
    {
        $this->middleware('auth');
        $this->settingRepository = $settingRepository;
    }

    public function index()
    {
        $resp = Setting::where('name', 'active_email')->get()->first();
        $email_key = "empty";
        $email_value = null;
        if($resp)
        {
            $email = json_decode($resp->value, true);
            $email_key = $email['type'];
            $email_value = $email;
        }
        return view ('admin.settings.email.setup')
            ->withEmailKey($email_key)
            ->withEmailValue($email_value);

    }

    public function store()
    {
        $resp = $this->settingRepository->store_email_configuration(request()->all());
        if(!$resp['resp'])
        {
            return ['resp' => false, 'msg' => $resp['msg']];
        }
        return ['resp' => true, 'msg' => 'Email is configured successfully.'];

    }

    public function email_connectivity_testing()
    {
        $resp = $this->settingRepository->check_email_connectivity(request()->all());
        if(!$resp['resp'])
        {
            return ['resp' => false, 'msg' => $resp['msg']];
        }
        return ['resp' => true, 'msg' => 'Email is configured successfully.'];
    }

    public function get_email_config()
    {
        return $this->settingRepository->fetch_email_configurations(request()->all());
    }
}
