<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Models\Career;
use App\Models\Institution;
use App\Models\Student;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class CareerController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        $trashed = Career::onlyTrashed()->get();
        return view('careers.index', compact('careers', 'trashed'));
    }

    public function create()
    {
        return view('careers.create');
    }

    public function store(StoreCareerRequest $request)
    {
        $request->merge(['institution_id' => auth()->user()->institution_id]);

        Career::create($request->all());

        return redirect(route('home.index'));
    }

    public function show(Career $career)
    {
        $courses = $career->courses;
        

        // Obtener los profesores paginados relacionados con los cursos de la carrera
        $teachers = Teacher::whereHas('courses', function ($query) use ($career) {
            $query->where('career_id', $career->id);
        })
            ->orderBy('name')
            ->paginate(10);

        // Obtener los estudiantes paginados relacionados con los cursos de la carrera
        $students = Student::whereHas('courses', function ($query) use ($career) {
            $query->where('career_id', $career->id);
        })
            ->orderBy('name')
            ->paginate(10);

        // Obtener las materias paginadas relacionadas con los cursos de la carrera
        $subjects = Subject::whereHas('courses', function ($query) use ($career) {
            $query->where('career_id', $career->id);
        })
            ->orderBy('name')
            ->paginate(10);

        return view('careers.show', compact('career', 'courses', 'teachers', 'students', 'subjects'));
    }

    public function edit(Career $career)
    {
        $institutions = Institution::all();
        return view('careers.edit', compact('career', 'institutions'));
    }

    public function update(Request $request, Career $career)
    {
        $career->update($request->all());
        return redirect(route('careers.show', $career));
    }

    public function destroy(career $career)
    {
        $career->delete();
        return redirect(route('careers.index'));
    }
}
