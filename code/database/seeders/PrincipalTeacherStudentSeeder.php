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
        Principal::create([
            'name' => 'Nicolás',
            'lastname' => 'Rotili',
            'dni' => '11111111',
            'phone' => '111111111111',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '2',
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
        Teacher::create([
            'name' => 'Karina',
            'lastname' => 'Gigli',
            'dni' => '11111111',
            'phone' => '11111111111',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '3',
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
        Student::create([
            'name' => 'Lucas',
            'lastname' => 'Del Labo',
            'dni' => '44867176',
            'phone' => '5493364017202',
            'birthdate' => '2003-05-03',
            'city_id' => '2',
            'user_id' => '4',
        ]);

        Principal::factory(10)->create();
        Teacher::factory(10)->create();
        Student::factory(10)->create();
    }
}
