<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Files;


class FilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed data for the files table
        Files::create([
            'news_id' => 1,
            'filename' => 'example-file1.txt',
            'filepath' => '/path/to/file1',
            'extension' => 'txt',
        ]);

        Files::create([
            'news_id' => 1,
            'filename' => 'example-file2.txt',
            'filepath' => '/path/to/file2',
            'extension' => 'txt',
        ]);

        // Add more seed data as needed
    }
}
