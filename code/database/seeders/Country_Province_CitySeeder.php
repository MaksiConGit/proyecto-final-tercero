<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Country_Province_CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Country::factory(10)->create();
        Province::factory(10)->create();
        City::factory(10)->create();

    }
}
