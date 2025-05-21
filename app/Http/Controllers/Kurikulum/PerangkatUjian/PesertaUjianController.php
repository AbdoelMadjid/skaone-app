<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\PesertaUjianDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatUjian\PesertaUjianRequest;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\PesertaUjian;
use App\Models\Kurikulum\PerangkatUjian\RuangUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PesertaUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PesertaUjianDataTable $pesertaUjianDataTable)
    {
        // Ambil kode ujian yang aktif (hanya 1)
        $kodeUjianAktif = IdentitasUjian::where('status', 'aktif')->value('kode_ujian');

        // Ambil semua ruangan ujian untuk kode ujian aktif
        $data = RuangUjian::where('kode_ujian', $kodeUjianAktif)->get();

        // Digunakan untuk dropdown pilihan nomor ruangan
        $ruanganOptions = $data->pluck('nomor_ruang', 'nomor_ruang')->toArray();

        return $pesertaUjianDataTable->render('pages.kurikulum.perangkatujian.adminujian.crud-peserta-ujian', [
            'data' => $data, // semua data RuangUjian
            'ruanganOptions' => $ruanganOptions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Ambil kode_ujian yang aktif dari tabel identitas_ujians
        $kodeUjianAktif = IdentitasUjian::where('status', 'aktif')->pluck('kode_ujian');

        // Ambil nomor_ruang dari ruang_ujians yang hanya terkait dengan kode_ujian yang aktif
        $ruangUjianOptions = RuangUjian::whereIn('kode_ujian', $kodeUjianAktif)
            ->pluck('nomor_ruang', 'nomor_ruang')
            ->toArray();

        return view('pages.kurikulum.perangkatujian.adminujian.crud-peserta-ujian-form', [
            'data' => new PesertaUjian(),
            'action' => route('kurikulum.perangkatujian.administrasi-ujian.peserta-ujian.store'),
            'ruanganOptions' => $ruangUjianOptions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PesertaUjianRequest $request)
    {
        $kodeUjianAktif = IdentitasUjian::where('status', 'aktif')->value('kode_ujian');
        $nomorRuang = $request->nomor_ruang;

        $dataToInsert = [];

        $lastNomor = PesertaUjian::where('kode_ujian', $kodeUjianAktif)
            ->orderByDesc('nomor_peserta')
            ->value('nomor_peserta');

        $lastNumber = 0;
        if ($lastNomor) {
            // Contoh: PAT-2425-Genap-00012 → ambil 12
            $lastNumber = intval(substr($lastNomor, strrpos($lastNomor, '-') + 1));
        }

        // Helper untuk generate nomor peserta
        function generateNomorPeserta($prefix, &$counter)
        {
            $counter++;
            return $prefix . '-' . str_pad($counter, 5, '0', STR_PAD_LEFT);
        }

        $prefix = $kodeUjianAktif;
        $counter = $lastNumber;

        // Proses siswa kiri
        if ($request->filled('siswa_kiri')) {
            foreach ($request->siswa_kiri as $nis) {
                $dataToInsert[] = [
                    'kode_ujian' => $kodeUjianAktif,
                    'nis' => $nis,
                    'kelas' => $request->kelas_kiri,
                    'nomor_peserta' => generateNomorPeserta($prefix, $counter),
                    'nomor_ruang' => $nomorRuang,
                    'kode_posisi_kelas' => $request->kode_kelas_kiri,
                ];
            }
        }

        // Proses siswa kanan
        if ($request->filled('siswa_kanan')) {
            foreach ($request->siswa_kanan as $nis) {
                $dataToInsert[] = [
                    'kode_ujian' => $kodeUjianAktif,
                    'nis' => $nis,
                    'kelas' => $request->kelas_kanan,
                    'nomor_peserta' => generateNomorPeserta($prefix, $counter),
                    'nomor_ruang' => $nomorRuang,
                    'kode_posisi_kelas' => $request->kode_kelas_kanan,
                ];
            }
        }

        PesertaUjian::insert($dataToInsert);

        return redirect()->route('kurikulum.perangkatujian.administrasi-ujian.peserta-ujian.index')
            ->with('success', 'Data peserta ujian berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PesertaUjian $pesertaUjian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PesertaUjian $pesertaUjian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PesertaUjian $pesertaUjian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PesertaUjian $pesertaUjian)
    {
        //
    }

    public function getRuangUjian($nomor_ruang)
    {
        $ruang = RuangUjian::where('nomor_ruang', $nomor_ruang)->first();

        if ($ruang) {
            return response()->json([
                'kelas_kiri' => $ruang->kelas_kiri,
                'kelas_kanan' => $ruang->kelas_kanan,
                'kode_kelas_kiri' => $ruang->kode_kelas_kiri,
                'kode_kelas_kanan' => $ruang->kode_kelas_kanan,
            ]);
        }

        return response()->json([
            'kelas_kiri' => '',
            'kelas_kanan' => '',
            'kode_kelas_kiri' => '',
            'kode_kelas_kanan' => '',
        ]);
    }

    public function getSiswaKelas($kode_kelas)
    {
        // Ambil kode ujian aktif
        $kodeUjianAktif = IdentitasUjian::where('status', 'aktif')->value('kode_ujian');

        // Ambil daftar NIS yang sudah jadi peserta untuk ujian aktif
        $sudahTerdaftar = DB::table('peserta_ujians')
            ->where('kode_ujian', $kodeUjianAktif)
            ->pluck('nis')
            ->toArray();

        // Ambil data siswa yang belum terdaftar sebagai peserta
        $data = DB::table('rombongan_belajars as rb')
            ->join('peserta_didik_rombels as pdr', 'pdr.rombel_kode', '=', 'rb.kode_rombel')
            ->join('peserta_didiks as pd', 'pd.nis', '=', 'pdr.nis')
            ->join('kompetensi_keahlians as kk', 'kk.idkk', '=', 'pdr.kode_kk')
            ->where('rb.kode_rombel', $kode_kelas)
            ->whereNotIn('pdr.nis', $sudahTerdaftar) // ✅ Kecualikan yang sudah terdaftar
            ->select(
                'rb.kode_rombel',
                'pdr.kode_kk',
                'pdr.rombel_tingkat',
                'pdr.rombel_nama',
                'pdr.nis',
                'pd.nama_lengkap',
                'kk.nama_kk'
            )
            ->get();

        return response()->json($data);
    }

    public function tambahPesertaUjian(Request $request)
    {
        $request->validate([
            'nomor_ruang' => 'required',
            'kode_kelas_kiri' => 'required',
            'kode_kelas_kanan' => 'required',
        ]);

        // Ambil kode ujian aktif
        $kodeUjianAktif = IdentitasUjian::where('status', 'aktif')->value('kode_ujian');

        // Hitung nomor terakhir yang sudah dipakai
        $nomorTerakhir = PesertaUjian::where('kode_ujian', $kodeUjianAktif)
            ->orderBy('nomor_peserta', 'desc')
            ->value('nomor_peserta');

        // Ambil hanya angkanya dan lanjutkan
        $counter = 1;
        if ($nomorTerakhir) {
            $bagian = explode('-', $nomorTerakhir);
            $counter = (int)end($bagian) + 1;
        }

        $nomorRuang = $request->nomor_ruang;

        // Helper untuk format nomor peserta
        $generateNomorPeserta = function ($kodeUjian, $urutan) {
            return $kodeUjian . '-' . str_pad($urutan, 5, '0', STR_PAD_LEFT);
        };

        DB::beginTransaction();
        try {
            // ============ DATA KIRI ============
            $nisListKiri = $request->input('siswa_kiri', []);
            $kelasKiri = $request->input('kelas_kiri');
            $kodeKelasKiri = $request->input('kode_kelas_kiri');

            foreach ($nisListKiri as $nis) {
                PesertaUjian::create([
                    'kode_ujian' => $kodeUjianAktif,
                    'nis' => $nis,
                    'kelas' => $kelasKiri,
                    'nomor_peserta' => $generateNomorPeserta($kodeUjianAktif, $counter++),
                    'nomor_ruang' => $nomorRuang,
                    'kode_posisi_kelas' => $kodeKelasKiri,
                    'posisi_duduk' => 'kiri',
                ]);
            }

            // ============ DATA KANAN ============
            $nisListKanan = $request->input('siswa_kanan', []);
            $kelasKanan = $request->input('kelas_kanan');
            $kodeKelasKanan = $request->input('kode_kelas_kanan');

            foreach ($nisListKanan as $nis) {
                PesertaUjian::create([
                    'kode_ujian' => $kodeUjianAktif,
                    'nis' => $nis,
                    'kelas' => $kelasKanan,
                    'nomor_peserta' => $generateNomorPeserta($kodeUjianAktif, $counter++),
                    'nomor_ruang' => $nomorRuang,
                    'kode_posisi_kelas' => $kodeKelasKanan,
                    'posisi_duduk' => 'kanan',
                ]);
            }

            DB::commit();
            return redirect()->back()->with('toast_success', 'Peserta ujian berhasil disimpan.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
