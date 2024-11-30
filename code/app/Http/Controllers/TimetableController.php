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

    public function update(Request $request, Timetable $timetable)
    {
        // Validar los datos del formulario
        $request->validate([
            'days_of_week_id' => 'required|array',
            'days_of_week_id.*' => 'required|exists:days_of_weeks,id',
            'subject_id' => 'required|array',
            'subject_id.*' => 'required|array', // Aseguramos que 'subject_id' sea un array dentro de cada día.
            'start_time' => 'required|array',
            'start_time.*' => 'required|array', // Aseguramos que 'start_time' también sea un array dentro de cada día.
            'end_time' => 'required|array',
            'end_time.*' => 'required|array', // Aseguramos que 'end_time' sea un array dentro de cada día.
        ]);
    
        // Obtener el horario específico para actualizar
        $timetable = Timetable::findOrFail($timetable->id);

        echo "asfd";
    
        // Iterar sobre los días de la semana seleccionados
        foreach ($request->days_of_week_id as $dayCount => $dayId) {
            // Para cada día, obtener los time_slots correspondientes
            $timeSlots = $timetable->timeSlots()->where('days_of_week_id', $dayId)->get();

            echo $timeSlots . "<br>";
    
            // Verificar si existen timeSlots para ese día
            if ($timeSlots->isEmpty()) {
                // Manejo del caso en que no existan timeSlots para ese día
                return redirect()->back()->with('error', 'No existen timeSlots para el día seleccionado.');
            }
    
            // Iterar sobre los timeSlots encontrados
            foreach ($timeSlots as $timeSlot) {
                // Verificar si hay materias para actualizar en este timeSlot
                if (isset($request->subject_id[$dayCount])) {
                    foreach ($request->subject_id[$dayCount] as $materiaCount => $subjectId) {
                        // Verificar si el timeSlot corresponde al día y actualizar su tiempo
                        if ($timeSlot->days_of_week_id == $dayId) {

                            echo $dayId;
                            // Actualizar los horarios de inicio y fin del timeSlot
                            $timeSlot->update([
                                'start_time' => $request->start_time[$dayCount][$materiaCount],
                                'end_time' => $request->end_time[$dayCount][$materiaCount],
                                'subject_id' => $request->subject_id[$dayCount][$materiaCount],  // Cambiar materia
                                'days_of_week_id' => $request->days_of_week_id[$dayCount],  // Cambiar día de la semana
                            ]);
                            
                            
                        }
                    }
                }
            }

        }
    
        // Si todo va bien, redirigir al usuario
        return redirect()->route('timetables.index')->with('success', 'Horario actualizado correctamente');
    }
    
    
}
