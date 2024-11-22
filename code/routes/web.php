<?php

use App\Http\Controllers\CareerController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
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

Route::resource('subjects', SubjectController::class)->names('subjects');

Route::resource('careers', CareerController::class)->names('careers');

Route::resource('courses', CourseController::class)->names('courses');

Route::resource('principals', PrincipalController::class)->names('principals');

Route::resource('teachers', TeacherController::class)->names('teachers');

Route::resource('students', StudentController::class)->names('students');
Route::get('/students/{student}/courses/{course}', [StudentController::class, 'courseDetail'])->name('students.courseDetail');
Route::get('/students/{student}/courses/{course}/exams/{exam}', [StudentController::class, 'examDetail'])->name('students.examDetail');

