<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DroppAllAnswersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('answers_closed-ended');
        Schema::dropIfExists('answers_open-ended');
        Schema::dropIfExists('answers_multiple_choice');
        Schema::dropIfExists('answers_numerical');
        Schema::dropIfExists('answers_rating');
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
