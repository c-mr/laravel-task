<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// 社員管理システム
Route::get('staff', 'StafflistController@list');

Route::get('staff/create', 'StafflistController@create');

Route::get('staff/{id}', 'StafflistController@show');

Route::post('staff', 'StafflistController@store');

Route::get('staff/{id}/edit', 'StafflistController@edit');

Route::post('staff/{id}', 'StafflistController@update');

Route::delete('staff/{id}', 'StafflistController@destory');
