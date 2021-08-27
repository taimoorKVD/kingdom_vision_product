<?php

namespace App\Providers;

use App\Models\Admin\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

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
        /*
         * fetch & set email configuration
         * */
        $email_config = Setting::where('name', 'active_email')->get()->first();
        if ($email_config)
        {
            $mail = json_decode($email_config->value, true);
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
        }

        /*
         * fetch & set system timezone
         * */
        $timezone = Setting::where('name', 'current_timezone')->get()->first();
        if ($timezone) {
            config(['app.timezone' => $timezone->value]);
        }

        /*
         * fetch & set general settings
         * */
        $general_settings = Setting::where('name', 'general_settings')->get()->first();
        if ($general_settings) {
            $settings = json_decode($general_settings->value, true);
            config(['app.name' => $settings['app_name']]);
            config(['app.timezone' => $settings['app_timezone']]);
            config(['app.logo' => $settings['app_logo']]);
            config(['app.favicon' => $settings['app_favicon']]);
            View::share('curr_timezone', $settings['app_timezone']);
        }

        /*
         * Check & Pass all the settings data to views
         * */
        $general_settings = Setting::where('name', 'general_settings')->get()->first();
        if ($general_settings) {
            $settings = json_decode($general_settings->value, true);
                View::share('settings', $settings);
            }

    }
}
