<?php

use App\Http\Controllers\Pkl\AdministratorPkl\InformasiAdministratorController;
use App\Http\Controllers\Pkl\AdministratorPkl\PembimbingPrakerinController;
use App\Http\Controllers\Pkl\AdministratorPkl\PenempatanPrakerinController;
use App\Http\Controllers\Pkl\AdministratorPkl\PerusahaanController;
use App\Http\Controllers\Pkl\AdministratorPkl\PesertaPrakerinController;
use App\Http\Controllers\Pkl\KaprodiPkl\ModulAjarController;
use App\Http\Controllers\Pkl\KaprodiPkl\PelaporanPrakerinController;
use App\Http\Controllers\Pkl\KaprodiPkl\PenilaianKaprodiPKLController;
use App\Http\Controllers\Pkl\PembimbingPkl\AbsensiPembimbingPklController;
use App\Http\Controllers\Pkl\PembimbingPkl\InformasiPembimbingController;
use App\Http\Controllers\Pkl\PembimbingPkl\MonitoringPrakerinController;
use App\Http\Controllers\Pkl\PembimbingPkl\PenilaianBimbinganController;
use App\Http\Controllers\Pkl\PembimbingPkl\PesanPrakerinController;
use App\Http\Controllers\Pkl\PembimbingPkl\PesertaBimbinganController;
use App\Http\Controllers\Pkl\PembimbingPkl\ValidasiJurnalController;
use App\Http\Controllers\Pkl\PesertaDidikPkl\AbsensiSiswaPklController;
use App\Http\Controllers\Pkl\PesertaDidikPkl\JurnalPklController;
use App\Http\Controllers\Pkl\PesertaDidikPkl\MonitoringSiswaController;
use App\Http\Controllers\Pkl\PesertaDidikPkl\PesanPrakerinSiswaController;
use App\Http\Controllers\Pkl\PesertaDidikPkl\SiswaInformasiController;
use App\Models\Pkl\PembimbingPkl\PesanPrakerin;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\Prakerin\Kaprog\PrakerinPenempatanController;
use App\Http\Controllers\Prakerin\Panitia\PrakerinAdministrasiController;
use App\Http\Controllers\Prakerin\Panitia\PrakerinAdminNegoController;
use App\Http\Controllers\Prakerin\Panitia\PrakerinIdentitasController;
use App\Http\Controllers\Prakerin\Panitia\PrakerinInformasiPanitiaController;
use App\Http\Controllers\Prakerin\Panitia\PrakerinLaporanPanitiaController;
use App\Http\Controllers\Prakerin\Panitia\PrakerinNegosiatorController;
use App\Http\Controllers\Prakerin\Panitia\PrakerinPerusahaanController;
use App\Http\Controllers\Prakerin\Panitia\PrakerinPesertaController;
use Illuminate\Http\Request;
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
    Route::group(['prefix' => 'panitiaprakerin', 'as' => 'panitiaprakerin.'], function () {
        Route::resource('perusahaan', PrakerinPerusahaanController::class);
        Route::resource('peserta', PrakerinPesertaController::class);
        Route::post('/simpanpesertaprakerin', [PrakerinPesertaController::class, 'simpanPesertaPrakerin'])->name('simpanPesertaPrakerin');
        Route::get('/daftar-siswa', [PrakerinPesertaController::class, 'getDaftarSiswa'])->name('daftarSiswa');

        //Route::resource('administrasi', PrakerinAdministrasiController::class);

        Route::get('administrasi', [PrakerinAdministrasiController::class, 'index'])->name('administrasi.index');
        Route::prefix('administrasi')->as('administrasi.')->group(function () {
            Route::resource('identitas-prakerin', PrakerinIdentitasController::class);
            Route::resource('negosiator', PrakerinNegosiatorController::class);
            Route::resource('admin-nego', PrakerinAdminNegoController::class);
        });

        Route::resource('informasi', PrakerinInformasiPanitiaController::class);
        Route::get('/get-siswa-perusahaan/{id}', [PrakerinInformasiPanitiaController::class, 'getSiswaByPerusahaan']);
        Route::get('/getperusahaan/{id}', [PrakerinInformasiPanitiaController::class, 'getPerusahaan']);

        Route::resource('laporan', PrakerinLaporanPanitiaController::class);
    });
});

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'kaprogprakerin', 'as' => 'kaprogprakerin.'], function () {
        Route::resource('penempatan', PrakerinPenempatanController::class);
    });
});


