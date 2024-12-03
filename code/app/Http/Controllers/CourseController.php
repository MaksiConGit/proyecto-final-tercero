<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCourseRequest;
use App\Models\Career;
use App\Models\Course;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CourseController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            // Middleware para permisos específicos
            new Middleware('can:courses.create', only: ['create', 'store']),
            new Middleware('can:courses.edit', only: ['edit', 'update']),
            new Middleware('can:courses.delete', only: ['destroy']),
        ];
    }

    public function index(){
        $courses = Course::all();
        $trashed = Course::onlyTrashed()->get();
        return view ('courses.index', compact('courses', 'trashed'));
    }

    public function create(){
        $institutions = Institution::all();
        $careers = Career::all();
        return view ('courses.create', compact('careers', 'institutions'));
    }

    public function store(StoreCourseRequest $request){
        Course::create($request->all());
        return redirect(route('courses.index'));
    }
    
    public function show(Course $course){
        return view ('courses.show', compact('course'));
    }

    public function edit(Course $course){
        $institutions = Institution::all();
        $careers = Career::all();
        return view ('courses.edit', compact('course', 'careers', 'institutions'));
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
