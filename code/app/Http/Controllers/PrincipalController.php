<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\City;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Institution;
use App\Models\InstitutionPrincipal;
use App\Models\Principal;
use App\Models\Role;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PrincipalController extends Controller
{
    public function index()
    {
        $user = auth()->user();
    
        // Inicializamos una colección vacía para almacenar los principals
        $principals = collect();
    
        if ($user->hasRole('Admin')) {
            // Admin: Trae todos los principals sin los eliminados
            $principals = Principal::withoutTrashed()->get();
        } elseif ($user->hasRole('Principal')) {
            // Principal: Obtenemos todos los principals relacionados con las instituciones del usuario
            foreach ($user->accountable->institutionPrincipals as $institutionPrincipal) {
                foreach ($institutionPrincipal->institution->institutionPrincipals as $instPrincipal) {
                    if ($instPrincipal->principal) {
                        $principals->push($instPrincipal->principal);
                    }
                }
            }
        } elseif ($user->hasRole('Teacher')) {
            // Teacher: Obtenemos los principals relacionados con los cursos que enseña
            foreach ($user->accountable->courses as $course) {
                foreach ($course->career->institution->institutionPrincipals as $instPrincipal) {
                    if ($instPrincipal->principal) {
                        $principals->push($instPrincipal->principal);
                    }
                }
            }
        } elseif ($user->hasRole('Student')) {
            // Student: Obtenemos los principals relacionados con los cursos del estudiante
            foreach ($user->accountable->courseStudents as $courseStudent) {
                $course = $courseStudent->course;
                if ($course) {
                    foreach ($course->career->institution->institutionPrincipals as $instPrincipal) {
                        if ($instPrincipal->principal) {
                            $principals->push($instPrincipal->principal);
                        }
                    }
                }
            }
        } else {
            abort(403, 'No tienes permisos para acceder a esta sección.');
        }
    
        // Eliminamos duplicados y registros eliminados
        $principals = $principals->unique('id')->filter(function ($principal) {
            return !$principal->trashed();
        });
    
        // Obtenemos los registros eliminados (solo para Admin)
        $trashed = $user->hasRole('Admin') ? Principal::onlyTrashed()->get() : collect();
    
        return view('principals.index', compact('principals', 'trashed'));
    }
    

    public function create()
    {
        $cities = City::all();
        $principal = Auth::user()->accountable;
        $institutions = $principal->institutionPrincipals;
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "teachers" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $principalsThatHasUser = Teacher::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $teachersThatHasUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $principalsThatHasNoUser = User::whereNotIn('id', $principalsThatHasUser)->get();
        return view('principals.create', compact('cities', 'principalsThatHasNoUser', 'institutions'));
    }

    public function store(StorePrincipalRequest $request)
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
        $principal = Principal::create($validatedData);

        // Procesar carreras y cursos seleccionados si existen
        $selectedinstitutions = $request->input('instituciones');

        // Sincronizar los cursos con el estudiante
        $principal->institutions()->sync($selectedinstitutions);

        // Asociar polimórficamente el usuario con el estudiante
        $user->accountable()->associate($principal);

        $user->assignRole('Principal');

        $user->save();

        return redirect(route('principals.index'));
    }

    public function show(Principal $principal)
    {
        return view('principals.show', compact('principal'));
    }
    
    public function edit(Principal $principal)
    {
        $cities = City::all();
        $institutionsArray = Auth::user()->accountable->institutions;
        return view('principals.edit', compact('principal', 'cities', 'institutionsArray'));
    }

    public function update(UpdatePrincipalRequest $request, Principal $principal)
    {
        // Actualizar los datos básicos del estudiante
        $principal->update($request->validated());

        $principal->user->update([
            'email' => $request->input('email'),
        ]);

        // Actualiza las instituciones del estudiante
        $principal->institutions()->sync($request->input('instituciones'));  // Sincroniza las relaciones con las instituciones

        return redirect(route('principals.show', $principal));
    }

    public function destroy(Principal $principal)
    {
        $principal->delete();
        return redirect(route('principals.index'));
    }

    public function createUser(Principal $principal){
        
        return view('principals.createUser', compact('principal'));

    }

    public function storeUser(Request $request, Principal $principal) {
        
        // Generar un username único
        $generatedUsername = strtolower(Str::slug(substr($principal->name, 0, 1) . str_replace(' ', '', $principal->lastname)));
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

        $user->accountable()->associate($principal);

        $user->assignRole('Principal');

        $user->save();

        return redirect(route('principals.index'));
    }
}
