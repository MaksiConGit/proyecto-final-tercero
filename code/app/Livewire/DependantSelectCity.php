<?php

namespace App\Livewire;

use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use Livewire\Component;

class DependantSelectCity extends Component
{
    //Declaro variables para usar en la view
    public $countries;
    public $provinces;
    public $cities;

    //Seteo a null los selects de cada input
    public $selectedCountry = null;
    public $selectedProvince = null;
    public $selectedCity = null;


    public function mount($selectedCity = null){
        //Traigo todos los Countries
        $this->countries = Country::all();
        //Guardo el dato del SelectedCity. Desde la view Create no le paso ningun parametro, por ende es NULL. En cambio desde la view Edit, le paso el parametro de la city_id del usuario a editar
        $this->selectedCity = $selectedCity;

        //Si $selectedCity tiene un valor... (Por ende, SI le pase un parametro)
        if (!is_null($selectedCity)) {
            //Busco la ciudad del user
            $city = City::with('province.country')->find($selectedCity);
            if ($city) {
                //Obtengo sus respectivas relaciones de esa city_id del user...
                $this->cities = City::where('province_id', $city->province_id)->get();
                $this->provinces = Province::where('country_id', $city->province->country_id)->get();
                //Seteo los Selects a su respectivo ID de Country y Province
                $this->selectedCountry = $city->province->country_id;
                $this->selectedProvince = $city->province_id;
            }
        }

    }

    //Funcion que se ejecuta cuando se elige una opcion el select de Contry
    public function updatedSelectedCountry($country){
        $this->provinces = Province::where('country_id', $country)->get();
        $this->selectedProvince = null;
        $this->selectedCity = null;

    }

    //Funcion que se ejecuta cuando se elige una opcion el select de Province
    public function updatedSelectedProvince($province){
        
        $this->cities = City::where('province_id', $province)->get();
        $this->selectedCity = null;
        
    }

    public function render()
    {
        return view('livewire.dependant-select-city');
    }
}
