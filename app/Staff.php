<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

//論理削除の有効化
use Illuminate\Database\Eloquent\SoftDeletes;

/*
* モデルの作成のコマンド
php artisan make:model staff
テーブルを操作をするための設定。
事前に操作できる項目をここで宣言しておく
*/

class Staff extends Model{
    //論理削除
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    protected $fillable = ['staff_no', 'name', 'department', 'sex'];
}
