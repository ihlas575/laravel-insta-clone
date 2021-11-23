<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'caption' => $this->faker->paragraph(3),
            'image' => $this->faker->imageUrl(1080, 1080, 'cats'),
            'user_id' => $this->faker->numberBetween(1, 100)
        ];
    }
}
