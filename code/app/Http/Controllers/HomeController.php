<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use App\Models\Exam;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Principal')) {
            return view('principals.index');
        }

        if ($user->hasRole('Teacher')) {
            return view('teachers.index');
        }

        if ($user->hasRole('Student')) {
            $student = $user->accountable;

            // Última nota del examen
            $lastExam = $student->grades()->with('exam.teacherSubject.teacher')->latest()->first(); // Trae la última nota de los exámenes

            // Promedio de asistencia
            $totalDays = 6; // Ejemplo: días lectivos
            $attendedDays = AttendanceRecord::where('student_id', $student->id)
                ->where('has_attended', 1)
                ->count();
            $missedDays = $totalDays - $attendedDays;
            $attendanceAverage = round(($attendedDays / $totalDays) * 100);
            $absenceAverage = round(($missedDays / $totalDays) * 100);

            // Promedio de las notas de los exámenes
            $averageGrade = $student->grades()->avg('grade'); // Promedio de todas las notas

            // Fecha del próximo examen
            $nextExam = Exam::whereHas('courses.students', function ($q) use ($student) {
                $q->where('student_id', $student->id);
            })
                ->where('date', '>', Carbon::now()) // Exámenes futuros
                ->orderBy('date', 'asc') // El más cercano
                ->first();

            return view('students.home', compact(
                'student',
                'lastExam',
                'attendanceAverage',
                'averageGrade',
                'nextExam',
                'absenceAverage'
            ));
        }

        //return view('user.home', ['user' => $user]);
    }
}