/*
|--------------------------------------------------------------------------
| ROUTE YANG LAMA
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'administratorpkl', 'as' => 'administratorpkl.'], function () {
        Route::resource('perusahaan', PerusahaanController::class);
        Route::resource('peserta-prakerin', PesertaPrakerinController::class);
        Route::post('/simpanpesertaprakerin', [PesertaPrakerinController::class, 'simpanPesertaPrakerin'])->name('simpanPesertaPrakerin');
        Route::resource('penempatan-prakerin', PenempatanPrakerinController::class);
        Route::resource('pembimbing-prakerin', PembimbingPrakerinController::class);
        Route::get('/downloadpembprakerin', [PembimbingPrakerinController::class, 'downloadPDF'])->name('downloadpembprakerin');
        Route::resource('informasi-prakerin', InformasiAdministratorController::class);
        Route::get('/informasi-prakerin/absensi', [InformasiAdministratorController::class, 'index'])->name('informasi-prakerin.absensi');
        Route::resource('laporan-prakerin', PelaporanPrakerinController::class);
    });
});
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'kaprodipkl', 'as' => 'kaprodipkl.'], function () {
        Route::resource('pembimbing-prakerin', PembimbingPrakerinController::class);
        Route::resource('peserta-prakerin', PesertaPrakerinController::class);
        Route::resource('penempatan-prakerin', PenempatanPrakerinController::class);
        Route::resource('modul-ajar', ModulAjarController::class);
        Route::resource('informasi-prakerin', InformasiAdministratorController::class);
        Route::resource('pelaporan-prakerin', PelaporanPrakerinController::class);
        //Route::get('download-sertifikat-pkl', [PDFController::class, 'downloadSertifPKL'])->name('download.sertifpkl');
        Route::get('/download-sertifikat-pkl/{nis}', [PDFController::class, 'downloadSertifPKL'])->name('download.sertifpkl');
        Route::resource('penilaian-prakerin', PenilaianKaprodiPKLController::class);
        Route::put('/generate/{id}', [PenilaianKaprodiPKLController::class, 'generateUlang'])->name('generate');
        Route::get('/download-jurnal-pdf', [PelaporanPrakerinController::class, 'downloadJurnalPdf'])->name('downloadjurnalpdf');
        Route::get('/download-absensi-pdf', [PelaporanPrakerinController::class, 'downloadAbsensiPdf'])->name('downloadabsensipdf');
        Route::post('/update-tanggal-kirim', [PelaporanPrakerinController::class, 'updateTanggalKirim'])->name('updatetanggalkirim');
    });
});
Route::middleware('auth')->group(function () {
    Route::group(['prefix' => 'pembimbingpkl', 'as' => 'pembimbingpkl.'], function () {
        Route::resource('informasi-prakerin', InformasiPembimbingController::class);
        Route::get('/chart-data', [InformasiPembimbingController::class, 'getChartData']);

        Route::resource('peserta-prakerin', PesertaBimbinganController::class);
        Route::resource('validasi-jurnal', ValidasiJurnalController::class);
        Route::post('/validasi-jurnal/tambahkomentar/{id}', [ValidasiJurnalController::class, 'tambahKomentar'])->name('validasi-jurnal.tambahkomentar');
        Route::put('/updateValidasi/{id}', [ValidasiJurnalController::class, 'validasiJurnal'])->name('updateValidasi');
        Route::put('/updateValidasiTolak/{id}', [ValidasiJurnalController::class, 'validasiJurnalTolak'])->name('updateValidasiTolak');
        Route::resource('absensi-bimbingan', AbsensiPembimbingPklController::class);
        // web.php
        Route::post('/absensi-bimbingan/simpanabsensi', [AbsensiPembimbingPklController::class, 'simpanAbsensi'])->name('absensi-bimbingan.simpanabsensi');
        Route::delete('/absensi-bimbingan/deleteabsensi/{id}', [AbsensiPembimbingPklController::class, 'destroy'])->name('absensi-bimbingan.deleteabsensi');
        Route::put('/absensi-bimbingan/updateabsensi/{absensi}', [AbsensiPembimbingPklController::class, 'updateAbsensi'])->name('absensi-bimbingan.updateabsensi');

        Route::resource('penilaian-bimbingan', PenilaianBimbinganController::class);
        Route::post('/generate-nilai-prakerin', [PenilaianBimbinganController::class, 'generateNilaiPrakerin'])
            ->name('generate.nilai.prakerin');
        Route::post('/update-cp4', [PenilaianBimbinganController::class, 'updateCp4'])
            ->name('update.cp4');

        Route::resource('monitoring-prakerin', MonitoringPrakerinController::class);
        Route::resource('pesan-prakerin', PesanPrakerinController::class);
        Route::post('/update-read-status', function (Request $request) {
            $pesan = PesanPrakerin::find($request->id);

            if ($pesan) {
                $pesan->read_status = 'SUDAH';
                $pesan->save();

                return response()->json(['message' => 'Pesan sudah di baca!']);
            }

            return response()->json(['message' => 'Pesan tidak ditemukan.'], 404);
        });
    });
});
Route::middleware('auth', 'roleonly:pesertapkl')->group(function () {
    Route::group(['prefix' => 'pesertapkl', 'as' => 'pesertapkl.'], function () {
        Route::resource('siswa-informasi', SiswaInformasiController::class);
        Route::resource('jurnal-siswa', JurnalPklController::class);
        Route::get('/get-tp/{kode_cp}/{kode_kk}', [JurnalPklController::class, 'getTp'])->name('get.tp');
        Route::resource('absensi-siswa', AbsensiSiswaPklController::class);
        Route::post('/absensi-siswa/simpanhadir', [AbsensiSiswaPklController::class, 'simpanHadir'])->name('absensi-siswa.simpanhadir');
        Route::post('/absensi-siswa/simpansakit', [AbsensiSiswaPklController::class, 'simpanSakit'])->name('absensi-siswa.simpansakit');
        Route::post('/absensi-siswa/simpanizin', [AbsensiSiswaPklController::class, 'simpanIzin'])->name('absensi-siswa.simpanizin');
        Route::post('/absensi-siswa/check-absensi-status', [AbsensiSiswaPklController::class, 'checkAbsensiStatus'])->name('absensi-siswa.check-absensi-status');
        Route::resource('monitoring-siswa', MonitoringSiswaController::class);
        Route::resource('pesan-prakerin', PesanPrakerinSiswaController::class);
        Route::post('/update-read-status', function (Request $request) {
            $pesan = PesanPrakerin::find($request->id);

            if ($pesan) {
                $pesan->read_status = 'SUDAH';
                $pesan->save();

                return response()->json(['message' => 'Pesan sudah di baca!']);
            }

            return response()->json(['message' => 'Pesan tidak ditemukan.'], 404);
        });
    });
});
