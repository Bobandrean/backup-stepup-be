<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AnswerChoice;

class AnswerChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Seed data for the answer_choice table
        AnswerChoice::create([
            'answer_question_id' => 1,
            'choice_text' => 'Choice A',
            'is_correct' => '1',
            'is_selected' => '1',
        ]);

        AnswerChoice::create([
            'answer_question_id' => 1,
            'choice_text' => 'Choice B',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);

        AnswerChoice::create([
            'answer_question_id' => 1,
            'choice_text' => 'Choice C',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);

        AnswerChoice::create([
            'answer_question_id' => 1,
            'choice_text' => 'Choice D',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);

        AnswerChoice::create([
            'answer_question_id' => 2,
            'choice_text' => 'Choice A',
            'is_correct' => '0',
            'is_selected' => '1',
        ]);

        AnswerChoice::create([
            'answer_question_id' => 2,
            'choice_text' => 'Choice B',
            'is_correct' => '1',
            'is_selected' => '0',
        ]);

        AnswerChoice::create([
            'answer_question_id' => 2,
            'choice_text' => 'Choice C',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);

        AnswerChoice::create([
            'answer_question_id' => 2,
            'choice_text' => 'Choice D',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);


        // Add more seed data as needed
    }
}
