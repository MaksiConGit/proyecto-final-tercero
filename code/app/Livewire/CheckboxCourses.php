<?php

namespace App\Livewire;

use App\Models\Career;
use App\Models\Course;
use App\Models\Institution;
use Livewire\Component;

class CheckboxCourses extends Component
{
    public $institutions;
    public $careers;
    public $courses;

    public $selectedInstitution = null;
    public $selectedCareer = null;

    public function mount(){
        $this->institutions = Institution::all();

    }

    public function updatedSelectedInstitution($institution){
        $this->careers = Career::where('institution_id', $institution)->get();
    }

    public function updatedSelectedCareer($career){
        $this->courses = Course::where('career_id', $career)->get();

    }

    public function render()
    {
        return view('livewire.checkbox-courses');
    }
}
