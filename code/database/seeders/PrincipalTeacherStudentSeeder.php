<?php

namespace Database\Seeders;

use App\Models\Principal;
use App\Models\Student;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use function Ramsey\Uuid\v1;

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
        Student::create([ //STUDENT
            'name' => 'Butista',
            'lastname' => 'Aguiar',
            'dni' => '50098275',
            'phone' => '543364872365',
            'birthdate' => '2009-11-22',
            'city_id' => '1',
            'user_id' => '13',
        ]);
        Student::create([ //STUDENT
            'name' => 'Lionel',
            'lastname' => 'Aguierre',
            'dni' => '50234123',
            'phone' => '543341957204',
            'birthdate' => '2009-10-22',
            'city_id' => '1',
            'user_id' => '13',
        ]);
        Student::create([ //STUDENT
            'name' => 'Juan Agustín',
            'lastname' => 'Ardissino',
            'dni' => '50908760',
            'phone' => '543364454643',
            'birthdate' => '2009-10-22',
            'city_id' => '1',
            'user_id' => '14',
        ]);
        Student::create([ //STUDENT
            'name' => 'Chiara Carolina',
            'lastname' => 'Borrás',
            'dni' => '504098544',
            'phone' => '543364887899',
            'birthdate' => '2009-01-17',
            'city_id' => '1',
            'user_id' => '16',
        ]);
        Student::create([ //STUDENT
            'name' => 'Lautaro Nicolas',
            'lastname' => 'Carrillo Suarez',
            'dni' => '50785400',
            'phone' => '54336466677',
            'birthdate' => '2009-09-22',
            'city_id' => '1',
            'user_id' => '17',
        ]);
        Student::create([ //STUDENT
            'name' => 'Jeremías Agustín',
            'lastname' => 'Casas',
            'dni' => '50122132',
            'phone' => '54336444456',
            'birthdate' => '2009-08-22',
            'city_id' => '1',
            'user_id' => '18',
        ]);

        Student::create([ //STUDENT
            'name' => 'Donato Elias',
            'lastname' => 'Cavallero',
            'dni' => '50990099',
            'phone' => '543364122132',
            'birthdate' => '2009-07-22',
            'city_id' => '1',
            'user_id' => '19',
        ]);
        Student::create([ //STUDENT
            'name' => 'Jenaro',
            'lastname' => 'Dominguez Herrera',
            'dni' => '51000001',
            'phone' => '543364344334',
            'birthdate' => '2009-07-1',
            'city_id' => '1',
            'user_id' => '20',
        ]);
        Student::create([ //STUDENT
            'name' => 'Emiliano',
            'lastname' => 'Flores',
            'dni' => '50990901',
            'phone' => '543364344443',
            'birthdate' => '2009-06-1',
            'city_id' => '1',
            'user_id' => '21',
        ]);
        Student::create([ //STUDENT
            'name' => 'Juan Bernabe',
            'lastname' => 'Germano Pacanis',
            'dni' => '51687876',
            'phone' => '543364654334',
            'birthdate' => '2009-05-1',
            'city_id' => '1',
            'user_id' => '22',
        ]);
        Student::create([ //STUDENT
            'name' => 'Maximiliano Ezequiel',
            'lastname' => 'Godoy',
            'dni' => '50009089',
            'phone' => '54336432234',
            'birthdate' => '2009-04-21',
            'city_id' => '1',
            'user_id' => '23',
        ]);
        Student::create([ //STUDENT
            'name' => 'Manuel Joaquín',
            'lastname' => 'Gomez Zuliani',
            'dni' => '50002001',
            'phone' => '543364123345',
            'birthdate' => '2009-07-15',
            'city_id' => '1',
            'user_id' => '24',
        ]);
        Student::create([ //STUDENT
            'name' => 'Tomas Gabriel',
            'lastname' => 'Gomez',
            'dni' => '50032001',
            'phone' => '543364441332',
            'birthdate' => '2009-03-05',
            'city_id' => '1',
            'user_id' => '25',
        ]);

        Student::create([ //STUDENT
            'name' => 'Valentino',
            'lastname' => 'González López',
            'dni' => '51987765',
            'phone' => '543364344223',
            'birthdate' => '2009-11-29',
            'city_id' => '1',
            'user_id' => '26',
        ]);
        Student::create([ //STUDENT
            'name' => 'Bautista Jesus',
            'lastname' => 'Gonzalez',
            'dni' => '51510051',
            'phone' => '543364345151',
            'birthdate' => '2009-02-1',
            'city_id' => '1',
            'user_id' => '27',
        ]);
        Student::create([ //STUDENT
            'name' => 'Ciro',
            'lastname' => 'Gorosito',
            'dni' => '51045301',
            'phone' => '543364344553',
            'birthdate' => '2009-03-13',
            'city_id' => '1',
            'user_id' => '28',
        ]);
        Student::create([ //STUDENT
            'name' => 'Benjamin Eloy',
            'lastname' => 'Herrera',
            'dni' => '50987234',
            'phone' => '543364350334',
            'birthdate' => '2009-02-07',
            'city_id' => '1',
            'user_id' => '29',
        ]);

        Student::create([ //STUDENT
            'name' => 'Fernando',
            'lastname' => 'Herrera',
            'dni' => '50777989',
            'phone' => '543364778899',
            'birthdate' => '2009-08-14',
            'city_id' => '1',
            'user_id' => '30',
        ]);
        Student::create([ //STUDENT
            'name' => 'Juan Ezequiel',
            'lastname' => 'Llamas',
            'dni' => '51335445',
            'phone' => '543364221133',
            'birthdate' => '2009-10-19',
            'city_id' => '1',
            'user_id' => '31',
        ]);
        Student::create([ //STUDENT
            'name' => 'Geronimo',
            'lastname' => 'Aguirre',
            'dni' => '42456980',
            'phone' => '543364123342',
            'birthdate' => '2000-08-9',
            'city_id' => '1',
            'user_id' => '32',
        ]);
        Student::create([ //STUDENT
            'name' => 'Mateo',
            'lastname' => 'Bazán',
            'dni' => '44854236',
            'phone' => '543364338865',
            'birthdate' => '2003-02-05',
            'city_id' => '1',
            'user_id' => '33',
        ]);
        Student::create([ //STUDENT
            'name' => 'Amiel Matías',
            'lastname' => 'Arizaga',
            'dni' => '42345678',
            'phone' => '54336445645',
            'birthdate' => '2001-05-10',
            'city_id' => '1',
            'user_id' => '34',
        ]);

        Student::create([ //STUDENT
            'name' => 'Elián Santiago',
            'lastname' => 'Arizaga',
            'dni' => '42345679',
            'phone' => '54336445646',
            'birthdate' => '2001-05-10',
            'city_id' => '1',
            'user_id' => '35',
        ]);
        Student::create([ //STUDENT
            'name' => 'Valentino Ezequiel',
            'lastname' => 'Cejas',
            'dni' => '44009987',
            'phone' => '543364980001',
            'birthdate' => '2002-03-08',
            'city_id' => '1',
            'user_id' => '36',
        ]);
        Student::create([ //STUDENT
            'name' => 'Valentina Soledad',
            'lastname' => 'Danti',
            'dni' => '44123005',
            'phone' => '543364889888',
            'birthdate' => '2002-07-27',
            'city_id' => '1',
            'user_id' => '37',
        ]);
        Student::create([ //STUDENT
            'name' => 'San Pedro Agustin',
            'lastname' => 'De Sensi',
            'dni' => '40567432',
            'phone' => '543364112211',
            'birthdate' => '1998-10-19',
            'city_id' => '1',
            'user_id' => '38',
        ]);
        Student::create([ //STUDENT
            'name' => 'Santiago',
            'lastname' => 'Fiore Croccia',
            'dni' => '44010044',
            'phone' => '543364769009',
            'birthdate' => '2003-03-02',
            'city_id' => '1',
            'user_id' => '39',
        ]);
        Student::create([ //STUDENT
            'name' => 'Darío',
            'lastname' => 'Flores',
            'dni' => '38456009',
            'phone' => '543364566556',
            'birthdate' => '1995-08-20',
            'city_id' => '1',
            'user_id' => '40',
        ]);
        Student::create([ //STUDENT
            'name' => 'Alejo',
            'lastname' => 'Herrera Córdoba',
            'dni' => '41654234',
            'phone' => '543364223332',
            'birthdate' => '2000-10-15',
            'city_id' => '1',
            'user_id' => '41',
        ]);
        Student::create([ //STUDENT
            'name' => 'Agustín',
            'lastname' => 'Izarra',
            'dni' => '41334433',
            'phone' => '543364990908',
            'birthdate' => '1995-04-30',
            'city_id' => '1',
            'user_id' => '42',
        ]);
        Student::create([ //STUDENT
            'name' => 'Vital Leandro',
            'lastname' => 'Longo',
            'dni' => '38456999',
            'phone' => '543364226644',
            'birthdate' => '1997-08-22',
            'city_id' => '1',
            'user_id' => '43',
        ]);
        Student::create([ //STUDENT
            'name' => 'Sara',
            'lastname' => 'Meliti',
            'dni' => '43456009',
            'phone' => '543364565446',
            'birthdate' => '2001-08-26',
            'city_id' => '1',
            'user_id' => '44',
        ]);
        Student::create([ //STUDENT
            'name' => 'Mauricio',
            'lastname' => 'Rapari',
            'dni' => '37454409',
            'phone' => '543364533246',
            'birthdate' => '1993-08-07',
            'city_id' => '1',
            'user_id' => '45',
        ]);
        Student::create([ //STUDENT
            'name' => 'Danilo',
            'lastname' => 'Rinaldi Gaspar',
            'dni' => '40998870',
            'phone' => '543364565111',
            'birthdate' => '2000-01-26',
            'city_id' => '1',
            'user_id' => '46',
        ]);
        Student::create([ //STUDENT
            'name' => 'Ivo Ignacio',
            'lastname' => 'Romero',
            'dni' => '43989004',
            'phone' => '543364766444',
            'birthdate' => '2002-08-21',
            'city_id' => '1',
            'user_id' => '47',
        ]);
        Student::create([ //STUDENT
            'name' => 'Martin Ezequiel',
            'lastname' => 'Sequira',
            'dni' => '424560129',
            'phone' => '543364555667',
            'birthdate' => '2000-08-26',
            'city_id' => '1',
            'user_id' => '48',
        ]);
        Student::create([ //STUDENT
            'name' => 'Nazareno',
            'lastname' => 'Serra',
            'dni' => '43567203',
            'phone' => '5433641010101',
            'birthdate' => '2002-04-19',
            'city_id' => '1',
            'user_id' => '49',
        ]);
        Student::create([ //STUDENT
            'name' => 'Nicolas',
            'lastname' => 'Velez',
            'dni' => '44867204',
            'phone' => '543364332230',
            'birthdate' => '2003-01-24',
            'city_id' => '1',
            'user_id' => '51',
        ]);


        

        Teacher::create([ //TEACHER
            'name' => 'Nicolas',
            'lastname' => 'Rotili',
            'dni' => '36987234',
            'phone' => '3364987123',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '32',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Walter',
            'lastname' => 'Bur',
            'dni' => '32846571',
            'phone' => '3364987102',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '33',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Karina',
            'lastname' => 'Gigli',
            'dni' => '32194567',
            'phone' => '3364555999',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '34',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Nancy',
            'lastname' => 'Cabral',
            'dni' => '33876145',
            'phone' => '3364008765',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '35',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Luis',
            'lastname' => 'De Ambrosio',
            'dni' => '35750087',
            'phone' => '3364778899',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '36',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Facundo',
            'lastname' => 'Perazzo',
            'dni' => '33456009',
            'phone' => '3364987654',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '37',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Fabian',
            'lastname' => 'Turino',
            'dni' => '30876909',
            'phone' => '3364098172',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '38',
        ]);
        Teacher::create([ //TEACHER
            'name' => 'Damian',
            'lastname' => 'Moltoni',
            'dni' => '34590078',
            'phone' => '3364107385',
            'birthdate' => Carbon::yesterday(),
            'city_id' => '2',
            'user_id' => '39',
        ]);
        // Principal::factory(10)->create();
        // Teacher::factory(10)->create();
        // Student::factory(10)->create();
    }
}