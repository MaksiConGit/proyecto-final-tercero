<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        return view ('subjects.index');
    }

    public function create(){
        return view ('subjects.create');
    }

    public function store(){
        return redirect(route('subjects.index'));
    }
    
    public function show(){
        return view ('subjects.show');
    }

    public function edit(){
        return view ('subjects.edit');
    }

    public function update(){
        return redirect(route('subjects.show'));
    }
}
