<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\JadwalMingguanDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\DataKBM\JadwalMingguanRequest;
use App\Models\Kurikulum\DataKBM\JadwalMingguan;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class JadwalMingguanController extends Controller
{
    public function index(JadwalMingguanDataTable $jadwalMingguanDataTable)
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

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

        return $jadwalMingguanDataTable->render('pages.kurikulum.datakbm.jadwal-mingguan', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'tahunAjaranAktif' => $tahunAjaranAktif->tahunajaran,
            'semesterAktif' => $semesterAktif->semester,
        ]);
    }

    public function create()
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-form', [
            'data' => new JadwalMingguan(),
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'personilSekolah' => $personilSekolah,
            'action' => route('kurikulum.datakbm.jadwal-mingguan.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalMingguanRequest $request)
    {
        // Ambil data tervalidasi, tapi pisahkan jam_ke karena akan dipecah
        $validated = $request->validated();
        $data = collect($validated)->except('jam_ke')->toArray();

        foreach ($validated['jam_ke'] as $jam) {
            JadwalMingguan::create([
                ...$data,
                'jam_ke' => $jam,
            ]);
        }

        return responseSuccess();
    }


    /**
     * Display the specified resource.
     */
    public function show(JadwalMingguan $jadwalMingguan)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-form', [
            'data' => $jadwalMingguan,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'personilSekolah' => $personilSekolah,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalMingguan $jadwalMingguan)
    {
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();
        $personilSekolah = PersonilSekolah::pluck('namalengkap', 'id_personil')->toArray();

        $jamKeChecked = JadwalMingguan::where('kode_rombel', $jadwalMingguan->kode_rombel)
            ->where('hari', $jadwalMingguan->hari)
            ->where('mata_pelajaran', $jadwalMingguan->mata_pelajaran)
            ->where('id_personil', $jadwalMingguan->id_personil)
            ->pluck('jam_ke') // ambil semua jam_ke yang relevan
            ->toArray();

        return view('pages.kurikulum.datakbm.jadwal-mingguan-form', [
            'data' => $jadwalMingguan,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'personilSekolah' => $personilSekolah,
            'dataJamKe' => $jamKeChecked,
            'action' => route('kurikulum.datakbm.jadwal-mingguan.update', $jadwalMingguan->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JadwalMingguanRequest $request, JadwalMingguan $jadwalMingguan)
    {
        $jadwalMingguan->fill($request->validated());
        $jadwalMingguan->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalMingguan $jadwalMingguan)
    {
        $jadwalMingguan->delete();

        return responseSuccessDelete();
    }


    public function getRombels(Request $request)
    {
        $tahunajaran = $request->input('tahunajaran');
        $kodeKK = $request->input('kode_kk');
        $tingkat = $request->input('tingkat');

        $rombels = RombonganBelajar::where('tahunajaran', $tahunajaran)
            ->where('id_kk', $kodeKK)
            ->where('tingkat', $tingkat)
            ->pluck('rombel', 'kode_rombel');

        return response()->json($rombels);
    }

    public function getPersonil(Request $request)
    {
        $tahunajaran = $request->tahunajaran;
        $kode_kk = $request->kode_kk;
        $tingkat = $request->tingkat;
        $semester = $request->semester;
        $kode_rombel = $request->kode_rombel;

        // Ambil id_personil unik dari kbm_per_rombels
        $personilIds = KbmPerRombel::where([
            'tahunajaran' => $tahunajaran,
            'kode_kk' => $kode_kk,
            'tingkat' => $tingkat,
            'ganjilgenap' => $semester,
            'kode_rombel' => $kode_rombel,
        ])->pluck('id_personil')->unique();

        // Ambil nama personil berdasarkan id_personil dari PersonilSekolah
        $personils = PersonilSekolah::whereIn('id_personil', $personilIds)
            ->pluck('namalengkap', 'id_personil');

        return response()->json($personils);
    }

    public function getMapelByPersonil(Request $request)
    {
        $mapel = KbmPerRombel::where('tahunajaran', $request->tahunajaran)
            ->where('kode_kk', $request->kode_kk)
            ->where('tingkat', $request->tingkat)
            ->where('ganjilgenap', $request->semester)
            ->where('kode_rombel', $request->kode_rombel)
            ->where('id_personil', $request->id_personil)
            ->select('kode_mapel_rombel', 'mata_pelajaran')
            ->get();

        return response()->json($mapel);
    }

    public function cekJamKe(Request $request)
    {
        $jadwal = JadwalMingguan::where([
            'tahunajaran' => $request->tahunajaran,
            'semester' => $request->semester,
            'kode_kk' => $request->kode_kk,
            'tingkat' => $request->tingkat,
            'kode_rombel' => $request->kode_rombel,
            'hari' => $request->hari
        ])->pluck('jam_ke');

        return response()->json($jadwal);
    }

    public function hapusJamTerpilih(Request $request)
    {
        $ids = $request->ids;
        if (is_array($ids) && !empty($ids)) {
            JadwalMingguan::whereIn('id', $ids)->delete();
            return response()->noContent();
        }

        return response()->json(['error' => 'Tidak ada data yang dihapus!'], 400);
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

        $namaRombel = KbmPerRombel::where('kode_rombel', $request->kode_rombel)->value('rombel') ?? '-';
        $namaGuru = PersonilSekolah::where('id_personil', $request->id_personil)->value('namalengkap') ?? '-';
        $mapel = KbmPerRombel::where('kode_mapel_rombel', $request->kode_mapel_rombel)->value('mata_pelajaran') ?? '-';

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

        // bentrok dengan jadwal sendiri
        if (count($duplikatSendiri) > 0) {
            return redirect()->back()
                ->with('error', 'Jam ke-' . implode(', ', $duplikatSendiri) . ' di hari ' . $request->hari . ' sudah pernah diisi. Tidak boleh menimpa jadwal sebelumnya.')
                ->withInput();
        }

        // bentrok dengan guru lain
        if (count($bentrokRombel) > 0) {
            return redirect()->back()
                ->with('error', 'Rombel ini sudah memiliki guru lain pada jam ke-' . implode(', ', $bentrokRombel) . ' di hari ' . $request->hari . '. Jadwal bentrok.')
                ->withInput();
        }

        // menempatkan jam melebihi jam yang di miliki guru.
        $kbm = KbmPerRombel::with('jamMengajar')
            ->where('tahunajaran', $request->tahunajaran)
            ->where('ganjilgenap', $request->semester)
            ->where('kode_rombel', $request->kode_rombel)
            ->where('id_personil', $request->id_personil)
            ->where('kode_mapel_rombel', $request->kode_mapel_rombel)
            ->first();

        $jumlahJamNgajar = ($kbm && $kbm->jamMengajar) ? $kbm->jamMengajar->jumlah_jam : 0;

        $jamTerpakai = JadwalMingguan::where('tahunajaran', $request->tahunajaran)
            ->where('semester', $request->semester)
            ->where('kode_rombel', $request->kode_rombel)
            ->where('id_personil', $request->id_personil)
            ->where('mata_pelajaran', $request->kode_mapel_rombel)
            ->count(); // karena 1 row = 1 jam

        if (($jamTerpakai + $jumlahJam) > $jumlahJamNgajar) {
            return redirect()->back()
                ->with('info', "Jumlah jam <strong>$mapel</strong> di <strong>$namaRombel</strong> yang diampu oleh <strong>$namaGuru</strong> melebihi batas.
        Total jam: $jumlahJamNgajar, sudah terpakai: $jamTerpakai, mau ditambah: $jumlahJam.")
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

        /* return redirect()->back()->with('success', 'Jadwal berhasil disimpan.'); */
        return redirect()->back()
            ->with('success', 'Jadwal berhasil disimpan.')
            ->with('notify_via', 'toast'); // atau 'toast'
    }
}
