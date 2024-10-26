<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view ('subjects.index', compact('subjects'));
    }

    public function create(){
        return view ('subjects.create');
    }

    public function store(StoreSubjectRequest $request){
        Subject::create($request->all());
        return redirect(route('subjects.index'));
    }
    
    public function show(Subject $subject){
        return view ('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject){
        return view ('subjects.edit', compact('subject'));
    }

    public function update(Request $request ,Subject $subject){
        $request->validate(['name'=>'required|string|max:255']);
        $subject->update($request->all());
        return redirect(route('subjects.show', $subject));
    }

    public function destroy(Subject $subject){

        $teacherSubjects = $subject->teacherSubject;

        foreach ($teacherSubjects as $teacherSubject) {
            $exams = $teacherSubject->exams;

            foreach ($exams as $exam) {
                $exam->delete();
            }
        }

        $subject->delete();
        
        return redirect(route('subjects.index'));

    }
}
