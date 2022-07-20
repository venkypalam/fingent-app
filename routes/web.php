<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['register' => false]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/student', [App\Http\Controllers\StudentController::class, 'create'])->name('student');
Route::post('/student', [App\Http\Controllers\StudentController::class, 'store'])->name('student');
Route::post('/student/edit/{id}', [App\Http\Controllers\StudentController::class, 'editCreate'])->name('studentEditCreate');
Route::post('/student/edit/', [App\Http\Controllers\StudentController::class, 'editSubmit'])->name('studentEdit');
Route::get('/student/delete/{id}', [App\Http\Controllers\StudentController::class, 'delete']);

Route::get('/mark', [App\Http\Controllers\MarkController::class, 'create'])->name('mark');
Route::post('/mark', [App\Http\Controllers\MarkController::class, 'store'])->name('mark');
Route::post('/mark/edit/{id}', [App\Http\Controllers\MarkController::class, 'editCreate'])->name('markEditCreate');
Route::post('/mark/edit/', [App\Http\Controllers\MarkController::class, 'editSubmit'])->name('markEdit');
Route::get('/mark/delete/{id}', [App\Http\Controllers\MarkController::class, 'delete']);
