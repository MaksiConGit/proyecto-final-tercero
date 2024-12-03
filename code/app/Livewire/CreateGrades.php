<?php

namespace App\Livewire;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CreateGrades extends Component
{
    public $courses = [];
    public $exams = [];
    public $students = [];
    public $selectedCourse = null;
    public $selectedExam = null;
    public $grades = []; // Array de notas (student_id => grade)

    public function mount()
    {
        // Obtener los cursos asignados al profesor autenticado
    $this->courses = Course::whereHas('teachers', function ($query) {
        $query->where('teacher_id', Auth::user()->accountable->id);
    })->get();

    }

    public function updatedSelectedCourse($courseId)
    {
        // Obtener los exámenes relacionados con el curso seleccionado a través de la tabla intermedia course_exams
        $this->exams = Exam::whereHas('courses', function ($query) use ($courseId) {
            $query->where('courses.id', $courseId); // Relación desde la tabla intermedia
        })
            ->whereHas('teacherSubject', function ($query) {
            $query->where('teacher_id', Auth::user()->accountable->id);
        })->get();

        $this->students = []; // Resetear estudiantes al cambiar de curso
        $this->selectedExam = null; // Resetear examen seleccionado
    }

    public function updatedSelectedExam($examId)
    {
        // Obtener los estudiantes del curso seleccionado
        $this->students = Student::whereHas('courses', function ($query) {
            $query->where('courses.id', $this->selectedCourse);
        })->get();

    }

    public function render()
    {
        return view('livewire.create-grades');
    }
}
