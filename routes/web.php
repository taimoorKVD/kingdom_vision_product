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
    Route::get('dashboard', 'HomeController@index')
        ->name('admin.dashboard');
    Route::get('profile', 'UserController@editMyProfile')
        ->name('admin.profile');
    Route::get('settings', 'Admin\SettingController@index')
        ->name('settings.index');
    Route::post('settings/email_configuration', 'Admin\SettingController@email_configuration')
        ->name('settings.email-configure');
    Route::get('settings/email_configuration_testing', 'Admin\SettingController@email_configuration_testing')
        ->name('settings.test-email-configure');

});

