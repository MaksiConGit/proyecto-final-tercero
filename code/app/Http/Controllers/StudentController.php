<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Province;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $trashed = Student::onlyTrashed()->get();
        return view('students.index', compact('students', 'trashed'));
    }

    public function create()
    {
        $countries = Country::orderBy('name', 'asc')->get();
        $cities = City::orderBy('name', 'asc')->get();
        $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "students" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $studentsWithUser = Student::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $studentsWithUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $studentsWithNoUser = User::whereNotIn('id', $studentsWithUser)
            ->orderBy('name', 'asc')
            ->get();
        return view('students.create', compact('countries',  'roles', 'studentsWithNoUser'));
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->all());
        return redirect(route('students.index'));
    }

    public function show(Student $student)
    {
        $CourseStudent = $student->CourseStudent;
        return view('students.show', compact('student', 'CourseStudent'));
    }

    public function edit(Student $student)
    {
        $cities = City::orderBy('name', 'asc')->get();;
        $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "students" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $studentsWithUser = Student::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $studentsWithUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $studentsWithNoUser = User::whereNotIn('id', $studentsWithUser)
            ->orderBy('name', 'asc')
            ->get();
        $usersTrashed = User::withTrashed()->find($student->user_id);
        return view('students.edit', compact('student', 'cities', 'roles', 'studentsWithNoUser', 'usersTrashed'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());
        return redirect(route('students.show', $student));
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('students.index'));
    }

    public function getProvinces($country_id)
{
    $provinces = Province::where('country_id', $country_id)->get();
    return response()->json($provinces);
}

public function getCities($province_id)
{
    $cities = City::where('province_id', $province_id)->get();
    return response()->json($cities);
}
}
