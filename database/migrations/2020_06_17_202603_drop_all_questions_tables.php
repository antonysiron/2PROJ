<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropAllQuestionsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('questions_closed-ended');
        Schema::dropIfExists('questions_open-ended');
        Schema::dropIfExists('questions_multiple_choice');
        Schema::dropIfExists('questions_numerical');
        Schema::dropIfExists('questions_rating');
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
