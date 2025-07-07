<?php

namespace App\Http\Controllers\WaliKelas;

use App\DataTables\WaliKelas\CatatanWaliKelasDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\CatatanWaliKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatatanWalikelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CatatanWaliKelasDataTable $catatanWaliKelasDataTable)
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
        $catatanWaliKelasExists = false; // Tambahkan variabel untuk mengecek keberadaan absensi

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
            $catatanWaliKelasExists = CatatanWaliKelas::where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->where('semester', $semesterAngka) // Pastikan ini sesuai dengan semester aktif
                ->exists();
        } else {
            $catatanWaliKelasExists = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }
        return $catatanWaliKelasDataTable->render('pages.walikelas.catatan-wali-kelas', compact('waliKelas', 'catatanWaliKelasExists'));
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

    public function generatecatatanwalikelas()
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
            $catatanWaliKelasExists = CatatanWaliKelas::where('nis', $peserta->nis)
                ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('kode_rombel', $rombonganBelajar->kode_rombel)
                ->where('semester', $semesterAngka)
                ->exists();

            // Jika data belum ada, lakukan insert
            if (!$catatanWaliKelasExists) {
                CatatanWaliKelas::create([
                    'kode_rombel' => $rombonganBelajar->kode_rombel,
                    'tahunajaran' => $tahunAjaranAktif->tahunajaran,
                    'ganjilgenap' => $ganjilGenap,
                    'semester' => $semesterAngka,
                    'nis' => $peserta->nis,
                    'catatan' => "",
                ]);
            }
        }

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('walikelas.catatan-wali-kelas.index')->with('success', 'Data Catatan Wali Kelas berhasil di-generate!');
    }

    public function updateCatatan(Request $request)
    {
        $request->validate([
            'id' => 'required|integer|exists:catatan_wali_kelas,id',
            'catatan' => 'nullable|string',
        ]);

        // Find the CatatanWaliKelas by ID and update the catatan
        $catatanWaliKelas = CatatanWaliKelas::find($request->id);
        $catatanWaliKelas->catatan = $request->catatan;
        $catatanWaliKelas->save();

        return response()->json(['success' => true]);
    }
}
