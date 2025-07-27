<?php

namespace App\Http\Controllers\WaliKelas;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\HariEfektif;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\AbsensiSiswa;
use App\Models\WaliKelas\CatatanWaliKelas;
use App\Models\WaliKelas\Ekstrakurikuler;
use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DataKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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
            // Ambil data dari tabel kbm_per_rombels berdasarkan kode_rombel
            $kbmData = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->get();

            // Cek apakah ada data absensi untuk rombel tersebut
            $absensiExists = AbsensiSiswa::where('kode_rombel', $waliKelas->kode_rombel)
                ->exists();

            // Jika data absensi belum tersedia, redirect atau tampilkan halaman khusus
            if (! $absensiExists) {
                return redirect()
                    ->route('walikelas.absensi-siswa.index');
            }

            $eskulExists = Ekstrakurikuler::where('kode_rombel', $waliKelas->kode_rombel)
                ->exists();

            // Jika data eskul belum tersedia, redirect atau tampilkan halaman khusus
            if (! $eskulExists) {
                return redirect()
                    ->route('walikelas.ekstrakulikuler.index');
            }

            $catwalikelasExists = CatatanWaliKelas::where('kode_rombel', $waliKelas->kode_rombel)
                ->exists();

            // Jika data catwalikelas belum tersedia, redirect atau tampilkan halaman khusus
            if (! $catwalikelasExists) {
                return redirect()
                    ->route('walikelas.catatan-wali-kelas.index');
            }

            // Ambil data siswa berdasarkan tahun ajaran, kode rombel, dan tingkat
            $siswaData = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
                ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
                ->where('peserta_didik_rombels.rombel_tingkat', $waliKelas->tingkat)
                ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap', 'peserta_didiks.kontak_email')
                ->get();
        } else {
            $kbmData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $siswaData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }

        // Ambil data titi_mangsa jika sudah ada untuk wali kelas dan tahun ajaran aktif
        $titimangsa = DB::table('titi_mangsas')
            ->where('kode_rombel', $waliKelas->kode_rombel ?? '')
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif)
            ->first();

        $nilaiRataSiswa = DB::select("
            SELECT
                pd.nis,
                pd.nama_lengkap,
                ROUND(AVG(COALESCE(((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2), 0)), 2) AS nil_rata_siswa
            FROM
                peserta_didik_rombels pr
            INNER JOIN
                peserta_didiks pd ON pr.nis = pd.nis
            INNER JOIN
                kbm_per_rombels kr ON pr.rombel_kode = kr.kode_rombel
            LEFT JOIN
                nilai_formatif nf ON pr.nis = nf.nis AND kr.kel_mapel = nf.kel_mapel
            LEFT JOIN
                nilai_sumatif ns ON pr.nis = ns.nis AND kr.kel_mapel = ns.kel_mapel
            WHERE
                pr.rombel_kode = ?
            GROUP BY
                pd.nis, pd.nama_lengkap
            ORDER BY
                nil_rata_siswa DESC
        ", [
            $waliKelas->kode_rombel
        ]);

        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first(); // Ambil tahun ajaran aktif
        $persenKehadiran = $request->persen ?? 80;

        $ganjil = HariEfektif::where('tahun_ajaran_id', $tahunAjaran->id)
            ->where('semester', 'Ganjil')->get();
        $genap = HariEfektif::where('tahun_ajaran_id', $tahunAjaran->id)
            ->where('semester', 'Genap')->get();

        $rekapGanjil = $this->buildRekap($ganjil, $persenKehadiran);
        $rekapGenap = $this->buildRekap($genap, $persenKehadiran);

        // Kirim data ke view
        return view(
            'pages.walikelas.data-kelas',
            compact(
                'tahunAjaranAktif',
                'waliKelas',
                'personil',
                'semesterAngka',
                'titimangsa',
                'kbmData',
                'siswaData',
                'nilaiRataSiswa',
                'tahunAjaran',
                'persenKehadiran',
                'rekapGanjil',
                'rekapGenap',
            )
        );
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

    private function buildRekap($data, $persen)
    {
        $result = [];
        $total = ['jumlah' => 0, 'kehadiran_ideal' => 0, 'toleransi_alfa' => 0];

        foreach ($data as $item) {
            $jumlah = $item->jumlah_hari_efektif;
            $ideal = round($jumlah * $persen / 100);
            $alfa = $jumlah - $ideal;

            $result[] = [
                'bulan' => $item->bulan,
                'jumlah' => $jumlah,
                'kehadiran_ideal' => $ideal,
                'toleransi_alfa' => $alfa,
            ];

            $total['jumlah'] += $jumlah;
            $total['kehadiran_ideal'] += $ideal;
            $total['toleransi_alfa'] += $alfa;
        }

        return ['data' => $result, 'total' => $total];
    }

    public function simpantitimangsa(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_rombel' => 'required',
            'tahunajaran' => 'required',
            'ganjilgenap' => 'required',
            'semester' => 'required',
            'alamat' => 'required_if:titimangsa,!=,null', // Alamat wajib diisi jika titimangsa ada
            'titimangsa' => 'required|date',
        ]);

        // Cek apakah data sudah ada di tabel titi_mangsas
        $titimangsa = DB::table('titi_mangsas')
            ->where('kode_rombel', $request->kode_rombel)
            ->where('tahunajaran', $request->tahunajaran)
            ->where('ganjilgenap', $request->ganjilgenap)
            ->first();

        // Jika data sudah ada, lakukan update
        if ($titimangsa) {
            DB::table('titi_mangsas')
                ->where('id', $titimangsa->id)
                ->update([
                    'alamat' => $request->alamat,
                    'titimangsa' => $request->titimangsa,
                    'updated_at' => now(),
                ]);
            return redirect()->back()->with('success', 'Data berhasil diperbarui.');
        }

        // Jika belum ada, lakukan insert
        DB::table('titi_mangsas')->insert([
            'kode_rombel' => $request->kode_rombel,
            'tahunajaran' => $request->tahunajaran,
            'ganjilgenap' => $request->ganjilgenap,
            'semester' => $request->semester,
            'alamat' => $request->alamat,
            'titimangsa' => $request->titimangsa,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function downloadDataSiswa()
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
            // Ambil data dari tabel kbm_per_rombels berdasarkan kode_rombel
            $kbmData = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->get();

            // Ambil data siswa berdasarkan tahun ajaran, kode rombel, dan tingkat
            $siswaData = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
                ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
                ->where('peserta_didik_rombels.rombel_tingkat', $waliKelas->tingkat)
                ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap', 'peserta_didiks.kontak_email')
                ->get();
        } else {
            $kbmData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $siswaData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }

        // Generate PDF
        $pdf = FacadePdf::loadView('pages.walikelas.data-kelas-siswa', compact(
            'tahunAjaranAktif',
            'waliKelas',
            'personil',
            'semesterAngka',
            'kbmData',
            'siswaData'
        ));
        return $pdf->download('Username Kelas ' . $waliKelas->rombel . '.pdf');
    }

    public function downloadPDF()
    {
        $user = auth()->user();

        // Ambil data yang sama seperti di view
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');
            }])
            ->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $waliKelas = DB::table('rombongan_belajars')
            ->where('wali_kelas', $user->personal_id)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->first();

        if (!$waliKelas) {
            return redirect()->back()->with('error', 'Data wali kelas tidak ditemukan.');
        }

        $siswaData = DB::table('peserta_didik_rombels')
            ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
            ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
            ->select('peserta_didik_rombels.nis', 'peserta_didiks.nama_lengkap', 'peserta_didiks.kontak_email')
            ->get();

        $personil = DB::table('personil_sekolahs')
            ->where('id_personil', $waliKelas->wali_kelas)
            ->first();

        // Load view PDF
        $html = view('pages.walikelas.data-kelas-siswa-pdf', compact('siswaData', 'waliKelas', 'personil'))->render();

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Download file
        return $dompdf->stream("data-siswa-{$waliKelas->kode_rombel}.pdf");
    }

    public function downloadPDFRanking()
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

        // Jika wali kelas ditemukan, ambil data personil dan hitung semester angka
        $personil = null;
        $semesterAngka = null;
        $kenaikanExists = false;

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
            // Ambil data dari tabel kbm_per_rombels berdasarkan kode_rombel
            $kbmData = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $waliKelas->kode_rombel)
                ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
                ->where('ganjilgenap', $semesterAktif)
                ->get();

            // Ambil data siswa berdasarkan tahun ajaran, kode rombel, dan tingkat
            $siswaData = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunAjaranAktif->tahunajaran)
                ->where('peserta_didik_rombels.rombel_kode', $waliKelas->kode_rombel)
                ->where('peserta_didik_rombels.rombel_tingkat', $waliKelas->tingkat)
                ->select(
                    'peserta_didik_rombels.nis',
                    'peserta_didiks.nama_lengkap',
                    'peserta_didiks.jenis_kelamin',
                    'peserta_didiks.foto',
                    'peserta_didiks.kontak_email'
                )
                ->get();
        } else {
            $kbmData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
            $siswaData = collect(); // Jika wali kelas tidak ditemukan, kirim koleksi kosong
        }

        // Ambil data titi_mangsa jika sudah ada untuk wali kelas dan tahun ajaran aktif
        $titimangsa = DB::table('titi_mangsas')
            ->where('kode_rombel', $waliKelas->kode_rombel ?? '')
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif)
            ->first();

        $nilaiRataSiswa = DB::select("
            SELECT
                pd.nis,
                pd.nama_lengkap,
                ROUND(AVG(COALESCE(((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2), 0)), 2) AS nil_rata_siswa
            FROM
                peserta_didik_rombels pr
            INNER JOIN
                peserta_didiks pd ON pr.nis = pd.nis
            INNER JOIN
                kbm_per_rombels kr ON pr.rombel_kode = kr.kode_rombel
            LEFT JOIN
                nilai_formatif nf ON pr.nis = nf.nis
                    AND kr.kel_mapel = nf.kel_mapel
                    AND kr.tahunajaran = nf.tahunajaran
                    AND kr.ganjilgenap = nf.ganjilgenap
            LEFT JOIN
                nilai_sumatif ns ON pr.nis = ns.nis
                    AND kr.kel_mapel = ns.kel_mapel
                    AND kr.tahunajaran = ns.tahunajaran
                    AND kr.ganjilgenap = ns.ganjilgenap
            WHERE
                pr.rombel_kode = ?
                AND kr.tahunajaran = ?
                AND kr.ganjilgenap = ?
            GROUP BY
                pd.nis, pd.nama_lengkap
            ORDER BY
                nil_rata_siswa DESC
        ", [
            $waliKelas->kode_rombel,
            $tahunAjaranAktif->tahunajaran,
            $semesterAktif,
        ]);

        // Load view PDF
        $html = view('pages.walikelas.data-ranking-siswa-pdf', compact('siswaData', 'waliKelas', 'personil', 'nilaiRataSiswa'))->render();

        // Generate PDF
        $dompdf = new Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        // Download file
        return $dompdf->stream("data-ranking-siswa-{$waliKelas->kode_rombel}.pdf");
    }
}
