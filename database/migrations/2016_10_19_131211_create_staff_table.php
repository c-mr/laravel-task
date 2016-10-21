<?php

/**
* 社員詳細登録テーブル
 *ファイル作成コマンド
 php artisan make:migration create_sttaf_table --create=staff

 *マイグレーションコマンド
 php artisan migrate
*/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(){
        Schema::create('staff', function (Blueprint $table) {
            $table->increments('id')->comment('シリアルキー');
            // 社員番号は整数のみ・重複は禁止する。
            $table->integer('staff_no')->unsigned()->comment('社員番号');
            $table->string('name', 200)->comment('名前：長さ200');

            // departmentとsexは定義を設定。キーのみ保存
            $table->integer('department')->unsigned()->comment('部署');
            $table->smallInteger('sex')->unsigned()->comment('性別');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(){
        Schema::dropIfExists('staff');
    }
}
