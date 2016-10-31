<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/*
*****************************************
|
| # php artisan make:model bodyweights
|
*****************************************
*/

class Bodyweights extends Model{

    // テーブル定義
    protected $fillable = ['user_id', 'measure_at', 'bodyweight', 'bodyweight_diff'];


}
