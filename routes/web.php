<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('admin/login');
});

Route::prefix('admin')->group(function () {
    Auth::routes();
    Route::resource('users', 'UserController');
    Route::resource('roles', 'RoleController');
    Route::resource('elements', 'ElementController');
    Route::get('dashboard', 'HomeController@index')
        ->name('admin.dashboard');
    Route::get('profile', 'UserController@editMyProfile')
        ->name('admin.profile');
    Route::get('settings', 'Admin\SettingController@index')
        ->name('settings.index');
    Route::post('settings/store', 'Admin\SettingController@store')
        ->name('settings.store');
    Route::post('settings/email_connectivity_testing', 'Admin\SettingController@email_connectivity_testing')
        ->name('settings.test-email-connectivity');
    Route::get('settings/get_email_config', 'Admin\SettingController@get_email_config')
        ->name('settings.get-email-config');
    Route::get('settings/elements', 'Admin\SettingController@elements')
        ->name('settings.elements');
});

