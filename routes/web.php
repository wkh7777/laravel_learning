<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

// Initial view
Route::get('/', function () {
    return view('welcome');
});

// Stulent list load
Route::get('students', [StudentController::class, 'index']);

// Load student create form
Route::get('students/create', [StudentController::class, 'create']);
// Save student record send from create form
Route::post('students/create', [StudentController::class, 'save']);

// Load student edit form
Route::get('students/edit/{id}', [StudentController::class, 'edit']);
// Save student record sent form edit form
Route::post('students/edit/{id}', [StudentController::class, 'update']);
