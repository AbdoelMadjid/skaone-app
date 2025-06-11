<?php

use App\Http\Controllers\Kurikulum\DataKBM\CapaianPembelajaranController;
use App\Http\Controllers\Kurikulum\DataKBM\KbmPerRombelController;
use App\Http\Controllers\Kurikulum\DataKBM\KunciDataKbmController;
use App\Http\Controllers\Kurikulum\DataKBM\MataPelajaranController;
use App\Http\Controllers\Kurikulum\DataKBM\MataPelajaranPerJurusanController;
use App\Http\Controllers\Kurikulum\DataKBM\PesertaDidikRombelController;
use App\Http\Controllers\Kurikulum\DokumenGuru\AbsensiGuruController;
use App\Http\Controllers\Kurikulum\DokumenGuru\ArsipGuruController;
use App\Http\Controllers\Kurikulum\DokumenGuru\ArsipGuruMapelController;
use App\Http\Controllers\Kurikulum\DokumenGuru\ArsipWaliKelasController;
use App\Http\Controllers\Kurikulum\DokumenGuru\PerGuruController;
use App\Http\Controllers\Kurikulum\DokumenGuru\PerRombelController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\CetakRaporController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\IjazahController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\LegerNilaiController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\RaporPklController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\RaporPLimaController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\RemedialPesertaDidikNilaiController;
use App\Http\Controllers\Kurikulum\DokumenSiswa\TranskripNilaiController;
use App\Http\Controllers\Kurikulum\PerangkatKurikulum\PengumumanController;
use App\Http\Controllers\Kurikulum\PerangkatKurikulum\VersiKurikulumController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\AdministrasiUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\DenahRuanganUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\IdentitasUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\JadwalUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\PanitiaUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\PelaksanaanUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\PenandaRuanganController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\PengawasUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\PesertaUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\RuangUjianController;
use App\Http\Controllers\Kurikulum\PerangkatUjian\TokenSoalUjianController;
use App\Http\Controllers\ManajemenSekolah\PesertaDidikController;
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
    Route::group(['prefix' => 'kurikulum', 'as' => 'kurikulum.'], function () {
        Route::group(['prefix' => 'datakbm', 'as' => 'datakbm.'], function () {
            Route::resource('peserta-didik-rombel', PesertaDidikRombelController::class);
            Route::get('/get-rombongan-belajar', [PesertaDidikRombelController::class, 'getRombonganBelajar'])->name('get-rombonganbelajar');
            Route::get('get-siswa', [PesertaDidikController::class, 'getSiswa'])->name('get-siswa');
            // web.php (Route file)
            Route::get('/get-rombel', [PesertaDidikRombelController::class, 'getRombel'])->name('getRombel');
            Route::get('get-peserta-didik/{kode_kk}', [PesertaDidikRombelController::class, 'getPesertaDidik']);
            //Route::get('/generateakun', [PesertaDidikRombelController::class, 'generateakun'])->name('generateakun');
            Route::post('/formgenerateakun', [PesertaDidikRombelController::class, 'formGenerateAkun'])->name('formgenerateakun');
            Route::get('get-rombels', [PesertaDidikRombelController::class, 'getRombels'])->name('get-rombels');
            Route::post('/get-student-data', [PesertaDidikRombelController::class, 'getStudentData'])->name('get-student-data');


            Route::resource('mata-pelajaran', MataPelajaranController::class);
            Route::resource('mata-pelajaran-perjurusan', MataPelajaranPerJurusanController::class);
            Route::post('simpandistribusi', [MataPelajaranPerJurusanController::class, 'simpandistribusi'])->name('simpandistribusi');
            Route::get('/filter-mata-pelajaran', [MataPelajaranPerJurusanController::class, 'filterMataPelajaran'])->name('filterMataPelajaran');

            Route::resource('capaian-pembelajaran', CapaianPembelajaranController::class);
            Route::resource('kbm-per-rombel', KbmPerRombelController::class);
            Route::get('/get-kbm-rombel', [KbmPerRombelController::class, 'getKBMRombel'])->name('get-kbmrombel');
            Route::get('/get-mata-pelajaran', [KbmPerRombelController::class, 'filterMataPelajaran'])->name('get-matapelajaran');
            Route::get('/get-personil-sekolah', [KbmPerRombelController::class, 'getPersonilSekolah'])->name('get-personil-sekolah');
            Route::post('/update-personil', [KbmPerRombelController::class, 'updatePersonil']);
            Route::resource('kunci-data-kbm', KunciDataKbmController::class);
        });

        Route::group(['prefix' => 'perangkatkurikulum', 'as' => 'perangkatkurikulum.'], function () {
            Route::resource('versi-kurikulum', VersiKurikulumController::class);
            Route::resource('pengumuman', PengumumanController::class);
        });

        Route::group(['prefix' => 'dokumenguru', 'as' => 'dokumenguru.'], function () {
            Route::resource('arsip-gurumapel', ArsipGuruMapelController::class);
            Route::get('/get-guru', [ArsipGuruMapelController::class, 'getGuru']);
            Route::get('/get-rombel', [ArsipGuruMapelController::class, 'getRombel']);

            Route::post('/simpanpilihan', [ArsipGuruMapelController::class, 'simpanPilihan']);
            Route::get('/get-pilihan-user', [ArsipGuruMapelController::class, 'getPilihanUser']);

            Route::get('arsip-gurumapel/formatif/createNilai/{kode_rombel}/{kel_mapel}/{id_personil}/{tahunajaran}/{ganjilgenap}', [ArsipGuruMapelController::class, 'createNilaiFormatif'])->name('arsip-gurumapel.formatif.createNilai');
            Route::get('arsip-gurumapel/formatif/editNilai/{kode_rombel}/{kel_mapel}/{id_personil}/{tahunajaran}/{ganjilgenap}', [ArsipGuruMapelController::class, 'editNilaiFormatif'])->name('arsip-gurumapel.formatif.editNilai');
            Route::post('/formatif/storenilaiFormatif', [ArsipGuruMapelController::class, 'storeNilaiFormatif'])->name('formatif.storenilaiFormatif');
            Route::put('/formatif/{id}/updatenilaiFormatif', [ArsipGuruMapelController::class, 'updateNilaiFormatif'])->name('formatif.updatenilaiFormatif');
            Route::post('/hapusnilaiformatif', [ArsipGuruMapelController::class, 'hapusNilaiFormatif'])->name('hapusnilaiformatif');
            Route::get('/exportformatif', [ArsipGuruMapelController::class, 'exportExcelFormatif'])->name('exportformatif');
            Route::post('/uploadformatif', [ArsipGuruMapelController::class, 'uploadNilaiFormatif'])->name('uploadformatif');

            Route::get('arsip-gurumapel/sumatif/createNilai/{kode_rombel}/{kel_mapel}/{id_personil}/{tahunajaran}/{ganjilgenap}', [ArsipGuruMapelController::class, 'createNilaiSumatif'])->name('arsip-gurumapel.sumatif.createNilai');
            Route::get('arsip-gurumapel/sumatif/editNilai/{kode_rombel}/{kel_mapel}/{id_personil}/{tahunajaran}/{ganjilgenap}', [ArsipGuruMapelController::class, 'editNilaiSumatif'])->name('arsip-gurumapel.sumatif.editNilai');
            Route::post('/sumatif/storenilaiSumatif', [ArsipGuruMapelController::class, 'storeNilaiSumatif'])->name('sumatif.storenilaiSumatif');
            Route::put('/sumatif/{id}/updatenilaiSumatif', [ArsipGuruMapelController::class, 'updateNilaiSumatif'])->name('sumatif.updatenilaiSumatif');
            Route::post('/hapusnilaisumatif', [ArsipGuruMapelController::class, 'hapusNilaiSumatif'])->name('hapusnilaisumatif');
            Route::get('/exportsumatif', [ArsipGuruMapelController::class, 'exportExcelSumatif'])->name('exportsumatif');
            Route::post('/uploadsumatif', [ArsipGuruMapelController::class, 'uploadNilaiSumatif'])->name('uploadsumatif');

            Route::resource('arsip-walikelas', ArsipWaliKelasController::class);
            Route::get('/get-rombels', [ArsipWaliKelasController::class, 'getRombels']);
            Route::get('/get-wali-kelas', [ArsipWaliKelasController::class, 'getWaliKelas']);
            Route::get('/get-dokumen-walas', [ArsipWaliKelasController::class, 'getDokumenWalas']);
            Route::post('/simpan-pilihan', [ArsipWaliKelasController::class, 'simpanPilihan']);
        });

        Route::group(['prefix' => 'dokumentsiswa', 'as' => 'dokumentsiswa.'], function () {
            Route::resource('cetak-rapor', CetakRaporController::class);
            Route::get('/cetak-rapor/detail-peserta-didik/{nis}', [CetakRaporController::class, 'getSiswaDetail']);
            Route::get('/get-kode-rombel', [CetakRaporController::class, 'getKodeRombel']);
            Route::get('/get-peserta-didik', [CetakRaporController::class, 'getPesertaDidik']);
            Route::post('/simpanpilihcetakrapor', [CetakRaporController::class, 'simpanPilihCetakRapor'])
                ->name('simpanpilihcetakrapor');

            Route::resource('leger-nilai', LegerNilaiController::class);
            Route::get('/get-kode-rombel-leger', [LegerNilaiController::class, 'getKodeRombelLeger']);
            Route::get('/export-pivot-data', [LegerNilaiController::class, 'exportPivotData'])->name('exportpivotData');

            Route::resource('ijazah', IjazahController::class);
            Route::resource('rapor-pkl', RaporPklController::class);
            Route::get('raporpkl/{nis}', [RaporPklController::class, 'showRaporPKL']);
            Route::resource('rapor-p-lima', RaporPLimaController::class);
            Route::resource('transkrip-nilai', TranskripNilaiController::class);
            Route::get('nilaisemester', [TranskripNilaiController::class, 'getBySemester']);
            Route::post('updatenilai', [TranskripNilaiController::class, 'updateNilai']);
            Route::get('transkriprapor/{nis}', [TranskripNilaiController::class, 'getTranskrip']);

            Route::resource('remedial-peserta-didik', RemedialPesertaDidikNilaiController::class);
            Route::get('/get-tahun-ajaran', [RemedialPesertaDidikNilaiController::class, 'getTahunAjaran']);
            Route::get('/get-kompetensi-keahlian/{tahun}', [RemedialPesertaDidikNilaiController::class, 'getKompetensiKeahlian']);
            Route::get('/filter-siswa', [RemedialPesertaDidikNilaiController::class, 'filterSiswa']);
            Route::get('/lihat-mata-pelajaran', [RemedialPesertaDidikNilaiController::class, 'lihatMapel']);
            Route::get('/cek-mata-pelajaran', [RemedialPesertaDidikNilaiController::class, 'cekMataPelajaran']);
            Route::get('/cetakremedial', [RemedialPesertaDidikNilaiController::class, 'cetakRemedial']);
        });

        Route::group(['prefix' => 'perangkatujian', 'as' => 'perangkatujian.'], function () {
            Route::resource('identitas-ujian', IdentitasUjianController::class);
            Route::get('administrasi-ujian', [AdministrasiUjianController::class, 'index'])->name('administrasi-ujian.index');
            Route::prefix('administrasi-ujian')->as('administrasi-ujian.')->group(function () {
                Route::resource('ruang-ujian', RuangUjianController::class);
                Route::resource('peserta-ujian', PesertaUjianController::class);
                Route::resource('jadwal-ujian', JadwalUjianController::class);
                Route::resource('pengawas-ujian', PengawasUjianController::class);
            });
            Route::get('/get-ruang-ujian/{nomor_ruang}', [PesertaUjianController::class, 'getRuangUjian']);
            Route::get('/get-siswa-kelas/{kode_kelas}', [PesertaUjianController::class, 'getSiswaKelas']);
            Route::post('tambahpesertaujian', [PesertaUjianController::class, 'tambahpesertaujian'])->name('tambahpesertaujian');
            Route::get('/getkartupeserta', [AdministrasiUjianController::class, 'getKartuPeserta'])->name('getkartupeserta');
            Route::get('/denahdata', [AdministrasiUjianController::class, 'getDenahData'])->name('denahdata');

            Route::get('/cetak-kartu-ujian/{kelas}', [AdministrasiUjianController::class, 'cetakKartuUjianByKelas']);

            Route::get('/get-mapel/{kode_kk}', [JadwalUjianController::class, 'getMapelByKK']);

            Route::get('/generatejadwalmassal', [JadwalUjianController::class, 'generateMassal']);
            Route::post('/simpan-massal', [JadwalUjianController::class, 'simpanMassal']);

            Route::get('load-jadwal-tingkat', [AdministrasiUjianController::class, 'loadJadwalTingkat']);

            Route::get('denahtempatduduk/{ruangan}', [AdministrasiUjianController::class, 'showDenahTempatDuduk']);

            Route::get('/daftar-pengawas-ujian', [PengawasUjianController::class, 'loadFormPengawas'])->name('daftar-pengawas-ujian');

            Route::post('/simpan-daftar-pengawas-massal', [PengawasUjianController::class, 'simpanpengawasMassal'])->name('simpan-daftar-pengawas-massal');

            Route::get('/jadwal-massal-table', [PengawasUjianController::class, 'generateMassalTable'])->name('jadwal-massal-table');

            Route::post('/jadwal-massal-simpan', [PengawasUjianController::class, 'storeJadwalpengawasMassal'])->name('jadwal-massal-simpan');

            //Route::get('/daftar-siswa-ruangan/{nomor_ruang}', [AdministrasiUjianController::class, 'daftarSiswaPerRuang']);

            Route::get('/daftar-siswa-ruangan/{nomorRuang}', [AdministrasiUjianController::class, 'daftarSiswaPerRuang'])
                ->name('daftar-siswa-ruangan');

            Route::get('/get-tempelan-ruang', [AdministrasiUjianController::class, 'getTempelanPesertaByRuang'])->name('get-tempelan-ruang');

            Route::get('pelaksanaan-ujian', [PelaksanaanUjianController::class, 'index'])->name('pelaksanaan-ujian.index');
            Route::prefix('pelaksanaan-ujian')->as('pelaksanaan-ujian.')->group(function () {
                Route::resource('panitia-ujian', PanitiaUjianController::class);
                Route::resource('token-soal-ujian', TokenSoalUjianController::class);
                Route::resource('denah-ruangan-ujian', DenahRuanganUjianController::class);
            });

            Route::get('/get-personil-panitia', [PanitiaUjianController::class, 'getPersonilPanitia'])->name('getpersonilPanitia');

            Route::get('/peserta-by-ruang', [PelaksanaanUjianController::class, 'getByRuang'])->name('peserta-by-ruang');

            Route::get('/pengawasruangan', [PelaksanaanUjianController::class, 'getPengawasSesi'])->name('pengawasruangan');

            Route::get('/cek-jadwal-untuk-token', [TokenSoalUjianController::class, 'cekJadwaluntukToken'])->name('cek-jadwal-untuk-token');

            Route::get('/get-rombel-by-kk', [TokenSoalUjianController::class, 'getByKkTahun']);

            Route::post('/simpan-token-massal', [TokenSoalUjianController::class, 'simpanTokenMassal'])->name('simpan-token-massal');

            Route::get('/token-soal-ujian', [PelaksanaanUjianController::class, 'filterToken'])->name('token-soal-ujian');
            Route::delete('/hapus-token-soal-ujian/{id}', [PelaksanaanUjianController::class, 'hapusToken'])->name('hapus-token-soal-ujian');

            Route::post('/denah-update-position/{id}', [PelaksanaanUjianController::class, 'updatePosition']);
        });
    });
});
