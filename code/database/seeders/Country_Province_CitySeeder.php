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
        Country::create([
            'name' => 'Argnentina', //PAIS
        ]);
        Country::create([
            'name' => 'Uruguay', //PAIS
        ]);
        Country::create([
            'name' => 'Paraguay', //PAIS
        ]);
        Country::create([
            'name' => 'Brazil', //PAIS
        ]);
        Country::create([
            'name' => 'Perú', //PAIS
        ]);
        Country::create([
            'name' => 'Chile', //PAIS
        ]);
        Country::create([
            'name' => 'Mexico', //PAIS
        ]);
        Country::create([
            'name' => 'España', //PAIS
        ]);
        Country::create([
            'name' => 'Bolivia', //PAIS
        ]);
        Country::create([
            'name' => 'Colombia', //PAIS
        ]);
        Country::create([
            'name' => 'Panamá', //PAIS
        ]);
        Country::create([
            'name' => 'Venezuela', //PAIS
        ]);
        Country::create([
            'name' => 'Guatemala', //PAIS
        ]);
        Country::create([
            'name' => 'Ecuador', //PAIS
        ]);
        Country::create([
            'name' => 'Costa Rica', //PAIS
        ]);
        Country::create([
            'name' => 'El Salvador', //PAIS
        ]);
        Country::create([
            'name' => 'Nicaragua', //PAIS
        ]);
        Country::create([
            'name' => 'Honduras', //PAIS
        ]);

        Province::create([
            'name' => 'Buenos Aires', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Entre Rios', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Corrientes', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Misiones', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Santa Fe', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Chaco', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Formosa', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Cordoba', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Santiago del Estero', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Tucuman', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Salta', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Jujuy', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Catamarca', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'La Rioja', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'San Juan', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Mendoza', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'San Luis', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'La Pampa', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Neuquen', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Rio Negro', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Chubut', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Santa Cruz', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        Province::create([
            'name' => 'Tierra del Fuego', //PROVINCIA ARGENTINA
            'country_id' => '1',
        ]);
        City::create([
            'name' => 'San Nicolas', //CIUDAD ARGENTINA
            'province_id' => '1',
        ]);
        City::create([
            'name' => 'Rosario', //CIUDAD ARGENTINA
            'province_id' => '5',
        ]);
        City::create([
            'name' => 'C.A.B.A', //CIUDAD ARGENTINA
            'province_id' => '1',
        ]);
        City::create([
            'name' => 'Venado Tuerto', //CIUDAD ARGENTINA
            'province_id' => '5',
        ]);

        City::create([
            'name' => 'Carlos Paz', //CIUDAD ARGENTINA
            'province_id' => '8',
        ]);
        City::create([
            'name' => 'Bariloche', //CIUDAD ARGENTINA
            'province_id' => '20',
        ]);

        City::create([
            'name' => 'Posadas', //CIUDAD ARGENTINA
            'province_id' => '4',
        ]);
        City::create([
            'name' => 'Túcuman', //CIUDAD ARGENTINA
            'province_id' => '10',
        ]);
        City::create([
            'name' => 'San Rafael', //CIUDAD ARGENTINA
            'province_id' => '16',
        ]);
        City::create([
            'name' => 'Salta', //CIUDAD ARGENTINA
            'province_id' => '11',
        ]);
        City::create([
            'name' => 'San Salvador de Jujuy', //CIUDAD ARGENTINA
            'province_id' => '12',
        ]);
        City::create([
            'name' => 'Resistencia', //CIUDAD ARGENTINA
            'province_id' => '6',
        ]);
        City::create([
            'name' => 'Formosa', //CIUDAD ARGENTINA
            'province_id' => '7',
        ]);
        City::create([
            'name' => 'Ushuaia', //CIUDAD ARGENTINA
            'province_id' => '23',
        ]);
        City::create([
            'name' => 'Comodoro Rivadavia', //CIUDAD ARGENTINA
            'province_id' => '21',
        ]);
        City::create([
            'name' => 'Mar del Plata', //CIUDAD ARGENTINA
            'province_id' => '1',
        ]);
        // Country::factory(10)->create();

    }
}
