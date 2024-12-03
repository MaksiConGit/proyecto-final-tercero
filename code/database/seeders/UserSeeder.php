<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'No deberias ver esto',
            'email' => '',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '',
            'institution_id' => '1',
            'deleted_at' => Carbon::now(),
            'remember_token' => '',
        ]);

        User::create([
            'name' => 'Role Principal', //PRINCIPAL
            'email' => 'principal@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Principal',
            'accountable_id' => '2',
        ])->assignRole('Principal');

        User::create([
            'name' => 'Role Teacher', //TEACHER
            'email' => 'teacher@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Teacher',
            'accountable_id' => '2',
        ])->assignRole('Teacher');
        
        User::create([
            'name' => 'Role Student', //ESTUDIANTE
            'email' => 'student@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '2',
        ])->assignRole('Student');

        User::create([
            'name' => 'Joako343', //ESTUDIANTE SAN PABLO
            'email' => 'joaquinborras0343@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '3'
        ])->assignRole('Student');
        User::create([
            'name' => 'Marzopax', //ESTUDIANTE SAN PABLO
            'email' => 'lamarzopadelmar@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '4'
        ])->assignRole('Student');
        User::create([
            'name' => 'Tefi', //ESTUDIANTE SAN PABLO
            'email' => 'estefimail@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '5'
        ])->assignRole('Student');
        User::create([
            'name' => 'Pedro', //ESTUDIANTE SAN PABLO
            'email' => 'Pedro@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '6'
        ])->assignRole('Student');
        User::create([
            'name' => 'Juanceta', //ESTUDIANTE SAN PABLO
            'email' => 'Juanceta@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '7'
        ])->assignRole('Student');
        User::create([
            'name' => 'Luciano', //ESTUDIANTE SAN PABLO
            'email' => 'BiggusDickus@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '8'
        ])->assignRole('Student');
        User::create([
            'name' => 'Maksi', //ESTUDIANTE SAN PABLO
            'email' => 'Maximiliano@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '9'
        ])->assignRole('Student');
        User::create([
            'name' => 'Lukita', //ESTUDIANTE SAN PABLO
            'email' => 'LucasdelLabo@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '10'
        ])->assignRole('Student');
        User::create([
            'name' => 'Bautista Aguiar', //ESTUDIANTE FRAY
            'email' => 'AguiarBautista@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '11'
        ])->assignRole('Student');
        User::create([
            'name' => 'Lionel Aguirre', //ESTUDIANTE FRAY
            'email' => 'AguirreLionel@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '12'
        ])->assignRole('Student');
        User::create([
            'name' => 'Juan Ardissino', //ESTUDIANTE FRAY
            'email' => 'Ardissino@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '13'
        ])->assignRole('Student');
        User::create([
            'name' => 'Chiara Borras', //ESTUDIANTE FRAY
            'email' => 'ChiaraBorras@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '14'
        ])->assignRole('Student');
        User::create([
            'name' => 'Lautaro Suares', //ESTUDIANTE FRAY
            'email' => 'Suarez@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '15'
        ])->assignRole('Student');
        User::create([
            'name' => 'Jeremias Casas', //ESTUDIANTE FRAY
            'email' => 'CasasJeremias@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '16'
        ])->assignRole('Student');
        User::create([
            'name' => 'Donato Cavallero', //ESTUDIANTE FRAY
            'email' => 'Cavallero@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '17'
        ])->assignRole('Student');
        User::create([
            'name' => 'Jenaro Dominguez', //ESTUDIANTE FRAY
            'email' => 'DominguezJenaro@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '18'
        ])->assignRole('Student');        
        User::create([
            'name' => 'Emiliano Flores', //ESTUDIANTE FRAY
            'email' => 'FloresEmiliano@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '19'
        ])->assignRole('Student');
        User::create([
            'name' => 'Juan Germano', //ESTUDIANTE FRAY
            'email' => 'GermanoJuan@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '20'
        ])->assignRole('Student');
        User::create([
            'name' => 'Maximiliano Godoy', //ESTUDIANTE FRAY
            'email' => 'Godoy@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '21'
        ])->assignRole('Student');
        User::create([
            'name' => 'Manuel', //ESTUDIANTE FRAY
            'email' => 'GomezManuel@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '22'
        ])->assignRole('Student');
        User::create([
            'name' => 'Tomas Gomez', //ESTUDIANTE FRAY
            'email' => 'GomezTomas@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '23'
        ])->assignRole('Student');

        User::create([
            'name' => 'Vlaentino Gonzales', //ESTUDIANTE FRAY
            'email' => 'GonzalesValentino@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '24'
        ])->assignRole('Student');
        User::create([
            'name' => 'Bautista Gonzales', //ESTUDIANTE FRAY
            'email' => 'GonzalesBautista@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '25'
        ])->assignRole('Student');
        User::create([
            'name' => 'Ciro Gorosito', //ESTUDIANTE FRAY
            'email' => 'GorositoCiro@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '26'
        ])->assignRole('Student');
        User::create([
            'name' => 'Benjamin Herrera', //ESTUDIANTE FRAY
            'email' => 'HerreraBenjamin@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '27'
        ])->assignRole('Student');
        User::create([
            'name' => 'Fernando Herrera', //ESTUDIANTE FRAY
            'email' => 'HerreraFernando@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '28'
        ])->assignRole('Student');
        User::create([
            'name' => 'Julian Llamas', //ESTUDIANTE FRAY
            'email' => 'LlamasJulian@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '29'
        ])->assignRole('Student');
        User::create([
            'name' => 'Geronimo Aguirre', //ESTUDIANTE SAN PABLO
            'email' => 'AguirreGeronimo@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '30'
        ])->assignRole('Student');
        User::create([
            'name' => 'Mateo Bazan', //ESTUDIANTE SAN PABLO
            'email' => 'BazanMateo@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '31'
        ])->assignRole('Student');
        User::create([
            'name' => 'Amiel Matias', //ESTUDIANTE SAN PABLO
            'email' => 'Arrizaga1@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '32'
        ])->assignRole('Student');
        User::create([
            'name' => 'Elián Santiago', //ESTUDIANTE SAN PABLO
            'email' => 'Arrizaga2@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '33'
        ])->assignRole('Student');
        User::create([
            'name' => 'Valentino Ezequiel', //ESTUDIANTE SAN PABLO
            'email' => 'CejasValentino@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '34'
        ])->assignRole('Student');
        User::create([
            'name' => 'Valentina Soledad', //ESTUDIANTE SAN PABLO
            'email' => 'Danti@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '35'
        ])->assignRole('Student');
        User::create([
            'name' => 'San Pedro Agustin', //ESTUDIANTE SAN PABLO
            'email' => 'DeSensi@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '36'
        ])->assignRole('Student');
        User::create([
            'name' => 'Sntiago', //ESTUDIANTE SAN PABLO
            'email' => 'Fiore@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '37'
        ])->assignRole('Student');

        User::create([
            'name' => 'Darío Flores', //ESTUDIANTE SAN PABLO
            'email' => 'FloresDario@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '38'
        ])->assignRole('Student');
        User::create([
            'name' => 'Alejo', //ESTUDIANTE SAN PABLO
            'email' => 'AlejoHerrera@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '39'
        ])->assignRole('Student');
                User::create([
            'name' => 'Agustin Izarra', //ESTUDIANTE SAN PABLO
            'email' => 'IzarraAgustin@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '40'
        ])->assignRole('Student');
        User::create([
            'name' => 'Vital Leandro', //ESTUDIANTE SAN PABLO
            'email' => 'VitalLongo@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '41'
        ])->assignRole('Student');
        User::create([
            'name' => 'Sara Meliti', //ESTUDIANTE SAN PABLO
            'email' => 'MelitiSara@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '42'
        ])->assignRole('Student');
        User::create([
            'name' => 'Mauricio Rapari', //ESTUDIANTE SAN PABLO
            'email' => 'Rapari@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '43'
        ])->assignRole('Student');
        User::create([
            'name' => 'Danilo Gaspar', //ESTUDIANTE SAN PABLO
            'email' => 'Rinaldi@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '44'
        ])->assignRole('Student');
        User::create([
            'name' => 'Ignacio Ivo', //ESTUDIANTE SAN PABLO
            'email' => 'Romero@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '45'
        ])->assignRole('Student');
        User::create([
            'name' => 'Martín Ezequiel', //ESTUDIANTE SAN PABLO
            'email' => 'SequiraMartin@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '46'
        ])->assignRole('Student');
        User::create([
            'name' => 'NaSa', //ESTUDIANTE SAN PABLO
            'email' => 'SerraNazareno@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '47'
        ])->assignRole('Student');
        User::create([
            'name' => 'Alan Gabriel', //ESTUDIANTE SAN PABLO
            'email' => 'VelazquezAlan@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '48'
        ])->assignRole('Student');
        User::create([
            'name' => 'Nicoloko67', //ESTUDIANTE SAN PABLO
            'email' => 'VelezNicolas@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '49'
        ])->assignRole('Student');




        User::create([
            'name' => 'Nico', //TEACHER
            'email' => 'nicorotili@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Teacher',
            'accountable_id' => '3',
        ])->assignRole('Teacher');
        User::create([
            'name' => 'Walter Bur', //TEACHER
            'email' => 'BurWalter@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Teacher',
            'accountable_id' => '4',
        ])->assignRole('Teacher');
        User::create([
            'name' => 'Karina', //TEACHER
            'email' => 'Karina@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Teacher',
            'accountable_id' => '5',
        ])->assignRole('Teacher');
        User::create([
            'name' => 'Nancy', //TEACHER
            'email' => 'NancyCabral@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Teacher',
            'accountable_id' => '6',
        ])->assignRole('Teacher');
        User::create([
            'name' => 'Luis', //TEACHER
            'email' => 'LuuisdeAmbrosio@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Teacher',
            'accountable_id' => '7',
        ])->assignRole('Teacher');
        User::create([
            'name' => 'Facu', //TEACHER
            'email' => 'FacundoPerazzo@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Teacher',
            'accountable_id' => '8',
        ])->assignRole('Teacher');
        User::create([
            'name' => 'Fabian', //TEACHER
            'email' => 'FabianTurino@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Teacher',
            'accountable_id' => '9',
        ])->assignRole('Teacher');
        User::create([
            'name' => 'Damian', //TEACHER
            'email' => 'DamianMoltoni@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Teacher',
            'accountable_id' => '10',
        ])->assignRole('Teacher');
        // User::factory(70)->create();
    }
}
