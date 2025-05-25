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
use Illuminate\Http\Request;

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
}
