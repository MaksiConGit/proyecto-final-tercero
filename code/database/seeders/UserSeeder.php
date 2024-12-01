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

        User::factory(70)->create();
    }
}
