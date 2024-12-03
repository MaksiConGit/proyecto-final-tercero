<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Models\Course;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class SubjectController extends Controller
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            // Middleware para permisos específicos
            new Middleware('can:subjects.create', only: ['create', 'store']),
            new Middleware('can:subjects.edit', only: ['edit', 'update']),
            new Middleware('can:subjects.delete', only: ['destroy']),
        ];
    }
    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index', compact('subjects'));
    }

    public function create()
    {
        // Obtener las instituciones del principal logueado
        $principal = auth()->user()->accountable; // O el método que uses para obtener el principal
        $institutions = $principal->institutions;

        // Obtener cursos agrupados por institución y carrera
        $courses = Course::whereIn('career_id', function ($query) use ($institutions) {
            $query->select('id')->from('careers')->whereIn('institution_id', $institutions->pluck('id')); // ID de las instituciones
        })
            ->with(['career.institution']) // Cargar relaciones para institución y carrera
            ->get()
            ->groupBy(function ($course) {
                return $course->career->institution->name . ' - ' . $course->career->name;
            });

        return view('subjects.create', compact('courses'));
    }

    public function store(StoreSubjectRequest $request)
    {
        // Validar los datos que vienen en el request
        $validated = $request->validated();

        // Crear la materia
        $subject = Subject::create([
            'name' => $validated['name'], // Asegúrate de que el campo del nombre esté en tu StoreSubjectRequest
        ]);

        // Asociar la materia con los cursos seleccionados
        if (isset($validated['courses']) && is_array($validated['courses'])) {
            $subject->courses()->sync($validated['courses']); // Sincronizar los cursos
        }
        return redirect(route('subjects.index'));
    }

    public function show(Subject $subject)
    {
        return view('subjects.show', compact('subject'));
    }

    public function edit(Subject $subject)
    {
        return view('subjects.edit', compact('subject'));
    }

    public function update(Request $request, Subject $subject)
    {
        $request->validate(['name' => 'required|string|max:255']);
        $subject->update($request->all());
        return redirect(route('subjects.show', $subject));
    }

    public function destroy(Subject $subject)
    {
        $teacherSubjects = $subject->teacherSubject;

        foreach ($teacherSubjects as $teacherSubject) {
            $exams = $teacherSubject->exams;

            foreach ($exams as $exam) {
                $exam->delete();
            }
        }

        $subject->delete();

        return redirect(route('subjects.index'));
    }
}
