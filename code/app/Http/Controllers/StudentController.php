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
        $user = auth()->user();

        if ($user->hasRole('Admin')) {
            $students = Student::all();
        }

        elseif ($user->hasRole('Principal')) {
    
            // Inicializamos una colección vacía para los estudiantes
            $students = collect();
        
            // Recorrer las instituciones principales relacionadas con el principal
            foreach ($user->accountable->institutionPrincipals as $institutionPrincipal) {
                if ($institutionPrincipal->institution->career) {
                    // Iteramos sobre los cursos relacionados con la carrera
                    foreach ($institutionPrincipal->institution->career->courses as $course) {
                        // Fusionamos los estudiantes de cada curso
                        $students = $students->merge($course->students);
                    }
                }
            }
            
            $students = $students->unique('id');
        
        }
        
        elseif ($user->hasRole('Teacher')) {
            // Crear una colección vacía para almacenar los estudiantes
            $students = collect();
            
            // Iterar sobre los cursos relacionados con el teacher
            foreach ($user->accountable->courses as $course) {
                // Acceder a los cursos relacionados
                
                if ($course) {
                    // Fusionamos los estudiantes del curso
                    $students = $students->merge($course->students);
                }
            }
            
            // Eliminar estudiantes duplicados por id
            $students = $students->unique('id');
        }

        elseif ($user->hasRole('Student')) {
            // Crear una colección vacía para almacenar los estudiantes
            $students = collect();
            
            // Acceder a los cursos del estudiante mediante la relación courseStudents
            foreach ($user->accountable->courseStudents as $courseStudent) {
                // Acceder al curso del estudiante
                $course = $courseStudent->course;
                
                if ($course) {
                    // Fusionamos los estudiantes del curso (en este caso, solo el estudiante actual debería estar aquí)
                    $students = $students->merge($course->students);
                }
            }
            
            // Eliminar duplicados por id (aunque en este caso debería ser solo el estudiante)
            $students = $students->unique('id');
        }

        else {
            abort(403, 'No tienes permisos para acceder a esta sección.');
        }

        $trashed = Student::onlyTrashed()->get();
        return view('students.index', compact('students', 'trashed'));
    }

    public function create()
    {
        $cities = City::all();
        $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "students" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $studentsThatHasUser = Student::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $teachersThatHasUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $studentsThatHasNoUser = User::whereNotIn('id', $studentsThatHasUser)->get();
        return view('students.create', compact('cities', 'roles', 'studentsThatHasNoUser'));
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
