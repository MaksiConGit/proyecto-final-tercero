<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('users', UserController::class)->names('users');

require __DIR__ . '/auth.php';

Route::get('/bocetos/asistencias', function () {
    return view('bocetos.asistencias');
});

Route::get('/bocetos/profesores_index', function () {
    return view('bocetos.profesores_index');
});

Route::get('/bocetos/alumnos', function () {
    return view('bocetos.alumnos');
});

Route::get('/bocetos/material', function () {
    return view('bocetos.material');
});


Route::get('/bocetos/horarios', function () {
    return view('bocetos.horarios');
});

Route::get('/bocetos/materias', function () {
    return view('bocetos.materias');
});

Route::resource('subjects', SubjectController::class)
    ->names('subjects');

Route::resource('careers', CareerController::class)->names('careers');

Route::resource('teachers', TeacherController::class)->names('teachers');

Route::resource('courses', CourseController::class)->names('courses');

Route::resource('exams', ExamController::class)->names('exams');

Route::get('/redirect/{user}', function (App\Models\User $user) {
    $accountable = $user->accountable;

    if ($accountable instanceof App\Models\Principal) {
        return redirect()->route('principals.show', $user->accountable_id);
    } elseif ($accountable instanceof App\Models\Student) {
        return redirect()->route('students.show', $user->accountable_id);
    } elseif ($accountable instanceof App\Models\Teacher) {
        return redirect()->route('teachers.show', $user->accountable_id);
    }

    abort(404, 'Tipo de cuenta no reconocido.');
})->name('accountable.redirect');
