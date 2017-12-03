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
            $table->string("type");
            $table->timestamps();

        });

        Schema::table('Vote', function($table) {
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
        Schema::drop('Vote');
    }
}
