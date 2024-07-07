<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SouvenirsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('souvenirs')->insert([
            [
                'name' => 'Souvenir 01',
                'date' => '2018-01-01',
                'pdf' => 'pdf/souvenir1.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Souvenir 02',
                'date' => '2019-01-01',
                'pdf' => 'pdf/souvenir2.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'name' => 'Souvenir 03',
                'date' => '2020-01-01',
                'pdf' => 'pdf/souvenir3.pdf',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}