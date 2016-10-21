<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
* モデルの作成のコマンド
php artisan make:model staff
テーブルを操作をするための設定。
事前に操作できる項目をここで宣言しておく
*/

class Staff extends Model
{
    protected $fillable = ['staff_no', 'name', 'department', 'sex'];
}
