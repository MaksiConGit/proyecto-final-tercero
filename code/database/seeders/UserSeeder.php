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
            'name' => 'LautaroSuares', //ESTUDIANTE FRAY
            'email' => 'Suarez@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '15'
        ])->assignRole('Student');
        User::create([
            'name' => 'JeremiasCasas', //ESTUDIANTE FRAY
            'email' => 'CasasJeremias@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '16'
        ])->assignRole('Student');
        User::create([
            'name' => 'DonatoCavallero', //ESTUDIANTE FRAY
            'email' => 'Cavallero@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '17'
        ])->assignRole('Student');
        User::create([
            'name' => 'JenaroDominguez', //ESTUDIANTE FRAY
            'email' => 'DominguezJenaro@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '18'
        ])->assignRole('Student');        
        User::create([
            'name' => 'EmilianoFlores', //ESTUDIANTE FRAY
            'email' => 'FloresEmiliano@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '19'
        ])->assignRole('Student');
        User::create([
            'name' => 'JuanGermano', //ESTUDIANTE FRAY
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
