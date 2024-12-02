<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\City;
use App\Models\Exam;
use App\Models\Institution;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('id')->paginate(5);
        $trashed = Student::onlyTrashed()->get();
        return view('students.index', compact('students', 'trashed'));
    }

    public function create()
    {
        $cities = City::all();

        return view('students.create', compact('cities'));
    }

    public function store(StoreStudentRequest $request)
    {
        // Generar un username único
        $generatedUsername = strtolower(Str::slug(substr($request->input('name'), 0, 1) . str_replace(' ', '', $request->input('lastname'))));
        $username = $generatedUsername;
        $counter = 1;

        while (User::where('name', $username)->exists()) {
            $username = $generatedUsername . $counter;
            $counter++;
        }

        //Almacenar datos de inicio de sesion para ver email y contraseña sin hashear
        $password = Str::random(12);
        DB::table('logindata')->insert([
            'email' => $request->input('email'),
            'password' => $password,
        ]);

        // Crear el usuario relacionado
        $user = User::create([
            'name' => $username,
            'institution_id' => Auth::user()->institution_id,
            'email' => $request->input('email'),
            'password' => $password,
        ]);

        // Obtener datos validados sin sobrescribir el request original
        $validatedData = $request->validated();
        $validatedData['user_id'] = $user->id;

        // Crear el estudiante
        $student = Student::create($validatedData);

        // Procesar carreras y cursos seleccionados si existen
        $selectedCourses = collect($request->input('selectedData', []))
            ->flatMap(function ($data) {
                return $data['courses'] ?? [];
            })
            ->unique()
            ->toArray();

        // Sincronizar los cursos con el estudiante
        $student->courses()->sync($selectedCourses);

        // Asociar polimórficamente el usuario con el estudiante
        $user->accountable()->associate($student);
        $user->save();

        return redirect(route('students.index'));
    }

    public function show(Student $student)
    {
        // Obtener los IDs de los cursos asignados al estudiante
        $courseIds = $student->courses()->pluck('courses.id');

        // Obtener los exámenes relacionados con los cursos del estudiante
        $exams = Exam::whereHas('courses', function ($query) use ($courseIds) {
            $query->whereIn('courses.id', $courseIds);
        })
            ->with([
                'courses',
                'teacherSubject.teacher',
                'teacherSubject.subject',
                'grades' => function ($query) use ($student) {
                    $query->where('student_id', $student->id);
                },
            ])
            ->get();

        return view('students.show', compact('student', 'exams'));
    }

    public function edit(Student $student)
    {
        $cities = City::all();
        $institutions = Institution::all();

        return view('students.edit', compact('student', 'cities', 'institutions'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        // Actualizar los datos básicos del estudiante
        $student->update($request->validated());

        $student->user->update([
            'institution_id' => $request->input('institution'),
            'email' => $request->input('email'),
        ]);

        // Manejar las relaciones de courses con el estudiante
        $selectedCourses = collect($request->input('selectedData', []))
            ->flatMap(function ($data) {
                return $data['courses'] ?? [];
            })
            ->unique()
            ->toArray();

        // Sincronizar las relaciones en course_students
        $student->courses()->sync($selectedCourses);
        return redirect(route('students.show', $student));
    }

    public function destroy(Student $student)
    {
        if ($student->user) {
            $student->user->delete();
        }
        $student->delete();
        return redirect(route('students.index'));
    }
}
