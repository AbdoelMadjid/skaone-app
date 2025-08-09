<?php

use App\Http\Controllers\PDFController;
use App\Http\Controllers\PesertaDidik\KelulusanPesertaDidikController;
use App\Http\Controllers\PesertaDidik\RaportPesertaDidikController;
use App\Http\Controllers\PesertaDidik\RemedialPesertaDidikController;
use App\Http\Controllers\PesertaDidik\TestFormatifController;
use App\Http\Controllers\PesertaDidik\TestSumatifController;
use App\Http\Controllers\PesertaDidik\TranskripPesertaDidikController;
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

Route::middleware('auth', 'roleonly:siswa')->group(function () {
    Route::group(['prefix' => 'pesertadidik', 'as' => 'pesertadidik.'], function () {
        Route::resource('test-formatif', TestFormatifController::class);
        Route::resource('test-sumatif', TestSumatifController::class);
        Route::resource('transkrip-peserta-didik', TranskripPesertaDidikController::class);
        Route::resource('raport-peserta-didik', RaportPesertaDidikController::class);
        Route::resource('remedial-peserta-didik', RemedialPesertaDidikController::class);
        Route::resource('kelulusan-peserta-didik', KelulusanPesertaDidikController::class);
        Route::get('download-transkrip-skl', [PDFController::class, 'downloadSKL'])->name('download.skl');
        Route::get('download-transkrip-skkb', [PDFController::class, 'downloadSKKB'])->name('download.skkb');
    });
});
