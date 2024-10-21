<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCareerRequest;
use App\Models\Career;
use App\Models\Institution;
use Illuminate\Http\Request;

class CareerController extends Controller
{
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
