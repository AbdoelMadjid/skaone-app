<?php

use App\Http\Controllers\Alumni\InformasiAlumniController;
use App\Http\Controllers\Alumni\KelulusanAlumniController;
use App\Http\Controllers\Alumni\RiwayatKerjaController;
use App\Http\Controllers\Alumni\TranskripAlumniController;
use App\Http\Controllers\PDFController;
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

Route::middleware('auth', 'roleonly:alumni')->group(function () {
    Route::group(['prefix' => 'alumni', 'as' => 'alumni.'], function () {
        Route::resource('riwayat-kerja', RiwayatKerjaController::class);
        Route::resource('informasi-alumni', InformasiAlumniController::class);
        Route::resource('arsip-transkrip', TranskripAlumniController::class);
        Route::resource('arsip-kelulusan', KelulusanAlumniController::class);
        Route::get('download-transkrip-skl', [PDFController::class, 'downloadSKL'])->name('download.skl');
        Route::get('download-transkrip-skkb', [PDFController::class, 'downloadSKKB'])->name('download.skkb');
    });
});
