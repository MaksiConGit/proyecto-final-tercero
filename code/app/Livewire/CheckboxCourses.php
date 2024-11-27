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
    public $student; // Atributo opcional para el modo Editar

    public function mount($student = null)
    {
        $this->institutions = Institution::all();
        $this->student = $student;

        if ($this->student) {
            // Agrupar los cursos por carrera
            $groupedCourses = $this->student->courses->groupBy('career_id');

            // Iterar sobre las carreras únicas
            foreach ($groupedCourses as $careerId => $courses) {
                // Obtener la primera carrera relacionada (todas las carreras son iguales para este grupo)
                $career = $courses->first()->career;
                $institution = $career->institution;

                $index = count($this->selectedData);
                $this->selectedData[$index] = [
                    'selectedInstitution' => $institution->id,
                    'selectedCareer' => $career->id,
                    'selectedCourses' => $courses->pluck('id')->toArray(), // Usamos solo los cursos de esa carrera
                ];

                // Cargar carreras y cursos relacionados para esta institución y carrera
                $this->careers[$index] = Career::where('institution_id', $institution->id)->get();
                $this->courses[$index] = Course::where('career_id', $career->id)->get();
            }
        } else {
            // Inicializar datos vacíos para crear
            $this->selectedData[] = [
                'selectedInstitution' => null,
                'selectedCareer' => null,
                'selectedCourses' => [],
            ];
        }
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
