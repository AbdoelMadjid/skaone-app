<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\About\AboutController;
use App\Http\Controllers\About\BeritaCommentController;
use App\Http\Controllers\About\BeritaController;
use App\Http\Controllers\About\BeritaLikeController;
use App\Http\Controllers\About\DailyMessagesController;
use App\Http\Controllers\About\FiturCodingController;
use App\Http\Controllers\About\GaleryController;
use App\Http\Controllers\About\KumpulanFaqController;
use App\Http\Controllers\About\PhotoJurusanController;
use App\Http\Controllers\About\PhotoSlideController;
use App\Http\Controllers\About\PollingController;
use App\Http\Controllers\About\QuestionController;
use App\Http\Controllers\About\TeamPengembangController;
use App\Http\Controllers\AdministratorPkl\PerusahaanController;
use App\Http\Controllers\AdministratorPkl\PesertaPrakerinController;
use App\Http\Controllers\Pengguna\ProfilPenggunaController;
use App\Http\Controllers\AppSupport\MenuController;
use App\Http\Controllers\AppSupport\AppFiturController;
use App\Http\Controllers\AppSupport\AppProfilController;
use App\Http\Controllers\AppSupport\BackupDbController;
use App\Http\Controllers\AppSupport\DataLoginController;
use App\Http\Controllers\AppSupport\EksporDataMasterController;
use App\Http\Controllers\AppSupport\ImporDataMasterController;
use App\Http\Controllers\AppSupport\ReferensiController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ManajemenPengguna\AksesRoleController;
use App\Http\Controllers\ManajemenPengguna\AksesUserController;
use App\Http\Controllers\ManajemenPengguna\PermissionController;
use App\Http\Controllers\ManajemenPengguna\RoleController;
use App\Http\Controllers\ManajemenPengguna\UserController;
use App\Http\Controllers\Pengguna\GantiPasswordController;
use App\Http\Controllers\Pengguna\PesanController;
use App\Http\Controllers\WelcomeController;
use App\Models\ManajemenPengguna\LoginRecord;
use App\Models\User;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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

Route::get('/db-error', function () {
    return view('error.auth-500');
})->name('db.error');


Route::fallback(function () {
    return response()->view('error.auth-404-basic', [], 404);
});


Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

// Halaman welcome sebagai akses pertama
/* Route::get('/', function () {
    $photoSlides = PhotoSlide::where('is_active', true)->get();
    $teamPengembang = TeamPengembang::all();
    return view('welcome', compact('photoSlides', 'teamPengembang'));
})->name('welcome'); */

// Halaman dashboard, hanya dapat diakses oleh pengguna yang sudah terotentikasi dan terverifikasi
/* Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard'); */

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified', 'check.default.password'])
    ->name('dashboard');
Route::get('/dashboard/active-users', [HomeController::class, 'fetchActiveUsers'])->name('dashboard.active-users');

Route::get('/real-time-stats', function () {
    // Hitung pengguna aktif
    $activeUsersCount = User::whereNotNull('last_login_at')
        ->where('last_login_at', '>=', now()->subMinutes(59))
        ->count();

    // Hitung login hari ini
    $loginTodayCount = LoginRecord::whereDate('login_at', now()->toDateString())->count();

    // Hitung total login
    $loginCount = DB::table('users')->sum('login_count');

    return response()->json([
        'activeUsersCount' => $activeUsersCount,
        'loginTodayCount' => $loginTodayCount,
        'loginCount' => $loginCount,
    ]);
});

Route::middleware(['auth', 'master'])->get('/clear-cache', function () {
    Artisan::call('optimize:clear');
    return redirect()->back()->with('success-chache', 'Cache berhasil dibersihkan!');
})->name('clear.cache');

Route::middleware(['auth', 'master'])->post('/switch-account', [UserController::class, 'switchAccount'])->name('switch.account');
// Rute untuk kembali ke akun asal
Route::middleware(['auth'])->get('/return-account', [UserController::class, 'returnToOriginalAccount'])->name('return.account');

Route::group(['prefix' => 'about', 'as' => 'about.'], function () {
    Route::resource('about', AboutController::class);
});

//Route::middleware(['auth'])->post('/about/pollingsubmit', [PollingController::class, 'submitPolling'])->name('about.pollingsubmit');

