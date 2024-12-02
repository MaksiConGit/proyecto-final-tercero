<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExamRequest;
use App\Models\Career;
use App\Models\Course;
use App\Models\CourseExam;
use App\Models\Exam;
use App\Models\Institution;
use App\Models\Subject;
use App\Models\Teacher;
use App\Models\TeacherSubject;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        // $exams = Exam::all();
        $courses = Course::all();
        $trashed = Exam::onlyTrashed()->get();
        return view('exams.index', compact('courses', 'trashed'));
    }

    public function create()
    {
        $institutions = Institution::all();
        $careers = Career::all();
        $courses = Course::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view ('exams.create', compact('institutions', 'careers', 'courses', 'teachers', 'subjects'));
    }
    
    public function store(StoreExamRequest $request){
        // Crear o encontrar la relación entre profesor y materia
        $teacherSubject = TeacherSubject::firstOrCreate(
            [
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id,
            ]
        );
    
        $exam = Exam::create([
            'number' => $request->number,
            'date' => $request->date,
            'teacher_subject_id' => $teacherSubject->id,
        ]);
    
        CourseExam::create([
            'course_id' => $request->course_id,
            'exam_id' => $exam->id,
        ]);
    
        return redirect(route('exams.index'));
    }
    

    public function show(Exam $exam)
    {
        return view('exams.show', compact('exam'));
    }

    public function edit(Exam $exam)
    {
        $institutions = Institution::all();
        $careers = Career::all();
        $courses = Course::all();
        $teachers = Teacher::all();
        $subjects = Subject::all();
        return view ('exams.edit', compact('exam', 'institutions', 'careers', 'courses', 'teachers', 'subjects'));
    }

    public function update(StoreExamRequest $request, Exam $exam)
    {
        $teacherSubject = TeacherSubject::firstOrCreate(
            [
                'teacher_id' => $request->teacher_id,
                'subject_id' => $request->subject_id,
            ]
        );

        $exam->update([
            'number' => $request->number,
            'date' => $request->date,
            'teacher_subject_id' => $teacherSubject->id,
        ]);
        
        return redirect(route('exams.show', $exam));
    }

    public function destroy(Exam $exam)
    {
        $exam->delete();
        return redirect(route('exams.index'));
    }
}