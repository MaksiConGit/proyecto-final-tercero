<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRecordRequest;
use App\Models\AttendanceRecord;
use App\Models\Course;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AttendanceRecordController extends Controller
{
    public function index(){

        $class_start_date = Carbon::createFromDate(2024, 3, 1);
        $class_end_date = Carbon::createFromDate(2024, 12, 15);
        $total_classes = $class_start_date->diffInDays($class_end_date);

        $students = Student::all();
        $trashed = AttendanceRecord::onlyTrashed()->get();
        
        return view ('attendance_records.index', compact('students', 'total_classes', 'trashed'));
    }

    public function create(){
        $courses = Course::all();
        $class_start_date = Carbon::createFromDate(2024, 3, 1);
        $class_end_date = Carbon::createFromDate(2024, 12, 15);
        $total_classes = $class_start_date->diffInDays($class_end_date);
        return view ('attendance_records.create', compact('courses'));
    }

    public function store(StoreAttendanceRecordRequest $request)
    {
        // Validar los registros de asistencia
        foreach ($request->attendance_records as $student_id => $attendance) {
            // Crear el registro de asistencia para cada estudiante
            AttendanceRecord::create([
                'course_student_id' => $student_id,
                'has_attended' => $attendance['has_attended'] ?? 0,
                'date' => $attendance['date'],
            ]);
        }
    
        return redirect(route('attendance_records.index'));
    }
    
    
    public function show(AttendanceRecord $attendance_record){
        return view ('attendance_records.show', compact('attendance_record'));
    }

    public function edit(AttendanceRecord $attendance_record){
        $students = Student::all();
        $class_start_date = Carbon::createFromDate(2024, 3, 1);
        $class_end_date = Carbon::createFromDate(2024, 12, 15);
        $total_classes = $class_start_date->diffInDays($class_end_date);
        return view ('attendance_records.edit', compact('attendance_record', 'students'));
    }

    public function update(StoreAttendanceRecordRequest $request, AttendanceRecord $attendance_record){
        $attendance_record->update($request->all());
        return redirect(route('attendance_records.show', $attendance_record));
    }

    public function destroy(AttendanceRecord $attendance_record){
        $attendance_record->delete();
        return redirect(route('attendance_records.index'));

    }
}
