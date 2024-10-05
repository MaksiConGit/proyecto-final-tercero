<?php

namespace Database\Factories;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AcademicMaterial>
 */
class AcademicMaterialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()-> sentence(),
            'file_path' => fake()-> slug(),
            'file_size' => fake()-> randomFloat(2, 0, 20),
            'subject_id' => Subject::inRandomOrder()->first()->id,
            'teacher_id' => Teacher::inRandomOrder()->first()->id
        ];
    }
}
