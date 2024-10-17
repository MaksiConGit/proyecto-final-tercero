<?php

namespace Database\Seeders;

use App\Models\Principal;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrincipalTeacherStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Principal::create([
            'name' => 'No deberias ver esto',
            'lastname' => '',
            'dni' => '',
            'phone' => '',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '1',
            'user_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);
        Teacher::create([
            'name' => 'No deberias ver esto',
            'lastname' => '',
            'dni' => '',
            'phone' => '',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '1',
            'user_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);
        Student::create([
            'name' => 'No deberias ver esto',
            'lastname' => '',
            'dni' => '',
            'phone' => '',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '1',
            'user_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);

        Principal::factory(10)->create();
        Teacher::factory(10)->create();
        Student::factory(10)->create();
    }
}
