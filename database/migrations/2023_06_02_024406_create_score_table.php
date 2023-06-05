<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('score', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('quiz_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('total_question');
            $table->unsignedInteger('correct_answer');
            $table->unsignedInteger('wrong_answer');
            $table->unsignedInteger('score');
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
        Schema::dropIfExists('score');
    }
};
