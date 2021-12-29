<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostCommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'comment' => $this->faker->text(),
            'user_id' => $this->faker->numberBetween(1, 100),
            'post_id' => $this->faker->numberBetween(1, 300),
            'created_at' => $this->faker->dateTimeThisYear('now'),
            'updated_at' => $this->faker->dateTimeThisYear('now'),
        ];
    }
}
