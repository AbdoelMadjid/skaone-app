<?php

namespace App\Http\Controllers\Pkl\KaprodiPkl;

use App\Http\Controllers\Controller;
use App\Models\Pkl\PesertaDidikPkl\JurnalPkl;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PelaporanPrakerinController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Pastikan user sudah login
        if (auth()->check()) {
            $user = User::find(Auth::user()->id); // Mendapatkan user yang sedang login

            // Mulai query dasar
            $query = DB::table('penempatan_prakerins')
                ->select(
                    'penempatan_prakerins.tahunajaran',
                    'penempatan_prakerins.kode_kk',
                    'kompetensi_keahlians.nama_kk',
                    'program_keahlians.nama_pk', // ← ambil nama program keahlian
                    'peserta_didiks.nis',
                    'peserta_didiks.nama_lengkap',
                    'peserta_didik_rombels.rombel_nama AS rombel',
                    'perusahaans.id AS id_perusahaan',
                    'perusahaans.nama AS nama_perusahaan',
                    'perusahaans.alamat AS alamat_perusahaan',
                    'perusahaans.jabatan AS jabatan_pembimbing',
                    'perusahaans.nama_pembimbing AS nama_pembimbing',
                    'perusahaans.nip AS nip_pembimbing',
                    'perusahaans.nidn AS nidn_pembimbing',
                    'pembimbing_prakerins.id_personil',
                    'personil_sekolahs.nip',
                    'personil_sekolahs.gelardepan',
                    'personil_sekolahs.namalengkap',
                    'personil_sekolahs.gelarbelakang'
                )
                ->join('kompetensi_keahlians', 'penempatan_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
                ->join('program_keahlians', 'kompetensi_keahlians.id_pk', '=', 'program_keahlians.idpk') // ← Tambahkan JOIN ini
                ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
                ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
                ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
                ->join('pembimbing_prakerins', 'penempatan_prakerins.id', '=', 'pembimbing_prakerins.id_penempatan')
                ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil');

            // Cek role user menggunakan hasAnyRole dan tambahkan filter kode_kk
            if ($user->hasAnyRole(['kaprodiak'])) {
                $query->where('penempatan_prakerins.kode_kk', '=', '833');
            } elseif ($user->hasAnyRole(['kaprodibd'])) {
                $query->where('penempatan_prakerins.kode_kk', '=', '811');
            } elseif ($user->hasAnyRole(['kaprodimp'])) {
                $query->where('penempatan_prakerins.kode_kk', '=', '821');
            } elseif ($user->hasAnyRole(['kaprodirpl'])) {
                $query->where('penempatan_prakerins.kode_kk', '=', '411');
            } elseif ($user->hasAnyRole(['kaproditkj'])) {
                $query->where('penempatan_prakerins.kode_kk', '=', '421');
            }

            // Eksekusi query dan dapatkan hasil
            $dataPrakerin = $query->get();
            $AmbildataPrakerin = $query->first();
            $totalDataPrakerin = $dataPrakerin->count();

            // Dapatkan daftar perusahaan unik berdasarkan hasil query
            $perusahaanList = DB::table('perusahaans')
                ->select('id AS id_perusahaan', 'nama AS nama_perusahaan', 'alamat AS alamat_perusahaan', 'jabatan AS jabatan_pembimbing', 'nama_pembimbing AS pembimbing_perusahaan')
                ->whereIn('id', $dataPrakerin->pluck('id_perusahaan')) // Filter berdasarkan perusahaan terkait
                ->groupBy('id', 'nama', 'alamat', 'jabatan', 'nama_pembimbing')
                ->get();

            // Jumlah total perusahaan dalam $perusahaanList
            $totalPerusahaan = $perusahaanList->count();

            // Hitung jumlah setiap id_perusahaan di $dataPrakerin
            $perusahaanCounts = $dataPrakerin
                ->groupBy('id_perusahaan')
                ->map(fn($items) => $items->count());

            // Query untuk daftar pembimbing unik
            $pembimbingList = DB::table('personil_sekolahs')
                ->select(
                    'personil_sekolahs.id_personil',
                    'personil_sekolahs.nip',
                    'personil_sekolahs.gelardepan',
                    'personil_sekolahs.namalengkap',
                    'personil_sekolahs.gelarbelakang'
                )
                ->whereIn('id_personil', $dataPrakerin->pluck('id_personil'))
                ->groupBy('id_personil', 'nip', 'gelardepan', 'namalengkap', 'gelarbelakang')
                ->get();

            // Jumlah total pembimbing dalam $pembimbingList
            $totalPembimbing = $pembimbingList->count();

            // Hitung jumlah setiap id_personil di $dataPrakerin
            $pembimbingCounts = $dataPrakerin
                ->groupBy('id_personil')
                ->map(fn($items) => $items->count());

            // Ambil data jurnal dengan lebih sederhana
            $rekapJurnal = DB::table('jurnal_pkls')
                ->join('penempatan_prakerins', 'penempatan_prakerins.id', '=', 'jurnal_pkls.id_penempatan')
                ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
                ->select(
                    'peserta_didiks.nis',
                    DB::raw("SUM(CASE WHEN jurnal_pkls.validasi = 'SUDAH' THEN 1 ELSE 0 END) AS jumlah_sudah"),
                    DB::raw("SUM(CASE WHEN jurnal_pkls.validasi = 'BELUM' THEN 1 ELSE 0 END) AS jumlah_belum"),
                    DB::raw("SUM(CASE WHEN jurnal_pkls.validasi = 'TOLAK' THEN 1 ELSE 0 END) AS jumlah_tolak")
                )
                ->groupBy('peserta_didiks.nis')
                ->get()
                ->keyBy('nis');  // Agar hasil bisa diakses langsung berdasarkan nis

            // Gabungkan data jurnal dengan data siswa
            $dataPrakerin = $dataPrakerin->map(function ($prakerin) use ($rekapJurnal) {
                $nis = $prakerin->nis;

                // Ambil data jurnal berdasarkan nis
                $jurnalData = $rekapJurnal[$nis] ?? null;

                // Jika ada data jurnal, gabungkan dengan data siswa
                if ($jurnalData) {
                    $prakerin->jumlah_sudah = $jurnalData->jumlah_sudah ?? 0;
                    $prakerin->jumlah_belum = $jurnalData->jumlah_belum ?? 0;
                    $prakerin->jumlah_tolak = $jurnalData->jumlah_tolak ?? 0;
                } else {
                    // Jika tidak ada data jurnal, set ke nilai default 0
                    $prakerin->jumlah_sudah = 0;
                    $prakerin->jumlah_belum = 0;
                    $prakerin->jumlah_tolak = 0;
                }

                return $prakerin;
            });

            $absensi = DB::table('absensi_siswa_pkls')
                ->select(
                    'nis',
                    DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                    DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                    DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                    DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
                )
                ->groupBy('nis')
                ->get()
                ->keyBy('nis'); // Agar hasil bisa diakses langsung dengan nis sebagai key

            // Gabungkan data absensi dengan data siswa
            $dataPrakerin = $dataPrakerin->map(function ($siswa) use ($absensi) {
                $nis = $siswa->nis;

                // Ambil data absensi yang sesuai dengan nis
                $absensiData = $absensi[$nis] ?? null;

                // Jika ada data absensi, gabungkan dengan data siswa
                if ($absensiData) {
                    $siswa->jumlah_hadir = $absensiData->jumlah_hadir ?? 0;
                    $siswa->jumlah_sakit = $absensiData->jumlah_sakit ?? 0;
                    $siswa->jumlah_izin = $absensiData->jumlah_izin ?? 0;
                    $siswa->jumlah_alfa = $absensiData->jumlah_alfa ?? 0;
                } else {
                    // Jika tidak ada data absensi, set ke nilai default 0
                    $siswa->jumlah_hadir = 0;
                    $siswa->jumlah_sakit = 0;
                    $siswa->jumlah_izin = 0;
                    $siswa->jumlah_alfa = 0;
                }

                // Hitung total absensi (jumlah_sakit + jumlah_izin + jumlah_alfa)
                $siswa->jumlah_total = $siswa->jumlah_hadir + $siswa->jumlah_sakit + $siswa->jumlah_izin + $siswa->jumlah_alfa;

                return $siswa;
            });


            // Query jumlah jurnal berdasarkan NIS
            $jumlahJurnal = DB::table('jurnal_pkls')
                ->select(
                    'penempatan_prakerins.nis',
                    DB::raw("COUNT(jurnal_pkls.id) as total_jurnal")
                )
                ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                ->groupBy('penempatan_prakerins.nis')
                ->get()
                ->keyBy('nis');

            // Query elemen dari modul_ajars dan capaian_pembelajarans
            $elements = DB::table('modul_ajars')
                ->join('capaian_pembelajarans', 'modul_ajars.kode_cp', '=', 'capaian_pembelajarans.kode_cp')
                ->select(
                    'modul_ajars.kode_cp',
                    'capaian_pembelajarans.element',
                    DB::raw("GROUP_CONCAT(modul_ajars.isi_tp) as isi_tp")
                )
                ->groupBy('modul_ajars.kode_cp', 'capaian_pembelajarans.element')
                ->get();

            // Query untuk jurnal dan elemen
            $journals = DB::table('jurnal_pkls')
                ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                ->select(
                    'penempatan_prakerins.nis',
                    'jurnal_pkls.element',
                    DB::raw("COUNT(jurnal_pkls.id) as total_jurnal_cp")
                )
                ->groupBy('penempatan_prakerins.nis', 'jurnal_pkls.element')
                ->get();

            // Gabungkan data absensi dan jurnal
            $dataPrakerin = $dataPrakerin->map(function ($siswa) use ($jumlahJurnal, $elements, $journals) {
                $nis = $siswa->nis;

                // Jumlah jurnal total
                $siswa->total_jurnal = $jumlahJurnal[$nis]->total_jurnal ?? 0;

                // Gabungkan elemen dengan jurnal
                $siswa->jurnal_per_elemen = $elements->map(function ($element) use ($journals, $nis) {
                    $kode_cp = $element->kode_cp;

                    // Ambil jumlah jurnal dari hasil query jurnal
                    $jurnal = $journals->where('nis', $nis)->where('element', $kode_cp)->first();

                    return [
                        'element' => $element->element,
                        'isi_tp' => $element->isi_tp,
                        'total_jurnal_cp' => $jurnal->total_jurnal_cp ?? 0 // Default 0 jika tidak ada jurnal
                    ];
                });

                return $siswa;
            });

            // Ambil data peserta berdasarkan pembimbing
            $pesertaByPembimbing = $dataPrakerin
                ->groupBy('id_personil')
                ->map(function ($peserta) {
                    return $peserta->map(fn($item) => [
                        'nis' => $item->nis,
                        'nama_lengkap' => $item->nama_lengkap,
                        'rombel' => $item->rombel,
                        'nama_perusahaan' => $item->nama_perusahaan,
                    ]);
                });

            // Ambil data peserta berdasarkan perusahaan
            $pesertaByPerusahaan = $dataPrakerin
                ->groupBy('id_perusahaan')
                ->map(function ($peserta) {
                    return $peserta->map(function ($item) {
                        return [
                            'nis' => $item->nis,
                            'nama_lengkap' => $item->nama_lengkap,
                            'rombel' => $item->rombel,
                            'nama_pembimbing' => $item->namalengkap,  // Tambahkan nama pembimbing
                        ];
                    });
                });

            $rekapJurnalPerbulan = DB::table('jurnal_pkls')
                ->select(
                    'penempatan_prakerins.nis',
                    DB::raw('YEAR(tanggal_kirim) as tahun'),
                    DB::raw('MONTH(tanggal_kirim) as bulan'),
                    DB::raw('COUNT(CASE WHEN validasi = "sudah" THEN 1 END) as sudah'),
                    DB::raw('COUNT(CASE WHEN validasi = "belum" THEN 1 END) as belum'),
                    DB::raw('COUNT(CASE WHEN validasi = "tolak" THEN 1 END) as tolak')
                )
                ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                ->groupBy('penempatan_prakerins.nis', DB::raw('YEAR(tanggal_kirim), MONTH(tanggal_kirim)'))
                ->orderBy('penempatan_prakerins.nis')
                ->orderBy(DB::raw('YEAR(tanggal_kirim)'))
                ->orderBy(DB::raw('MONTH(tanggal_kirim)'))
                ->get();

            $dataPrakerin = $dataPrakerin->map(function ($siswa) use ($rekapJurnalPerbulan) {
                $nis = $siswa->nis;

                // Filter data jurnal berdasarkan NIS
                $jurnalPerNIS = $rekapJurnalPerbulan->where('nis', $nis);

                // Gabungkan data jurnal per bulan
                $siswa->rekap_jurnal = $jurnalPerNIS->map(function ($jurnal) {
                    return [
                        'tahun' => $jurnal->tahun,
                        'bulan' => $jurnal->bulan,
                        'sudah' => $jurnal->sudah,
                        'belum' => $jurnal->belum,
                        'tolak' => $jurnal->tolak,
                    ];
                });

                return $siswa;
            });


            $nilaiPrakerin = DB::table('nilai_prakerin')
                ->select(
                    'nis',
                    DB::raw('ROUND((COALESCE(absen,0) + COALESCE(cp1,0) + COALESCE(cp2,0) + COALESCE(cp3,0) + COALESCE(cp4,0)) / 5, 2) as rata_rata')
                )
                ->get()
                ->keyBy('nis');

            $dataPrakerin = $dataPrakerin->map(function ($prakerin) use ($nilaiPrakerin) {
                $nis = $prakerin->nis;

                $nilai = $nilaiPrakerin[$nis] ?? null;
                $prakerin->rata_rata_prakerin = $nilai->rata_rata ?? 0;

                return $prakerin;
            });


            // Perform the query using the kode_kk value
            $dataJurnal = DB::table('jurnal_pkls')
                ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
                ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
                ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
                ->join('peserta_didik_rombels', 'penempatan_prakerins.nis', '=', 'peserta_didik_rombels.nis')
                ->select(
                    'jurnal_pkls.id',
                    'penempatan_prakerins.tahunajaran',
                    'penempatan_prakerins.kode_kk',
                    'penempatan_prakerins.nis',
                    'peserta_didiks.nama_lengkap',
                    'peserta_didik_rombels.rombel_nama',
                    'penempatan_prakerins.id_dudi',
                    'perusahaans.nama',
                    'perusahaans.alamat',
                    'jurnal_pkls.id_penempatan',
                    'jurnal_pkls.tanggal_kirim',
                    'jurnal_pkls.validasi'
                )
                ->whereIn('penempatan_prakerins.kode_kk', $dataPrakerin->pluck('kode_kk')->toArray()) // Filter berdasarkan kode_kk di $dataPrakerin
                ->orderBy('penempatan_prakerins.kode_kk')
                ->orderBy('peserta_didik_rombels.rombel_nama')
                ->orderBy('penempatan_prakerins.nis')
                ->orderBy('jurnal_pkls.tanggal_kirim', 'desc')
                ->get();

            // Kirim data ke view
            return view('pages.pkl.kaprodipkl.pelaporan-prakerin', [
                'dataPrakerin' => $dataPrakerin,
                'AmbildataPrakerin' => $AmbildataPrakerin,
                'perusahaanList' => $perusahaanList,
                'pembimbingList' => $pembimbingList,
                'perusahaanCounts' => $perusahaanCounts,
                'pembimbingCounts' => $pembimbingCounts,
                'totalDataPrakerin' => $totalDataPrakerin,
                'totalPerusahaan' => $totalPerusahaan,
                'totalPembimbing' =>    $totalPembimbing,
                'pesertaByPembimbing' => $pesertaByPembimbing,
                'pesertaByPerusahaan' => $pesertaByPerusahaan,
                'dataJurnal' => $dataJurnal,
            ]);
        }

        // Jika user tidak login, redirect ke halaman login
        return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
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

    public function downloadJurnalPdf()
    {
        // Ambil data sesuai query Anda
        $user = User::find(Auth::user()->id);
        $query = DB::table('penempatan_prakerins')
            ->select(
                'penempatan_prakerins.tahunajaran',
                'penempatan_prakerins.kode_kk',
                'kompetensi_keahlians.nama_kk',
                'peserta_didiks.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama AS rombel',
                'perusahaans.id AS id_perusahaan',
                'perusahaans.nama AS nama_perusahaan',
                'perusahaans.alamat AS alamat_perusahaan',
                'pembimbing_prakerins.id_personil',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang'
            )
            ->join('kompetensi_keahlians', 'penempatan_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('pembimbing_prakerins', 'penempatan_prakerins.id', '=', 'pembimbing_prakerins.id_penempatan')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil');

        // Filter berdasarkan role user
        if ($user->hasAnyRole(['kaprodiak'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '833');
        } elseif ($user->hasAnyRole(['kaprodibd'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '811');
        } elseif ($user->hasAnyRole(['kaprodimp'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '821');
        } elseif ($user->hasAnyRole(['kaprodirpl'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '411');
        } elseif ($user->hasAnyRole(['kaproditkj'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '421');
        }

        // Ambil data
        $dataPrakerin = $query->get();

        // Ambil data jurnal
        $rekapJurnal = DB::table('jurnal_pkls')
            ->join('penempatan_prakerins', 'penempatan_prakerins.id', '=', 'jurnal_pkls.id_penempatan')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->select(
                'peserta_didiks.nis',
                DB::raw("SUM(CASE WHEN jurnal_pkls.validasi = 'SUDAH' THEN 1 ELSE 0 END) AS jumlah_sudah"),
                DB::raw("SUM(CASE WHEN jurnal_pkls.validasi = 'BELUM' THEN 1 ELSE 0 END) AS jumlah_belum"),
                DB::raw("SUM(CASE WHEN jurnal_pkls.validasi = 'TOLAK' THEN 1 ELSE 0 END) AS jumlah_tolak")
            )
            ->groupBy('peserta_didiks.nis')
            ->get()
            ->keyBy('nis');  // Agar hasil bisa diakses langsung berdasarkan nis

        // Gabungkan data jurnal dengan data siswa
        $dataPrakerin = $dataPrakerin->map(function ($prakerin) use ($rekapJurnal) {
            $nis = $prakerin->nis;
            $jurnalData = $rekapJurnal[$nis] ?? null;

            $prakerin->jumlah_sudah = $jurnalData->jumlah_sudah ?? 0;
            $prakerin->jumlah_belum = $jurnalData->jumlah_belum ?? 0;
            $prakerin->jumlah_tolak = $jurnalData->jumlah_tolak ?? 0;

            return $prakerin;
        });


        // Buat PDF dari view dan data yang ada
        $pdf = Pdf::loadView('pages.pkl.kaprodipkl.pelaporan-prakerin-jurnal-pdf', [
            'dataPrakerin' => $dataPrakerin,
        ]);

        // Download PDF
        return $pdf->download('Laporan Prakerin Jurnal.pdf');
    }

    public function downloadAbsensiPdf()
    {
        // Ambil data sesuai query Anda
        $user = User::find(Auth::user()->id);
        $query = DB::table('penempatan_prakerins')
            ->select(
                'penempatan_prakerins.tahunajaran',
                'penempatan_prakerins.kode_kk',
                'kompetensi_keahlians.nama_kk',
                'peserta_didiks.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didik_rombels.rombel_nama AS rombel',
                'perusahaans.id AS id_perusahaan',
                'perusahaans.nama AS nama_perusahaan',
                'perusahaans.alamat AS alamat_perusahaan',
                'pembimbing_prakerins.id_personil',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang'
            )
            ->join('kompetensi_keahlians', 'penempatan_prakerins.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->join('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
            ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
            ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->join('pembimbing_prakerins', 'penempatan_prakerins.id', '=', 'pembimbing_prakerins.id_penempatan')
            ->join('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil');

        // Filter berdasarkan role user
        if ($user->hasAnyRole(['kaprodiak'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '833');
        } elseif ($user->hasAnyRole(['kaprodibd'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '811');
        } elseif ($user->hasAnyRole(['kaprodimp'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '821');
        } elseif ($user->hasAnyRole(['kaprodirpl'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '411');
        } elseif ($user->hasAnyRole(['kaproditkj'])) {
            $query->where('penempatan_prakerins.kode_kk', '=', '421');
        }

        // Ambil data
        $dataPrakerin = $query->get();

        $absensi = DB::table('absensi_siswa_pkls')
            ->select(
                'nis',
                DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"),
                DB::raw("SUM(CASE WHEN status = 'SAKIT' THEN 1 ELSE 0 END) as jumlah_sakit"),
                DB::raw("SUM(CASE WHEN status = 'IZIN' THEN 1 ELSE 0 END) as jumlah_izin"),
                DB::raw("SUM(CASE WHEN status = 'ALFA' THEN 1 ELSE 0 END) as jumlah_alfa")
            )
            ->groupBy('nis')
            ->get()
            ->keyBy('nis'); // Agar hasil bisa diakses langsung dengan nis sebagai key

        // Gabungkan data absensi dengan data siswa
        $dataPrakerin = $dataPrakerin->map(function ($siswa) use ($absensi) {
            $nis = $siswa->nis;

            // Ambil data absensi yang sesuai dengan nis
            $absensiData = $absensi[$nis] ?? null;

            // Jika ada data absensi, gabungkan dengan data siswa
            if ($absensiData) {
                $siswa->jumlah_hadir = $absensiData->jumlah_hadir ?? 0;
                $siswa->jumlah_sakit = $absensiData->jumlah_sakit ?? 0;
                $siswa->jumlah_izin = $absensiData->jumlah_izin ?? 0;
                $siswa->jumlah_alfa = $absensiData->jumlah_alfa ?? 0;
            } else {
                // Jika tidak ada data absensi, set ke nilai default 0
                $siswa->jumlah_hadir = 0;
                $siswa->jumlah_sakit = 0;
                $siswa->jumlah_izin = 0;
                $siswa->jumlah_alfa = 0;
            }

            // Hitung total absensi (jumlah_sakit + jumlah_izin + jumlah_alfa)
            $siswa->jumlah_total = $siswa->jumlah_hadir + $siswa->jumlah_sakit + $siswa->jumlah_izin + $siswa->jumlah_alfa;

            return $siswa;
        });

        // Buat PDF dari view dan data yang ada
        $pdf = Pdf::loadView('pages.pkl.kaprodipkl.pelaporan-prakerin-absensi-pdf', [
            'dataPrakerin' => $dataPrakerin,
        ]);

        // Download PDF
        return $pdf->download('Laporan Prakerin Abensi.pdf');
    }

    public function updateTanggalKirim(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_jurnal' => 'required|exists:jurnal_pkls,id',
            'tanggal_kirim' => 'required|date',
        ]);

        // Cari jurnal berdasarkan ID dan update tanggal_kirim
        $jurnal = JurnalPkl::find($request->id_jurnal);
        $jurnal->tanggal_kirim = $request->tanggal_kirim;
        $jurnal->save();

        // Kembalikan response sukses
        return response()->json(['status' => 'success']);
    }
}
