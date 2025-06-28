<?php

use App\Http\Controllers\Alumni\InformasiAlumniController;
use App\Http\Controllers\Alumni\KelulusanAlumniController;
use App\Http\Controllers\Alumni\RiwayatKerjaController;
use App\Http\Controllers\Alumni\TranskripAlumniController;
use App\Http\Controllers\BpBk\AnggaranController;
use App\Http\Controllers\BpBk\DataKipController;
use App\Http\Controllers\BpBk\HomeVisitController;
use App\Http\Controllers\BpBk\KonselingController;
use App\Http\Controllers\BpBk\MelanjutkanKuliahController;
use App\Http\Controllers\BpBk\PenelusuranLulusanController;
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
    Route::group(['prefix' => 'ruangalumni', 'as' => 'ruangalumni.'], function () {
        Route::resource('riwayat-kerja', RiwayatKerjaController::class);
        Route::resource('informasi-alumni', InformasiAlumniController::class);
    });
    Route::group(['prefix' => 'arsipalumni', 'as' => 'arsipalumni.'], function () {
        Route::resource('transkrip-alumni', TranskripAlumniController::class);
        Route::resource('kelulusan-alumni', KelulusanAlumniController::class);
    });
});
