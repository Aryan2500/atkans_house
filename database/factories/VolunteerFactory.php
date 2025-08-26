<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VolunteerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'status' => $this->faker->randomElement(['contacted', 'interviewed', 'onboarded']),
            'applied_at' => $this->faker->dateTimeBetween('-2 months', 'now'),
        ];
    }
}
