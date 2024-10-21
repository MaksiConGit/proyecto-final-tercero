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

    public function create(){
        $careers = Career::all();
        return view ('courses.create', compact('careers'));
    }

    public function store(StoreCourseRequest $request){
        Course::create($request->all());
        return redirect(route('courses.index'));
    }
    
    public function show(Course $course){
        return view ('courses.show', compact('course'));
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
