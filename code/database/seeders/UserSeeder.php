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
            'name' => 'Joako343', //ESTUDIANTE
            'email' => 'joaquinborras0343@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '3'
        ])->assignRole('Student');
        User::create([
            'name' => 'Marzopax', //ESTUDIANTE
            'email' => 'lamarzopadelmar@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '4'
        ])->assignRole('Student');
        User::create([
            'name' => 'Tefi', //ESTUDIANTE
            'email' => 'estefimail@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '5'
        ])->assignRole('Student');
        User::create([
            'name' => 'Pedro', //ESTUDIANTE
            'email' => 'Pedro@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '6'
        ])->assignRole('Student');
        User::create([
            'name' => 'Juanceta', //ESTUDIANTE
            'email' => 'Juanceta@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '7'
        ])->assignRole('Student');
        User::create([
            'name' => 'Luciano', //ESTUDIANTE
            'email' => 'BiggusDickus@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '8'
        ])->assignRole('Student');
        User::create([
            'name' => 'Maksi', //ESTUDIANTE
            'email' => 'Maximiliano@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '9'
        ])->assignRole('Student');
        User::create([
            'name' => 'Lukita', //ESTUDIANTE
            'email' => 'LucasdelLabo@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '3',
            'accountable_type' => 'App\Models\Student',
            'accountable_id' => '10'
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
        User::factory(70)->create();
    }
}
