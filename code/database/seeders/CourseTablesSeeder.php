<?php

namespace Database\Seeders;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTablesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('course_subjects')->insert([
                'course_id' => Course::all()->random()->id,
                'subject_id' => Subject::all()->random()->id,
            ]);
            DB::table('course_teachers')->insert([
                'course_id' => Course::all()->random()->id,
                'teacher_id' => Teacher::all()->random()->id,
            ]);
            DB::table('course_students')->insert([
                'course_id' => Course::all()->random()->id,
                'student_id' => Student::all()->random()->id,
            ]);
            DB::table('course_exams')->insert([
                'course_id' => Course::all()->random()->id,
                'exam_id' => Exam::all()->random()->id,
            ]);
        }
    }
}
