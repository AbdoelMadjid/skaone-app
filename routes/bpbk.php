<?php

use App\Http\Controllers\ManajemenSekolah\BpBk\AnggaranController;
use App\Http\Controllers\ManajemenSekolah\BpBk\DataKipController;
use App\Http\Controllers\ManajemenSekolah\BpBk\HomeVisitController;
use App\Http\Controllers\ManajemenSekolah\BpBk\KonselingController;
use App\Http\Controllers\ManajemenSekolah\BpBk\MelanjutkanKuliahController;
use App\Http\Controllers\ManajemenSekolah\BpBk\PenelusuranLulusanController;
use App\Http\Controllers\ManajemenSekolah\BpBk\SiswaBermasalahController;
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
    Route::group(['prefix' => 'bpbk', 'as' => 'bpbk.'], function () {

        Route::get('konseling', [KonselingController::class, 'index'])->name('konseling.index');
        Route::prefix('konseling')->as('konseling.')->group(function () {
            Route::resource('siswa-bermasalah', SiswaBermasalahController::class);
            Route::get('/get-rombel', [SiswaBermasalahController::class, 'getRombelByNis'])->name('getRombelByNis');
            Route::get('/get-siswa-by-tahun', [SiswaBermasalahController::class, 'getPesertaDidikByTahun'])
                ->name('getSiswaByTahun');
        });
        Route::resource('data-kip', DataKipController::class);
        Route::resource('home-visit', HomeVisitController::class);
        Route::resource('melanjutkan-kuliah', MelanjutkanKuliahController::class);
        Route::resource('penelusuran-lulusan', PenelusuranLulusanController::class);
        Route::resource('anggaran-bpbk', AnggaranController::class);
    });
});
