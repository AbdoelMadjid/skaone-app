<?php

namespace App\Http\Controllers\WaliKelas;

use App\DataTables\WaliKelas\AbsensiSiswaDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\AbsensiSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiSiswaWalasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(AbsensiSiswaDataTable $absensiSiswaDataTable)
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Ambil wali kelas berdasarkan personal_id dari user yang sedang login dan tahun ajaran aktif
        $waliKelas = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();

        // Cek wali kelas
        if (!$waliKelas) {
            return redirect()->route('dashboard')->with('errorWaliKelas', 'Maaf, Anda belum ditetapkan sebagai <b>Wali Kelas</b> pada <b>tahun ajaran aktif</b>. Silakan hubungi operator atau admin sekolah.');
        }
        // Jika wali kelas ditemukan, ambil data personil dan hitung semester angka
        $personil = null;
        $semesterAngka = null;
        $absensiExists = false; // Tambahkan variabel untuk mengecek keberadaan absensi

        if ($waliKelas) {
            // Ambil data personil
            $personil = DB::table('personil_sekolahs')
                ->where('id_personil', $waliKelas->wali_kelas)
                ->first();

            // Menentukan angka semester berdasarkan semester aktif dan tingkat
            $semesterAktif = $tahunAjaranAktif->semesters->first()->semester ?? null;

            if ($semesterAktif) {
                if ($semesterAktif === 'Ganjil') {
                    if ($waliKelas->tingkat == 10) {
                        $semesterAngka = 1;
                    } elseif ($waliKelas->tingkat == 11) {
                        $semesterAngka = 3;
                    } elseif ($waliKelas->tingkat == 12) {
                        $semesterAngka = 5;
                    }
                } elseif ($semesterAktif === 'Genap') {
                    if ($waliKelas->tingkat == 10) {
                        $semesterAngka = 2;
                    } elseif ($waliKelas->tingkat == 11) {
                        $semesterAngka = 4;
                    } elseif ($waliKelas->tingkat == 12) {
                        $semesterAngka = 6;
                    }
                }
            }

            // Cek apakah data sudah ada di tabel absensi_siswas
            $absensiExists = AbsensiSiswa::where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->where('semester', $semesterAngka) // Pastikan ini sesuai dengan semester aktif
                ->exists();
        } else {
            $absensiExists = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }

        return $absensiSiswaDataTable->render('pages.walikelas.absensi-siswa', compact('waliKelas', 'absensiExists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function generateAbsensi()
    {
        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        // Ambil data rombongan belajar berdasarkan wali kelas yang login
        $rombonganBelajar = RombonganBelajar::where('wali_kelas', auth()->user()->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();

        // Ambil data siswa dari peserta_didik_rombels yang sesuai dengan rombongan belajar
        $pesertaDidikRombels = PesertaDidikRombel::where('rombel_kode', $rombonganBelajar->kode_rombel)
            ->where('tahun_ajaran', $tahunAjaranAktif->tahunajaran)
            ->get();

        // Tentukan Ganjil/Genap
        $ganjilGenap = $semesterAktif->semester;

        // Tentukan Semester Angka (berdasarkan aturan yang sebelumnya sudah dijelaskan)
        $semesterAngka = 0;
        if ($ganjilGenap == 'Ganjil') {
            if ($rombonganBelajar->tingkat == 10) {
                $semesterAngka = 1;
            } elseif ($rombonganBelajar->tingkat == 11) {
                $semesterAngka = 3;
            } elseif ($rombonganBelajar->tingkat == 12) {
                $semesterAngka = 5;
            }
        } else {
            if ($rombonganBelajar->tingkat == 10) {
                $semesterAngka = 2;
            } elseif ($rombonganBelajar->tingkat == 11) {
                $semesterAngka = 4;
            } elseif ($rombonganBelajar->tingkat == 12) {
                $semesterAngka = 6;
            }
        }

        // Loop melalui setiap peserta didik untuk mengisi tabel absensi_siswas
        foreach ($pesertaDidikRombels as $peserta) {
            // Cek apakah data sudah ada di tabel absensi_siswas
            $absensiExists = AbsensiSiswa::where('nis', $peserta->nis)
                ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('kode_rombel', $rombonganBelajar->kode_rombel)
                ->where('semester', $semesterAngka)
                ->exists();

            // Jika data belum ada, lakukan insert
            if (!$absensiExists) {
                AbsensiSiswa::create([
                    'kode_rombel' => $rombonganBelajar->kode_rombel,
                    'tahunajaran' => $tahunAjaranAktif->tahunajaran,
                    'ganjilgenap' => $ganjilGenap,
                    'semester' => $semesterAngka,
                    'nis' => $peserta->nis,
                    'sakit' => 0, // Set default value untuk sakit
                    'izin' => 0,  // Set default value untuk izin
                    'alfa' => 0,  // Set default value untuk alfa
                    'jmlhabsen' => 0, // Set default value untuk jmlhabsen
                ]);
            }
        }

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('walikelas.absensi-siswa.index')->with('success', 'Data absensi berhasil di-generate!');
    }

    public function updateAbsensi(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:absensi_siswas,id',  // Sesuaikan dengan nama tabel dan primary key
            'type' => 'required|in:izin,sakit,alfa',
            'value' => 'required|integer|min:0',
            'jmlhabsen' => 'required|integer|min:0',
        ]);

        // Temukan data absensi siswa berdasarkan id
        $absensi = AbsensiSiswa::find($validated['id']);

        // Update field sesuai dengan type (izin, sakit, alfa)
        $absensi->{$validated['type']} = $validated['value'];
        $absensi->jmlhabsen = $validated['jmlhabsen'];  // Update total absen

        if ($absensi->save()) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 500);
    }
}
