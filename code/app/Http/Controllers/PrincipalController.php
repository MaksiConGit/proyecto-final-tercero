<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use App\Models\City;
use App\Models\Institution;
use App\Models\Role;
use App\Models\Principal;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PrincipalController extends Controller
{
    public function index()
    {
        $principals = Principal::orderBy('id')->paginate(5);
        $trashed = Principal::onlyTrashed()->get();
        return view('principals.index', compact('principals', 'trashed'));
    }

    public function create()
    {
        $cities = City::all();
        $institutions = Institution::all();

        return view('principals.create', compact('cities', 'institutions'));
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
            'institution_id' => $request->input('institution'),
            'email' => $request->input('email'),
            'password' => $password,
        ]);

        $request = $request->validated();
        $request['user_id'] = $user->id;
        $principal = Principal::create($request);

        $user->accountable()->associate($principal); // Asociar polimórficamente
        $user->save();

        return redirect(route('principals.index'));
    }

    public function show(Principal $principal)
    {
        return view('principals.show', compact('principal'));
    }

    public function edit(Principal $principal)
    {
        $institutions = Institution::all();
        $cities = City::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "principal" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $studentsThatHasUser = Principal::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $teachersThatHasUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $studentsThatHasNoUser = User::whereNotIn('id', $studentsThatHasUser)->get();
        return view('principals.edit', compact('principal', 'cities', 'studentsThatHasNoUser', 'institutions'));
    }

    public function update(UpdatePrincipalRequest $request, Principal $principal)
    {
        $principal->update($request->all());
        $principal->user->update([
            'institution_id' => $request->input('institution'),
            'email' => $request->input('email'),
        ]);
        return redirect(route('principals.show', $principal));
    }

    public function destroy(Principal $principal)
    {
        $principal->delete();
        return redirect(route('principals.index'));
    }
}
