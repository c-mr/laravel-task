<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyweightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodyweights', function (Blueprint $table) {
            $table->increments('id');
            $table->float('bodyweight', 8, 2)->unsigned()->nullable()->comment('体重');
            $table->date('measure_at')->nullable()->comment('計測日');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bodyweights');
    }
}
