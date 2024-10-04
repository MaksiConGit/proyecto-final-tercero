<?php

namespace Database\Seeders;

use App\Models\Days_of_week;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Days_of_weekSeeder extends Seeder
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
        
    }
}
