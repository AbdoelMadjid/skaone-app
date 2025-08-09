<?php

use App\Http\Controllers\ManajemenSekolah\Wakasek\AgendaKegiatanController;
use App\Http\Controllers\ManajemenSekolah\Wakasek\AnggaranController;
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

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'wakilkepalasekolah', 'as' => 'wakilkepalasekolah.'], function () {
        Route::resource('agenda-kegiatan-wakasek', AgendaKegiatanController::class);
        Route::resource('anggaran-wakasek', AnggaranController::class);
    });
});
