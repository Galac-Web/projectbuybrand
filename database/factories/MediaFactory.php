<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MediaFactory extends Factory
{
    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'is_active' => true,
        ];
    }
}
