<?php

use App\Http\Controllers\PesertaDidik\RaportPesertaDidikController;
use App\Http\Controllers\PesertaDidik\RemedialPesertaDidikController;
use App\Http\Controllers\PesertaDidik\TestFormatifController;
use App\Http\Controllers\PesertaDidik\TestSumatifController;
use App\Http\Controllers\PesertaDidik\TranskripPesertaDidikController;
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
    Route::group(['prefix' => 'kbmpesertadidik', 'as' => 'kbmpesertadidik.'], function () {
        Route::resource('transkrip-peserta-didik', TranskripPesertaDidikController::class);
        Route::resource('raport-peserta-didik', RaportPesertaDidikController::class);
        Route::resource('remedial-peserta-didik', RemedialPesertaDidikController::class);
    });
    Route::group(['prefix' => 'ujiansemester', 'as' => 'ujiansemester.'], function () {
        Route::resource('test-formatif', TestFormatifController::class);
        Route::resource('test-sumatif', TestSumatifController::class);
    });
});
