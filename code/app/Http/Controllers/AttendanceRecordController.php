<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use Illuminate\Http\Request;

class AttendanceRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('attendances.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('attendances.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array', // Asegurarse de recibir un array
        ]);

        // Procesar los registros de asistencia
        foreach ($validated['attendance'] as $courseStudentId => $hasAttended) {
            AttendanceRecord::create([
                'course_student_id' => $courseStudentId, // ID del estudiante en el curso
                'date' => $validated['date'], // Fecha de asistencia
                'has_attended' => $hasAttended, // 1 o 0 según el checkbox
            ]);
        }

        return redirect()->back()->with('success', 'Asistencias registradas correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(AttendanceRecord $attendanceRecord)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AttendanceRecord $attendanceRecord)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AttendanceRecord $attendanceRecord)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AttendanceRecord $attendanceRecord)
    {
        //
    }
}
