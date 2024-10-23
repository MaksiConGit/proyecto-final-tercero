<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\City;
use App\Models\Role;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
        $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "teachers" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $teachersThatHasUser = Teacher::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $teachersThatHasUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $teachersThatHasNoUser = User::whereNotIn('id', $teachersThatHasUser)->get();
        return view('teachers.create', compact('cities', 'roles', 'teachersThatHasNoUser'));
    }

    public function store(StoreTeacherRequest $request)
    {
        Teacher::create($request->all());
        return redirect(route('teachers.index'));
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function edit(Teacher $teacher)
    {
        $cities = City::all();
        $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "teachers" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $teachersThatHasUser = Teacher::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $teachersThatHasUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $teachersThatHasNoUser = User::whereNotIn('id', $teachersThatHasUser)->get();
        $usersTrashed = User::withTrashed()->find($teacher->user_id);
        return view('teachers.edit', compact('teacher', 'cities', 'roles', 'teachersThatHasNoUser', 'usersTrashed'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        $teacher->update($request->all());
        return redirect(route('teachers.show', $teacher));
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect(route('teachers.index'));
    }
}
