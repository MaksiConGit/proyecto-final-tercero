<?php

namespace Database\Seeders;

use App\Models\AcademicMaterial;
use App\Models\Exam;
use App\Models\Grade;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Material_Exam_GradeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicMaterial::create([
            'name' => 'No deberias ver esto',
            'file_path' => 'file_path',
            'file_size' => '10',
            'subject_id' => '1',
            'teacher_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);
        Exam::create([
            'exam_number' => '1',
            'date' => Carbon::yesterday(),
            'teacher_subject_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);
        Grade::create([
            'student_id' => '1',
            'exam_id' => '1',
            'grade' => '10',
            'deleted_at' => Carbon::now(),
        ]);

        AcademicMaterial::factory(10)->create();
        Exam::factory(10)->create();
        Grade::factory(10)->create();
    }
}
