<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Career;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index(){
        $courses = Course::all();
        $trashed = Course::onlyTrashed()->get();
        return view ('courses.index', compact('courses', 'trashed'));
    }

    public function create(Career $career){
        
        $careers = Career::where('institution_id', $career->institution->id)->get();
        return view ('courses.create', compact('careers', 'career'));
    }

    public function store(StoreCourseRequest $request){
        Course::create($request->all());
        return redirect()->back()->with('success', '¡Curso creado correctamente!');
    }
    
    public function show(Course $course){
        $students = $course->students;
        $teachers = $course->teachers;
        $subjects = $course->subjects;
        return view ('courses.show', compact('course', 'students', 'teachers', 'subjects'));
    }

    public function edit(Course $course){
        $careers = Career::all();
        return view ('courses.edit', compact('course', 'careers'));
    }

    public function update(Request $request ,Course $course){
        $course->update($request->all());
        return redirect(route('courses.show', $course));
    }

    public function destroy(Course $course){
        $course->delete();
        return redirect(route('courses.index'));

    }
}
