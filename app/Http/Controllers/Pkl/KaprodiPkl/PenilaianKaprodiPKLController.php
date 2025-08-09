<?php

namespace App\Http\Controllers\Pkl\KaprodiPkl;

use App\Http\Controllers\Controller;
use App\DataTables\Pkl\KaprodiPkl\PenilaianKaprodiPKLDataTable;
use App\Models\Pkl\PembimbingPkl\NilaiPrakerin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianKaprodiPKLController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenilaianKaprodiPKLDataTable $penilaianKaprodiPKLDataTable)
    {
        return $penilaianKaprodiPKLDataTable->render('pages.pkl.kaprodipkl.penilaian-kaprodipkl');
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
     * Generate ulang nilai prakerin.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function generateUlang($id)
    {
        $tahunAjaran = '2024-2025';
        $targetJurnal = 48;
        $totalHari = 78;
        $nilaiIdeal = 96.5;

        $nilai = NilaiPrakerin::findOrFail($id);
        $nis = $nilai->nis;

        $totalJurnal = DB::table('jurnal_pkls')
            ->join('penempatan_prakerins', 'jurnal_pkls.id_penempatan', '=', 'penempatan_prakerins.id')
            ->where('penempatan_prakerins.nis', $nis)
            ->where('jurnal_pkls.validasi', 'Sudah')
            ->count();

        $cp1 = $this->hitungNilai(round($totalJurnal * 0.20), round($targetJurnal * 0.20), 92, 95, 93);
        $cp2 = $this->hitungNilai(round($totalJurnal * 0.45), round($targetJurnal * 0.45), 95, 98, 96);
        $cp3 = $this->hitungNilai(round($totalJurnal * 0.35), round($targetJurnal * 0.35), 89, 93, 90);

        $absensi = DB::table('absensi_siswa_pkls')
            ->where('nis', $nis)
            ->select(DB::raw("SUM(CASE WHEN status = 'HADIR' THEN 1 ELSE 0 END) as jumlah_hadir"))
            ->first();

        $jumlahHadir = $absensi->jumlah_hadir ?? 0;

        if ($jumlahHadir == $totalHari) {
            $nilaiAbsensi = $nilaiIdeal;
        } elseif ($jumlahHadir > $totalHari) {
            $tambahan = min($jumlahHadir - $totalHari, 2);
            $nilaiAbsensi = min($nilaiIdeal + ($tambahan * 0.5), 98.5);
        } else {
            $kurangan = $totalHari - $jumlahHadir;
            $nilaiAbsensi = max($nilaiIdeal - ($kurangan * 1.0), 0);
        }

        $nilaiAbsensi = number_format($nilaiAbsensi, 2);

        $nilai->update([
            'absen' => $nilaiAbsensi,
            'cp1' => $cp1,
            'cp2' => $cp2,
            'cp3' => $cp3
        ]);

        return redirect()->route('kaprodipkl.penilaian-prakerin.index')
            ->with('success', 'Nilai dan absensi berhasil digenerate ulang.');
        //return redirect()->back()->with('success', 'Nilai berhasil digenerate ulang untuk siswa ini.');
    }
}
