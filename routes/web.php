<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudyProgramController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;

Route::get('/', function () {
    return view('pages.home');
});

// Resource routes
Route::resource('study-programs', StudyProgramController::class);
Route::resource('students', StudentController::class);
Route::resource('subjects', SubjectController::class);
