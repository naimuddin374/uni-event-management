<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Slide;

class SlidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sliders = [
            [
                'image' => 'img/slides/1.jpg',
                'title' => 'Welcome to Our University',
                'serial' => 1,
                'url' => null
            ],
            [
                'image' => 'img/slides/2.jpg',
                'title' => 'Join Us for a Bright Future',
                'serial' => 2,
                'url' => null
            ],
            [
                'image' => 'img/slides/3.jpg',
                'title' => 'Innovative Learning',
                'serial' => 3,
                'url' => null
            ],
        ];

        foreach ($sliders as $slider) {
            Slide::create($slider);
        }
    }
}