<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Grade>
 */
class GradeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'student_id' => DB::table('students')-> inRandomOrder()->first()->id,
            'exam_id' => DB::table('exams')-> inRandomOrder()->first()->id,
            'grade' => fake()-> numberBetween(0, 10),
        ];
    }
}
