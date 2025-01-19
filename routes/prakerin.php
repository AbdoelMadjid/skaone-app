<?php

use App\Http\Controllers\AdministratorPkl\InformasiAdministratorController;
use App\Http\Controllers\AdministratorPkl\PembimbingPrakerinController;
use App\Http\Controllers\AdministratorPkl\PenempatanPrakerinController;
use App\Http\Controllers\AdministratorPkl\PerusahaanController;
use App\Http\Controllers\AdministratorPkl\PesertaPrakerinController;
use App\Http\Controllers\KaprodiPkl\ModulAjarController;
use App\Http\Controllers\KaprodiPkl\PelaporanPrakerinController;
use App\Http\Controllers\PembimbingPkl\AbsensiPembimbingPklController;
use App\Http\Controllers\PembimbingPkl\InformasiPembimbingController;
use App\Http\Controllers\PembimbingPkl\MonitoringPrakerinController;
use App\Http\Controllers\PembimbingPkl\PenilaianBimbinganController;
use App\Http\Controllers\PembimbingPkl\PesanPrakerinController;
use App\Http\Controllers\PembimbingPkl\PesertaBimbinganController;
use App\Http\Controllers\PembimbingPkl\ValidasiJurnalController;
use App\Http\Controllers\PesertaDidikPkl\AbsensiSiswaPklController;
use App\Http\Controllers\PesertaDidikPkl\JurnalPklController;
use App\Http\Controllers\PesertaDidikPkl\MonitoringSiswaController;
use App\Http\Controllers\PesertaDidikPkl\PesanPrakerinSiswaController;
use App\Http\Controllers\PesertaDidikPkl\SiswaInformasiController;
use App\Models\PembimbingPkl\PesanPrakerin;
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

    Route::group(['prefix' => 'kaprodipkl', 'as' => 'kaprodipkl.'], function () {
        Route::resource('pembimbing-prakerin', PembimbingPrakerinController::class);
        Route::resource('peserta-prakerin', PesertaPrakerinController::class);
        Route::resource('penempatan-prakerin', PenempatanPrakerinController::class);
        Route::resource('modul-ajar', ModulAjarController::class);
        Route::resource('informasi-prakerin', InformasiAdministratorController::class);
        Route::resource('pelaporan-prakerin', PelaporanPrakerinController::class);
        Route::get('/download-jurnal-pdf', [PelaporanPrakerinController::class, 'downloadJurnalPdf'])->name('downloadjurnalpdf');
        Route::get('/download-absensi-pdf', [PelaporanPrakerinController::class, 'downloadAbsensiPdf'])->name('downloadabsensipdf');
        Route::post('/update-tanggal-kirim', [PelaporanPrakerinController::class, 'updateTanggalKirim'])->name('updatetanggalkirim');
    });

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

    Route::group(['prefix' => 'pesertadidikpkl', 'as' => 'pesertadidikpkl.'], function () {
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
