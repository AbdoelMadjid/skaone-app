<?php

namespace App\Http\Controllers\PembimbingPkl;

use App\DataTables\PembimbingPkl\PenilaianPembimbingDataTable;
use App\Http\Controllers\Controller;
use App\Models\PembimbingPkl\NilaiPrakerin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenilaianBimbinganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PenilaianPembimbingDataTable $penilaianPembimbingDataTable)
    {
        return $penilaianPembimbingDataTable->render("pages.pembimbingpkl.penilaian-bimbingan");
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

        // Hanya ambil siswa yang dibimbing oleh personil ini
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

        foreach ($dataJurnal as $row) {
            $nis = $row->nis;
            $total = $row->total_jurnal;

            $cp1 = $this->hitungNilai(round($total * 0.20), round($targetJurnal * 0.20), 92, 95, 93);
            $cp2 = $this->hitungNilai(round($total * 0.45), round($targetJurnal * 0.45), 95, 98, 96);
            $cp3 = $this->hitungNilai(round($total * 0.35), round($targetJurnal * 0.35), 89, 93, 90);

            NilaiPrakerin::updateOrCreate(
                ['nis' => $nis, 'tahun_ajaran' => $tahunAjaran],
                ['cp1' => $cp1, 'cp2' => $cp2, 'cp3' => $cp3, 'cp4' => '']
            );
        }

        return redirect()->back()->with('success', 'Nilai berhasil digenerate untuk siswa bimbingan Anda.');
    }
}
