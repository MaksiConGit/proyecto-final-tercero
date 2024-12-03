<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class GradeController extends Controller implements HasMiddleware
{
    /**
     * Get the middleware that should be assigned to the controller.
     */
    public static function middleware(): array
    {
        return [
            'auth',
            // Middleware para permisos específicos
            new Middleware('can:grades.create', only: ['create', 'store']),
            new Middleware('can:grades.edit', only: ['edit', 'update']),
            new Middleware('can:grades.delete', only: ['destroy']),
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('grades.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Valida los datos
        $validatedData = $request->validate([
            'exam' => 'required|exists:exams,id',
            'grades' => 'required|array',
            'grades.*.student_id' => 'required|exists:students,id',
            'grades.*.grade' => 'required|numeric|min:0|max:10',
        ]);

        // Iterar sobre los datos de las notas y guardar en la base de datos
        foreach ($validatedData['grades'] as $gradeData) {
            Grade::create([
                'exam_id' => $validatedData['exam'], // ID del examen
                'student_id' => $gradeData['student_id'], // ID del estudiante
                'grade' => $gradeData['grade'], // Nota
            ]);
        }

        return redirect(route('grades.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        //
    }
}
