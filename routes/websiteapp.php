<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\WebSite\DailyMessagesController;
use App\Http\Controllers\WebSite\FiturCodingController;
use App\Http\Controllers\WebSite\GaleryController;
use App\Http\Controllers\WebSite\KumpulanFaqController;
use App\Http\Controllers\WebSite\LogoJurusanController;
use App\Http\Controllers\WebSite\PhotoJurusanController;
use App\Http\Controllers\WebSite\PhotoPersonilController;
use App\Http\Controllers\WebSite\PhotoSlideController;
use App\Http\Controllers\WebSite\PollingController;
use App\Http\Controllers\WebSite\ProfilLulusanProspekController;
use App\Http\Controllers\WebSite\QuestionController;
use App\Http\Controllers\WebSite\TeamPengembangController;
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
    Route::group(['prefix' => 'websiteapp', 'as' => 'websiteapp.'], function () {
        Route::resource('kumpulan-faqs', KumpulanFaqController::class);
        Route::resource('team-pengembang', TeamPengembangController::class);
        Route::resource('fitur-coding', FiturCodingController::class);
        Route::resource('photo-slides', PhotoSlideController::class);
        Route::resource('galery', GaleryController::class);
        Route::resource('photo-jurusan', PhotoJurusanController::class);
        Route::resource('daily-messages', DailyMessagesController::class);
        Route::get('events/list', [EventController::class, 'listEvent'])->name('events.list');
        Route::resource('events', EventController::class);
        Route::resource('polling', PollingController::class);
        Route::resource('question', QuestionController::class);
        Route::resource('photo-personil', PhotoPersonilController::class);
        Route::resource('profil-jurusan', ProfilLulusanProspekController::class);
        Route::resource('logo-jurusan', LogoJurusanController::class);
    });
});
