<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('subjects', SubjectController::class);