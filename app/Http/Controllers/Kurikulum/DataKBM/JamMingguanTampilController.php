<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class JamMingguanTampilController extends Controller
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

            $dataKBMPerRombel = KbmPerRombel::where('tahunajaran', $tahunAjaran)
                ->where('ganjilgenap', $semester)
                ->where('kode_rombel', $kodeRombel)
                ->get();

            $idGuruDalamKBM = $dataKBMPerRombel->pluck('id_personil')->unique();

            $guruList = PersonilSekolah::whereIn('id_personil', $idGuruDalamKBM)->orderBy('namalengkap')->get();

            foreach ($dataKBMPerRombel as $kbm) {
                $idGuru = $kbm->id_personil;
                $mapelPerGuru[$idGuru][] = [
                    'kode_mapel_rombel' => $kbm->kode_mapel_rombel,
                    'mata_pelajaran' => $kbm->mata_pelajaran,
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

        return view('pages.kurikulum.datakbm.jadwal-mingguan-tampil', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
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
            'jamList' => $jamList
        ]);
    }


    public function simpanJadwal(Request $request)
    {
        $request->validate([
            'tahunajaran' => 'required',
            'semester' => 'required',
            'kode_kk' => 'required',
            'tingkat' => 'required',
            'kode_rombel' => 'required',
            'id_personil' => 'required|exists:personil_sekolahs,id_personil',
            'kode_mapel_rombel' => 'required|string|max:100',
            'hari' => 'required|string',
            'jam_ke' => 'required|integer',
            'jumlah_jam' => 'required|integer|min:1|max:10',
        ]);

        $startJam = (int) $request->jam_ke;
        $jumlahJam = (int) $request->jumlah_jam;
        $jamIstirahat = [6, 10];
        $jamMax = 13; // Jumlah jam maksimal per hari

        $bentrokGuruLain = [];
        $duplikatSendiri = [];
        $bentrokRombel = [];

        $jamTerisi = [];
        $currentJam = $startJam;

        // Kumpulkan jam yang valid untuk diisi (skip jam istirahat)
        while (count($jamTerisi) < $jumlahJam && $currentJam <= $jamMax) {
            if (in_array($currentJam, $jamIstirahat)) {
                $currentJam++;
                continue;
            }

            $jamTerisi[] = $currentJam;
            $currentJam++;
        }

        // Cek bentrokan
        foreach ($jamTerisi as $jamKe) {
            // 1. Bentrok antar guru di rombel berbeda
            $bentrokGuru = JadwalMingguan::where('tahunajaran', $request->tahunajaran)
                ->where('semester', $request->semester)
                ->where('hari', $request->hari)
                ->where('jam_ke', $jamKe)
                ->where('id_personil', $request->id_personil)
                ->where('kode_rombel', '!=', $request->kode_rombel)
                ->first();

            if ($bentrokGuru) {
                $bentrokGuruLain[] = $jamKe;
            }

            // 2. Tumpang tindih dengan jadwal guru sendiri
            $duplikat = JadwalMingguan::where('tahunajaran', $request->tahunajaran)
                ->where('semester', $request->semester)
                ->where('hari', $request->hari)
                ->where('jam_ke', $jamKe)
                ->where('id_personil', $request->id_personil)
                ->where('kode_rombel', $request->kode_rombel)
                ->first();

            if ($duplikat) {
                $duplikatSendiri[] = $jamKe;
            }

            // 3. Rombel bentrok dengan guru lain
            $rombelsama = JadwalMingguan::where('tahunajaran', $request->tahunajaran)
                ->where('semester', $request->semester)
                ->where('hari', $request->hari)
                ->where('jam_ke', $jamKe)
                ->where('kode_rombel', $request->kode_rombel)
                ->where('id_personil', '!=', $request->id_personil)
                ->first();

            if ($rombelsama) {
                $bentrokRombel[] = $jamKe;
            }
        }

        // Jika jam yang tersedia tidak mencukupi jumlah_jam yang diminta
        if (count($jamTerisi) < $jumlahJam) {
            return redirect()->back()
                ->with('warning', 'Jam tersisa dari jam ke-' . $startJam . ' hanya cukup untuk ' . count($jamTerisi) . ' jam pelajaran. Tidak bisa menambahkan ' . $jumlahJam . ' jam karena melebihi jam ke-' . $jamMax . '.')
                ->withInput();
        }

        // Cek hasil bentrokan
        if (count($bentrokGuruLain) > 0) {
            return redirect()->back()
                ->with('error', 'Guru sudah memiliki jadwal di rombel lain pada jam ke-' . implode(', ', $bentrokGuruLain) . ' di hari ' . $request->hari . '.')
                ->withInput();
        }

        if (count($duplikatSendiri) > 0) {
            return redirect()->back()
                ->with('error', 'Jam ke-' . implode(', ', $duplikatSendiri) . ' di hari ' . $request->hari . ' sudah pernah diisi. Tidak boleh menimpa jadwal sebelumnya.')
                ->withInput();
        }

        if (count($bentrokRombel) > 0) {
            return redirect()->back()
                ->with('error', 'Rombel ini sudah memiliki guru lain pada jam ke-' . implode(', ', $bentrokRombel) . ' di hari ' . $request->hari . '. Jadwal bentrok.')
                ->withInput();
        }

        // Simpan semua jam yang valid
        foreach ($jamTerisi as $jamKe) {
            JadwalMingguan::updateOrCreate(
                [
                    'tahunajaran' => $request->tahunajaran,
                    'semester' => $request->semester,
                    'kode_kk' => $request->kode_kk,
                    'tingkat' => $request->tingkat,
                    'kode_rombel' => $request->kode_rombel,
                    'jam_ke' => $jamKe,
                    'hari' => $request->hari,
                ],
                [
                    'id_personil' => $request->id_personil,
                    'mata_pelajaran' => $request->kode_mapel_rombel,
                ]
            );
        }

        return redirect()->back()->with('success', 'Jadwal berhasil disimpan.');
    }
}
