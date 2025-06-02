<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\PerangkatUjian\DaftarPengawasUjian;
use App\Models\Kurikulum\PerangkatUjian\DenahRuanganUjian;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\PanitiaUjian;
use App\Models\Kurikulum\PerangkatUjian\PenandaDenah;
use App\Models\Kurikulum\PerangkatUjian\PenandaRuangan;
use App\Models\Kurikulum\PerangkatUjian\PengawasUjian;
use App\Models\Kurikulum\PerangkatUjian\RuangUjian;
use App\Models\Kurikulum\PerangkatUjian\TokenSoalUjian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelaksanaanUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $identitasUjian = IdentitasUjian::where('status', 'Aktif')->first(); // Ambil 1 data aktif

        $ruangs = RuangUjian::select('nomor_ruang')->distinct()->pluck('nomor_ruang');

        $rombels = DB::table('rombongan_belajars')->pluck('rombel', 'kode_rombel');

        $pesertaUjians = [];


        if ($identitasUjian) {
            $pesertaUjians = DB::table('peserta_ujians')
                ->join('peserta_didiks', 'peserta_ujians.nis', '=', 'peserta_didiks.nis')
                ->join('rombongan_belajars', 'peserta_ujians.kelas', '=', 'rombongan_belajars.kode_rombel')
                ->where('peserta_ujians.kode_ujian', $identitasUjian->kode_ujian)
                ->select(
                    'peserta_ujians.kode_ujian',
                    'peserta_ujians.nis',
                    'peserta_didiks.nama_lengkap',
                    'rombongan_belajars.rombel',
                    'peserta_ujians.nomor_peserta',
                    'peserta_ujians.nomor_ruang',
                    'peserta_ujians.kode_posisi_kelas',
                    'peserta_ujians.posisi_duduk'
                )
                ->get();
        }

        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();

        $dataRuang = RuangUjian::where('kode_ujian', $ujianAktif->kode_ujian)->get()->map(function ($item) use ($ujianAktif) {
            $kelasKiri = RombonganBelajar::where('kode_rombel', $item->kelas_kiri)
                ->where('tahunajaran', $ujianAktif->tahun_ajaran)->first();
            $kelasKanan = RombonganBelajar::where('kode_rombel', $item->kelas_kanan)
                ->where('tahunajaran', $ujianAktif->tahun_ajaran)->first();

            // Hitung siswa posisi_duduk 'kiri' di kelas kiri
            $jumlahSiswaKiri = DB::table('peserta_ujians')
                ->where('kode_ujian', $ujianAktif->kode_ujian)
                ->where('kode_posisi_kelas', $item->kode_kelas_kiri)
                ->where('posisi_duduk', 'kiri')
                ->count();

            // Hitung siswa posisi_duduk 'kanan' di kelas kanan
            $jumlahSiswaKanan = DB::table('peserta_ujians')
                ->where('kode_ujian', $ujianAktif->kode_ujian)
                ->where('kode_posisi_kelas', $item->kode_kelas_kanan)
                ->where('posisi_duduk', 'kanan')
                ->count();

            $item->kelas_kiri_nama = $kelasKiri->rombel ?? '-';
            $item->kelas_kanan_nama = $kelasKanan->rombel ?? '-';
            $item->jumlah_siswa_kiri = $jumlahSiswaKiri;
            $item->jumlah_siswa_kanan = $jumlahSiswaKanan;
            $item->jumlah_total = ($jumlahSiswaKanan + $jumlahSiswaKiri);
            return $item;
        });

        $pesertaUjianTable = DB::table('peserta_ujians')
            ->join('peserta_didiks', 'peserta_ujians.nis', '=', 'peserta_didiks.nis')
            ->join('rombongan_belajars', 'peserta_ujians.kelas', '=', 'rombongan_belajars.kode_rombel')
            ->where('peserta_ujians.kode_ujian', $ujianAktif->kode_ujian)
            ->select(
                'peserta_ujians.kode_ujian',
                'peserta_ujians.nis',
                'peserta_ujians.kelas',
                'peserta_didiks.nama_lengkap',
                'rombongan_belajars.rombel',
                'peserta_ujians.nomor_peserta',
                'peserta_ujians.nomor_ruang',
                'peserta_ujians.kode_posisi_kelas',
                'peserta_ujians.posisi_duduk'
            )
            ->get();

        $rekapKelas = collect($pesertaUjianTable)
            ->groupBy('rombel')
            ->sortKeys()
            ->map(function ($group, $rombel) {
                $jumlahKiri = $group->where('posisi_duduk', 'kiri')->count();
                $jumlahKanan = $group->where('posisi_duduk', 'kanan')->count();
                $ruang = $group->pluck('nomor_ruang')->unique()->sort()->implode(', ');
                $kelas = $group->first()->kelas; // ambil nilai kelas dari item pertama

                return [
                    'rombel' => $rombel,
                    'kelas' => $kelas, // ← tambahkan ini
                    'jumlah_kiri' => $jumlahKiri,
                    'jumlah_kanan' => $jumlahKanan,
                    'ruang' => $ruang,
                    'total' => $group->count(),
                ];
            })->values();

        /* // tampilkan data jadwal ujian
        $kompetensiKeahlian = KompetensiKeahlian::all();
        $kompetensiKeahlianOption = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $tanggalUjian = [];
        $tanggalUjianOption = [];

        if ($ujianAktif) {
            $tanggalUjian = collect(
                \Carbon\CarbonPeriod::create($ujianAktif->tgl_ujian_awal, $ujianAktif->tgl_ujian_akhir)
            )->map(fn($date) => $date->toDateString());

            $tanggalUjianOption = $tanggalUjian->mapWithKeys(function ($date) {
                return [$date => \Carbon\Carbon::parse($date)->translatedFormat('l, d M Y')];
            })->toArray();
        }

        $tingkat = request()->get('tingkat', 10); // default ke 10 jika tidak dipilih

        // Ambil semua kode_kk yang tersedia di jadwal_ujians tingkat 10
        $kodeKKList = JadwalUjian::where('tingkat', $tingkat)
            ->pluck('kode_kk')
            ->unique()
            ->values()
            ->toArray();

        // Ambil data singkatan berdasarkan kode_kk
        $singkatanKK = KompetensiKeahlian::whereIn('idkk', $kodeKKList)
            ->pluck('singkatan', 'idkk')
            ->toArray();

        // Ambil seluruh jadwal ujian sesuai syarat
        $jadwalList = JadwalUjian::where('tingkat', $tingkat)
            ->whereIn('tanggal', $tanggalUjian)
            ->orderBy('tanggal')
            ->orderBy('jam_ke')
            ->get();

        // Susun berdasarkan tanggal → jam_ke → kode_kk
        $jadwalByTanggal = [];

        foreach ($jadwalList as $jadwal) {
            $tanggal = $jadwal->tanggal;
            $jamKe = $jadwal->jam_ke;
            $kodeKK = $jadwal->kode_kk;
            $jamUjian = $jadwal->jam_ujian;
            $mapel = $jadwal->mata_pelajaran;

            $jadwalByTanggal[$tanggal][$jamKe]['pukul'] = $jamUjian;
            $jadwalByTanggal[$tanggal][$jamKe][$kodeKK] = $mapel;
        } */

        $ruangUjian = RuangUjian::orderByRaw('CAST(nomor_ruang AS UNSIGNED) ASC')->get();
        $ujianYangAktif = IdentitasUjian::where('status', 'aktif')->first();

        $tanggalUjian = collect();
        $tanggalUjianOption = [];

        if ($ujianYangAktif) {
            $tanggalUjian = collect(CarbonPeriod::create($ujianYangAktif->tgl_ujian_awal, $ujianYangAktif->tgl_ujian_akhir))
                ->map(fn($date) => $date->toDateString());

            $tanggalUjianOption = $tanggalUjian->mapWithKeys(function ($date) {
                return [$date => Carbon::parse($date)->translatedFormat('l, d M Y')];
            })->toArray();
        }

        $pengawas = PengawasUjian::all()->groupBy(function ($item) {
            return $item->nomor_ruang . '_' . $item->tanggal_ujian . '_' . $item->jam_ke;
        });

        $daftarPengawas = DaftarPengawasUjian::where('kode_ujian', $ujianYangAktif->kode_ujian)
            ->orderByRaw('CAST(kode_pengawas AS UNSIGNED) ASC')
            ->get();


        $tanggalList = PengawasUjian::select('tanggal_ujian')->distinct()->orderBy('tanggal_ujian')->pluck('tanggal_ujian');
        $jamKeList = PengawasUjian::select('jam_ke')->distinct()->orderBy('jam_ke')->pluck('jam_ke');

        $panitiaUjian = PanitiaUjian::where('kode_ujian', $ujianAktif->kode_ujian)->get();

        // Ambil semua penanda denah ruangan
        $penanda = DenahRuanganUjian::all();

        return view('pages.kurikulum.perangkatujian.pelaksanaan-ujian', [
            'identitasUjian' => $identitasUjian,
            'ruangs' => $ruangs,
            'pesertaUjians' => $pesertaUjians,
            'rombels' => $rombels,
            'dataRuang' => $dataRuang,
            'pesertaUjianTable' => $pesertaUjianTable,
            'rekapKelas' => $rekapKelas,
            'ruangUjian' => $ruangUjian,
            'tanggalUjian' => $tanggalUjian,
            'tanggalUjianOption' => $tanggalUjianOption,
            'pengawas' => $pengawas,
            'daftarPengawas' => $daftarPengawas,
            'tanggalList' => $tanggalList,
            'jamKeList' => $jamKeList,
            'panitiaUjian' => $panitiaUjian,
            'panitiaUjian' => $panitiaUjian,
            'penanda' => $penanda,
            //tampildata kelas
            /* 'jadwalByTanggal' => $jadwalByTanggal,
            'tanggalUjianOption' => $tanggalUjianOption,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'kompetensiKeahlianOption' => $kompetensiKeahlianOption,
            'kodeKKList' => $kodeKKList,
            'singkatanKK' => $singkatanKK,
            'tingkat' => $tingkat, */
        ]);
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

    public function getByRuang(Request $request)
    {
        $nomorRuang = $request->nomor_ruang;
        $posisiDuduk = $request->posisi_duduk;

        $ujianAktif = IdentitasUjian::where('status', 'Aktif')->first();
        if (!$ujianAktif) {
            return response('<div class="alert alert-warning">Ujian aktif tidak ditemukan.</div>');
        }

        $pesertas = DB::table('peserta_ujians')
            ->join('peserta_didiks', 'peserta_ujians.nis', '=', 'peserta_didiks.nis')
            ->join('rombongan_belajars', 'peserta_ujians.kelas', '=', 'rombongan_belajars.kode_rombel')
            ->where('peserta_ujians.kode_ujian', $ujianAktif->kode_ujian)
            ->where('peserta_ujians.nomor_ruang', $nomorRuang)
            ->where('peserta_ujians.posisi_duduk', $posisiDuduk) // tambahkan filter ini
            ->select(
                'peserta_ujians.nomor_peserta',
                'peserta_ujians.nomor_ruang',
                'peserta_ujians.nis',
                'peserta_didiks.nama_lengkap',
                'rombongan_belajars.rombel'
            )
            ->get();

        return view('pages.kurikulum.perangkatujian.halamanpelaksanaan.daftar-hadir-peserta-tampil', compact('pesertas', 'ujianAktif'))->render();
    }

    public function getPengawasSesi(Request $request)
    {
        $tanggal = $request->input('tanggal');
        $jamKe = $request->input('jam_ke');

        $data = PengawasUjian::join('daftar_pengawas_ujian', 'pengawas_ujians.kode_pengawas', '=', 'daftar_pengawas_ujian.kode_pengawas')
            ->select(
                'pengawas_ujians.nomor_ruang',
                DB::raw("COALESCE(daftar_pengawas_ujian.nip, '-') as nip"),
                'daftar_pengawas_ujian.nama_lengkap',
                'pengawas_ujians.kode_pengawas'
            )
            ->where('pengawas_ujians.nomor_ruang', '!=', 'CAD') // <- ini tambahan filter
            ->when($tanggal, fn($q) => $q->where('pengawas_ujians.tanggal_ujian', $tanggal))
            ->when($jamKe, fn($q) => $q->where('pengawas_ujians.jam_ke', $jamKe))
            ->orderByRaw('CAST(nomor_ruang AS UNSIGNED) ASC')
            ->get();

        return response()->json($data);
    }

    public function filterToken(Request $request)
    {
        $tanggal = $request->query('tanggal');
        $jamKe = $request->query('jam_ke');

        $tokens = TokenSoalUjian::when($tanggal, fn($q) => $q->whereDate('tanggal_ujian', $tanggal))
            ->when($jamKe, fn($q) => $q->where('sesi_ujian', $jamKe))
            ->get();

        return response()->json($tokens);
    }

    public function hapusToken($id)
    {
        $token = TokenSoalUjian::find($id);

        if (!$token) {
            return response()->json(['success' => false, 'message' => 'Token tidak ditemukan.'], 404);
        }

        $token->delete();

        return response()->json(['success' => true, 'message' => 'Token berhasil dihapus.']);
    }


    /* penanda denah ruangan */

    public function updatePosition(Request $request, $id)
    {
        $item = DenahRuanganUjian::findOrFail($id);
        $item->x = $request->x;
        $item->y = $request->y;
        $item->save();

        return response()->json(['success' => true]);
    }
}
