<?php

namespace Database\Seeders;

use App\Models\AcademicMaterial;
use App\Models\Exam;
use App\Models\Grade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Material_Exam_GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicMaterial::factory(10)->create();
        Exam::factory(10)->create();
        Grade::factory(10)->create();
    }
}
