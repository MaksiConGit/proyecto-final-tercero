<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Models\City;
use App\Models\Role;
use App\Models\Teacher;
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
        return view('teachers.create', compact('cities', 'roles'));
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
        return view('teachers.edit', compact('teacher', 'cities', 'roles'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'dni' => ['required', Rule::unique('teachers')->ignore($teacher->id)],
            'user_id' => ['nullable', Rule::unique('teachers')->ignore($teacher->id)],
        ]);
        $teacher->update($request->all());
        return redirect(route('teachers.show', $teacher));
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect(route('teachers.index'));
    }
}
