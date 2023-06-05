<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnswerChoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_choice', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('answer_question_id')->unsigned();
            $table->string('choice_text', 50);
            $table->string('is_correct', 50);
            $table->string('is_selected', 50);
            $table->timestamps();
        });

        // Add more seed data as needed
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answer_choice');
    }
};
