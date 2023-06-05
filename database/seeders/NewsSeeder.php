<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;


class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the news table
        News::create([
            'title' => 'Example News 1',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'slug' => 'example-news-1',
            'hidden_flag' => 0,
            'short_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'image' => 'example.jpg',
        ]);

        News::create([
            'title' => 'Example News 2',
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'slug' => 'example-news-2',
            'hidden_flag' => 0,
            'short_content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'image' => 'example.jpg',
        ]);
    }
}
