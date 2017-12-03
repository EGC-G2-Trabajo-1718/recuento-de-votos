<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Poll', function (Blueprint $table) {
            $table->increments('poll_id');
            $table->string("title");
            $table->json("results");
            $table->string("result");
            $table->timestamp("begin_date");
            $table->timestamp("finish_date");
            $table->integer("total_voters");
            $table->integer("total_votes");
            $table->string("question");
            $table->json("options");
            $table->string("status");
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
        Schema::drop('Poll');
    }
}
