<?php

namespace App\Http\Controllers\WaliKelas;

use App\DataTables\WaliKelas\PrestasiSiswaDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\WaliKelas\PrestasiSiswaRequest;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\PrestasiSiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrestasiSiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PrestasiSiswaDataTable $prestasiSiswaDataTable)
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
        }

        return $prestasiSiswaDataTable->render('pages.walikelas.prestasi-siswa', compact('waliKelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil tahun ajaran yang aktif, beserta semester yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');  // Cari hanya semester yang aktif
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Ambil wali kelas berdasarkan personal_id dari user yang sedang login dan tahun ajaran aktif
        $waliKelas = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)  // Cocokkan tahun ajaran aktif
            ->first();

        // Jika wali kelas ditemukan, ambil data personil dan hitung semester angka
        $personil = null;
        $semesterAngka = null;

        if ($waliKelas) {
            // Ambil data personil
            $personil = DB::table('personil_sekolahs')
                ->where('id_personil', $waliKelas->wali_kelas)
                ->first();

            // Menentukan angka semester berdasarkan semester aktif dan tingkat
            $semesterAktif = $tahunAjaranAktif->semesters->first()->semester ?? null;

            if ($semesterAktif) {
                // Menentukan semester angka berdasarkan tingkat dan semester aktif (ganjil/genap)
                switch ($waliKelas->tingkat) {
                    case 10:
                        $semesterAngka = ($semesterAktif === 'Ganjil') ? 1 : 2;
                        break;
                    case 11:
                        $semesterAngka = ($semesterAktif === 'Ganjil') ? 3 : 4;
                        break;
                    case 12:
                        $semesterAngka = ($semesterAktif === 'Ganjil') ? 5 : 6;
                        break;
                }
            }

            // Ambil data dari tabel kbm_per_rombels berdasarkan kode_rombel
            $kbmData = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->get();

            $siswaData = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
                ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
                ->where('peserta_didik_rombels.rombel_tingkat', $waliKelas->tingkat)
                ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap')
                ->get();
        } else {
            // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $kbmData = collect();
            $siswaData = collect();
        }

        // Return the view with the necessary data
        return view('pages.walikelas.prestasi-siswa-form', [
            'data' => new PrestasiSiswa(),
            'kode_rombel' => $waliKelas->kode_rombel ?? null,
            'tahunajaran' => $tahunAjaranAktif->tahunajaran,
            'ganjilgenap' => $semesterAktif,
            'semesterAngka' => $semesterAngka,
            'kbmData' => $kbmData,
            'siswaData' => $siswaData,
            'personil' => $personil,
            'action' => route('walikelas.prestasi-siswa.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PrestasiSiswaRequest $request)
    {
        $prestasiSiswa = new PrestasiSiswa($request->validated());
        $prestasiSiswa->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(PrestasiSiswa $prestasiSiswa)
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil tahun ajaran yang aktif, beserta semester yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');  // Cari hanya semester yang aktif
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Ambil wali kelas berdasarkan personal_id dari user yang sedang login dan tahun ajaran aktif
        $waliKelas = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)  // Cocokkan tahun ajaran aktif
            ->first();

        // Jika wali kelas ditemukan, ambil data personil dan hitung semester angka
        $personil = null;
        $semesterAngka = null;

        if ($waliKelas) {
            // Ambil data personil
            $personil = DB::table('personil_sekolahs')
                ->where('id_personil', $waliKelas->wali_kelas)
                ->first();

            // Menentukan angka semester berdasarkan semester aktif dan tingkat
            $semesterAktif = $tahunAjaranAktif->semesters->first()->semester ?? null;

            if ($semesterAktif) {
                // Menentukan semester angka berdasarkan tingkat dan semester aktif (ganjil/genap)
                switch ($waliKelas->tingkat) {
                    case 10:
                        $semesterAngka = ($semesterAktif === 'Ganjil') ? 1 : 2;
                        break;
                    case 11:
                        $semesterAngka = ($semesterAktif === 'Ganjil') ? 3 : 4;
                        break;
                    case 12:
                        $semesterAngka = ($semesterAktif === 'Ganjil') ? 5 : 6;
                        break;
                }
            }

            // Ambil data dari tabel kbm_per_rombels berdasarkan kode_rombel
            $kbmData = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->get();

            $siswaData = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
                ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
                ->where('peserta_didik_rombels.rombel_tingkat', $waliKelas->tingkat)
                ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap')
                ->get();
        } else {
            // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $kbmData = collect();
            $siswaData = collect();
        }

        // Kode rombel dan data lainnya
        $existingNis = $prestasiSiswa->nis; // Ambil NIS dari data prestasi siswa yang diedit

        return view('pages.walikelas.prestasi-siswa-form', [
            'data' => $prestasiSiswa,
            'kode_rombel' => $waliKelas->kode_rombel ?? null,
            'tahunajaran' => $tahunAjaranAktif->tahunajaran,
            'ganjilgenap' => $semesterAktif,
            'semesterAngka' => $semesterAngka,
            'kbmData' => $kbmData,
            'siswaData' => $siswaData,
            'existingNis' => $existingNis, // Kirim ke view
            'personil' => $personil,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrestasiSiswa $prestasiSiswa)
    {
        // Ambil user yang sedang login
        $user = auth()->user();

        // Ambil tahun ajaran yang aktif, beserta semester yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');  // Cari hanya semester yang aktif
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Ambil wali kelas berdasarkan personal_id dari user yang sedang login dan tahun ajaran aktif
        $waliKelas = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)  // Cocokkan tahun ajaran aktif
            ->first();

        // Jika wali kelas ditemukan, ambil data personil dan hitung semester angka
        $personil = null;
        $semesterAngka = null;

        if ($waliKelas) {
            // Ambil data personil
            $personil = DB::table('personil_sekolahs')
                ->where('id_personil', $waliKelas->wali_kelas)
                ->first();

            // Menentukan angka semester berdasarkan semester aktif dan tingkat
            $semesterAktif = $tahunAjaranAktif->semesters->first()->semester ?? null;

            if ($semesterAktif) {
                // Menentukan semester angka berdasarkan tingkat dan semester aktif (ganjil/genap)
                switch ($waliKelas->tingkat) {
                    case 10:
                        $semesterAngka = ($semesterAktif === 'Ganjil') ? 1 : 2;
                        break;
                    case 11:
                        $semesterAngka = ($semesterAktif === 'Ganjil') ? 3 : 4;
                        break;
                    case 12:
                        $semesterAngka = ($semesterAktif === 'Ganjil') ? 5 : 6;
                        break;
                }
            }

            // Ambil data dari tabel kbm_per_rombels berdasarkan kode_rombel
            $kbmData = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->get();

            $siswaData = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
                ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
                ->where('peserta_didik_rombels.rombel_tingkat', $waliKelas->tingkat)
                ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap')
                ->get();
        } else {
            // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $kbmData = collect();
            $siswaData = collect();
        }

        // Kode rombel dan data lainnya
        $existingNis = $prestasiSiswa->nis; // Ambil NIS dari data prestasi siswa yang diedit

        return view('pages.walikelas.prestasi-siswa-form', [
            'data' => $prestasiSiswa,
            'kode_rombel' => $waliKelas->kode_rombel ?? null,
            'tahunajaran' => $tahunAjaranAktif->tahunajaran,
            'ganjilgenap' => $semesterAktif,
            'semesterAngka' => $semesterAngka,
            'kbmData' => $kbmData,
            'siswaData' => $siswaData,
            'existingNis' => $existingNis, // Kirim ke view
            'personil' => $personil,
            'action' => route('walikelas.prestasi-siswa.update', $prestasiSiswa->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PrestasiSiswaRequest $request, PrestasiSiswa $prestasiSiswa)
    {
        $prestasiSiswa->fill($request->validated());
        $prestasiSiswa->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
