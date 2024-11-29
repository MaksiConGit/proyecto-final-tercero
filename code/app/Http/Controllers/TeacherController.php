<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\City;
use App\Models\Teacher;
use App\Models\User;


class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        $trashed = Teacher::onlyTrashed()->get();
        return view('teachers.index', compact('teachers', 'trashed'));
    }

    public function create()
    {
        $cities = City::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "teachers" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $takenUserId = Teacher::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $takenUserId el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $availableUserId = User::whereNotIn('id', $takenUserId)->get();
        return view('teachers.create', compact('cities', 'availableUserId'));
    }

    public function store(StoreTeacherRequest $request)
    {
        $teacher = Teacher::create($request->validated());

        // Procesar las relaciones con carreras, cursos y materias
        $selectedData = $request->input('selectedData', []);

        foreach ($selectedData as $data) {
            $courses = $data['courses'] ?? [];
            $subjects = $data['subjects'] ?? [];

            // Crear las relaciones en teacher_subjects
            $teacher->subjects()->attach($subjects);

            // Crear las relaciones en course_teachers
            $teacher->courses()->attach($courses);
        }

        return redirect()->back()->with('success', 'Profesor creado correctamente!');
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $cities = City::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "teachers" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $takenUserId = Teacher::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $takenUserId el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $availableUserId = User::whereNotIn('id', $takenUserId)->get();
        return view('teachers.edit', compact('teacher', 'cities', 'availableUserId'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->validated());

        // Actualizar los datos básicos del estudiante
        $teacher->update($request->validated());

        // Manejar las relaciones de courses con el estudiante
        $selectedCourses = collect($request->input('selectedData', []))
            ->flatMap(function ($data) {
                return $data['courses'] ?? [];
            })
            ->unique()
            ->toArray();

        $selectedSubjects = collect($request->input('selectedData', []))
            ->flatMap(function ($data) {
                return $data['subjects'] ?? [];
            })
            ->unique()
            ->toArray();

        // Sincronizar las relaciones en course_students
        $teacher->courses()->sync($selectedCourses);
        $teacher->subjects()->sync($selectedSubjects);
        return redirect(route('teachers.show', $teacher));
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect(route('teachers.index'));
    }
}
