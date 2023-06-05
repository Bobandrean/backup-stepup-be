<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Quiz;


class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // Seed data for the quiz table
        Quiz::create([
            'module_name' => 'Math Quiz',
            'per_page' => 1,
            'start_date' => '2023-06-01',
            'end_date' => '2023-06-30',
            'published_at' => now(),
        ]);

        Quiz::create([
            'module_name' => 'Science Quiz',
            'per_page' => 2,
            'start_date' => '2023-07-01',
            'end_date' => '2023-07-31',
            'published_at' => now(),
        ]);
    }
}
