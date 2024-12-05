<?php

use App\Http\Controllers\BpBk\AnggaranController;
use App\Http\Controllers\BpBk\DataKipController;
use App\Http\Controllers\BpBk\HomeVisitController;
use App\Http\Controllers\BpBk\KonselingController;
use App\Http\Controllers\BpBk\MelanjutkanKuliahController;
use App\Http\Controllers\BpBk\PenelusuranLulusanController;
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
    Route::group(['prefix' => 'bpbk', 'as' => 'bpbk.'], function () {
        Route::resource('konseling', KonselingController::class);
        Route::resource('data-kip', DataKipController::class);
        Route::resource('home-visit', HomeVisitController::class);
        Route::resource('melanjutkan-kuliah', MelanjutkanKuliahController::class);
        Route::resource('penelusuran-lulusan', PenelusuranLulusanController::class);
        Route::resource('anggaran-bpbk', AnggaranController::class);
    });
});
