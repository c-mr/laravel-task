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

// TOP画面
Route::get('/', function () {
    return view('index');
});


// ユーザ登録・ログインログアウト等
Auth::routes();

// 体重管理システム
// 体重ヒストリー表示
Route::get('bodyweights', 'BodyweightsController@index');

// 新規登録保存
Route::get('bodyweights/create', 'BodyweightsController@create');

// 新規登録DB
Route::post('bodyweights', 'BodyweightsController@store');

// 詳細画面表示
Route::get('bodyweights/{id}', 'BodyweightsController@show');

// 編集画面表示
Route::get('bodyweights/{id}/edit', 'BodyweightsController@edit');

// 社員管理システム
// 一覧表示
Route::get('staff', 'StafflistController@list');

// 新規登録
Route::get('staff/create', 'StafflistController@create');

// 詳細画面表示
Route::get('staff/{id}', 'StafflistController@show');

// 新規登録保存
Route::post('staff', 'StafflistController@store');

// 編集画面表示
Route::get('staff/{id}/edit', 'StafflistController@edit');

// 登録編集更新
Route::post('staff/{id}', 'StafflistController@update');

// 登録削除
Route::delete('staff/{id}', 'StafflistController@destory');
