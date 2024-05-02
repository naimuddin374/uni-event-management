<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create 20 records
        Blog::factory()->count(20)->create();
       
        // To output information in a seeder, you would typically log this or handle it differently.
        echo "Blog table seeded successfully!\n";
    }
}