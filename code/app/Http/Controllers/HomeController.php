<?php

namespace App\Http\Controllers;

use App\Models\AttendanceRecord;
use App\Models\Career;
use App\Models\Exam;
use App\Models\Institution;
use App\Models\InstitutionPrincipal;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('Principal')) {
            $principal = $user->accountable;

            $principalId = Auth::user()->accountable->id;

            // Obtener instituciones del principal
            $institutionIds = InstitutionPrincipal::where('principal_id', $principalId)->pluck('institution_id');

            $careers = Career::with('institution') // Relación con instituciones
                ->withCount('courses') // Cuenta los cursos asociados
                ->whereIn('institution_id', $institutionIds)
                ->get();

            // Obtener los promedios de notas agrupados por carrera
            $averages = DB::table('grades')->join('exams', 'grades.exam_id', '=', 'exams.id')->join('course_exams', 'exams.id', '=', 'course_exams.exam_id')->join('courses', 'course_exams.course_id', '=', 'courses.id')->join('careers', 'courses.career_id', '=', 'careers.id')->whereIn('careers.institution_id', $institutionIds)->select('careers.id as career_id', 'careers.name as career_name', DB::raw('AVG(grades.grade) as average_grade'))->groupBy('careers.id', 'careers.name')->get();

            return view('principals.home', compact('principal', 'careers', 'averages'));
        }

        if ($user->hasRole('Teacher')) {
            $teacher = $user->accountable;

            // Cursos y promedio de asistencias de alumnos
            $courses = $teacher->courseTeachers()->with('course.courseStudents.attendanceRecords')->get();
            $coursesWithAttendance = $courses->map(function ($courseTeacher) {
                $courseStudents = $courseTeacher->course->courseStudents;
                $totalStudents = $courseStudents->count();
                $totalAttendance = $courseStudents
                    ->flatMap(function ($student) {
                        return $student->attendanceRecords->where('has_attended', 1);
                    })
                    ->count();

                $attendancePercentage =
                    $totalStudents > 0
                        ? round(($totalAttendance / ($totalStudents * 6)) * 100, 2) // Suponiendo 6 días lectivos por curso
                        : 0;

                return [
                    'course' => $courseTeacher->course,
                    'attendance_percentage' => $attendancePercentage,
                ];
            });

            // Próximos exámenes
            $nextExams = $teacher
                ->teacherSubjects()
                ->with([
                    'exams' => function ($query) {
                        $query->where('date', '>', now())->orderBy('date');
                    },
                ])
                ->get()->flatMap->exams;

            // Materias y cantidad de exámenes
            $subjectsWithExamCount = $teacher
                ->teacherSubjects()
                ->with([
                    'subject',
                    'exams' => function ($query) {
                        $query->where('date', '<=', now()); // Solo exámenes ya tomados
                    },
                ])
                ->get()
                ->map(function ($teacherSubject) {
                    $examCount = $teacherSubject->exams->count();

                    return [
                        'subject' => $teacherSubject->subject,
                        'exam_count' => $examCount,
                    ];
                });

            return view('teachers.home', compact('teacher', 'coursesWithAttendance', 'nextExams', 'subjectsWithExamCount'));
        }

        if ($user->hasRole('Student')) {
            $student = $user->accountable;

            // Última nota del examen
            $lastExam = $student->grades()->with('exam.teacherSubject.teacher')->latest()->first(); // Trae la última nota de los exámenes
            // Promedio de asistencia
            $totalDays = 6; // Ejemplo: días lectivos

            $attendedDays = AttendanceRecord::where('course_student_id', $student->courseStudents->pluck('id'))->where('has_attended', 1)->count();
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

            return view('students.home', compact('student', 'lastExam', 'attendanceAverage', 'averageGrade', 'nextExam', 'absenceAverage'));
        }

        //return view('user.home', ['user' => $user]);
    }
}
