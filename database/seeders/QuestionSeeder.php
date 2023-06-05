<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question;


class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the question table
        Question::create([
            'quiz_id' => 1,
            'title' => 'Question 1',
        ]);

        Question::create([
            'quiz_id' => 1,
            'title' => 'Question 2',
        ]);

        // Add more seed data as needed
    }
}
