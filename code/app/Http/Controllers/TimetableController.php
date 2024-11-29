<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\Course;
use App\Models\Days_of_week;
use App\Models\Institution;
use App\Models\Subject;
use App\Models\Time_slot;
use App\Models\Timetable;
use App\Models\TimetableTimeSlot;
use Illuminate\Http\Request;

class TimetableController extends Controller
{
    public function index(){
        // $timetables = Timetable::all();
        $courses = Course::orderBy('course_number')->get();
        return view ('timetables.index', compact('courses'));
    }

    public function create(){
        $courses = Course::orderBy('course_number')->get();
        $subjects = Subject::all();
        $institutions = Institution::all();
        $careers = Career::all();
        $days_of_weeks = Days_of_week::all();
        return view ('timetables.create', compact('subjects', 'courses', 'days_of_weeks', 'institutions', 'careers'));
    }

    // public function store(Request $request)
    // {
    //     dd($request->all());  // Imprime todos los datos enviados en la solicitud
    // }
    

    public function store(Request $request)
    {
        // Validar los datos
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'days_of_week_id' => 'required|array',
            'subject_id' => 'required|array',
            'start_time' => 'required|array',
            'end_time' => 'required|array',
        ]);
    
        // Crear el horario (timetable)
        $timetable = Timetable::create([
            'course_id' => $request->course_id,
        ]);
    
        // Iterar sobre los días y asignar materias
        foreach ($request->days_of_week_id as $diaIndex => $dayId) {
            $day = Days_of_week::find($dayId);
    
            foreach ($request->subject_id[$diaIndex] as $materiaIndex => $subjectId) {
                $timeSlot = Time_slot::create([
                    'subject_id' => $subjectId,
                    'days_of_week_id' => $dayId,
                    'start_time' => $request->start_time[$diaIndex][$materiaIndex],
                    'end_time' => $request->end_time[$diaIndex][$materiaIndex],
                ]);
    
                // Asociar el horario con el timetable
                $timetable->timeSlots()->attach($timeSlot->id);
            }
        }
    
        return redirect(route('timetables.index'));
    }
    

    
    
    
    public function show(Timetable $timetable){
        return view ('timetables.show', compact('timetable'));
    }

    public function edit(Timetable $timetable){
        $courses = Course::orderBy('course_number')->get();
        $subjects = Subject::all();
        $institutions = Institution::all();
        $careers = Career::all();
        $days_of_weeks = Days_of_week::all();
        return view ('timetables.edit', compact('subjects', 'courses', 'days_of_weeks', 'institutions', 'careers', 'timetable'));
    }

    public function update(Request $request ,Timetable $timetable){
        $request->validate(['name'=>'required|string|max:255']);
        $timetable->update($request->all());
        return redirect(route('timetables.show', $timetable));
    }

    public function destroy(Timetable $timetable){

        $teacherSubjects = $timetable->teacherSubject;

        foreach ($teacherSubjects as $teacherSubject) {
            $exams = $teacherSubject->exams;

            foreach ($exams as $exam) {
                $exam->delete();
            }
        }

        $timetable->delete();
        
        return redirect(route('timetables.index'));

    }
}
