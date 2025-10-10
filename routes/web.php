<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    // return view('welcome');
    echo "Hello, World! Landing Pageeeeeeeeeeeeeeeeeeeeeeeeeee";
});

// Route::get('/page1', function () {
//     $name = "Jeric Dela Cruz";
//     $section = "BSIT 4-2";
//     return view('page1', compact('name', 'section'));
// });

// Route::get('/page2', function () {
//     $word = "Hello Kitty";
//     $word1 = "Hello World";
//     return view('page2', compact('word', 'word1'));
// });

Route::get('/page1', [PageController::class, 'display_page1']);
Route::get('/page2', [PageController::class, 'display_page2']);


// Route::resource('student', UserController::class);
// Route::resource('faculty', UserController::class);


// STUDENT ROUTES
Route::get('/students', [UserController::class, 'student_index'])->name('student.index');
Route::get('/students/create', [UserController::class, 'student_create'])->name('student.create');
Route::post('/students', [UserController::class, 'student_store'])->name('student.store');
Route::delete('/students/{id}', [UserController::class, 'student_destroy'])->name('student.destroy');
Route::get('/students/{id}/edit', [UserController::class, 'student_edit'])->name('student.edit');
Route::put('/students/{id}', [UserController::class, 'student_update'])->name('student.update');

// FACULTY ROUTES
Route::get('/faculty', [UserController::class, 'faculty_index'])->name('faculty.index');
Route::get('/faculty/create', [UserController::class, 'faculty_create'])->name('faculty.create');
Route::post('/faculty', [UserController::class, 'faculty_store'])->name('faculty.store');
Route::delete('/faculty/{id}', [UserController::class, 'faculty_destroy'])->name('faculty.destroy');
Route::get('/faculty/{id}/edit', [UserController::class, 'faculty_edit'])->name('faculty.edit');
Route::put('/faculty/{id}', [UserController::class, 'faculty_update'])->name('faculty.update');
