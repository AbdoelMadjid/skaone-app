<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\JadwalUjianDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatUjian\JadwalUjianRequest;
use App\Http\Requests\Kurikulum\PerangkatUjian\RuangUjianRequest;
use App\Models\Kurikulum\DataKBM\MataPelajaranPerJurusan;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\JadwalUjian;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JadwalUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(JadwalUjianDataTable $jadwalUjianDataTable)
    {
        $jadwal = JadwalUjian::all();
        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();
        $kompetensiKeahlian = KompetensiKeahlian::all();
        $tanggalUjian = [];

        if ($ujianAktif) {
            $tanggalUjian = collect(
                \Carbon\CarbonPeriod::create($ujianAktif->tgl_ujian_awal, $ujianAktif->tgl_ujian_akhir)
            )->map(fn($date) => $date->toDateString());
        }

        return $jadwalUjianDataTable->render('pages.kurikulum.perangkatujian.adminujian.crud-jadwal-ujian', [
            'jadwal' => $jadwal,
            'ujianAktif' => $ujianAktif,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tanggalUjian' => $tanggalUjian,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();
        $kompetensiKeahlian = KompetensiKeahlian::all();
        $kompetensiKeahlianOption = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $tanggalUjian = [];

        if ($ujianAktif) {
            $tanggalUjian = collect(
                \Carbon\CarbonPeriod::create($ujianAktif->tgl_ujian_awal, $ujianAktif->tgl_ujian_akhir)
            )->map(fn($date) => $date->toDateString());

            $tanggalUjianOption = $tanggalUjian->mapWithKeys(function ($date) {
                return [$date => \Carbon\Carbon::parse($date)->translatedFormat('l, d M Y')];
            })->toArray();
        } else {
            $tanggalUjianOption = [];
        }

        return view('pages.kurikulum.perangkatujian.adminujian.crud-jadwal-ujian-form', [
            'data' => new JadwalUjian(),
            'action' => route('kurikulum.perangkatujian.administrasi-ujian.jadwal-ujian.store'),
            'ujianAktif' => $ujianAktif,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'kompetensiKeahlianOption' => $kompetensiKeahlianOption,
            'tanggalUjian' => $tanggalUjian,
            'tanggalUjianOption' => $tanggalUjianOption,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JadwalUjianRequest $request)
    {
        $jadwalUjian = new JadwalUjian($request->validated());
        $jadwalUjian->save();

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(JadwalUjian $jadwalUjian)
    {
        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();
        $kompetensiKeahlian = KompetensiKeahlian::all();
        $kompetensiKeahlianOption = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $tanggalUjian = [];

        if ($ujianAktif) {
            $tanggalUjian = collect(
                \Carbon\CarbonPeriod::create($ujianAktif->tgl_ujian_awal, $ujianAktif->tgl_ujian_akhir)
            )->map(fn($date) => $date->toDateString());

            $tanggalUjianOption = $tanggalUjian->mapWithKeys(function ($date) {
                return [$date => \Carbon\Carbon::parse($date)->translatedFormat('l, d M Y')];
            })->toArray();
        } else {
            $tanggalUjianOption = [];
        }

        // 🔽 Tambahan untuk isi mata pelajaran berdasarkan kode_kk
        $mataPelajaranOptions = [];

        if ($jadwalUjian->kode_kk) {
            $mataPelajaran = MataPelajaranPerJurusan::where('kode_kk', $jadwalUjian->kode_kk)
                ->pluck('mata_pelajaran')
                ->toArray();

            $mataPelajaran = array_merge($mataPelajaran, [
                'Dasar-Dasar Kejuruan',
                'Konsentrasi Keahlian',
                'Mata Pelajaran Pilihan'
            ]);

            $mataPelajaranOptions = array_combine($mataPelajaran, $mataPelajaran);
        }

        return view('pages.kurikulum.perangkatujian.adminujian.crud-jadwal-ujian-form', [
            'data' => $jadwalUjian,
            'ujianAktif' => $ujianAktif,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'kompetensiKeahlianOption' => $kompetensiKeahlianOption,
            'tanggalUjian' => $tanggalUjian,
            'tanggalUjianOption' => $tanggalUjianOption,
            'mataPelajaranOptions' => $mataPelajaranOptions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JadwalUjian $jadwalUjian)
    {
        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();
        $kompetensiKeahlian = KompetensiKeahlian::all();
        $kompetensiKeahlianOption = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $tanggalUjian = [];

        if ($ujianAktif) {
            $tanggalUjian = collect(
                \Carbon\CarbonPeriod::create($ujianAktif->tgl_ujian_awal, $ujianAktif->tgl_ujian_akhir)
            )->map(fn($date) => $date->toDateString());

            $tanggalUjianOption = $tanggalUjian->mapWithKeys(function ($date) {
                return [$date => \Carbon\Carbon::parse($date)->translatedFormat('l, d M Y')];
            })->toArray();
        } else {
            $tanggalUjianOption = [];
        }

        // 🔽 Tambahan untuk isi mata pelajaran berdasarkan kode_kk
        $mataPelajaranOptions = [];

        if ($jadwalUjian->kode_kk) {
            $mataPelajaran = MataPelajaranPerJurusan::where('kode_kk', $jadwalUjian->kode_kk)
                ->pluck('mata_pelajaran')
                ->toArray();

            $mataPelajaran = array_merge($mataPelajaran, [
                'Dasar-Dasar Kejuruan',
                'Konsentrasi Keahlian',
                'Mata Pelajaran Pilihan'
            ]);

            $mataPelajaranOptions = array_combine($mataPelajaran, $mataPelajaran);
        }

        return view('pages.kurikulum.perangkatujian.adminujian.crud-jadwal-ujian-form', [
            'data' => $jadwalUjian,
            'action' => route('kurikulum.perangkatujian.administrasi-ujian.jadwal-ujian.update', $jadwalUjian->id),
            'ujianAktif' => $ujianAktif,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'kompetensiKeahlianOption' => $kompetensiKeahlianOption,
            'tanggalUjian' => $tanggalUjian,
            'tanggalUjianOption' => $tanggalUjianOption,
            'mataPelajaranOptions' => $mataPelajaranOptions,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JadwalUjianRequest $request, JadwalUjian $jadwalUjian)
    {
        $jadwalUjian->fill($request->validated());
        $jadwalUjian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JadwalUjian $jadwalUjian)
    {
        $jadwalUjian->delete();

        return responseSuccessDelete();
    }

    public function getMapelByKK($kode_kk)
    {
        $mapel = MataPelajaranPerJurusan::where('kode_kk', $kode_kk)->pluck('mata_pelajaran', 'mata_pelajaran');
        return response()->json($mapel);
    }

    public function generateMassal(Request $request)
    {
        $request->validate([
            'kode_kk' => 'required',
            'tingkat' => 'required',
        ]);

        $ujianAktif = IdentitasUjian::where('status', 'aktif')->firstOrFail();
        $tanggalMulai = Carbon::parse($ujianAktif->tgl_ujian_awal);
        $tanggalAkhir = Carbon::parse($ujianAktif->tgl_ujian_akhir);
        $periode = CarbonPeriod::create($tanggalMulai, $tanggalAkhir);

        $jamKeList = [
            1 => '07.30 - 08.30',
            2 => '09.00 - 10.00',
            3 => '10.30 - 11.30',
            4 => '13.00 - 14.00',
        ];

        $mataPelajaran = MataPelajaranPerJurusan::where('kode_kk', $request->kode_kk)->pluck('mata_pelajaran');

        return response()->json([
            'tanggal' => collect($periode)->map(function ($tgl) {
                return ['date' => $tgl->format('Y-m-d')];
            }),
            'jamKeList' => $jamKeList,
            'mapel' => $mataPelajaran,
            'kode_ujian' => $ujianAktif->kode_ujian,
        ]);
    }

    public function simpanMassal(Request $request)
    {
        $data = $request->input('data');

        foreach ($data as $row) {
            if (empty($row['mata_pelajaran'])) {
                continue; // skip jika kosong
            }
            JadwalUjian::create([
                'kode_ujian' => $row['kode_ujian'],
                'kode_kk' => $row['kode_kk'],
                'tingkat' => $row['tingkat'],
                'tanggal' => $row['tanggal'],
                'jam_ke' => $row['jam_ke'],
                'jam_ujian' => $row['jam_ujian'],
                'mata_pelajaran' => $row['mata_pelajaran'],
            ]);
        }

        return response()->json(['message' => 'Berhasil disimpan']);
    }
}
