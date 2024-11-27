<?php

namespace App\Livewire;

use App\Models\Career;
use App\Models\Course;
use App\Models\Institution;
use Livewire\Component;

class CheckboxCourses extends Component
{
    public $institutions;
    public $careers = [];
    public $courses = [];

    public $selectedData = []; // Arreglo dinámico para manejar instituciones, carreras y cursos

    public function mount()
    {
        $this->institutions = Institution::all();

        // Inicializar el primer conjunto de datos
        $this->selectedData[] = [
            'selectedInstitution' => null,
            'selectedCareer' => null,
            'selectedCourses' => [],
        ];
    }

    public function addCareer()
    {
        $this->selectedData[] = [
            'selectedInstitution' => null,
            'selectedCareer' => null,
            'selectedCourses' => [],
        ];
    }

    public function removeCareer($index)
    {
        unset($this->selectedData[$index]);
        $this->selectedData = array_values($this->selectedData); // Reindexar el array
    }

    public function updatedSelectedData($value, $key)
    {
        [$index, $field] = explode('.', $key);

        if ($field === 'selectedInstitution') {
            $this->careers[$index] = Career::where('institution_id', $value)->get();
            $this->selectedData[$index]['selectedCareer'] = null;
            $this->courses[$index] = [];
            $this->selectedData[$index]['selectedCourses'] = [];
        }

        if ($field === 'selectedCareer') {
            $this->courses[$index] = Course::where('career_id', $value)->get();
            $this->selectedData[$index]['selectedCourses'] = [];
        }
    }

    public function render()
    {
        return view('livewire.checkbox-courses');
    }
}
