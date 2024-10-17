<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Subject::create([
            'name' => 'No deberias ver esto',
            'deleted_at' => Carbon::now(),
        ]);
        Subject::factory(10)->create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('teacher_subjects')->insert([
                'teacher_id' => Teacher::all()->random()->id,
                'subject_id' => Subject::all()->random()->id,
            ]);
        }
    }
}
