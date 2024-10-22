<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'lastname' => fake()->lastName(),
            'dni' => fake()->unique()->randomNumber(8, true),
            'phone' => fake()->phoneNumber(),
            'birthdate' => fake()->date(),
            'city_id' => City::inRandomOrder()->first()->id,
            'user_id' => fake()->unique()->randomElement(User::pluck('id')),
        ];
    }
}
