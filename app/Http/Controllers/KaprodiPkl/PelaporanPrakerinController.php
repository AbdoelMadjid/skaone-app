<?php

namespace App\Http\Controllers\KaprodiPkl;

use App\Http\Controllers\Controller;
use App\Models\User;
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
                ->select('id AS id_perusahaan', 'nama AS nama_perusahaan', 'alamat AS alamat_perusahaan')
                ->whereIn('id', $dataPrakerin->pluck('id_perusahaan')) // Filter berdasarkan perusahaan terkait
                ->groupBy('id', 'nama')
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



            $rekapJurnal = DB::table('penempatan_prakerins')
                ->leftJoin('jurnal_pkls', 'penempatan_prakerins.id', '=', 'jurnal_pkls.id_penempatan')
                ->join('peserta_didiks', 'penempatan_prakerins.nis', '=', 'peserta_didiks.nis')
                ->join('peserta_didik_rombels', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
                ->leftJoin('perusahaans', 'penempatan_prakerins.id_dudi', '=', 'perusahaans.id')
                ->leftJoin('pembimbing_prakerins', 'penempatan_prakerins.id', '=', 'pembimbing_prakerins.id_penempatan')
                ->leftJoin('personil_sekolahs', 'pembimbing_prakerins.id_personil', '=', 'personil_sekolahs.id_personil')
                ->select(
                    'peserta_didiks.nis',
                    'peserta_didiks.nama_lengkap',
                    'peserta_didik_rombels.rombel_nama AS rombel',
                    'perusahaans.nama AS nama_perusahaan',
                    DB::raw("COUNT(CASE WHEN jurnal_pkls.validasi = 'SUDAH' THEN 1 ELSE NULL END) AS sudah"),
                    DB::raw("COUNT(CASE WHEN jurnal_pkls.validasi = 'BELUM' THEN 1 ELSE NULL END) AS belum"),
                    DB::raw("COUNT(CASE WHEN jurnal_pkls.validasi = 'TOLAK' THEN 1 ELSE NULL END) AS tolak"),
                    DB::raw("COALESCE(personil_sekolahs.gelardepan, '') AS gelardepan"),
                    DB::raw("COALESCE(personil_sekolahs.namalengkap, 'Tidak Ada Pembimbing') AS pembimbing_nama"),
                    DB::raw("COALESCE(personil_sekolahs.gelarbelakang, '') AS gelarbelakang")
                )
                ->when($user->hasAnyRole(['kaprodiak']), function ($query) {
                    return $query->where('penempatan_prakerins.kode_kk', '=', '833');
                })
                ->when($user->hasAnyRole(['kaprodibd']), function ($query) {
                    return $query->where('penempatan_prakerins.kode_kk', '=', '811');
                })
                ->when($user->hasAnyRole(['kaprodimp']), function ($query) {
                    return $query->where('penempatan_prakerins.kode_kk', '=', '821');
                })
                ->when($user->hasAnyRole(['kaprodirpl']), function ($query) {
                    return $query->where('penempatan_prakerins.kode_kk', '=', '411');
                })
                ->when($user->hasAnyRole(['kaproditkj']), function ($query) {
                    return $query->where('penempatan_prakerins.kode_kk', '=', '421');
                })
                ->groupBy('peserta_didiks.nis', 'peserta_didiks.nama_lengkap', 'peserta_didik_rombels.rombel_nama', 'perusahaans.nama', 'personil_sekolahs.gelardepan', 'personil_sekolahs.namalengkap', 'personil_sekolahs.gelarbelakang')
                ->orderBy('peserta_didik_rombels.rombel_nama', 'asc')
                ->orderBy('peserta_didiks.nis', 'asc')
                ->get();


            $dataJurnal = $dataPrakerin->map(function ($prakerin) use ($rekapJurnal) {
                // Temukan data jurnal berdasarkan NIS
                $jurnal = $rekapJurnal->firstWhere('nis', $prakerin->nis);
                // Gabungkan data
                $prakerin->rekap_jurnal = $jurnal;
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
            $dataAbsensi = $dataPrakerin->map(function ($siswa) use ($absensi) {
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

            // Setelah dataPrakerin selesai diproses, Anda bisa menampilkannya di Blade

            // Kirim data ke view
            return view('pages.kaprodipkl.pelaporan-prakerin', compact(
                'dataPrakerin',
                'AmbildataPrakerin',
                'perusahaanList',
                'pembimbingList',
                'perusahaanCounts',
                'pembimbingCounts',
                'totalDataPrakerin',
                'totalPerusahaan',
                'totalPembimbing',
                'rekapJurnal',
                'dataJurnal',
                'dataAbsensi'
            ));
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
}
