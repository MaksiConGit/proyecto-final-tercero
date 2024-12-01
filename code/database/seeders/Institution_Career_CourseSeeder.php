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
        Institution::create([
            'name' => 'Instituto Privado Fray Luis Beltran', //FRAY
        ]);
        Institution::create([
            'name' => 'Instituto Superior San Pablo 9112', //SAN PABLO
        ]);
        Institution::create([
            'name' => 'A.M.A.F', //AMAF
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
        Career::create([
            'name' => 'Analista en Sistemas', //CARRERA SAN PABLO
            'institution_id' => '3',
        ]);
        Career::create([ 
            'name' => 'Robotica', // CARRERA SAN PABLO
            'institution_id' => '3',
        ]);
        Career::create([
            'name' => 'Comercializacion', //CARRERA SAN PABLO
            'institution_id' => '3',
        ]);
        Career::create([
            'name' => 'Tecnico en Informatica', //CARRERA FRAY
            'institution_id' => '2',
        ]);
        Career::create([
            'name' => 'Ciclo Basico', //CARRERA FRAY
            'institution_id' => '2',
        ]);
        Career::create([
            'name' => 'Tecnico en Electromecanica', //CARRERA FRAY
            'institution_id' => '2',
        ]);
        Course::create([
            'course_number' => '1', //CURSO FRAY
            'section' => 'A',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '1', //CURSO FRAY
            'section' => 'B',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '1', //CURSO FRAY
            'section' => 'C',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '1', //CURSO FRAY
            'section' => 'D',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '1', //CURSO FRAY
            'section' => 'E',
            'career_id' => '6',
        ]);
        Course::create([ 
            'course_number' => '2', //CURSO FRAY
            'section' => 'A',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '2', //CURSO FRAY
            'section' => 'B',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '2', //CURSO FRAY
            'section' => 'C',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '2', //CURSO FRAY
            'section' => 'D',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '2', //CURSO FRAY
            'section' => 'E',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '3', //CURSO FRAY
            'section' => 'A',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '3', //CURSO FRAY
            'section' => 'B',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '3', //CURSO FRAY
            'section' => 'C',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '3', //CURSO FRAY
            'section' => 'D',
            'career_id' => '6',
        ]);
        Course::create([
            'course_number' => '4', //CURSO FRAY
            'section' => 'A',
            'career_id' => '5',
        ]);
        Course::create([
            'course_number' => '4', //CURSO FRAY
            'section' => 'B',
            'career_id' => '7',
        ]);
        Course::create([
            'course_number' => '4', //CURSO FRAY
            'section' => 'C',
            'career_id' => '7',
        ]);
        Course::create([
            'course_number' => '5', //CURSO FRAY
            'section' => 'A',
            'career_id' => '5',
        ]);
        Course::create([
            'course_number' => '5', //CURSO FRAY
            'section' => 'B',
            'career_id' => '7',
        ]);
        Course::create([
            'course_number' => '6', //CURSO FRAY
            'section' => 'A',
            'career_id' => '5',
        ]);
        Course::create([
            'course_number' => '6', //CURSO FRAY
            'section' => 'B',
            'career_id' => '7',
        ]);
        Course::create([
            'course_number' => '7', //CURSO FRAY
            'section' => 'A',
            'career_id' => '5',
        ]);
        Course::create([
            'course_number' => '7', //CURSO FRAY
            'section' => 'B',
            'career_id' => '7',
        ]);
        Course::create([
            'course_number' => '1', //CURSO SAN PABLO
            'section' => 'Sistemas',
            'career_id' => '2',
        ]);
        Course::create([
            'course_number' => '2', //CURSO SAN PABLO
            'section' => 'Sistemas',
            'career_id' => '2',
        ]);
        Course::create([
            'course_number' => '3', //CURSO SAN PABLO
            'section' => 'Sistemas',
            'career_id' => '2',
        ]);
        Course::create([
            'course_number' => '1', //CURSO SAN PABLO
            'section' => 'Robotica',
            'career_id' => '3',
        ]);
        Course::create([
            'course_number' => '1', //CURSO SAN PABLO
            'section' => 'Robotica',
            'career_id' => '3',
        ]);
        Course::create([
            'course_number' => '1', //CURSO SAN PABLO
            'section' => 'Robotica',
            'career_id' => '3',
        ]);
        Course::create([
            'course_number' => '1', //CURSO SAN PABLO
            'section' => 'Comercializacion',
            'career_id' => '4',
        ]);
        Course::create([
            'course_number' => '2', //CURSO SAN PABLO
            'section' => 'Comercializacion',
            'career_id' => '4',
        ]);
        Course::create([
            'course_number' => '3', //CURSO SAN PABLO
            'section' => 'Comercializacion',
            'career_id' => '4',
        ]);
        Institution::factory(10)->create();
        Career::factory(10)->create();
        Course::factory(10)->create();
        
    }
}
