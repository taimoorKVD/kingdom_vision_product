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

    /* USER MANAGEMENT ROUTES */
    Route::resource('users', 'Admin\UserController');
    Route::get('/user/listing', 'Admin\UserController@listing')->name('user.listing');
    /* END USER MANAGEMENT ROUTES */

    /* ROLE MANAGEMENT ROUTES */
    Route::resource('roles', 'Admin\RoleController');
    Route::get('/role/listing', 'Admin\RoleController@listing')->name('role.listing');
    /* END ROLE MANAGEMENT ROUTES */

    /* ADMIN PROFILE ROUTES */
    Route::resource('profile', 'Admin\ProfileController');
    Route::post('update-profile', 'Admin\ProfileController@update_profile');
    Route::post('fetch-states', 'Admin\ProfileController@fetch_states');
    Route::post('fetch-cities', 'Admin\ProfileController@fetch_cities');
    /* END ADMIN PROFILE ROUTES */

    /* DASHBOARD ROUTES */
    Route::get('dashboard', 'HomeController@index')
        ->name('admin.dashboard');
    /* END DASHBOARD ROUTES */

    /* SETTINGS ROUTES - GENERAL SETTINGS ROUTES */
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
    Route::get('settings/general_settings', 'Admin\SettingController@general_settings')
        ->name('settings.general_settings');
    Route::post('settings/update_general_settings', 'Admin\SettingController@update_general_settings')
        ->name('settings.update_general_settings');
    /* END SETTINGS ROUTES - GENERAL SETTINGS ROUTES */
});

