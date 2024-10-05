<?php

namespace Database\Seeders;

use App\Models\Time_slot;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Time_slotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Time_slot::factory(10)->create();
    }
}
