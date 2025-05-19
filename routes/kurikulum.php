<?php

use App\Http\Controllers\Kurikulum\DataKBM\CapaianPembelajaranController;
use App\Http\Controllers\Kurikulum\DataKBM\KbmPerRombelController;
use App\Http\Controllers\Kurikulum\DataKBM\KunciDataKbmController;
use App\Http\Controllers\Kurikulum\DataKBM\MataPelajaranController;
use App\Http\Controllers\Kurikulum\DataKBM\MataPelajaranPerJurusanController;
use App\Http\Controllers\Kurikulum\DataKBM\PesertaDidikRombelController;
use App\Http\Controllers\Kurikulum\DokumenGuru\AbsensiGuruController;
use App\Http\Controllers\Kurikulum\DokumenGuru\ArsipGuruController;
use App\Http\Controllers\Kurikulum\DokumenGuru\PerGuruController;
use App\Http\Controllers\Kurikulum\DokumenGuru\PerRombelController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\CetakRaporController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\IjazahController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\LegerNilaiController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\RaporPklController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\RaporPLimaController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\RemedialPesertaDidikNilaiController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\TranskripNilaiController;
use App\Http\Controllers\Kurikulum\PerangkatKurikulum\PengumumanController;
use App\Http\Controllers\Kurikulum\PerangkatKurikulum\VersiKurikulumController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\AdministrasiUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\IdentitasUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\PelaksanaanUjianController;
use App\Http\Controllers\ManajemenSekolah\PesertaDidikController;
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
    Route::group(['prefix' => 'kurikulum', 'as' => 'kurikulum.'], function () {
        Route::group(['prefix' => 'datakbm', 'as' => 'datakbm.'], function () {
            Route::resource('peserta-didik-rombel', PesertaDidikRombelController::class);
            Route::get('/get-rombongan-belajar', [PesertaDidikRombelController::class, 'getRombonganBelajar'])->name('get-rombonganbelajar');
            Route::get('get-siswa', [PesertaDidikController::class, 'getSiswa'])->name('get-siswa');
            // web.php (Route file)
            Route::get('/get-rombel', [PesertaDidikRombelController::class, 'getRombel'])->name('getRombel');
            Route::get('get-peserta-didik/{kode_kk}', [PesertaDidikRombelController::class, 'getPesertaDidik']);
            //Route::get('/generateakun', [PesertaDidikRombelController::class, 'generateakun'])->name('generateakun');
            Route::post('/formgenerateakun', [PesertaDidikRombelController::class, 'formGenerateAkun'])->name('formgenerateakun');
            Route::get('get-rombels', [PesertaDidikRombelController::class, 'getRombels'])->name('get-rombels');
            Route::post('/get-student-data', [PesertaDidikRombelController::class, 'getStudentData'])->name('get-student-data');


            Route::resource('mata-pelajaran', MataPelajaranController::class);
            Route::resource('mata-pelajaran-perjurusan', MataPelajaranPerJurusanController::class);
            Route::post('simpandistribusi', [MataPelajaranPerJurusanController::class, 'simpandistribusi'])->name('simpandistribusi');
            Route::get('/filter-mata-pelajaran', [MataPelajaranPerJurusanController::class, 'filterMataPelajaran'])->name('filterMataPelajaran');

            Route::resource('capaian-pembelajaran', CapaianPembelajaranController::class);
            Route::resource('kbm-per-rombel', KbmPerRombelController::class);
            Route::get('/get-kbm-rombel', [KbmPerRombelController::class, 'getKBMRombel'])->name('get-kbmrombel');
            Route::get('/get-mata-pelajaran', [KbmPerRombelController::class, 'filterMataPelajaran'])->name('get-matapelajaran');
            Route::get('/get-personil-sekolah', [KbmPerRombelController::class, 'getPersonilSekolah'])->name('get-personil-sekolah');
            Route::post('/update-personil', [KbmPerRombelController::class, 'updatePersonil']);
            Route::resource('kunci-data-kbm', KunciDataKbmController::class);
        });

        Route::group(['prefix' => 'perangkatkurikulum', 'as' => 'perangkatkurikulum.'], function () {
            Route::resource('versi-kurikulum', VersiKurikulumController::class);
            Route::resource('pengumuman', PengumumanController::class);
        });

        Route::group(['prefix' => 'dokumenguru', 'as' => 'dokumenguru.'], function () {
            Route::resource('arsip', ArsipGuruController::class);
            Route::get('/get-guru', [ArsipGuruController::class, 'getGuru']);
            Route::get('/get-rombel', [ArsipGuruController::class, 'getRombel']);
        });

        Route::group(['prefix' => 'dokumentsiswa', 'as' => 'dokumentsiswa.'], function () {
            Route::resource('cetak-rapor', CetakRaporController::class);
            Route::get('/cetak-rapor/detail-peserta-didik/{nis}', [CetakRaporController::class, 'getSiswaDetail']);
            Route::get('/get-kode-rombel', [CetakRaporController::class, 'getKodeRombel']);
            Route::get('/get-peserta-didik', [CetakRaporController::class, 'getPesertaDidik']);
            Route::post('/simpanpilihcetakrapor', [CetakRaporController::class, 'simpanPilihCetakRapor'])
                ->name('simpanpilihcetakrapor');

            Route::resource('leger-nilai', LegerNilaiController::class);
            Route::get('/export-pivot-data', [LegerNilaiController::class, 'exportPivotData'])->name('exportpivotData');

            Route::resource('ijazah', IjazahController::class);
            Route::resource('rapor-pkl', RaporPklController::class);
            Route::get('raporpkl/{nis}', [RaporPklController::class, 'showRaporPKL']);
            Route::resource('rapor-p-lima', RaporPLimaController::class);
            Route::resource('transkrip-nilai', TranskripNilaiController::class);
            Route::get('nilaisemester', [TranskripNilaiController::class, 'getBySemester']);
            Route::post('updatenilai', [TranskripNilaiController::class, 'updateNilai']);
            Route::get('transkriprapor/{nis}', [TranskripNilaiController::class, 'getTranskrip']);

            Route::resource('remedial-peserta-didik', RemedialPesertaDidikNilaiController::class);
        });

        Route::group(['prefix' => 'perangkatujian', 'as' => 'perangkatujian.'], function () {
            Route::resource('identitas-ujian', IdentitasUjianController::class);
            Route::resource('administrasi-ujian', AdministrasiUjianController::class);
            Route::resource('pelaksanaan-ujian', PelaksanaanUjianController::class);
        });
    });
});
