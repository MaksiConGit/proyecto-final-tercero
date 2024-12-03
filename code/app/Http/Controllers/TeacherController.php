<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\City;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Institution;
use App\Models\Role;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeacherController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            // Middleware para permisos específicos
            new Middleware('can:teachers.create', only: ['create', 'store']),
            new Middleware('can:teachers.edit', only: ['edit', 'update']),
            new Middleware('can:teachers.delete', only: ['destroy']),
        ];
    }
    public function index()
    {
        // $teachers = Teacher::all();

        $user = auth()->user();

        if ($user->hasRole('Admin')) {
            $teachers = Teacher::all();
        }

        elseif ($user->hasRole('Principal')) {
    
            // Inicializamos una colección vacía para los estudiantes
            $teachers = collect();
        
            // Recorrer las instituciones principales relacionadas con el principal
            foreach ($user->accountable->institutionPrincipals as $institutionPrincipal) {
                if ($institutionPrincipal->institution->careers->isNotEmpty()) {
                    // Iteramos sobre los cursos relacionados con la carrera
                    foreach ($institutionPrincipal->institution->careers as $career) {
                        foreach ($career->courses as $course) {
                            $teachers = $teachers->merge($course->teachers);
                        }
                    }
                }
            }
            
            $teachers = $teachers->unique('id');
            // dd($teachers);

        
        }
        
        elseif ($user->hasRole('Teacher')) {
            // Crear una colección vacía para almacenar los estudiantes
            $teachers = collect();
            
            // Iterar sobre los cursos relacionados con el teacher
            foreach ($user->accountable->courses as $course) {
                // Acceder a los cursos relacionados
                
                if ($course) {
                    // Fusionamos los estudiantes del curso
                    $teachers = $teachers->merge($course->teachers);
                }
            }
            
            // Eliminar estudiantes duplicados por id
            $teachers = $teachers->unique('id');
        }

        elseif ($user->hasRole('Student')) {
            // Crear una colección vacía para almacenar los estudiantes
            $teachers = collect();
            
            // Acceder a los cursos del estudiante mediante la relación courseStudents
            foreach ($user->accountable->courseStudents as $courseStudent) {
                // Acceder al curso del estudiante
                $course = $courseStudent->course;
                
                if ($course) {
                    // Fusionamos los estudiantes del curso (en este caso, solo el estudiante actual debería estar aquí)
                    foreach ($course->courseTeachers as $courseTeacher) {
                        $teachers->push($courseTeacher->teacher);
                    }
                }
            }
            
            // Eliminar duplicados por id (aunque en este caso debería ser solo el estudiante)
            $teachers = $teachers->unique('id');
        }

        else {
            abort(403, 'No tienes permisos para acceder a esta sección.');
        }

        $trashed = Teacher::onlyTrashed()->get();

        return view('teachers.index', compact('teachers', 'trashed'));
    }

    public function create()
    {
        $cities = City::all();
        // $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "teachers" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $teachersThatHasUser = Teacher::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $teachersThatHasUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $teachersThatHasNoUser = User::whereNotIn('id', $teachersThatHasUser)->get();
        return view('teachers.create', compact('cities', 'teachersThatHasNoUser'));
    }

    public function store(StoreTeacherRequest $request)
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
        $teacher = Teacher::create($validatedData);

        // Procesar carreras y cursos seleccionados si existen
        $selectedCourses = collect($request->input('selectedData', []))
            ->flatMap(function ($data) {
                return $data['courses'] ?? [];
            })
            ->unique()
            ->toArray();

        // Sincronizar los cursos con el estudiante
        $teacher->courses()->sync($selectedCourses);

        // Asociar polimórficamente el usuario con el estudiante
        $user->accountable()->associate($teacher);
        $user->assignRole('Teacher');
        $user->save();

        return redirect(route('teachers.index'));
    }

    public function show(Teacher $teacher)
    {
        // Paso 1: Obtener todos los teacher_subjects relacionados con este profesor
        $teacher_subjects = TeacherSubject::where('teacher_id', $teacher->id)->get();
    
        // Paso 2: Obtener todos los examenes donde teacher_subject_id coincida con los teacher_subject_id del profesor
        $exams = Exam::whereIn('teacher_subject_id', $teacher_subjects->pluck('id'))->get();

        // print_r($exams);
    
        // Depuración: Verificar los exámenes obtenidos
        // dd($exams);
    
        // Retornar la vista con los exámenes
        return view('teachers.show', compact('teacher', 'exams'));
    }
    
    public function edit(Teacher $teacher)
    {
        $cities = City::all();
        $institutions = Institution::all();

        return view('teachers.edit', compact('teacher', 'cities', 'institutions'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        // Actualizar los datos básicos del estudiante
        $teacher->update($request->validated());

        $teacher->user->update([
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
        $teacher->courses()->sync($selectedCourses);
        return redirect(route('teachers.show', $teacher));
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        return redirect(route('teachers.index'));
    }
}
