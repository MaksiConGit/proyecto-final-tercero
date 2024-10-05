<?php

namespace Database\Seeders;

use App\Models\Institution;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $this->call([
            Institution_Career_CourseSeeder::class,
            Country_Province_CitySeeder::class,
            Role_Permission_RoleHasPermissionSeeder::class,
            UserSeeder::class,
            PrincipalTeacherStudentSeeder::class,
            SubjectSeeder::class,
            Days_Timetable_TimeSlotSeeder::class,
            Material_Exam_GradeSeeder::class,
            CourseTablesSeeder::class
        ]);
    }
}
