<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use App\Models\City;
use App\Models\Institution;
use App\Models\Principal;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $principals = Principal::all();
        $trashed = Principal::onlyTrashed()->get();
        return view('principals.index', compact('principals', 'trashed'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $cities = City::all();
        $institutions = Institution::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "principals" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $takenUserID = Principal::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $takenUserID el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $availableUserID = User::whereNotIn('id', $takenUserID)->get();
        return view('principals.create', compact('cities', 'availableUserID', 'institutions'));
    }

    /**
     * Store a newly created resource in storage.
     */
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
            'password' => $password
        ]);

        // Crear el usuario relacionado
        $user = User::create([
            'name' => $username,
            'institution_id' => $request->input('institution'),
            'email' => $request->input('email'),
            'password' => $password,
        ])->assignRole('principal');
        
        $request = $request->validated();
        $request['user_id'] = $user->id;
        Principal::create($request);


        return redirect()->back()->with('success', '¡Directivo y usuario creado correctamente!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Principal $principal)
    {
        return view('principals.show', compact('principal'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Principal $principal)
    {
        $institutions = Institution::all();
        $cities = City::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "principals" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $takenUserID = Principal::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $takenUserID el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $availableUserID = User::whereNotIn('id', $takenUserID)->get();
        return view('principals.edit', compact('principal', 'cities', 'availableUserID', 'institutions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePrincipalRequest $request, Principal $principal)
    {
        $principal->update($request->all());
        $principal->user->update([
            'institution_id' => $request->input('institution'),
            'email' => $request->input('email'),
        ]);
        return redirect()->back()->with('success', '¡Datos actualizados correctamente!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Principal $principal)
    {
        $principal->delete();
        return redirect(route('principals.index'));
    }
}
