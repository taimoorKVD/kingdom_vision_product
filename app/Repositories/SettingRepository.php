<?php

namespace App\Repositories;

use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\Setting;

class SettingRepository
{
    /*
     * function to fetch email email configurations
    */
    public function fetch_email_configurations()
    {
        $resp = Setting::where('name', 'email_configurations')->get();
        if($resp)
        {
            foreach ($resp as $res)
            {
                $decode_resp = json_decode($res->value, true);
                foreach ($decode_resp as $key => $value)
                {
                    if(request()->email_type == $key){
                        return $value;
                    }
                }
            }
        }
    }

    public function validate_email_config()
    {
        if(request()->email_type !== "default")
        {
            $validator = Validator::make(request()->all(), [
                'driver' => 'required',
                'host' => 'required',
                'port' => 'required',
                'username' => 'required',
                'password' => 'required',
                'encryption' => 'required',
                'address' => 'required',
                'name' => 'required',
            ]);
            if($validator->fails()){
                return [ 'resp' => false, 'msg' => $validator->errors()->all() ];
            }
        }
        return [ 'resp' => true, 'msg' => response('okay', 200) ];
    }

    /*
     * function store email configuration
     * */
    public function email_configuration()
    {
        $validation_resp = $this->validate_email_config(request()->all());
        if(!$validation_resp['resp']){
            return ['resp' => false, 'msg' => $validation_resp];
        }

        $email_config = [
            'type' => request()->email_type === 'default' ? 'default': request()->email_type,
            'driver' => request()->email_type === 'default' ? 'smtp' : request()->driver,
            'host' => request()->email_type === 'default' ? 'smtp.gmail.com' : request()->host,
            'port' => request()->email_type === 'default' ? '587' : request()->port,
            'from' => [
                'address' => request()->email_type === 'default' ? 'taimoor.kingdomvision@gmail.com' : request()->address,
                'name' => request()->email_type === 'default' ? 'Kingdom Vison Default' : request()->name,
            ],
            'encryption' => request()->email_type === 'default' ? 'tls' : request()->encryption,
            'username' => request()->email_type === 'default' ? 'taimoor.kingdomvision@gmail.com' : request()->username,
            'password' => request()->email_type === 'default' ? 'kingtaimoor@16' : request()->password,
            'sendmail' => '/usr/sbin/sendmail -bs',
            'pretend' => false,
        ];
        try {
            $this->store($email_config);
            return [ 'resp' => true, 'msg' => response('okay', 200) ];
        } catch (\Exception $e) {
            return ['resp' => false, 'msg' => $e->getMessage()];
        }
    }

    /*
     * check if table is not empty
     * */
    public function store($email_config)
    {
        $result = Setting::where('name', 'email_configurations')->get()->first();
        if(isset($result) && !empty($result))
        {
            $collection = json_decode($result->value, true);
            try {
                foreach ($collection as $key => $value)
                {
                    /*
                     * check if email config exists
                     * */
                    if($key != request()->email_type)
                    {
                        $data['value'] = json_encode([ $key => $value, request()->email_type => $email_config]);

                        Setting::where('name','email_configurations')->update($data);
                    }
                }
                $active_email['value'] = json_encode($email_config);
                Setting::where('name','active_email')->update($active_email);

                return [ 'resp' => true, 'msg' => response('okay', 200) ];
            }
            catch (\Exception $e) {
                return ['resp' => false, 'msg' => $e->getMessage()];
            }
        }
        else {
            try {
                /*
                 * all email configurations
                 * */
                $data['name'] = 'email_configurations';
                $data['value'] = json_encode([ request()->email_type => $email_config ]);
                Setting::insert($data);

                /*
                 * active email config
                 * */
                $data['name'] = 'active_email';
                $data['value'] = json_encode($email_config);
                Setting::insert($data);

                return true;
            }
            catch (\Exception $e) {
                return ['resp' => false, 'msg' => $e->getMessage()];
            }
        }
    }

    public function check_email_connectivity()
    {
        $validator = Validator::make(request()->all(), [
            'to' => 'required',
        ]);

        if($validator->fails()){
            return [ 'resp' => false, 'msg' => $validator->errors()->all(), 'config' => true ];
        }
        $details = [
            'title' => 'Email from '.config('app.name'),
            'subject' => request()->subject,
            'body' => request()->body,
        ];

        try {
            Mail::to(request()->to)->send(new TestMail($details));
            return [ 'resp' => true, 'msg' => response('okay', 200) ];
        } catch (\Exception $e) {
            return ['resp' => false, 'msg' => $e->getMessage(), 'config' => false ];
        }
    }
}
