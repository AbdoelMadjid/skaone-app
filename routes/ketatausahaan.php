<?php

use App\Http\Controllers\ManajemenSekolah\Ketatausahaan\AgendaController;
use App\Http\Controllers\ManajemenSekolah\Ketatausahaan\AnggaranController;
use App\Http\Controllers\ManajemenSekolah\Ketatausahaan\ManajemenBarangController;
use App\Http\Controllers\ManajemenSekolah\Ketatausahaan\PersuratanController;
use App\Http\Controllers\ManajemenSekolah\Ketatausahaan\SaranaPrasaranaController;
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
    Route::group(['prefix' => 'ketatausahaan', 'as' => 'ketatausahaan.'], function () {
        Route::resource('persuratan', PersuratanController::class);
        Route::resource('sarana-prasarana', SaranaPrasaranaController::class);
        Route::resource('manajemen-barang', ManajemenBarangController::class);
        Route::resource('agenda-ketatausahaan', AgendaController::class);
        Route::resource('anggaran-ketatausahaan', AnggaranController::class);
    });
});
