<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePrincipalRequest;
use App\Http\Requests\UpdatePrincipalRequest;
use App\Models\City;
use App\Models\Role;
use App\Models\Principal;
use App\Models\User;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    public function index()
    {
        $principals = Principal::all();
        $trashed = Principal::onlyTrashed()->get();
        return view('principals.index', compact('principals', 'trashed'));
    }

    public function create()
    {
        $cities = City::all();
        $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "principal" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $principalsThatHasUser = Principal::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $teachersThatHasUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $principalsThatHasNoUser = User::whereNotIn('id', $principalsThatHasUser)->get();
        return view('principals.create', compact('cities', 'roles', 'principalsThatHasNoUser'));
    }

    public function store(StorePrincipalRequest $request)
    {
        Principal::create($request->all());
        return redirect(route('principals.index'));
    }

    public function show(Principal $principal)
    {
        return view('principals.show', compact('principal'));
    }

    public function edit(Principal $principal)
    {
        $cities = City::all();
        $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "principal" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $studentsThatHasUser = Principal::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $teachersThatHasUser el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $studentsThatHasNoUser = User::whereNotIn('id', $studentsThatHasUser)->get();
        $usersTrashed = User::withTrashed()->find($principal->user_id);
        return view('principals.edit', compact('principal', 'cities', 'roles', 'studentsThatHasNoUser', 'usersTrashed'));
    }

    public function update(UpdatePrincipalRequest $request, Principal $principal)
    {
        $principal->update($request->all());
        return redirect(route('principals.show', $principal));
    }

    public function destroy(Principal $principal)
    {
        $principal->delete();
        return redirect(route('principals.index'));
    }
}
