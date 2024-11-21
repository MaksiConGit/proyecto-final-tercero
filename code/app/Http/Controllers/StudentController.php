<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\City;
use App\Models\Course;
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
        $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "students" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $takenUserID = Student::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $takenUserID el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $availableUserID = User::whereNotIn('id', $takenUserID)->orderBy('name', 'asc')->get();
        return view('students.create', compact('cities', 'roles', 'availableUserID'));
    }

    public function store(StoreStudentRequest $request)
    {
        Student::create($request->all());
        return redirect(route('students.index'));
    }

    public function show(Student $student)
    {
        // Agrupar los cursos por carrera
        $coursesByCareer = $student->courses->groupBy(function ($course) {
            return $course->career->name; // Agrupar por el nombre de la carrera
        });

        return view('students.show', compact('student', 'coursesByCareer'));
    }

    public function edit(Student $student)
    {
        $cities = City::orderBy('name', 'asc')->get();
        $roles = Role::all();
        //Trae todos los registros que no sean nulos de la columna "user_id" de la tabla "students" y crea un array de solo la columna "user_id". Entonces trae todos las user_id que si estan asignados.
        $takenUserID = Student::whereNotNull('user_id')->pluck('user_id');
        //Busca las user_id que no estén dentro del array $takenUserID el cual contiene las user_id ya asignadas, y por descarte, obtengo los user_id que están libres.
        $availableUserID = User::whereNotIn('id', $takenUserID)->orderBy('name', 'asc')->get();
        $usersTrashed = User::withTrashed()->find($student->user_id);
        return view('students.edit', compact('student', 'cities', 'roles', 'availableUserID', 'usersTrashed'));
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
        if (!$student->courses->contains($course)) {
            abort(404, 'El curso no pertenece al estudiante.');
        }

        $exams = $course->exams;

        // Agrupar los exámenes por materia
        $examsBySubject = $exams->mapToGroups(function ($exam) {
            return [$exam->teacherSubject->subject->name => $exam];
        });

        return view('students.courseDetail', compact('student', 'course', 'examsBySubject'));
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
}
