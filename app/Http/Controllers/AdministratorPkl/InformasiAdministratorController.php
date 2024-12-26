<?php

namespace App\Http\Controllers\AdministratorPkl;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiAdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Query untuk menghitung jumlah HADIR berdasarkan singkatan
        $dataHadir = DB::table('absensi_siswa_pkls')
            ->join('peserta_didiks', 'absensi_siswa_pkls.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select(
                'kompetensi_keahlians.singkatan as category',
                DB::raw('COUNT(absensi_siswa_pkls.status) as jumlah')
            )
            ->where('absensi_siswa_pkls.status', 'HADIR')
            ->groupBy('kompetensi_keahlians.singkatan')
            ->get();

        // Memisahkan data menjadi categories dan series
        $categories = $dataHadir->pluck('category')->toArray();
        $seriesData = $dataHadir->pluck('jumlah')->toArray();


        // Query untuk jumlah HADIR berdasarkan kompetensi keahlian dan tanggal
        $dataHadirByKK = DB::table('absensi_siswa_pkls')
            ->join('peserta_didiks', 'absensi_siswa_pkls.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select(
                'kompetensi_keahlians.singkatan as kompetensi',
                DB::raw('DATE(absensi_siswa_pkls.tanggal) as tanggal'),
                DB::raw('COUNT(absensi_siswa_pkls.status) as jumlah')
            )
            ->where('absensi_siswa_pkls.status', 'HADIR')
            ->groupBy('kompetensi', DB::raw('DATE(absensi_siswa_pkls.tanggal)'))
            ->orderBy('tanggal', 'ASC')
            ->get();

        // Kelompokkan data berdasarkan kompetensi
        $groupedData = $dataHadirByKK->groupBy('kompetensi')->map(function ($items) {
            return $items->map(function ($item) {
                return [
                    'x' => $item->tanggal, // Tanggal
                    'y' => $item->jumlah   // Jumlah HADIR
                ];
            });
        });


        // Query untuk data kolom (jumlah hadir per kompetensi per hari)
        $dataColumn = DB::table('absensi_siswa_pkls')
            ->join('peserta_didiks', 'absensi_siswa_pkls.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select(
                'kompetensi_keahlians.singkatan as kompetensi',
                DB::raw('DATE(absensi_siswa_pkls.tanggal) as tanggal'),
                DB::raw('COUNT(absensi_siswa_pkls.status) as jumlah_hadir')
            )
            ->where('absensi_siswa_pkls.status', 'HADIR')
            ->groupBy('kompetensi', DB::raw('DATE(absensi_siswa_pkls.tanggal)'))
            ->orderBy('tanggal', 'ASC')
            ->get();

        // Query untuk data garis (contoh: total siswa per hari)
        $dataLine = DB::table('absensi_siswa_pkls')
            ->select(
                DB::raw('DATE(tanggal) as tanggal'),
                DB::raw('COUNT(DISTINCT nis) as total_siswa_hadir')
            )
            ->where('status', 'HADIR')
            ->groupBy(DB::raw('DATE(tanggal)'))
            ->orderBy('tanggal', 'ASC')
            ->get();

        // Kelompokkan data kolom berdasarkan kompetensi
        $groupedColumnData = $dataColumn->groupBy('kompetensi')->map(function ($items) {
            return $items->map(function ($item) {
                return [
                    'x' => $item->tanggal,
                    'y' => $item->jumlah_hadir
                ];
            });
        });

        // Format data garis
        $lineData = $dataLine->map(function ($item) {
            return [
                'x' => $item->tanggal,
                'y' => $item->total_siswa_hadir
            ];
        });

        return view(
            'pages.administratorpkl.informasi-administrator',
            compact(
                'categories',
                'seriesData',
                'groupedData',
                'groupedColumnData',
                'lineData'
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
}
