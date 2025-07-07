<?php

namespace App\Http\Controllers\WaliKelas;

use App\DataTables\WaliKelas\EkstrakurikulerDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EkstrakurikulerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(EkstrakurikulerDataTable $ekstrakurikulerDataTable)
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
        $ekstrakulikulerExists = false; // Tambahkan variabel untuk mengecek keberadaan absensi

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
            $ekstrakulikulerExists = Ekstrakurikuler::where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->where('semester', $semesterAngka) // Pastikan ini sesuai dengan semester aktif
                ->exists();
        } else {
            $ekstrakulikulerExists = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }
        return $ekstrakurikulerDataTable->render('pages.walikelas.ekstrakurikuler', compact('waliKelas', 'ekstrakulikulerExists'));
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

    public function generateEskul()
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
            $eskulExists = Ekstrakurikuler::where('nis', $peserta->nis)
                ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('kode_rombel', $rombonganBelajar->kode_rombel)
                ->where('semester', $semesterAngka)
                ->exists();

            // Jika data belum ada, lakukan insert
            if (!$eskulExists) {
                Ekstrakurikuler::create([
                    'kode_rombel' => $rombonganBelajar->kode_rombel,
                    'tahunajaran' => $tahunAjaranAktif->tahunajaran,
                    'ganjilgenap' => $ganjilGenap,
                    'semester' => $semesterAngka,
                    'nis' => $peserta->nis,
                    'wajib' => "",
                    'wajib_n' => "",
                    'wajib_desk' => "",
                    'pilihan1' => "",
                    'pilihan1_n' => "",
                    'pilihan1_desk' => "",
                    'pilihan2' => "",
                    'pilihan2_n' => "",
                    'pilihan2_desk' => "",
                    'pilihan3' => "",
                    'pilihan3_n' => "",
                    'pilihan3_desk' => "",
                    'pilihan4' => "",
                    'pilihan4_n' => "",
                    'pilihan4_desk' => "",
                ]);
            }
        }

        // Redirect atau tampilkan pesan sukses
        return redirect()->route('walikelas.ekstrakulikuler.index')->with('success', 'Data Ekstrakurikuler berhasil di-generate!');
    }

    public function saveEskulWajib(Request $request, $id)
    {
        $request->validate([
            'wajib' => 'nullable|string',
            'wajib_n' => 'nullable|string', // Validasi untuk 'wajib_n'
            'wajib_desk' => 'nullable|string', // Validasi untuk 'wajib_desk'
        ]);

        // Cari ekstrakurikuler berdasarkan ID
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        // Update kolom 'wajib', 'wajib_n', dan 'wajib_desk' jika ada
        if ($request->has('wajib')) {
            $ekstrakurikuler->wajib = $request->wajib;
        }
        if ($request->has('wajib_n')) {
            $ekstrakurikuler->wajib_n = $request->wajib_n;
        }
        if ($request->has('wajib_desk')) {
            $ekstrakurikuler->wajib_desk = $request->wajib_desk;
        }

        $ekstrakurikuler->save();

        return response()->json(['message' => 'Data berhasil diperbarui']);
    }

    public function saveEskulPilihan1(Request $request, $id)
    {
        $request->validate([
            'pilihan1' => 'nullable|string',
            'pilihan1_n' => 'nullable|string', // Validasi untuk 'pilihan1_n'
            'pilihan1_desk' => 'nullable|string', // Validasi untuk 'pilihan1_desk'
        ]);

        // Cari ekstrakurikuler berdasarkan ID
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        // Update kolom 'pilihan1', 'pilihan1_n', dan 'pilihan1_desk' jika ada
        if ($request->has('pilihan1')) {
            $ekstrakurikuler->pilihan1 = $request->pilihan1;
        }
        if ($request->has('pilihan1_n')) {
            $ekstrakurikuler->pilihan1_n = $request->pilihan1_n;
        }
        if ($request->has('pilihan1_desk')) {
            $ekstrakurikuler->pilihan1_desk = $request->pilihan1_desk;
        }

        $ekstrakurikuler->save();

        return response()->json(['message' => 'Data berhasil diperbarui']);
    }

    public function saveEskulPilihan2(Request $request, $id)
    {
        $request->validate([
            'pilihan2' => 'nullable|string',
            'pilihan2_n' => 'nullable|string', // Validasi untuk 'pilihan2_n'
            'pilihan2_desk' => 'nullable|string', // Validasi untuk 'pilihan2_desk'
        ]);

        // Cari ekstrakurikuler berdasarkan ID
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        // Update kolom 'pilihan2', 'pilihan2_n', dan 'pilihan2_desk' jika ada
        if ($request->has('pilihan2')) {
            $ekstrakurikuler->pilihan2 = $request->pilihan2;
        }
        if ($request->has('pilihan2_n')) {
            $ekstrakurikuler->pilihan2_n = $request->pilihan2_n;
        }
        if ($request->has('pilihan2_desk')) {
            $ekstrakurikuler->pilihan2_desk = $request->pilihan2_desk;
        }

        $ekstrakurikuler->save();

        return response()->json(['message' => 'Data berhasil diperbarui']);
    }

    public function saveEskulPilihan3(Request $request, $id)
    {
        $request->validate([
            'pilihan3' => 'nullable|string',
            'pilihan3_n' => 'nullable|string', // Validasi untuk 'pilihan3_n'
            'pilihan3_desk' => 'nullable|string', // Validasi untuk 'pilihan3_desk'
        ]);

        // Cari ekstrakurikuler berdasarkan ID
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        // Update kolom 'pilihan3', 'pilihan3_n', dan 'pilihan3_desk' jika ada
        if ($request->has('pilihan3')) {
            $ekstrakurikuler->pilihan3 = $request->pilihan3;
        }
        if ($request->has('pilihan3_n')) {
            $ekstrakurikuler->pilihan3_n = $request->pilihan3_n;
        }
        if ($request->has('pilihan3_desk')) {
            $ekstrakurikuler->pilihan3_desk = $request->pilihan3_desk;
        }

        $ekstrakurikuler->save();

        return response()->json(['message' => 'Data berhasil diperbarui']);
    }

    public function saveEskulPilihan4(Request $request, $id)
    {
        $request->validate([
            'pilihan4' => 'nullable|string',
            'pilihan4_n' => 'nullable|string', // Validasi untuk 'pilihan4_n'
            'pilihan4_desk' => 'nullable|string', // Validasi untuk 'pilihan4_desk'
        ]);

        // Cari ekstrakurikuler berdasarkan ID
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        // Update kolom 'pilihan4', 'pilihan4_n', dan 'pilihan4_desk' jika ada
        if ($request->has('pilihan4')) {
            $ekstrakurikuler->pilihan4 = $request->pilihan4;
        }
        if ($request->has('pilihan4_n')) {
            $ekstrakurikuler->pilihan4_n = $request->pilihan4_n;
        }
        if ($request->has('pilihan4_desk')) {
            $ekstrakurikuler->pilihan4_desk = $request->pilihan4_desk;
        }

        $ekstrakurikuler->save();

        return response()->json(['message' => 'Data berhasil diperbarui']);
    }
}
