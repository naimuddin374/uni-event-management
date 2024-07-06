<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if the user already exists
        $user = User::where('email', 'admin@gmail.com')->first();

        if (!$user) {
            User::create([
                'name' => 'Admin User',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('pass1234'),
            ]);
            echo "User table seeded successfully!\n";
        } else {
            echo "User with email admin@gmail.com already exists. Skipping insertion.\n";
        }
    }
}