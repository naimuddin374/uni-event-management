<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Event;


class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 50 event records
        Event::factory()->count(50)->create();
       
        // To output information in a seeder, you would typically log this or handle it differently.
        echo "Event table seeded successfully!\n";
    }
}