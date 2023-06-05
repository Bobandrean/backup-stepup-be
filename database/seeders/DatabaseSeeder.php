<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(AnswerSeeder::class);
        $this->call(AnswerQuestionSeeder::class);
        $this->call(AnswerChoiceSeeder::class);
        $this->call(ChoiceSeeder::class);
        $this->call(FilesSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(NewsSchedulesSeeder::class);
        $this->call(QuizSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(ScoreSeeder::class);
        $this->call(UsersSeeder::class);
    }
}
