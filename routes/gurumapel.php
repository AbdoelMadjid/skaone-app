<?php

use App\Http\Controllers\GuruMapel\AjuanRemedialController;
use App\Http\Controllers\GuruMapel\ArsipKbmGmapelController;
use App\Http\Controllers\GuruMapel\DataCpTerpilihController;
use App\Http\Controllers\GuruMapel\DataKbmController;
use App\Http\Controllers\GuruMapel\DeskripsiNilaiController;
use App\Http\Controllers\GuruMapel\DetailDataKbmController;
use App\Http\Controllers\GuruMapel\FormatifController;
use App\Http\Controllers\GuruMapel\ModulAjarGuruMapelController;
use App\Http\Controllers\GuruMapel\PerangkatAjarController;
use App\Http\Controllers\GuruMapel\SumatifController;
use App\Http\Controllers\GuruMapel\TujuanPembelajaranController;
use App\Http\Controllers\GuruMapel\UjianSumatifController;
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
    Route::group(['prefix' => 'gurumapel', 'as' => 'gurumapel.'], function () {

        Route::group(['prefix' => 'adminguru', 'as' => 'adminguru.'], function () {
            Route::resource('data-kbm', DataKbmController::class);
            Route::get('/fetch-capaian-pembelajaran', [DataKbmController::class, 'fetchData']);

            Route::resource('data-kbm-detail', DetailDataKbmController::class);
            Route::post('/data-kbm-detail/update-kkm', [DetailDataKbmController::class, 'updateKkm']);

            Route::resource('capaian-pembelajaran', DataCpTerpilihController::class);
            Route::get('/getrombeloptions', [DataCpTerpilihController::class, 'getRombel'])->name('getrombeloptions');
            Route::get('/getCapaianPembelajaran', [DataCpTerpilihController::class, 'getCapaianPembelajaran'])->name('getCapaianPembelajaran');
            Route::post('/savecpterpilih', [DataCpTerpilihController::class, 'saveCpTerpilih'])->name('savecpterpilih');
            Route::post('/hapuscppilihan', [DataCpTerpilihController::class, 'hapusCPPilihan'])->name('hapuscppilihan');
            Route::post('/updatejmlmateri', [DataCpTerpilihController::class, 'updateJmlMateri'])->name('updatejmlmateri');
            Route::get('/checkcpterpilih', [DataCpTerpilihController::class, 'checkCPTerpilih'])->name('checkcpterpilih');

            Route::resource('tujuan-pembelajaran', TujuanPembelajaranController::class);
            Route::get('/getisicp', [TujuanPembelajaranController::class, 'getIsiCP'])->name('getisicp');
            Route::get('/getkoderombel', [TujuanPembelajaranController::class, 'getKodeRombel'])->name('getkoderombel');
            Route::get('/getkodemapel', [TujuanPembelajaranController::class, 'getKodeMapel'])->name('getkodemapel');
            Route::post('/savetujuanpembelajaran', [TujuanPembelajaranController::class, 'saveTujuanPembelajaran'])->name('savetujuanpembelajaran');
            Route::get('/checktujuanpembelajaran', [TujuanPembelajaranController::class, 'checkTujuanPembelajaran'])->name('checktujuanpembelajaran');
            Route::post('/hapustujuanpembelajaran', [TujuanPembelajaranController::class, 'hapusTujuanPembelajaran'])->name('hapustujuanpembelajaran');
            Route::post('/updatetujuanpembelajaran/{id}', [TujuanPembelajaranController::class, 'updateTujuanPembelajaran'])->name('updatetujuanpembelajaran');

            Route::resource('perangkat-ajar', PerangkatAjarController::class);
            Route::post('perangkat-ajar/upload', [PerangkatAjarController::class, 'upload'])
                ->name('perangkat-ajar.upload');

            Route::get('/perangkat-ajar/preview/{type}/{filename}', function ($type, $filename) {
                $path = base_path("perangkat-ajar/{$type}/{$filename}");

                if (!file_exists($path)) {
                    abort(404);
                }

                return response()->file($path);
            })->name('perangkat-ajar.preview');

            Route::resource('modul-ajar-gurumapel', ModulAjarGuruMapelController::class);
            Route::get('/get-program-keahlian/{idbk}', [ModulAjarGuruMapelController::class, 'getProgram']);
            Route::get('/get-konsentrasi-keahlian/{idpk}', [ModulAjarGuruMapelController::class, 'getKonsentrasi']);
            Route::get('/get-mata-pelajaran/{kodeKk}/{tingkat}', [ModulAjarGuruMapelController::class, 'getMataPelajaran']);



            Route::resource('ujian-sumatif', UjianSumatifController::class);
            Route::resource('ajuan-remedial', AjuanRemedialController::class);
            Route::resource('arsip-kbm', ArsipKbmGmapelController::class);
        });

        Route::group(['prefix' => 'penilaian', 'as' => 'penilaian.'], function () {
            Route::resource('formatif', FormatifController::class);
            Route::get('formatif/createNilai/{kode_rombel}/{kel_mapel}/{id_personil}/{tahunajaran}/{ganjilgenap}', [FormatifController::class, 'createNilai'])->name('formatif.createNilai');
            Route::get('formatif/editNilai/{kode_rombel}/{kel_mapel}/{id_personil}/{tahunajaran}/{ganjilgenap}', [FormatifController::class, 'editNilai'])->name('formatif.editNilai');
            Route::post('/hapusnilaiformatif', [FormatifController::class, 'hapusNilaiFormatif'])->name('hapusnilaiformatif');
            Route::get('/exportformatif', [FormatifController::class, 'exportExcelFormatif'])->name('exportformatif');
            Route::post('/uploadformatif', [FormatifController::class, 'uploadNilaiFormatif'])->name('uploadformatif');

            Route::resource('sumatif', SumatifController::class);
            Route::get('sumatif/createNilai/{kode_rombel}/{kel_mapel}/{id_personil}/{tahunajaran}/{ganjilgenap}', [SumatifController::class, 'createNilai'])->name('sumatif.createNilai');
            Route::get('sumatif/editNilai/{kode_rombel}/{kel_mapel}/{id_personil}/{tahunajaran}/{ganjilgenap}', [SumatifController::class, 'editNilai'])->name('sumatif.editNilai');
            Route::post('/hapusnilaisumatif', [SumatifController::class, 'hapusNilaiSumatif'])->name('hapusnilaisumatif');
            Route::get('/exportsumatif', [SumatifController::class, 'exportExcelSumatif'])->name('exportsumatif');
            Route::post('/uploadsumatif', [SumatifController::class, 'uploadNilaiSumatif'])->name('uploadsumatif');

            Route::resource('deskripsi-nilai', DeskripsiNilaiController::class);
            Route::get('/getnilaiformatif', [DeskripsiNilaiController::class, 'getNilaiFormatif'])->name('getnilaiformatif');
        });
    });
});
