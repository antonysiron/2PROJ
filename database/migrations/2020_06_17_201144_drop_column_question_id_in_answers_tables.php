<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropColumnQuestionIdInAnswersTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers_closed-ended', function(Blueprint $table)
        {
            $table->dropColumn('question_id');
        });
        Schema::table('answers_open-ended', function(Blueprint $table)
        {
            $table->dropColumn('question_id');
        });
        Schema::table('answers_numerical', function(Blueprint $table)
        {
            $table->dropColumn('question_id');
        });
        Schema::table('answers_multiple_choice', function(Blueprint $table)
        {
            $table->dropColumn('question_id');
        });
        Schema::table('answers_rating', function(Blueprint $table)
        {
            $table->dropColumn('question_id');
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
