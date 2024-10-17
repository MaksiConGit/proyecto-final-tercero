<?php

namespace Database\Seeders;

use App\Models\Career;
use App\Models\Course;
use App\Models\Institution;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Institution_Career_CourseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Institution::create([
            'name' => 'No deberias ver esto',
            'deleted_at' => Carbon::now(),
        ]);
        Career::create([
            'name' => 'No deberias ver esto',
            'institution_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);
        Course::create([
            'course_number' => '1',
            'section' => 'No deberias ver esto',
            'career_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);

        Institution::factory(10)->create();
        Career::factory(10)->create();
        Course::factory(10)->create();
        
    }
}
