<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Score;


class ScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the score table
        Score::create([
            'quiz_id' => 1,
            'user_id' => 1,
            'total_question' => 10,
            'correct_answer' => 7,
            'wrong_answer' => 3,
            'score' => 66
        ]);

        Score::create([
            'quiz_id' => 1,
            'user_id' => 2,
            'total_question' => 10,
            'correct_answer' => 5,
            'wrong_answer' => 5,
            'score' => 99
        ]);
    }
}
