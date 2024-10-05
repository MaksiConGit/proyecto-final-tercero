<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Course;
use App\Models\Institution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Institution_Career_CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Institution::factory(10)->create();
        Career::factory(10)->create();
        Course::factory(10)->create();
        
    }
}
