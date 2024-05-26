<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Enums\MemberType;


class MemberFactory extends Factory
{
    protected $model = Member::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'student_id' => $this->faker->unique()->randomNumber(8),
            'session' => $this->faker->year,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->unique()->phoneNumber,
            // 'image' => $this->faker->imageUrl(640, 480, 'people'),
            'social_link' => $this->faker->url,
            'member_type' => $this->faker->randomElement(MemberType::cases())->value,
        ];
    }
}