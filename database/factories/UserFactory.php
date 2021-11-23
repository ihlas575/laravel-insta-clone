<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->userName(),
            'bio' => '<p class="font-medium">DOP . REAL STATE</p>
            <p class="text-gray-400">Real Estate Company</p>
            <p>Our Mission Is To Find Your Dream Home</p>
            <a class="cursor-pointer text-blue-900 font-semibold">www.dopuae.com</a>',
            'email' => $this->faker->email(),
            'password' => Hash::make('123456'),
            'profile_url' => $this->faker->imageUrl(300, 300)
        ];
    }
}
