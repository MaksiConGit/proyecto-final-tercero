<?php

namespace Database\Factories;

use App\Models\Course;
use App\Models\Days_of_week;
use App\Models\Subject;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Time_slot>
 */
class Time_slotFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'start_time' => fake()->time('H:i'),
            'end_time' => fake()->time('H:i'),
            'course_id' => Course::inRandomOrder()->first()->id ,
            'days_of_week_id' => Days_of_week::inRandomOrder()->first()->id 
        ];
    }
}
