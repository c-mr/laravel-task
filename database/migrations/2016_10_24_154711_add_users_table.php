<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/*
php artisan make:migration add_users_table --table=users
*/


class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->float('bodyheight', 8, 2)->unsigned()->nullable()->comment('身長');
            $table->float('bodyweight', 8, 2)->unsigned()->nullable()->comment('体重');
            $table->softDeletes()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('bodyheight');
            $table->dropColumn('bodyweight');
            $table->dropColumn('deleted_at');
        });
    }
}
