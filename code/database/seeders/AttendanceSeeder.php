<?php

namespace Database\Seeders;

use App\Models\AttendanceRecord;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AttendanceRecord::create([
            'student_id' => '1',
            'has_attended' => '1',
            'date' => Carbon::yesterday(),
            'deleted_at' => Carbon::now(),
        ]);

        AttendanceRecord::factory(10)->create();
    }
}
