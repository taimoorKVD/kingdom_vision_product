<?php

namespace App\Providers;

use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $result = Setting::where('name', 'active_email')->get()->first();
        if ($result)
        {
            $mail = json_decode($result->value, true);
            foreach ($mail as $key => $value)
            {
                $config = array(
                    'driver' => $mail[$key]['driver'],
                    'host' => $mail[$key]['host'],
                    'port' => $mail[$key]['port'],
                    'from' => array('address' => $mail[$key]['from']['address'], 'name' => $mail[$key]['from']['name']),
                    'encryption' => $mail[$key]['encryption'],
                    'username' => $mail[$key]['username'],
                    'password' => $mail[$key]['password'],
                    'sendmail' => $mail[$key]['sendmail'],
                    'pretend' => $mail[$key]['pretend'],
                );
            }
            Config::set('mail', $config);
        }
    }
}
