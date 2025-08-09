<?php

namespace App\Http\Controllers\Pkl\PesertaDidikPkl;

use App\Http\Controllers\Controller;
use App\Models\Pkl\PesertaDidikPkl\AbsensiSiswaPkl;
use App\Http\Requests\Pkl\PesertaDidikPkl\AbsensiSiswaPklRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbsensiSiswaPklController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $nis = auth()->user()->nis;

        // Total kehadiran
        $totalHadir = AbsensiSiswaPkl::where('nis', $nis)
            ->where('status', 'HADIR')
            ->count();

        // Total sakit
        $totalSakit = AbsensiSiswaPkl::where('nis', $nis)
            ->where('status', 'SAKIT')
            ->count();

        // Total izin
        $totalIzin = AbsensiSiswaPkl::where('nis', $nis)
            ->where('status', 'IZIN')
            ->count();

        // Periksa apakah sudah absen hari ini
        $sudahHadir = AbsensiSiswaPkl::where('nis', $nis)
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'HADIR')
            ->exists();

        $sudahSakit = AbsensiSiswaPkl::where('nis', $nis)
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'SAKIT')
            ->exists();

        $sudahIzin = AbsensiSiswaPkl::where('nis', $nis)
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'IZIN')
            ->exists();

        $dataAbsensi = AbsensiSiswaPkl::where('nis', $nis)->orderBy('tanggal', 'asc')
            ->get();

        return view("pages.pkl.pesertadidikpkl.absensi-siswa", [
            'totalHadir' => $totalHadir,
            'totalSakit' => $totalSakit,
            'totalIzin' => $totalIzin,
            'sudahHadir' => $sudahHadir,
            'sudahSakit' => $sudahSakit,
            'sudahIzin' => $sudahIzin,
            'dataAbsensi' => $dataAbsensi,
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
    public function store(AbsensiSiswaPklRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AbsensiSiswaPkl $absensiSiswaPkl)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AbsensiSiswaPkl $absensiSiswaPkl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AbsensiSiswaPklRequest $request, AbsensiSiswaPkl $absensiSiswaPkl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AbsensiSiswaPkl $absensiSiswaPkl)
    {
        //
    }

    // Controller: AbsensiSiswaPklController

    // Fungsi untuk mencatat absensi HADIR
    public function simpanHadir(Request $request)
    {
        $request->validate([
            'nis' => 'required',
        ]);

        // Periksa apakah sudah absen hari ini dengan status HADIR, SAKIT, atau IZIN
        $absensi = AbsensiSiswaPkl::where('nis', $request->nis)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        if ($absensi) {
            // Jika sudah ada absensi untuk hari ini
            return response()->json([
                'message' => 'Anda sudah mencatat absensi hari ini.',
                'alreadyHadir' => $absensi->status === 'HADIR',
                'alreadySakit' => $absensi->status === 'SAKIT',
                'alreadyIzin' => $absensi->status === 'IZIN',
            ], 400);
        }

        // Simpan absensi HADIR
        AbsensiSiswaPkl::create([
            'nis' => $request->nis,
            'tanggal' => Carbon::now(),
            'status' => 'HADIR',
        ]);

        return response()->json([
            'message' => 'Kehadiran berhasil dicatat.',
            'alreadyHadir' => false,
        ]);
    }

    // Fungsi untuk mencatat absensi SAKIT
    public function simpanSakit(Request $request)
    {
        $request->validate([
            'nis' => 'required',
        ]);

        // Periksa apakah sudah absen hari ini dengan status HADIR, SAKIT, atau IZIN
        $absensi = AbsensiSiswaPkl::where('nis', $request->nis)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        if ($absensi) {
            // Jika sudah ada absensi untuk hari ini
            return response()->json([
                'message' => 'Anda sudah mencatat absensi hari ini.',
                'alreadyHadir' => $absensi->status === 'HADIR',
                'alreadySakit' => $absensi->status === 'SAKIT',
                'alreadyIzin' => $absensi->status === 'IZIN',
            ], 400);
        }

        // Simpan absensi SAKIT
        AbsensiSiswaPkl::create([
            'nis' => $request->nis,
            'tanggal' => Carbon::now(),
            'status' => 'SAKIT',
        ]);

        return response()->json([
            'message' => 'Absensi Sakit berhasil dicatat.',
            'alreadySakit' => false,
        ]);
    }

    // Fungsi untuk mencatat absensi IZIN
    public function simpanIzin(Request $request)
    {
        $request->validate([
            'nis' => 'required',
        ]);

        // Periksa apakah sudah absen hari ini dengan status HADIR, SAKIT, atau IZIN
        $absensi = AbsensiSiswaPkl::where('nis', $request->nis)
            ->whereDate('tanggal', Carbon::today())
            ->first();

        if ($absensi) {
            // Jika sudah ada absensi untuk hari ini
            return response()->json([
                'message' => 'Anda sudah mencatat absensi hari ini.',
                'alreadyHadir' => $absensi->status === 'HADIR',
                'alreadySakit' => $absensi->status === 'SAKIT',
                'alreadyIzin' => $absensi->status === 'IZIN',
            ], 400);
        }

        // Simpan absensi IZIN
        AbsensiSiswaPkl::create([
            'nis' => $request->nis,
            'tanggal' => Carbon::now(),
            'status' => 'IZIN',
        ]);

        return response()->json([
            'message' => 'Absensi Izin berhasil dicatat.',
            'alreadyIzin' => false,
        ]);
    }

    public function checkAbsensiStatus(Request $request)
    {
        $nis = $request->nis;

        // Periksa apakah sudah absen dengan status HADIR, SAKIT, atau IZIN
        $sudahHadir = AbsensiSiswaPkl::where('nis', $nis)
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'HADIR')
            ->exists();

        $sudahSakit = AbsensiSiswaPkl::where('nis', $nis)
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'SAKIT')
            ->exists();

        $sudahIzin = AbsensiSiswaPkl::where('nis', $nis)
            ->whereDate('tanggal', Carbon::today())
            ->where('status', 'IZIN')
            ->exists();

        return response()->json([
            'sudahHadir' => $sudahHadir,
            'sudahSakit' => $sudahSakit,
            'sudahIzin' => $sudahIzin,
        ]);
    }
}
