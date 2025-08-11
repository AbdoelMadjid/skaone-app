<?php

use App\Http\Controllers\Pkl\AdministratorPkl\PerusahaanController;
use App\Http\Controllers\Kurikulum\DataKBM\MataPelajaranController;
use App\Http\Controllers\ManajemenSekolah\PersonilSekolahController;
use App\Http\Controllers\ManajemenSekolah\PesertaDidikController;
use Illuminate\Support\Facades\Route;

Route::get('mapel-export-excel', [MataPelajaranController::class, 'mapelexportExcel'])->name('mapelexportExcel');
Route::post('/mata-pelajaran/import', [MataPelajaranController::class, 'mapelimportExcel'])->name('mapelimportExcel');


Route::get('pd-export-excel', [PesertaDidikController::class, 'pdexportExcel'])->name('pdexportExcel');
Route::post('/peserta-didik/import', [PesertaDidikController::class, 'pdimportExcel'])->name('pdimportExcel');

Route::get('ps-export-excel', [PersonilSekolahController::class, 'ps_exportExcel'])->name('ps_exportExcel');
Route::post('/personil-sekolah/import', [PersonilSekolahController::class, 'importExcel'])->name('personil-sekolah.import');

// untuk yang pakai
//Route::post('/peserta-didik/import', [PesertaDidikController::class, 'importExcel'])->name('importExcel');
//Route::get('/peserta-didik/export', [PesertaDidikController::class, 'exportExcel'])->name('exportExcel');
Route::post('/administratorpkl/import', [PerusahaanController::class, 'perusahaanimportExcel'])->name('perusahaanimportExcel');
