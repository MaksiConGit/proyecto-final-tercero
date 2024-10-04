<?php

namespace Database\Seeders;

use App\Models\Principal;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrincipalTeacherStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Principal::factory(10)->create();
        Teacher::factory(10)->create();
        Student::factory(10)->create();
    }
}
