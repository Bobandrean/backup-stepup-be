<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Answer;


class AnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Answer::create([
            'user_id' => 1,
            'quiz_id' => 1,
        ]);

        Answer::create([
            'user_id' => 2,
            'quiz_id' => 1,
        ]);
    }
}
