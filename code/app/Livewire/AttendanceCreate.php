<?php

namespace App\Livewire;

use App\Models\Career;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Institution;
use App\Models\Student;
use Livewire\Component;

class AttendanceCreate extends Component
{
    public $institutions = []; // Todas las instituciones
    public $careers = []; // Carreras dependientes de la institución seleccionada
    public $courses = []; // Carreras dependientes de la institución seleccionada
    public $students = [];
    public $course_students = [];

    public $selectedInstitution = null; // ID de la institución seleccionada
    public $selectedCareer = null; // ID de la carrera seleccionada
    public $selectedCourse = null; // ID de la carrera seleccionada

    public $courseName = '';

    public function mount()
    {
        // Cargar todas las instituciones
        $this->institutions = Institution::all();
    }

    public function updatedSelectedInstitution($institution)
    {
        // Actualizar las carreras basadas en la institución seleccionada
        $this->careers = Career::where('institution_id', $institution)->get();

        // Reiniciar la carrera seleccionada al cambiar de institución
        $this->courses = [];
        $this->students = [];
        $this->selectedCareer = null;
        $this->selectedCourse = null;
    }

    public function updatedSelectedCareer($career)
    {
        // Actualizar las carreras basadas en la institución seleccionada
        $this->courses = Course::where('career_id', $career)->get();

        // Reiniciar la carrera seleccionada al cambiar de institución
        $this->students = [];
        $this->selectedCourse = null;
    }

    public function updatedSelectedCourse($courseId)
    {
        $this->course_students = CourseStudent::where('course_id', $courseId)->get();

        $course = Course::find($courseId);

        if ($course) {
            // Combinar el nombre y el número para crear el nombre completo
            $this->courseName = "{$course->course_number}° {$course->section}";
        } else {
            $this->courseName = '';
        }
    }

    public function render()
    {
        return view('livewire.attendance-create');
    }
}
