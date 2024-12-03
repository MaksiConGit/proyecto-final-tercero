<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAttendanceRecordRequest;
use App\Models\AttendanceRecord;
use App\Models\Course;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class AttendanceRecordController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            // Middleware para permisos específicos
            new Middleware('can:attendance_records.create', only: ['create', 'store']),
            new Middleware('can:attendance_records.edit', only: ['edit', 'update']),
            new Middleware('can:attendance_records.delete', only: ['destroy']),
        ];
    }
    
    public function index()
    {
        $class_start_date = Carbon::createFromDate(2024, 3, 1);
        $class_end_date = Carbon::createFromDate(2024, 12, 15);
        $total_classes = $class_start_date->diffInDays($class_end_date);

        $students = Student::all();
        $trashed = AttendanceRecord::onlyTrashed()->get();

        return view('attendance_records.index', compact('students', 'total_classes', 'trashed'));
    }

    public function create()
    {
        $courses = Course::all();
        $class_start_date = Carbon::createFromDate(2024, 3, 1);
        $class_end_date = Carbon::createFromDate(2024, 12, 15);
        $total_classes = $class_start_date->diffInDays($class_end_date);
        return view('attendance_records.create', compact('courses'));
    }

    public function store(StoreAttendanceRecordRequest $request)
    {

        // Iterar sobre los registros de asistencia validados
        foreach ($request['attendance'] as $course_student_id => $has_attended) {
            AttendanceRecord::create([
                'course_student_id' => $course_student_id, // ID del estudiante en el curso
                'date' => $request['date'], // Fecha de asistencia
                'has_attended' => $has_attended, // 1 o 0 según el checkbox
            ]);
        }

        return redirect()->back()->with('success', 'Asistencias registradas correctamente.');
    }

    public function show(AttendanceRecord $attendance_record)
    {
        return view('attendance_records.show', compact('attendance_record'));
    }

    public function edit(AttendanceRecord $attendance_record)
    {
        $students = Student::all();
        $class_start_date = Carbon::createFromDate(2024, 3, 1);
        $class_end_date = Carbon::createFromDate(2024, 12, 15);
        $total_classes = $class_start_date->diffInDays($class_end_date);
        return view('attendance_records.edit', compact('attendance_record', 'students'));
    }

    public function update(StoreAttendanceRecordRequest $request, AttendanceRecord $attendance_record)
    {
        $attendance_record->update($request->all());
        return redirect(route('attendance_records.show', $attendance_record));
    }

    public function destroy(AttendanceRecord $attendance_record)
    {
        $attendance_record->delete();
        return redirect(route('attendance_records.index'));
    }
}
