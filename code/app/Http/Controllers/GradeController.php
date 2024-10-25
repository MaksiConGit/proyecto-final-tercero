<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeRequest;
use App\Models\Exam;
use App\Models\Grade;
use App\Models\Subject;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index(){

        $subjectsWithExams = Subject::has('exams')->get();
        $subjectWithExamsTrashed = Subject::onlyTrashed()->has('exams')->get();
        return view ('grades.index', compact('subjectsWithExams', 'subjectWithExamsTrashed'));
    }

    public function create(){
        return view ('grades.create');
    }

    public function store(StoreGradeRequest $request){
        Grade::create($request->all());
        return redirect(route('grades.index'));
    }
    
    public function show(Grade $grade){
        return view ('grades.show', compact('grade'));
    }

    public function edit(Grade $grade){
        return view ('grades.edit', compact('grade'));
    }

    public function update(Request $request ,Grade $grade){
        $grade->update($request->all());
        return redirect(route('grades.show', $grade));
    }

    public function destroy(Grade $grade){
        $grade->delete();
        return redirect(route('grades.index'));

    }
}
