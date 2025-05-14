<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\DataTables\Kurikulum\DokumenSiswa\TranskripNilaiDataTable;
use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TranskripNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TranskripNilaiDataTable $transkripNilaiDataTable)
    {
        $angkaSemester = [];
        for ($i = 1; $i <= 6; $i++) {
            $angkaSemester[$i] = (string) $i;
        }

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

        return $transkripNilaiDataTable->render('pages.kurikulum.dokumensiswa.transkrip-nilai', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'angkaSemester' => $angkaSemester,
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

    public function getBySemester(Request $request)
    {
        $nis = $request->nis;
        $semester = $request->semester;

        $kodeMapelList = [
            'MPN1',
            'MPN2',
            'MPN3',
            'MPN4',
            'MPN5',
            'MPN6',
            'ML1',
            'K1',
            'K2',
            'K3',
            'K4',
            'K5',
            'KK1',
            'KK2',
            'KK3',
            'KK4',
            'KK5',
            'KK6',
            'KK7',
            'KK8',
            'KK9',
            'KK10',
            'KWU1',
            'PKL1',
            'MP1',
            'MP2',
            'MP3',
            'PSAJ1',
            'PSAJ2',
            'PSAJ3',
            'PSAJ4',
            'PSAJ5',
            'PSAJ6',
            'PSAJ7',
            'PSAJ8',
            'PSAJ9',
            'PSAJ10'
        ];

        $caseStatement = "CASE tm.kode_mapel ";
        foreach ($kodeMapelList as $kode) {
            $caseStatement .= "WHEN '{$kode}' THEN tn.`{$kode}` ";
        }
        $caseStatement .= "ELSE NULL END";

        $query = DB::table('peserta_didik_rombels as pdr')
            ->join('transkrip_nilai as tn', function ($join) {
                $join->on('pdr.nis', '=', 'tn.nis')
                    ->on('pdr.tahun_ajaran', '=', 'tn.tahun_ajaran');
            })
            ->join('transkrip_mapel as tm', function ($join) {
                $join->on('pdr.kode_kk', '=', 'tm.kode_kk')
                    ->on('tm.tahun_ajaran', '=', 'pdr.tahun_ajaran');
            })
            ->where('pdr.nis', $nis)
            ->where('tn.semester', $semester)
            ->whereIn('tm.kode_mapel', $kodeMapelList)
            ->select([
                'tm.kode_mapel',
                'tm.nama_mapel',
                DB::raw("$caseStatement AS nilai")
            ])
            ->whereRaw("{$caseStatement} IS NOT NULL AND {$caseStatement} > 0");

        $data = $query->get();

        return response()->json($data);
    }
    /**
     * Get the list of mapel for a specific semester.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateNilai(Request $request)
    {
        $nis = $request->nis;
        $semester = $request->semester;
        $nilaiBaru = $request->nilai;

        $transkrip = DB::table('transkrip_nilai')
            ->where('nis', $nis)
            ->where('semester', $semester)
            ->first();

        if (!$transkrip) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $updateData = [];
        foreach ($nilaiBaru as $kode => $nilai) {
            $updateData[$kode] = $nilai;
        }

        DB::table('transkrip_nilai')
            ->where('nis', $nis)
            ->where('semester', $semester)
            ->update($updateData);

        return response()->json(['message' => 'Nilai berhasil diperbarui']);
    }
}
