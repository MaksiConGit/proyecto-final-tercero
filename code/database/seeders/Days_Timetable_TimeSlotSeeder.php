<?php

namespace Database\Seeders;

use App\Models\Days_of_week;
use App\Models\Time_slot;
use App\Models\Timetable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Days_Timetable_TimeSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Days_of_week::factory()->create(['day' => 'Lunes']);
        Days_of_week::factory()->create(['day' => 'Martes']);
        Days_of_week::factory()->create(['day' => 'Miercoles']);
        Days_of_week::factory()->create(['day' => 'Jueves']);
        Days_of_week::factory()->create(['day' => 'Viernes']);
        Days_of_week::factory()->create(['day' => 'Sábado']);
        Days_of_week::factory()->create(['day' => 'Domingo']);

        Time_slot::factory(10)->create();

        Timetable::factory(10)->create();

        for ($i = 1; $i <= 10; $i++) {
            DB::table('timetable_time_slots')->insert([
                'timetable_id' => Timetable::all()->random()->id,
                'time_slot_id' => Time_slot::all()->random()->id,
            ]);
        }
    }
}
