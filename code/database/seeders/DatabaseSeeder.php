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
            InstitutionSeeder::class,
            CareerSeeder::class,
            CourseSeeder::class,
            SubjectSeeder::class,
            Country_Province_CitySeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            RoleHasPermissionSeeder::class,
            UserSeeder::class,
            PrincipalTeacherStudentSeeder::class,
            Days_Timetable_TimeSlotSeeder::class
        ]);
    }
}
