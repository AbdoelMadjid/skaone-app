<?php

use App\Http\Controllers\WaliKelas\AbsensiSiswaWalasController;
use App\Http\Controllers\WaliKelas\ArsipWalasController;
use App\Http\Controllers\WaliKelas\CatatanWalikelasController;
use App\Http\Controllers\WaliKelas\CekRemedialSiswaController;
use App\Http\Controllers\WaliKelas\DataKelasController;
use App\Http\Controllers\WaliKelas\EkstrakurikulerController;
use App\Http\Controllers\WaliKelas\IdentitasSiswaController;
use App\Http\Controllers\WaliKelas\PrestasiSiswaController;
use App\Http\Controllers\WaliKelas\RaporPesertaDidikController;
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

Route::middleware('auth', 'roleonly:walas')->group(function () {
    Route::group(['prefix' => 'walikelas', 'as' => 'walikelas.'], function () {

        // data kelas
        Route::resource('data-kelas', DataKelasController::class);
        Route::post('/data-kelas/simpantitimangsa', [DataKelasController::class, 'simpantitimangsa'])
            ->name('data-kelas.simpantitimangsa');
        Route::get('/downloadpdfdatasiswa', [DataKelasController::class, 'downloadPDF'])->name('downloadpdfdatasiswa');
        Route::get('/downloadrankingsiswa', [DataKelasController::class, 'downloadPDFRanking'])->name('downloadrankingsiswa');

        // identitas siswa
        Route::resource('identitas-siswa', IdentitasSiswaController::class);
        // absensi siswa
        Route::resource('absensi-siswa', AbsensiSiswaWalasController::class);
        Route::post('/absensi-siswa/generateabsensi', [AbsensiSiswaWalasController::class, 'generateAbsensi'])->name('absensi-siswa.generateabsensi');
        Route::post('/absensi-siswa/update-absensi', [AbsensiSiswaWalasController::class, 'updateAbsensi']);
        // ekstrakurikuler
        Route::resource('ekstrakulikuler', EkstrakurikulerController::class);
        Route::post('/ekstrakulikuler/generateeskul', [EkstrakurikulerController::class, 'generateEskul'])->name('ekstrakulikuler.generateeskul');
        Route::post('/ekstrakulikuler/{id}/save-eskul-wajib', [EkstrakurikulerController::class, 'saveEskulWajib'])->name('ekstrakulikuler.save-eskul-wajib');
        Route::post('/ekstrakulikuler/{id}/save-eskul-pilihan1', [EkstrakurikulerController::class, 'saveEskulPilihan1'])->name('ekstrakulikuler.save-eskul-pilihan1');
        Route::post('/ekstrakulikuler/{id}/save-eskul-pilihan2', [EkstrakurikulerController::class, 'saveEskulPilihan2'])->name('ekstrakulikuler.save-eskul-pilihan2');
        Route::post('/ekstrakulikuler/{id}/save-eskul-pilihan3', [EkstrakurikulerController::class, 'saveEskulPilihan3'])->name('ekstrakulikuler.save-eskul-pilihan3');
        Route::post('/ekstrakulikuler/{id}/save-eskul-pilihan4', [EkstrakurikulerController::class, 'saveEskulPilihan4'])->name('ekstrakulikuler.save-eskul-pilihan4');
        //Route::post('/ekstrakulikuler/save-penilaian-eskul', [WaliKelasController::class, 'savePenilaianEskul']);

        // prestasi siswa
        Route::resource('prestasi-siswa', PrestasiSiswaController::class);
        // rapor peserta didik
        Route::resource('rapor-peserta-didik', RaporPesertaDidikController::class);
        Route::get('/raporsiswa/{nis}', [RaporPesertaDidikController::class, 'tampilRaporSiswa'])->name('raporsiswa');
        Route::post('/rapor-peserta-didik/generatekenaikan', [RaporPesertaDidikController::class, 'generateKenaikan'])->name('rapor-peserta-didik.generatekenaikan');
        //Route::post('/update-kenaikan', [RaporPesertaDidikController::class, 'updateKenaikan']);
        Route::post('/update-kenaikan', [RaporPesertaDidikController::class, 'updateKenaikan'])->name('update.kenaikan');

        // catatan wali kelas
        Route::resource('catatan-wali-kelas', CatatanWalikelasController::class);
        Route::post('/catatan-wali-kelas/generatecatatanwalikelas', [CatatanWalikelasController::class, 'generatecatatanwalikelas'])->name('catatan-wali-kelas.generatecatatanwalikelas');
        Route::post('/catatan-wali-kelas/update-catatan', [CatatanWalikelasController::class, 'updateCatatan']);
        // cek remedial peserta didik
        Route::resource('cek-remedial-siswa', CekRemedialSiswaController::class);
        // arsip walas
        Route::resource('arsip-walas', ArsipWalasController::class);
    });
});
