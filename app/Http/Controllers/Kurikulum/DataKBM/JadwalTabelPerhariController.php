<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class JadwalTabelPerhariController extends Controller
{
    public function index()
    {
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');
            }])
            ->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        if (!$semesterAktif) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $dataJadwal = JadwalMingguan::with(['personil', 'rombonganBelajar'])->get();

        $grouped = $dataJadwal->groupBy('hari'); // ['Senin' => [...], 'Selasa' => [...], ...]
        $semuaHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];


        return view('pages.kurikulum.datakbm.jadwal-mingguan-tabel-per-hari', compact('grouped', 'semuaHari'));
    }
}
