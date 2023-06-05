<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Choice;


class ChoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Choice::create([
            'question_id' => 1,
            'choice_text' => 'Choice A',
            'is_correct' => '1',
            'is_selected' => '1',
        ]);

        Choice::create([
            'question_id' => 1,
            'choice_text' => 'Choice B',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);

        Choice::create([
            'question_id' => 1,
            'choice_text' => 'Choice C',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);

        Choice::create([
            'question_id' => 1,
            'choice_text' => 'Choice D',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);

        Choice::create([
            'question_id' => 2,
            'choice_text' => 'Choice A',
            'is_correct' => '0',
            'is_selected' => '1',
        ]);

        Choice::create([
            'question_id' => 2,
            'choice_text' => 'Choice B',
            'is_correct' => '1',
            'is_selected' => '0',
        ]);

        Choice::create([
            'question_id' => 2,
            'choice_text' => 'Choice C',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);

        Choice::create([
            'question_id' => 2,
            'choice_text' => 'Choice D',
            'is_correct' => '0',
            'is_selected' => '0',
        ]);
    }
}
