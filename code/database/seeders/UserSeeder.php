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
            //'role_id' => '1',
            'institution_id' => '1',
            'deleted_at' => Carbon::now(),
            'remember_token' => '',
        ]);

        //Credenciales Rol SuperAdmin
        User::create([
            'name' => 'Role Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
        ])->assignRole('admin');

        //Credenciales Rol Principal
        User::create([
            'name' => 'Role Principal',
            'email' => 'principal@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
        ])->assignRole('principal');

        //Credenciales Rol Teacher
        User::create([
            'name' => 'Role Teacher',
            'email' => 'teacher@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
        ])->assignRole('teacher');

        //Credenciales Rol Student
        User::create([
            'name' => 'Role Student',
            'email' => 'student@gmail.com',
            'email_verified_at' => Carbon::yesterday(),
            'password' => '1234',
            'institution_id' => '2',
        ])->assignRole('student');

        User::factory(40)->create();
    }
}
