<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Models\Career;
use App\Models\Institution;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CareerController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            // Middleware para permisos específicos
            new Middleware('can:careers.create', only: ['create', 'store']),
            new Middleware('can:careers.edit', only: ['edit', 'update']),
            new Middleware('can:careers.delete', only: ['destroy']),
        ];
    }

    public function index(){
        $careers = Career::all();
        $trashed = Career::onlyTrashed()->get();
        return view ('careers.index', compact('careers', 'trashed'));
    }

    public function create(){
        $institutions = Institution::all();
        return view ('careers.create', compact('institutions'));
    }

    public function store(StoreCareerRequest $request){
        Career::create($request->all());
        return redirect(route('careers.index'));
    }
    
    public function show(Career $career){
        return view ('careers.show', compact('career'));
    }

    public function edit(Career $career){
        $institutions = Institution::all();
        return view ('careers.edit', compact('career', 'institutions'));
    }

    public function update(Request $request ,Career $career){
        $career->update($request->all());
        return redirect(route('careers.show', $career));
    }

    public function destroy(career $career){
        $career->delete();
        return redirect(route('careers.index'));

    }
}
