<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\MyTestMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Admin\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;


class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $resp = Setting::where('name', 'active_email')->get()->first();
        $email_key = "empty";
        $email_value = null;
        if($resp)
        {
            $decode_resp = json_decode($resp->value, true);
            foreach ($decode_resp as $key => $value)
            {
                $email_key = $key;
                $email_value = $value;
            }
        }
//        dd($email_key);
//        dd($decode_resp['driver']);
//        dd($decode_resp['from']['name']);
        return view ('admin.settings.email.setup')
            ->withEmailKey($email_key)
            ->withEmailValue($email_value);

    }

    public function email_configuration()
    {
        $result = Setting::where('name', 'email_configurations')->get()->first();
        $email_configurations = [];
        if(isset($result) && !empty($result))
        {
            $mail = json_decode($result->value, true);
            /*dd($mail);*/
            foreach ($mail as $key => $value)
            {
                /*dd($key);*/
                if($key != request()->email_type)
                {
                    $request = [
                        $key => $value,
                        request()->email_type => [
                            'driver' => request()->driver,
                            'host' => request()->host,
                            'port' => request()->port,
                            'from' => array('address' => request()->address, 'name' => request()->name ? request()->name : 'Kingdom Vision'),
                            'encryption' => request()->encryption ? request()->encryption : 'tls',
                            'username' => request()->username,
                            'password' => request()->password,
                            'sendmail' => '/usr/sbin/sendmail -bs',
                            'pretend' => false,
                        ]
                    ];
                    $data['value'] = json_encode($request);
                    /*array_push($email_configurations, [ $key => $value, request()->email_type => $data['value']]);*/
                    /*$email_config = Setting::where('name','email_configuration')
                            ->update($data);*/
                    /*dd($data['value']);*/
                    /*dd($mail);*/
                    /*dd();*/
                    /*$add['value'] = json_encode($email_configurations);*/
                    $email_configs = Setting::where('name','email_configurations')
                        ->update($data);
                }
            }
            $active_email = [
                request()->email_type => [
                    'driver' => request()->driver,
                    'host' => request()->host,
                    'port' => request()->port,
                    'from' => array('address' => request()->address, 'name' => request()->name ? request()->name : 'Kingdom Vision'),
                    'encryption' => request()->encryption ? request()->encryption : 'tls',
                    'username' => request()->username,
                    'password' => request()->password,
                    'sendmail' => '/usr/sbin/sendmail -bs',
                    'pretend' => false,
                ]
            ];
            $active_data['value'] = json_encode($active_email);
            $email_config = Setting::where('name','active_email')
                ->update($active_data);
            return redirect()
                ->back()
                ->with('success-message', 'Email configure successfully.');
        }
        else {
            $request = [
                request()->email_type =>
                    [
                        'driver' => request()->driver,
                        'host' => request()->host,
                        'port' => request()->port,
                        'from' => array('address' => request()->address, 'name' => request()->name ? request()->name : 'Kingdom Vision'),
                        'encryption' => request()->encryption ? request()->encryption : 'tls',
                        'username' => request()->username,
                        'password' => request()->password,
                        'sendmail' => '/usr/sbin/sendmail -bs',
                        'pretend' => false,
                    ]
            ];
            $data['name'] = 'email_configurations';
            $data['value'] = json_encode($request);
            $email_config1 = Setting::insert($data);

            $data['name'] = 'active_email';
            $email_config2 = Setting::insert($data);

            if (!$email_config1 && !$email_config2) {
                return redirect()
                    ->back()
                    ->with('error-message', 'Something went wrong');
            }

            return redirect()
                ->back()
                ->with('success-message', 'Email configure successfully.');
        }
        /* dd(request()->all());
         * $config = array(
            'from'       => array('address' => 'taimoor.kingdomvision@gmail.com', 'name' => 'new name'),
            'username'   => 'bb02a26594765d',
        );
        Config::set('mail', $config);
        return config('mail');*/
        /*return config('mail');

        env('MAIL_MAILER','smtp');
        env('MAIL_HOST','smtp.gmail.com');
        env('MAIL_PORT','587');
        env('MAIL_USERNAME','bb02a26594765d');
        env('MAIL_PASSWORD','9d2bffedacd4b7');
        env('MAIL_ENCRYPTION','tls');
        env('MAIL_FROM_ADDRESS', 'taimoor.kingdomvision@gmail.com');*/

        /*env('MAIL_MAILER','null');
        env('MAIL_HOST','null');
        env('MAIL_PORT','null');
        env('MAIL_USERNAME','null');
        env('MAIL_PASSWORD','null');
        env('MAIL_ENCRYPTION','null');
        env('MAIL_FROM_ADDRESS', 'null');*/

        /*MAIL_DRIVER=smtp
        MAIL_HOST=smtp.gmail.com
        MAIL_PORT=587
        MAIL_USERNAME=mygoogle@gmail.com
        MAIL_PASSWORD=rrnnucvnqlbsl
        MAIL_ENCRYPTION=tls*/

        /*if (request()->email_type != "default") {
            $request = [
                request()->email_type =>
                    [
                        'driver' => request()->driver,
                        'host' => request()->host,
                        'port' => request()->port,
                        'from' => array('address' => request()->address, 'name' => request()->name ? request()->name : 'Kingdom Vision'),
                        'encryption' => request()->encryption ? request()->encryption : 'tls',
                        'username' => request()->username,
                        'password' => request()->password,
                        'sendmail' => '/usr/sbin/sendmail -bs',
                        'pretend' => false,
                    ]
            ];
        } else {
            $request = [
                request()->email_type =>
                    [
                        'driver' => 'smtp',
                        'host' => 'smtp.gmail.com',
                        'port' => '587',
                        'from' => array('address' => 'taimoor.kingdomvision@gmail.com', 'name' => 'Kingdom Vision'),
                        'encryption' => 'tls',
                        'username' => 'taimoor.kingdomvision@gmail.com',
                        'password' => 'kingtaimoor@16',
                        'sendmail' => '/usr/sbin/sendmail -bs',
                        'pretend' => false,
                    ]
            ];
        }
        $data['name'] = 'email_configuration';
        $data['value'] = json_encode($request);

        $email_config = Setting::insert($data);*/

        /*return redirect()
            ->back()
            ->with('info-message', 'no record found.');*/
    }

    public function email_configuration_testing()
    {
        $details = [
            'title' => 'Mail from Kingdom Vision',
            'body' => 'This is for testing email using default setting'
        ];

        \Mail::to('hafizmtaimoorhussain79@gmail.com')
            ->send(new MyTestMail($details));

        return redirect()
            ->back()
            ->with('success-message', 'Testing email is sent.');
    }
}
