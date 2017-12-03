<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAuthPollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('User_auth_Poll', function (Blueprint $table) {
            $table->increments('user_auth_poll_id');
            $table->integer("auth_token");
            $table->integer("poll_id")->unsigned();
            $table->timestamps();

        });

        Schema::table('User_auth_Poll', function($table) {
            $table->foreign('auth_token')->references('auth_token')->on('user');
            $table->foreign('poll_id')->references('poll_id')->on('poll');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('User_show_Poll');
    }
}
