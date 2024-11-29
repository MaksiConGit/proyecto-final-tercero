<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use App\Models\City;
use App\Models\Institution;
use App\Models\Principal;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

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
        Principal::create($request->all());
        return redirect(route('principals.index'));
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
        return redirect(route('principals.show', $principal));
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
