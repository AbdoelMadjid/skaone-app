<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\Kurikulum\DataKBM\KehadiranGuruHarian;
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

        $dataJadwal = JadwalMingguan::with(['personil', 'rombonganBelajar'])
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('semester', $semesterAktif->semester)
            ->get();


        $grouped = $dataJadwal->groupBy('hari'); // ['Senin' => [...], 'Selasa' => [...], ...]
        $semuaHari = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        $semuaKehadiran = KehadiranGuruHarian::get();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-tabel-per-hari', compact('grouped', 'semuaHari', 'semuaKehadiran'));
    }


    public function simpanKehadiranGuru(Request $request)
    {
        $validated = $request->validate([
            'jadwal_mingguan_id' => 'required|exists:jadwal_mingguans,id',
            'id_personil' => 'required|string',
            'hari' => 'required|string',
            'jam_ke' => 'required|integer|min:1|max:13',
        ]);

        $existing = KehadiranGuruHarian::where([
            'jadwal_mingguan_id' => $validated['jadwal_mingguan_id'],
            'id_personil' => $validated['id_personil'],
            'hari' => $validated['hari'],
            'jam_ke' => $validated['jam_ke'],
        ])->first();

        if ($existing) {
            // Toggle off = hapus kehadiran
            $existing->delete();
            return response()->json(['status' => 'success', 'action' => 'deleted']);
        } else {
            // Simpan baru
            KehadiranGuruHarian::create($validated);
            return response()->json(['status' => 'success', 'action' => 'created']);
        }
    }
}
