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
    return view('home');
//    return redirect('admin/login');
});

Route::prefix('admin')->group(function () {
    Auth::routes();

    /* USER MANAGEMENT ROUTES */
    Route::resource('users', 'Admin\UserController');
    Route::get('/user/listing', 'Admin\UserController@listing')->name('user.listing');
    Route::post('/user/bulk_delete', 'Admin\UserController@bulk_delete')->name('user.bulk_delete');
    Route::post('/user/export_pdf', 'Admin\UserController@export_pdf')->name('user.export_pdf');
    Route::get('/user/export_excel', 'Admin\UserController@export_excel')->name('user.export_excel');
    /* END USER MANAGEMENT ROUTES */

    /* ROLE MANAGEMENT ROUTES */
    Route::resource('roles', 'Admin\RoleController');
    Route::get('/role/listing', 'Admin\RoleController@listing')->name('role.listing');
    Route::post('/role/bulk_delete', 'Admin\RoleController@bulk_delete')->name('role.bulk_delete');
    Route::post('/role/export_pdf', 'Admin\RoleController@export_pdf')->name('role.export_pdf');
    Route::get('/role/export_excel', 'Admin\RoleController@export_excel')->name('role.export_excel');
    /* END ROLE MANAGEMENT ROUTES */

    /* ADMIN PROFILE ROUTES */
    Route::resource('profile', 'Admin\ProfileController');
    Route::post('update-profile', 'Admin\ProfileController@update_profile');
    Route::post('fetch-states', 'Admin\ProfileController@fetch_states');
    Route::post('fetch-cities', 'Admin\ProfileController@fetch_cities');
    /* END ADMIN PROFILE ROUTES */

    /* DASHBOARD ROUTES */
    Route::get('dashboard', 'DashboardController@index')
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
    Route::get('settings/fetch_email_config', 'Admin\SettingController@fetch_email_config')
        ->name('settings.fetch_email_config');
    /* END SETTINGS ROUTES - GENERAL SETTINGS ROUTES */

    /* PAGINATION ROUTE - FOR ALL MODULES */
    Route::post('/set_pagination', 'Admin\PaginateController@set_pagination')->name('pagination.set_pagination');
    /* END SETTINGS ROUTES - GENERAL SETTINGS ROUTES */
});

