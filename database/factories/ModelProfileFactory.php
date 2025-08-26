<?php

namespace Database\Factories;

use App\Models\ModelProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class ModelProfileFactory extends Factory
{
    protected $model = ModelProfile::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'portfolio_path' => $this->faker->imageUrl(300, 300, 'people', true, 'model'),
            'dob' => $this->faker->dateTimeBetween('-30 years', '-18 years')->format('Y-m-d'),
            'city' => $this->faker->city,
            'state' => $this->faker->state,
            'category' => $this->faker->state,
            'phone' => $this->faker->phoneNumber,
            'instagram_link' => 'https://instagram.com/' . $this->faker->userName,
            'height_cm' => $this->faker->numberBetween(150, 190),
            'weight_kg' => $this->faker->numberBetween(45, 90),
            'status' => $this->faker->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
