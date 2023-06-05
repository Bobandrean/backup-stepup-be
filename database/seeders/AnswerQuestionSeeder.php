<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AnswerQuestion;


class AnswerQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the answer_question table
        AnswerQuestion::create([
            'answer_id' => 1,
            'title' => 'Question 1',
        ]);

        AnswerQuestion::create([
            'answer_id' => 1,
            'title' => 'Question 2',
        ]);

        // Add more seed data as needed
    }
}
