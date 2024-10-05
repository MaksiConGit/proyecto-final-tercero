<?php

namespace Database\Factories;

use App\Models\Career;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_number' => fake()->randomDigitNotNull(),
            'section' => fake() ->randomLetter(),
            'career_id' => Career::inRandomOrder()->first()->id 
        ];
    }
}
