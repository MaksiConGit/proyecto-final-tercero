<?php

namespace App\Livewire;

use App\Models\Career;
use App\Models\Course;
use App\Models\Institution;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;

class StudentIndexTable extends Component
{
    use WithPagination;

    public $selectedInstitution = null;
    public $selectedCareer = null;
    public $selectedCourse = null;
    public $searchTerm = '';

    public function render()
    {
        // Obtiene todas las instituciones
        $institutions = Institution::all();
        // Obtiene todas las carreras
        $careers = $this->selectedInstitution ? Career::where('institution_id', $this->selectedInstitution)->get() : collect();

        // Obtiene los cursos relacionados con la carrera seleccionada
        $courses = $this->selectedCareer ? Course::where('career_id', $this->selectedCareer)->get() : collect();

        // Filtra los estudiantes según la carrera y curso seleccionados
        $students = Student::query()
            ->when($this->selectedInstitution, function ($query) {
                $query->whereHas('courses', function ($q) {
                    $q->whereHas('career', function ($q) {
                        $q->where('institution_id', $this->selectedInstitution);
                    });
                });
            })
            ->when($this->selectedCareer, function ($query) {
                $query->whereHas('courses', function ($q) {
                    $q->where('courses.career_id', $this->selectedCareer); // Especifica la tabla de carrera
                });
            })
            ->when($this->selectedCourse, function ($query) {
                $query->whereHas('courses', function ($q) {
                    $q->where('courses.id', $this->selectedCourse); // Especifica la tabla de cursos
                });
            })
            ->when($this->searchTerm, function ($query) {
                $query->where(function ($q) {
                    $q->where('name', 'like', '%' . $this->searchTerm . '%')->orWhere('lastname', 'like', '%' . $this->searchTerm . '%');
                });
            })
            ->with('courses')
            ->orderBy('id')
            ->paginate(10);

        return view('livewire.student-index-table', compact('institutions', 'careers', 'courses', 'students'));
    }
}
