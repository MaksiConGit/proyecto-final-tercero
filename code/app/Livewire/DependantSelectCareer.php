<?php

namespace App\Livewire;

use App\Models\Career;
use App\Models\Institution;
use Livewire\Component;

class DependantSelectCareer extends Component
{
    public $institutions = []; // Todas las instituciones
    public $careers = []; // Carreras dependientes de la institución seleccionada
    public $selectedInstitution = null; // ID de la institución seleccionada
    public $selectedCareer = null; // ID de la carrera seleccionada
    public $principal = null; // Usuario para edición, si aplica

    public function mount($principal = null)
    {
        // Cargar todas las instituciones
        $this->institutions = Institution::all();

        // Si se proporciona un usuario (edición), inicializar los valores seleccionados
        if ($principal) {
            $this->principal = $principal;
            $this->selectedInstitution = $principal->career->institution->id ?? null;
            $this->selectedCareer = $principal->career->id ?? null;

            // Cargar las carreras asociadas a la institución seleccionada
            if ($this->selectedInstitution) {
                $this->careers = Career::where('institution_id', $this->selectedInstitution)->get();
            }
        }
    }

    public function updatedSelectedInstitution($institution)
    {
        // Actualizar las carreras basadas en la institución seleccionada
        $this->careers = Career::where('institution_id', $institution)->get();

        // Reiniciar la carrera seleccionada al cambiar de institución
        $this->selectedCareer = null;
    }

    public function render($principal = null)
    {
        return view('livewire.dependant-select-career');
    }
}
