<?php

use App\Http\Controllers\ManajemenSekolah\BidangKeahlianController;
use App\Http\Controllers\ManajemenSekolah\GuruWaliController;
use App\Http\Controllers\ManajemenSekolah\IdentitasSekolahController;
use App\Http\Controllers\ManajemenSekolah\JabatanLainController;
use App\Http\Controllers\ManajemenSekolah\KepalaSekolahController;
use App\Http\Controllers\ManajemenSekolah\KetuaProgramStudiController;
use App\Http\Controllers\ManajemenSekolah\KompetensiKeahlianController;
use App\Http\Controllers\ManajemenSekolah\PersonilSekolahController;
use App\Http\Controllers\ManajemenSekolah\PesertaDidikController;
use App\Http\Controllers\ManajemenSekolah\PesertaDidikOrtuController;
use App\Http\Controllers\ManajemenSekolah\ProgramKeahlianController;
use App\Http\Controllers\ManajemenSekolah\RombonganBelajarController;
use App\Http\Controllers\ManajemenSekolah\TahunAjaranController;
use App\Http\Controllers\ManajemenSekolah\WakilKepalaSekolahController;
use App\Http\Controllers\ManajemenSekolah\WaliKelasController;
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
    Route::group(['prefix' => 'manajemensekolah', 'as' => 'manajemensekolah.'], function () {
        Route::resource('tahun-ajaran', TahunAjaranController::class);
        Route::resource('identitas-sekolah', IdentitasSekolahController::class);
        Route::resource('personil-sekolah', PersonilSekolahController::class);
        Route::post('/generate-akun', [PersonilSekolahController::class, 'generateAkun'])->name('generate-akun');
        Route::resource('rombongan-belajar', RombonganBelajarController::class);
        Route::resource('wali-kelas', WaliKelasController::class);
        Route::resource('peserta-didik', PesertaDidikController::class);
        Route::resource('peserta-didik-ortu', PesertaDidikOrtuController::class);
        Route::get('get-rombels', [PesertaDidikController::class, 'getRombel'])->name('get-rombels');
        Route::post('simpandistribusi', [PesertaDidikController::class, 'simpandistribusi'])->name('simpandistribusi');
        Route::post('uploadpesertadidik', [PesertaDidikController::class, 'uploadPesertaDidik'])->name('uploadpesertadidik');

        Route::group(['prefix' => 'datakeahlian', 'as' => 'datakeahlian.'], function () {
            Route::resource('bidang-keahlian', BidangKeahlianController::class);
            Route::resource('program-keahlian', ProgramKeahlianController::class);
            Route::resource('kompetensi-keahlian', KompetensiKeahlianController::class);
        });

        Route::group(['prefix' => 'timmanajemen', 'as' => 'timmanajemen.'], function () {
            Route::resource('kepala-sekolah', KepalaSekolahController::class);
            Route::resource('wakil-kepala-sekolah', WakilKepalaSekolahController::class);
            Route::resource('ketua-program-studi', KetuaProgramStudiController::class);
            Route::resource('jabatan-lain', JabatanLainController::class);
        });

        Route::resource('data-guru-wali', GuruWaliController::class);
    });
});
