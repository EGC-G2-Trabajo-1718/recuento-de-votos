<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePolloptionPollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Poll_Option_Poll', function (Blueprint $table) {
            $table->increments('poll_option_poll_id');
            $table->integer("poll_id")->unsigned();
            $table->integer("poll_option_id")->unsigned();



        });


        Schema::table('Poll_Option_Poll', function($table) {
            $table->foreign('poll_id')->references('poll_id')->on('poll');
            $table->foreign('poll_option_id')->references('poll_option_id')->on('poll_option');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
