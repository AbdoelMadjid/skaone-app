<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalPerRombelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil tahun ajaran yang aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')
            ->with(['semesters' => function ($query) {
                $query->where('status', 'Aktif');
            }])
            ->first();

        // Pastikan tahun ajaran aktif ada sebelum melanjutkan
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Retrieve the active semester related to the active academic year
        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        // Check if an active semester is found
        if (!$semesterAktif) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $tahunAjaran = $request->get('tahunajaran');
        $semester = $request->get('semester');
        $kodeKK = $request->get('kompetensikeahlian');
        $tingkat = $request->get('tingkat');
        $kodeRombel = $request->get('kode_rombel');

        $jadwal = collect();
        $namaRombel = '-';
        $namaWaliKelas = '-';
        $grid = [];
        $guruList = collect();
        $mapelPerGuru = [];

        if ($tahunAjaran && $semester && $kodeRombel) {
            $jadwal = JadwalMingguan::where('tahunajaran', $tahunAjaran)
                ->where('semester', $semester)
                ->where('kode_rombel', $kodeRombel)
                ->get();

            $namaRombel = KbmPerRombel::where('kode_rombel', $kodeRombel)->value('rombel') ?? '-';

            $rombel = RombonganBelajar::with('waliKelas')->where('kode_rombel', $kodeRombel)->first();
            if ($rombel && $rombel->waliKelas) {
                $wali = $rombel->waliKelas;
                $namaWaliKelas = trim("{$wali->gelardepan} {$wali->namalengkap}" . ($wali->gelarbelakang ? ", {$wali->gelarbelakang}" : ''));
            }

            foreach ($jadwal as $item) {
                $guru = PersonilSekolah::where('id_personil', $item->id_personil)->value('namalengkap') ?? '-';
                $mapel = KbmPerRombel::where('kode_mapel_rombel', $item->mata_pelajaran)->value('mata_pelajaran') ?? '-';
                $grid[$item->jam_ke][$item->hari] = [
                    'mapel' => $mapel,
                    'guru' => $guru,
                    'id' => $item->id_personil,
                ];
            }

            $dataKBMPerRombel = KbmPerRombel::with('jamMengajar') // ← tambahkan ini
                ->where('tahunajaran', $tahunAjaran)
                ->where('ganjilgenap', $semester)
                ->where('kode_rombel', $kodeRombel)
                ->get();

            $idGuruDalamKBM = $dataKBMPerRombel->pluck('id_personil')->unique();

            $guruList = PersonilSekolah::whereIn('id_personil', $idGuruDalamKBM)->orderBy('namalengkap')->get();

            foreach ($dataKBMPerRombel as $kbm) {
                $idGuru = $kbm->id_personil;

                // Hitung total jam yang sudah ditempatkan guru ini di semua rombel untuk mapel ini
                $jamTerpakai = JadwalMingguan::where('tahunajaran', $tahunAjaran)
                    ->where('semester', $semester)
                    ->where('id_personil', $idGuru)
                    ->where('mata_pelajaran', $kbm->kode_mapel_rombel)
                    ->count();

                // Total jam mengajar sesuai data KBM
                $totalJam = $kbm->jamMengajar->jumlah_jam ?? 0;

                // Hitung sisa jam
                $sisaJam = max($totalJam - $jamTerpakai, 0);

                $mapelPerGuru[$idGuru][] = [
                    'kode_mapel_rombel' => $kbm->kode_mapel_rombel,
                    'mata_pelajaran' => $kbm->mata_pelajaran,
                    'jumlah_jam' => $totalJam,
                    'jam_terpakai' => $jamTerpakai,
                    'sisa_jam' => $sisaJam,
                ];
            }
        }

        $hariList = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat'];

        $jamList = [
            1 => '6:30 - 7:10',
            2 => '7:10 - 7:50',
            3 => '7:50 - 8:30',
            4 => '8:30 - 9:10',
            5 => '9:10 - 9:50',
            6 => '9:50 - 10:00',
            7 => '10:00 - 10:40',
            8 => '10:40 - 11:20',
            9 => '11:20 - 12:00',
            10 => '12:00 - 13:00',
            11 => '13:00 - 13:40',
            12 => '13:40 - 14:20',
            13 => '14:20 - 15:00',
        ];

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

        $rombonganBelajarGrouped = RombonganBelajar::with('kompetensiKeahlian')
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->get()
            ->filter(fn($item) => $item->kompetensiKeahlian !== null)
            ->groupBy(fn($item) => $item->kompetensiKeahlian->nama_kk) // Level 1: nama KK
            ->map(fn($rombelsByKk) => $rombelsByKk->groupBy('tingkat')); // Level 2: tingkat


        return view('pages.kurikulum.datakbm.jadwal-mingguan-per-rombel', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
            'semesterAktif' => $semesterAktif->semester,
            'tahunAjaran' => $tahunAjaran,
            'semester' => $semester,
            'kodeKK' => $kodeKK,
            'tingkat' => $tingkat,
            'kodeRombel' => $kodeRombel,
            'jadwal' => $jadwal,
            'namaRombel' => $namaRombel,
            'namaWaliKelas' => $namaWaliKelas,
            'grid' => $grid,
            'guruList' => $guruList,
            'mapelPerGuru' => $mapelPerGuru,
            'hariList' => $hariList,
            'jamList' => $jamList,
            'rombonganBelajarGrouped' => $rombonganBelajarGrouped,
        ]);
    }
}
