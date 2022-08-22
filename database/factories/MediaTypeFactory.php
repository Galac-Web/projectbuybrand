<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MediaTypeFactory extends Factory
{
    protected $model = \App\Models\Media\Type::class;

    public function definition()
    {
        return [
            'name' => $this->faker->word,
        ];
    }
}
