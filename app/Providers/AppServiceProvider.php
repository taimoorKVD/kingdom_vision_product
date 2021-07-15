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
        /*$result = Setting::where('name', 'active_email')->get()->first();
        if ($result)
        {
            $mail = json_decode($result->value, true);
            /*dd($mail);*/

            $config = array(
                'driver' => $mail['driver'],
                'host' => $mail['host'],
                'port' => $mail['port'],
                'from' => array('address' => $mail['from']['address'], 'name' => $mail['from']['name']),
                'encryption' => $mail['encryption'],
                'username' => $mail['username'],
                'password' => $mail['password'],
                'sendmail' => $mail['sendmail'],
                'pretend' => $mail['pretend'],
            );
            Config::set('mail', $config);
        }*/
    }
}
