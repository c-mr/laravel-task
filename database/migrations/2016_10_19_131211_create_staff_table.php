<?php

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
            $table->integer('staff_no')->unsigned()->comment('社員番号');
            $table->string('name', 200)->comment('名前：長さ200');

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
