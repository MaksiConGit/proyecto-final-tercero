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
            'role_id' => '1',
            'institution_id' => '1',
            'deleted_at' => Carbon::now(),
            'remember_token' => '',
        ]);

        User::factory(10)->create();
    }
}
