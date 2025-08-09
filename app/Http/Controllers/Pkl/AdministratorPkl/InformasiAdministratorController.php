<?php

namespace App\Http\Controllers\Pkl\AdministratorPkl;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InformasiAdministratorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $selectedDate = $request->input('tanggal', Carbon::today());
        $selectedDate = Carbon::parse($selectedDate);

        // Ambil data absensi untuk tanggal yang dipilih
        $kompetensiData = DB::table('absensi_siswa_pkls')
            ->join('peserta_didiks', 'absensi_siswa_pkls.nis', '=', 'peserta_didiks.nis')
            ->join('kompetensi_keahlians', 'peserta_didiks.kode_kk', '=', 'kompetensi_keahlians.idkk')
            ->select(
                'kompetensi_keahlians.singkatan',
                DB::raw('COUNT(CASE WHEN absensi_siswa_pkls.status = "HADIR" THEN 1 END) as hadir'),
                DB::raw('COUNT(absensi_siswa_pkls.nis) as total')
            )
            ->whereDate('absensi_siswa_pkls.tanggal', $selectedDate)
            ->groupBy('kompetensi_keahlians.singkatan')
            ->get();

        // Array default kompetensi jika data kosong
        $kompetensiArray = [
            'RPL' => ['total' => 122, 'hadir' => 0],
            'TKJ' => ['total' => 136, 'hadir' => 0],
            'BD' => ['total' => 47, 'hadir' => 0],
            'MP' => ['total' => 168, 'hadir' => 0],
            'AK' => ['total' => 138, 'hadir' => 0],
        ];

        // Proses hasil query dan masukkan ke array kompetensi
        foreach ($kompetensiData as $data) {
            if (array_key_exists($data->singkatan, $kompetensiArray)) {
                $kompetensiArray[$data->singkatan]['hadir'] = $data->hadir;
            }
        }

        // Hitung persentase kehadiran
        foreach ($kompetensiArray as $kompetensi => $data) {
            $persentase = ($data['hadir'] / $data['total']) * 100;
            $kompetensiArray[$kompetensi]['persentase'] = round($persentase, 2);
        }

        // Cek apakah request AJAX atau bukan
        if ($request->ajax()) {
            return view('pages.pkl.administratorpkl._kompetensi-data', compact('kompetensiArray'));
        }

        // Jika bukan AJAX, return halaman biasa
        return view('pages.pkl.administratorpkl.informasi-administrator', [
            'kompetensiArray' => $kompetensiArray,
            'selectedDate' => $selectedDate
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
}
