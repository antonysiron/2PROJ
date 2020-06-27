<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameColumnsAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn(['closed-ended', 'open-ended']);
            $table->boolean('closed_ended')->nullable();
            $table->text('open_ended')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers', function (Blueprint $table) {
            $table->dropColumn(['closed_ended', 'open_ended']);
            $table->integer('closed-ended')->nullable();
            $table->text('open-ended')->nullable();
        });
    }
}
