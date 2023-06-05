<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\NewsSchedule;

class NewsSchedulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        NewsSchedule::create([
            'news_id' => 1,
            'shipment_date' => '2023-06-01',
            'interval' => 0,
            'interval_type' => 'hour',
            'start_at' => now(),
            'end_at' => now()->addDay(),
            'last_run' => null,
            'next_run' => now(),
        ]);

        NewsSchedule::create([
            'news_id' => 2,
            'shipment_date' => '2023-06-02',
            'interval' => 1,
            'interval_type' => 'day',
            'start_at' => now(),
            'end_at' => now()->addDay(),
            'last_run' => null,
            'next_run' => now(),
        ]);

        // Add more seed data as needed

    }
}
