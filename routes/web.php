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


Auth::routes();

Route::get('/home', 'HomeController@index');

// 社員管理システム
// 一覧リスト表示
Route::get('staff', 'StafflistController@list');

// 新規登録
Route::get('staff/create', 'StafflistController@create');

// 詳細画面表示
Route::get('staff/{id}', 'StafflistController@show');

// 新規登録
Route::post('staff', 'StafflistController@store');

// 編集画面表示
Route::get('staff/{id}/edit', 'StafflistController@edit');

// 登録編集更新
Route::post('staff/{id}', 'StafflistController@update');

// 登録削除
Route::delete('staff/{id}', 'StafflistController@destory');
