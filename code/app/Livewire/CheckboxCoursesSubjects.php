<?php

namespace App\Livewire;

use App\Models\Career;
use App\Models\Course;
use App\Models\Institution;
use App\Models\Subject;
use App\Models\User;
use Livewire\Component;

class CheckboxCoursesSubjects extends Component
{
    public $institutions;
    public $careers = [];
    public $courses = [];
    public $subjects = [];
    public $selectedData = []; // Maneja instituciones, carreras, y materias
    public $teacher;

    public function mount($teacher = null)
    {
        $this->institutions = Institution::all();
        $this->teacher = $teacher;

        if ($this->teacher) {
            // Agrupar los cursos del docente por carrera
            $groupedCourses = $this->teacher->courses->groupBy('career_id');

            // Obtener las materias asociadas al docente
            $teacherSubjects = $this->teacher->subjects; // Suponiendo que esta relación existe

            foreach ($groupedCourses as $careerId => $courses) {
                $career = $courses->first()->career;
                $institution = $career->institution;

                $index = count($this->selectedData);

                // Filtrar materias relacionadas con la carrera actual
                $relatedSubjects = Subject::whereHas('courses', function ($query) use ($careerId) {
                    $query->where('career_id', $careerId);
                })->get();

                // Determinar qué materias están asociadas al docente
                $selectedSubjects = $relatedSubjects->filter(function ($subject) use ($teacherSubjects) {
                    return $teacherSubjects->pluck('id')->contains($subject->id);
                });

                $this->selectedData[$index] = [
                    'selectedInstitution' => $institution->id,
                    'selectedCareer' => $career->id,
                    'selectedCourses' => $courses->pluck('id')->toArray(),
                    'selectedSubjects' => $selectedSubjects->pluck('id')->toArray(),
                ];

                $this->careers[$index] = Career::where('institution_id', $institution->id)->get();
                $this->courses[$index] = Course::where('career_id', $career->id)->get();
                $this->subjects[$index] = $relatedSubjects;
            }
        } else {
            $this->selectedData[] = [
                'selectedInstitution' => null,
                'selectedCareer' => null,
                'selectedCourses' => [],
                'selectedSubjects' => [],
            ];
        }
    }

    public function updatedSelectedData($value, $key)
    {
        [$index, $field] = explode('.', $key);

        if ($field === 'selectedInstitution') {
            $this->careers[$index] = Career::where('institution_id', $value)->get();
            $this->selectedData[$index]['selectedCareer'] = null;

            $this->courses[$index] = [];
            $this->selectedData[$index]['selectedCourses'] = [];

            $this->subjects[$index] = [];
            $this->selectedData[$index]['selectedSubjects'] = [];
        }

        if ($field === 'selectedCareer') {
            $this->courses[$index] = Course::where('career_id', $value)->get();
            $this->selectedData[$index]['selectedCourses'] = [];

            $this->subjects[$index] = Subject::whereHas('courses', function ($query) use ($value) {
                $query->where('career_id', $value);
            })->get();
            $this->selectedData[$index]['selectedSubjects'] = [];
        }
    }

    public function addCareer()
    {
        $this->selectedData[] = [
            'selectedInstitution' => null,
            'selectedCareer' => null,
            'selectedCourses' => [],
            'selectedSubjects' => [],
        ];
    }

    public function removeCareer($index)
    {
        unset($this->selectedData[$index]);
        $this->selectedData = array_values($this->selectedData);
    }

    public function render()
    {
        return view('livewire.checkbox-courses-subjects');
    }
}
