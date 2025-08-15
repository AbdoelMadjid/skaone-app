<?php

use App\Http\Controllers\GuruWali\DataSiswaGuruWaliController;
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
    Route::group(['prefix' => 'guruwali', 'as' => 'guruwali.'], function () {
        Route::resource('data-siswa-guruwali', DataSiswaGuruWaliController::class);
        Route::get('/get-peserta-didik', [DataSiswaGuruWaliController::class, 'getPesertaDidik'])
            ->name('get-peserta-didik');
    });
});
