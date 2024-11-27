<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\AttendanceRecord;
use App\Models\Career;
use App\Models\City;
use App\Models\Course;
use App\Models\CourseStudent;
use App\Models\Exam;
use App\Models\Role;
use App\Models\Student;
use App\Models\User;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        $trashed = Student::onlyTrashed()->get();
        return view('students.index', compact('students', 'trashed'));
    }

    public function create()
    {
        $cities = City::orderBy('name', 'asc')->get();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "students" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $takenUserID = Student::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $takenUserID el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $availableUserID = User::whereNotIn('id', $takenUserID)->orderBy('name', 'asc')->get();
        return view('students.create', compact('cities', 'availableUserID'));
    }

    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->only(['name', 'lastname', 'dni', 'phone', 'birthdate', 'city_id', 'user_id']));

        // Usar la relación para guardar los cursos seleccionados
        //$student->courses()->attach($request->input('course'));
        // Procesar las carreras y cursos seleccionados
        foreach ($request->input('selectedData') as $data) {
            $careerId = $data['career'];
            $courseIds = $data['courses'] ?? [];

            foreach ($courseIds as $courseId) {
                CourseStudent::create([
                    'student_id' => $student->id,
                    'course_id' => $courseId,
                ]);
            }
        }

        return redirect()->back()->with('success', '¡Alumno creado correctamente!');

        return redirect(route('students.index'));
    }

    public function show(Student $student)
    {
        $courses = $student->courses->groupBy('career_id');

        return view('students.show', compact('student', 'courses'));
    }

    public function edit(Student $student)
    {
        $cities = City::orderBy('name', 'asc')->get();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "students" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $takenUserID = Student::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $takenUserID el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $availableUserID = User::whereNotIn('id', $takenUserID)->orderBy('name', 'asc')->get();
        $usersTrashed = User::withTrashed()->find($student->user_id);
        return view('students.edit', compact('student', 'cities', 'availableUserID', 'usersTrashed'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->all());
        return redirect(route('students.show', $student));
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect(route('students.index'));
    }

    public function courseDetail(Student $student, Course $course)
    {
        // Verificar que el curso pertenece al estudiante
        abort_unless($student->courses->contains($course), 404, 'El curso no pertenece al estudiante.');

        // Obtener el ID de course_students de la relación entre estudiante y curso
        $course_student = CourseStudent::where('student_id', $student->id)
            ->where('course_id', $course->id)
            ->firstOrFail();

        // Días de inasistencia
        $absentDays = AttendanceRecord::where('course_student_id', $course_student->id)
            ->where('has_attended', 0)
            ->get();

        // Agrupar exámenes por materia
        $courseExams = $course->exams->groupBy(fn($exam) => $exam->teacherSubject->subject->name);

        return view('students.courseDetail', compact('student', 'course', 'courseExams', 'absentDays'));
    }

    public function examDetail(Student $student, Course $course, Exam $exam)
    {
        // Verificar que el examen está relacionado con el curso
        if (!$course->exams->contains($exam)) {
            abort(404, 'El examen no pertenece al curso.');
        }

        $grades = $exam->grades->where('student_id', $student->id);

        return view('students.examDetail', compact('grades', 'exam', 'student'));
    }

    public function assignCourse(Course $course)
    {
        return view('students.assignCourse');
    }
}
