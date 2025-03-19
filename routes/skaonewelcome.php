<?php

use App\Http\Controllers\SkaOneWelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//main menu
Route::group(['prefix' => 'skaone', 'as' => 'skaone.'], function () {
    Route::get('/artikel_guru_hebat', [SkaOneWelcomeController::class, 'artikel_guru_hebat'])->name('artikel_guru_hebat');
    Route::get('/program', [SkaOneWelcomeController::class, 'program'])->name('program');
    Route::get('/future_students', [SkaOneWelcomeController::class, 'future_students'])->name('future_students');
    Route::get('/current_students', [SkaOneWelcomeController::class, 'current_students'])->name('current_students');
    Route::get('/faculty_and_staff', [SkaOneWelcomeController::class, 'faculty_and_staff'])->name('faculty_and_staff');
    Route::get('/events', [SkaOneWelcomeController::class, 'events'])->name('events');
    Route::get('/alumni', [SkaOneWelcomeController::class, 'alumni'])->name('alumni');
    Route::get('/visimisi', [SkaOneWelcomeController::class, 'visimisi'])->name('visimisi');
    Route::get('/struktur_organisasi', [SkaOneWelcomeController::class, 'struktur_organisasi'])->name('struktur_organisasi');
    Route::get('/ppdb', [SkaOneWelcomeController::class, 'ppdb'])->name('ppdb');
});
