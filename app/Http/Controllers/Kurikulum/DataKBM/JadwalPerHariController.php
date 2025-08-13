<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\Kurikulum\DataKBM\KehadiranGuruHarian;
use App\Models\Kurikulum\DataKBM\KeteranganTidakHadirGuru;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class JadwalPerHariController extends Controller
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

        return view('pages.kurikulum.datakbm.jadwal-mingguan-per-hari', [
            'grouped' => $grouped,
            'semuaHari' => $semuaHari,
            'semuaKehadiran' => $semuaKehadiran,
        ]);
    }


    public function simpanKehadiranGuru(Request $request)
    {
        $validated = $request->validate([
            'jadwal_mingguan_id' => 'required|exists:jadwal_mingguans,id',
            'id_personil' => 'required|string',
            'hari' => 'required|string',
            'tanggal' => 'required|date', // ← tambah ini
            'jam_ke' => 'required|integer|min:1|max:13',
        ]);

        $existing = KehadiranGuruHarian::where([
            'jadwal_mingguan_id' => $validated['jadwal_mingguan_id'],
            'id_personil' => $validated['id_personil'],
            'hari' => $validated['hari'],
            'tanggal' => $validated['tanggal'],
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

    public function ajaxTampil(Request $request)
    {
        $hari = $request->input('hari');
        $tanggal = $request->input('tanggal');

        if (!$hari) {
            return response()->json(['html' => '<div class="alert alert-warning">Silakan pilih hari terlebih dahulu.</div>']);
        }

        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id ?? null)
            ->first();

        if (!$tahunAjaranAktif || !$semesterAktif) {
            return response()->json(['html' => '<div class="alert alert-danger">Tahun ajaran atau semester aktif tidak ditemukan.</div>']);
        }

        $jadwalHari = JadwalMingguan::with(['personil', 'rombonganBelajar'])
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('semester', $semesterAktif->semester)
            ->where('hari', $hari)
            ->join('personil_sekolahs', 'jadwal_mingguans.id_personil', '=', 'personil_sekolahs.id_personil')
            ->orderBy('personil_sekolahs.namalengkap')
            ->select('jadwal_mingguans.*')
            ->get();

        $semuaJamKe = range(1, 13);

        $semuaKehadiran = KehadiranGuruHarian::where('hari', $hari)
            ->where('tanggal', $tanggal)
            ->get();

        // Ambil keterangan tidak hadir
        $keteranganTidakHadir = KeteranganTidakHadirGuru::where('hari', $hari)
            ->where('tanggal', $tanggal)
            ->pluck('keterangan', 'id_personil')
            ->toArray();

        $guruIds = $jadwalHari->pluck('id_personil')->unique();

        $jumlahJamTerisi = [];
        foreach ($guruIds as $gid) {
            $jumlahJamTerisi[$gid] = $jadwalHari->where('id_personil', $gid)->count();
        }

        $html = view('pages.kurikulum.datakbm.jadwal-mingguan-tabel-harian', compact(
            'jadwalHari',
            'semuaJamKe',
            'semuaKehadiran',
            'guruIds',
            'hari',
            'jumlahJamTerisi',
            'keteranganTidakHadir' // ⬅ ditambahkan supaya Blade bisa akses
        ))->render();

        return response()->json(['html' => $html]);
    }

    public function simpanMassal(Request $request)
    {
        $validated = $request->validate([
            'jam_ke' => 'required|integer|min:1|max:13',
            'tanggal' => 'required|date',
            'data' => 'required|array',
            'data.*.id_jadwal' => 'required|exists:jadwal_mingguans,id',
            'data.*.id_personil' => 'required|string',
            'data.*.hari' => 'required|string',
        ]);

        $results = [];

        foreach ($validated['data'] as $item) {
            $existing = KehadiranGuruHarian::where([
                'jadwal_mingguan_id' => $item['id_jadwal'],
                'id_personil' => $item['id_personil'],
                'hari' => $item['hari'],
                'tanggal' => $validated['tanggal'],
                'jam_ke' => $validated['jam_ke'],
            ])->first();

            if ($existing) {
                $existing->delete();
                $action = 'deleted';
            } else {
                KehadiranGuruHarian::create([
                    'jadwal_mingguan_id' => $item['id_jadwal'],
                    'id_personil' => $item['id_personil'],
                    'hari' => $item['hari'],
                    'tanggal' => $validated['tanggal'],
                    'jam_ke' => $validated['jam_ke'],
                ]);
                $action = 'created';
            }

            $results[] = [
                'id_personil' => $item['id_personil'],
                'hari' => $item['hari'],
                'action' => $action
            ];
        }

        return response()->json([
            'status' => 'success',
            'results' => $results
        ]);
    }

    public function simpanKeterangan(Request $request)
    {
        $validated = $request->validate([
            'id_personil' => 'required|exists:personil_sekolahs,id_personil',
            'hari'        => 'required|string|max:20',
            'tanggal'     => 'required|date',
            'keterangan'  => 'required|string',
        ]);

        // akan update jika sudah ada, create jika belum
        $row = KeteranganTidakHadirGuru::updateOrCreate(
            ['id_personil' => $validated['id_personil'], 'tanggal' => $validated['tanggal']],
            ['hari' => $validated['hari'], 'keterangan' => $validated['keterangan']]
        );

        return response()->json([
            'status'  => true,
            'message' => 'Keterangan berhasil disimpan.',
            'data'    => $row,
        ]);
    }

    public function hapusKeteranganTidakHadir(Request $request)
    {
        $request->validate([
            'id_personil' => 'required|string', // ✅ ubah integer → string
            'hari'        => 'required|string',
            'tanggal'     => 'required|date',
        ]);

        $deleted = KeteranganTidakHadirGuru::where('id_personil', $request->id_personil)
            ->where('hari', $request->hari)
            ->whereDate('tanggal', $request->tanggal)
            ->delete();

        if ($deleted) {
            return response()->json([
                'status'  => true,
                'message' => 'Keterangan tidak hadir berhasil dihapus.',
            ]);
        }

        return response()->json([
            'status'  => false,
            'message' => 'Data tidak ditemukan atau sudah dihapus.',
        ], 404);
    }
}
