<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Correctly calling another seeder class
        $this->call([
            UsersTableSeeder::class,
            EventTableSeeder::class,
            BlogTableSeeder::class
        ]);
    }
}