// Kelompok rute untuk profil, hanya dapat diakses oleh pengguna yang sudah terotentikasi
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //Language Translation
    Route::get('lang/switch/{lang}', function ($lang) {
        Session::put('lang', $lang);
        return redirect()->back();
    })->name('lang.switch');

    Route::group(['prefix' => 'profilpengguna', 'as' => 'profilpengguna.'], function () {
        Route::resource('profil-pengguna', ProfilPenggunaController::class)->middleware(['check.default.password']);
        Route::post('/simpanphotoprofil', [ProfilPenggunaController::class, 'updateProfilePicture'])->name('simpanphotoprofil');
        Route::post('/simpanphotobackground', [ProfilPenggunaController::class, 'updateBackground'])->name('simpanphotobackground');

        Route::post('/simpanphotoprofilsiswa', [ProfilPenggunaController::class, 'updateProfilePictureSiswa'])->name('simpanphotoprofilsiswa');
        Route::put('/simpanorangtuasiswa', [ProfilPenggunaController::class, 'updateOrtuSiswa'])->name('simpanorangtuasiswa');

        Route::resource('password-pengguna', GantiPasswordController::class);
        Route::post('password-pengguna', [GantiPasswordController::class, 'updatePassword'])->name('update-password');
        Route::resource('pesan-pengguna', PesanController::class);
        Route::get('/chats/{id}', [PesanController::class, 'getChatMessages']);
    });

    Route::group(['prefix' => 'manajemenpengguna', 'as' => 'manajemenpengguna.'], function () {
        Route::resource('roles', RoleController::class);
        Route::resource('permissions', PermissionController::class);
        Route::get('akses-role/{role}/role', [AksesRoleController::class, 'getPermissionsByRole']);
        Route::resource('akses-role', AksesRoleController::class)->except(['create', 'store', 'delete'])->parameters(['akses-role' => 'role']);
        Route::get('akses-user/{user}/user', [AksesUserController::class, 'getPermissionsByUser']);
        Route::resource('akses-user', AksesUserController::class)->except(['create', 'store', 'delete'])->parameters(['akses-user' => 'user']);
        Route::resource('users', UserController::class);
        Route::post('/users/{user}/add-role', [UserController::class, 'addRole'])->name('users.addRole');
        Route::post('/users/reset-password/{id}', [UserController::class, 'directResetPassword'])->name('users.directResetPassword');
    });

    Route::group(['prefix' => 'appsupport', 'as' => 'appsupport.'], function () {
        Route::put('menu/sort', [MenuController::class, 'sort'])->name('menu.sort');
        Route::resource('menu', MenuController::class);
        Route::resource('app-fiturs', AppFiturController::class);
        Route::put('app-fiturs/{id}/simpan-status', [AppFiturController::class, 'simpanStatus'])->name('app-fiturs.simpan-status');
        Route::resource('app-profil', AppProfilController::class);
        Route::resource('referensi', ReferensiController::class);
        Route::resource('backup-db', BackupDbController::class);
        Route::post('/backup-db/process', [BackupDbController::class, 'backupSelectedTables'])->name('backup-db.process');
        Route::delete('/backup-db/delete/{fileName}', [BackupDbController::class, 'deleteBackupFile'])->name('backup-db.delete');

        Route::resource('impor-data-master', ImporDataMasterController::class);
        Route::resource('ekspor-data-master', EksporDataMasterController::class);
        Route::resource('data-login', DataLoginController::class);
    });
});


// Rute otentikasi yang dihasilkan oleh Laravel Breeze
require __DIR__ . '/auth.php';
require __DIR__ . '/template.php';
require __DIR__ . '/manajemensekolah.php';
require __DIR__ . '/kurikulum.php';
require __DIR__ . '/gurumapel.php';
require __DIR__ . '/walikelas.php';
require __DIR__ . '/pesertadidik.php';
require __DIR__ . '/excel.php';
require __DIR__ . '/prakerin.php';
require __DIR__ . '/wakasek.php';
require __DIR__ . '/kaprodi.php';
require __DIR__ . '/bpbk.php';
require __DIR__ . '/ketatausahaan.php';
require __DIR__ . '/skaonewelcome.php';
require __DIR__ . '/alumni.php';
require __DIR__ . '/websiteapp.php';

// Rute fallback untuk `auth`, menangani view dalam folder `auth`
Route::get('auth/{page}', function ($page) {
    if (view()->exists("auth.$page")) {
        return view("auth.$page");
    }
    abort(404);
})->name('auth');

//Route::get('{any}', [HomeController::class, 'index'])->where('any', '.*')->name('index');
