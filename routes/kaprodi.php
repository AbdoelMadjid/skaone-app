<?php

use App\Http\Controllers\ManajemenSekolah\Kaprodi\AgendaKegiatanController;
use App\Http\Controllers\ManajemenSekolah\Kaprodi\AnggaranController;
use App\Http\Controllers\ManajemenSekolah\Kaprodi\BagiJamNgajarController;
use App\Http\Controllers\ManajemenSekolah\Kaprodi\LaboratoriumController;
use App\Http\Controllers\ManajemenSekolah\Kaprodi\UjiKompetensiController;
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
    Route::group(['prefix' => 'kepalaprogramstudi', 'as' => 'kepalaprogramstudi.'], function () {
        Route::resource('agenda-kegiatan-kaprodi', AgendaKegiatanController::class);
        Route::resource('anggaran-kaprodi', AnggaranController::class);
        Route::resource('uji-kompetensi-keahlian', UjiKompetensiController::class);
        Route::resource('laboratorium', LaboratoriumController::class);
        Route::resource('pembagian-jam-ngajar', BagiJamNgajarController::class);
    });
});
