<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelMembers;
use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::factory()->count(50)->create();

        // To output information in a seeder, you would typically log this or handle it differently.
        echo "Member table seeded successfully!\n";
    }
}
