<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Vote', function (Blueprint $table) {
            $table->increments('vote_id');
            $table->integer("poll_id")->unsigned();
            $table->integer("poll_option_id")->unsigned();
            $table->timestamps();

        });

        Schema::table('Vote', function($table) {
            $table->foreign('poll_id')->references('poll_id')->on('poll');
            $table->foreign('poll_option_id')->references('poll_option_id')->on('Poll_Option');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('Vote');
    }
}
