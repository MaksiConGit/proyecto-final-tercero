<?php

namespace Database\Seeders;

use App\Models\AttendanceRecord;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttendanceRecord::factory(10)->create();
    }
}
