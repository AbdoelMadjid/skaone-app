<?php

namespace App\Http\Controllers\Pkl\PembimbingPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\PembimbingPkl\PenilaianPembimbingDataTable;
use App\Models\Pkl\PembimbingPkl\NilaiPrakerin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenilaianPembimbingDataTable $penilaianPembimbingDataTable)
    {
        $idPersonil = auth()->user()->personal_id;
        $tahunAjaran = '2024-2025';

        // Ambil semua NIS siswa bimbingan
        $siswaBimbingan = DB::table('pembimbing_prakerins')
            ->join('penempatan_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->where('pembimbing_prakerins.id_personil', $idPersonil)
            ->where('penempatan_prakerins.tahunajaran', $tahunAjaran)
            ->pluck('penempatan_prakerins.nis');

        // Cek berapa banyak dari mereka yang sudah punya nilai
        $jumlahDenganNilai = DB::table('nilai_prakerin')
            ->where('tahun_ajaran', $tahunAjaran)
            ->whereIn('nis', $siswaBimbingan)
            ->count();

        $semuaSudahDinilai = $jumlahDenganNilai === $siswaBimbingan->count();

        return $penilaianPembimbingDataTable->render("pages.pkl.pembimbingpkl.penilaian-bimbingan", compact('semuaSudahDinilai'));
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
    /**
     * Calculate the score based on the given parameters.
     *
     * @param int $jumlah
     * @param int $target
     * @param float $nilaiTarget
     * @param float $nilaiMaksimal
     * @param float $awalMaks
     * @return float
     */

    private function hitungNilai($jumlah, $target, $nilaiTarget, $nilaiMaksimal, $awalMaks)
    {
        if ($jumlah == $target) {
            return $nilaiTarget;
        } elseif ($jumlah < $target) {
            $selisih = $jumlah - $target;
            $persen = $selisih / $target;
            return round($nilaiTarget + ($nilaiTarget * $persen), 2);
        } else {
            $kelebihan = $jumlah - $target;
            $persen = min($kelebihan / $target, 1);
            return round($awalMaks + (($nilaiMaksimal - $awalMaks) * $persen), 2);
        }
    }
    /**
     * Generate nilai prakerin.
     *
     * @return \Illuminate\Http\RedirectResponse
     */

    public function generateNilaiPrakerin()
    {
        $tahunAjaran = '2024-2025';
        $targetJurnal = 48;
        $idPersonil = auth()->user()->personal_id;

        // Ambil semua data jurnal yang valid milik siswa bimbingan
        $dataJurnal = DB::table('jurnal_pkls')
            ->select(
                'penempatan_prakerins.nis',
                DB::raw("COUNT(jurnal_pkls.id) as total_jurnal")
            )
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->join('pembimbing_prakerins', 'pembimbing_prakerins.id_penempatan', '=', 'penempatan_prakerins.id')
            ->where('pembimbing_prakerins.id_personil', $idPersonil)
            ->where('jurnal_pkls.validasi', 'Sudah')
            ->groupBy('penempatan_prakerins.nis')
            ->get();

        // Ambil rekap absensi semua siswa
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
            ->keyBy('nis');

        $totalHari = 78;
        $nilaiIdeal = 96.5;

        foreach ($dataJurnal as $row) {
            $nis = $row->nis;
            $total = $row->total_jurnal;

            // Hitung CP1, CP2, CP3
            $cp1 = $this->hitungNilai(round($total * 0.20), round($targetJurnal * 0.20), 92, 95, 93);
            $cp2 = $this->hitungNilai(round($total * 0.45), round($targetJurnal * 0.45), 95, 98, 96);
            $cp3 = $this->hitungNilai(round($total * 0.35), round($targetJurnal * 0.35), 89, 93, 90);

            // Hitung nilai absensi
            $dataAbsensi = $absensi[$nis] ?? null;
            $jumlahHadir = $dataAbsensi->jumlah_hadir ?? 0;

            $nilaiAbsensi = $nilaiIdeal;
            if ($jumlahHadir == $totalHari) {
                $nilaiAbsensi = $nilaiIdeal;
            } elseif ($jumlahHadir > $totalHari) {
                $tambahan = min($jumlahHadir - $totalHari, 2); // maks 2 hari ekstra
                $nilaiAbsensi = min($nilaiIdeal + ($tambahan * 0.5), 98.5);
            } else {
                $kurangan = $totalHari - $jumlahHadir;
                $nilaiAbsensi = max($nilaiIdeal - ($kurangan * 1.0), 0);
            }

            $nilaiAbsensi = number_format($nilaiAbsensi, 2);

            // Simpan atau update ke database
            NilaiPrakerin::updateOrCreate(
                ['nis' => $nis, 'tahun_ajaran' => $tahunAjaran],
                [
                    'absen' => $nilaiAbsensi,
                    'cp1' => $cp1,
                    'cp2' => $cp2,
                    'cp3' => $cp3,
                    'cp4' => ''
                ]
            );
        }

        return redirect()->route('pembimbingpkl.penilaian-bimbingan.index')
            ->with('success', 'Nilai dan absensi berhasil digenerate untuk siswa bimbingan Anda.');
        //return redirect()->back()->with('success', 'Nilai dan absensi berhasil digenerate untuk siswa bimbingan Anda.');
    }

    public function updateCp4(Request $request)
    {
        $request->validate([
            'nis' => 'required|exists:peserta_didiks,nis',
            'cp4' => 'required|numeric|min:0|max:100',
        ]);

        $tahunAjaran = '2024-2025'; // bisa juga ambil dari sistem dinamis

        NilaiPrakerin::updateOrCreate(
            ['nis' => $request->nis, 'tahun_ajaran' => $tahunAjaran],
            ['cp4' => $request->cp4]
        );

        return response()->json(['message' => 'Nilai CP4 berhasil disimpan']);
    }
}
