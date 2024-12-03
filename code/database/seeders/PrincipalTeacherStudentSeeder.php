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
        Principal::create([ //PRINCIPAL
            'name' => 'No deberias ver esto',
            'lastname' => '',
            'dni' => '',
            'phone' => '',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '1',
            'user_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);
        Principal::create([ //PRINCIPAL
            'name' => 'Nicolás',
            'lastname' => 'Rotili',
            'dni' => '11111111',
            'phone' => '111111111111',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '2',
        ]);

        Teacher::create([ //TEACHER
            'name' => 'No deberias ver esto',
            'lastname' => '',
            'dni' => '',
            'phone' => '',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '1',
            'user_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Karina',
            'lastname' => 'Gigli',
            'dni' => '11111111',
            'phone' => '11111111111',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '3',
        ]);

        Student::create([ //STUDENT
            'name' => 'No deberias ver esto',
            'lastname' => '',
            'dni' => '',
            'phone' => '',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '1',
            'user_id' => '1',
            'deleted_at' => Carbon::now(),
        ]);
        Student::create([ //STUDENT
            'name' => 'Lucas',
            'lastname' => 'Del Labo',
            'dni' => '44867176',
            'phone' => '5493364017202',
            'birthdate' => '2003-05-03',
            'city_id' => '2',
            'user_id' => '4',
        ]);
        Student::create([ //STUDENT
            'name' => 'Joaquin',
            'lastname' => 'Borras',
            'dni' => '44867203',
            'phone' => '543364544144',
            'birthdate' => '2003-06-27',
            'city_id' => '1',
            'user_id' => '5',
        ]);
        Student::create([ //STUDENT
            'name' => 'David Ezquiel',
            'lastname' => 'Carletta',
            'dni' => '44241108',
            'phone' => '543364695092',
            'birthdate' => '2002-11-29',
            'city_id' => '1',
            'user_id' => '6',
        ]);
        Student::create([ //STUDENT
            'name' => 'Estefani Naomí',
            'lastname' => 'Saiquita',
            'dni' => '44989001',
            'phone' => '543364544144',
            'birthdate' => '2003-06-27',
            'city_id' => '1',
            'user_id' => '7',
        ]);
        Student::create([ //STUDENT
            'name' => 'Pedro',
            'lastname' => 'Alberto',
            'dni' => '42864563',
            'phone' => '543364456654',
            'birthdate' => '2001-03-22',
            'city_id' => '1',
            'user_id' => '8',
        ]);
        Student::create([ //STUDENT
            'name' => 'Juan',
            'lastname' => 'Ceta',
            'dni' => '44567890',
            'phone' => '543364987654',
            'birthdate' => '2003-01-01',
            'city_id' => '1',
            'user_id' => '9',
        ]);
        Student::create([ //STUDENT
            'name' => 'Luciano',
            'lastname' => 'Bernadoti',
            'dni' => '43224678',
            'phone' => '543364235386',
            'birthdate' => '2001-03-03',
            'city_id' => '1',
            'user_id' => '10',
        ]);
        Student::create([ //STUDENT
            'name' => 'Maximiliano Ariel',
            'lastname' => 'Alcaraz',
            'dni' => '44568003',
            'phone' => '54336427898',
            'birthdate' => '2003-07-17',
            'city_id' => '1',
            'user_id' => '11',
        ]);
        Student::create([ //STUDENT
            'name' => 'Lucardo',
            'lastname' => 'No del Labo',
            'dni' => '44543213',
            'phone' => '54336563456',
            'birthdate' => '2003-11-22',
            'city_id' => '1',
            'user_id' => '12',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Nicolas',
            'lastname' => 'Rotili',
            'dni' => '36987234',
            'phone' => '3364987123',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '12',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Walter',
            'lastname' => 'Bur',
            'dni' => '32846571',
            'phone' => '3364987102',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '14',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Karina',
            'lastname' => 'Gigli',
            'dni' => '32194567',
            'phone' => '3364555999',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '15',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Nancy',
            'lastname' => 'Cabral',
            'dni' => '33876145',
            'phone' => '3364008765',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '16',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Luis',
            'lastname' => 'De Ambrosio',
            'dni' => '35750087',
            'phone' => '3364778899',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '17',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Facundo',
            'lastname' => 'Perazzo',
            'dni' => '33456009',
            'phone' => '3364987654',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '18',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Fabian',
            'lastname' => 'Turino',
            'dni' => '30876909',
            'phone' => '3364098172',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '19',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Damian',
            'lastname' => 'Moltoni',
            'dni' => '34590078',
            'phone' => '3364107385',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '20',
        ]);
        // Principal::factory(10)->create();
        // Teacher::factory(10)->create();
        // Student::factory(10)->create();
    }
}
