<?php

namespace App\Http\Controllers\Kurikulum\PerangkatUjian;

use App\DataTables\Kurikulum\PerangkatUjian\TokenSoalUjianDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\PerangkatUjian\TokenSoalUjianRequest;
use App\Models\Kurikulum\PerangkatUjian\IdentitasUjian;
use App\Models\Kurikulum\PerangkatUjian\JadwalUjian;
use App\Models\Kurikulum\PerangkatUjian\TokenSoalUjian;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use Doctrine\Common\Lexer\Token;
use Illuminate\Http\Request;

class TokenSoalUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TokenSoalUjianDataTable $tokenSoalUjianDataTable)
    {
        $tokenUjian = TokenSoalUjian::all();
        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();
        $kompetensiKeahlian = KompetensiKeahlian::all();

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

        return $tokenSoalUjianDataTable->render('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-token-soal-ujian', [
            'tokenUjian' => $tokenUjian,
            'ujianAktif' => $ujianAktif,
            'kompetensiKeahlian' => $kompetensiKeahlian,
            'tanggalUjianOption' => $tanggalUjianOption,
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
    public function show(TokenSoalUjian $tokenSoalUjian)
    {
        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();

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

        return view('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-token-soal-ujian-form', [
            'data' => $tokenSoalUjian,
            'ujianAktif' => $ujianAktif,
            'tanggalUjian' => $tanggalUjian,
            'tanggalUjianOption' => $tanggalUjianOption,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TokenSoalUjian $tokenSoalUjian)
    {
        $ujianAktif = IdentitasUjian::where('status', 'aktif')->first();

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

        return view('pages.kurikulum.perangkatujian.pelaksanaanujian.crud-token-soal-ujian-form', [
            'data' => $tokenSoalUjian,
            'action' => route('kurikulum.perangkatujian.pelaksanaan-ujian.token-soal-ujian.update', $tokenSoalUjian->id),
            'ujianAktif' => $ujianAktif,
            'tanggalUjian' => $tanggalUjian,
            'tanggalUjianOption' => $tanggalUjianOption,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TokenSoalUjianRequest $request, TokenSoalUjian $tokenSoalUjian)
    {
        $tokenSoalUjian->fill($request->validated());
        $tokenSoalUjian->save();

        return responseSuccess(true);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TokenSoalUjian $tokenSoalUjian)
    {
        $tokenSoalUjian->delete();

        return responseSuccessDelete();
    }

    public function cekJadwaluntukToken(Request $request)
    {
        $jadwal = JadwalUjian::where('tanggal', $request->tanggal)
            ->where('jam_ke', $request->jam_ke)
            ->where('tingkat', $request->tingkat)
            ->where('kode_kk', $request->kode_kk)
            ->first();

        if ($jadwal) {
            $identitas = IdentitasUjian::where('kode_ujian', $jadwal->kode_ujian)->first();

            return response()->json([
                'success' => true,
                'data' => [
                    'kode_ujian' => $jadwal->kode_ujian,
                    'mata_pelajaran' => $jadwal->mata_pelajaran,
                    'tahun_ajaran' => $identitas?->tahun_ajaran,
                ]
            ]);
        }

        return response()->json([
            'success' => false,
            'data' => null,
        ]);
    }

    public function getByKkTahun(Request $request)
    {
        $data = RombonganBelajar::where('tahunajaran', $request->tahunajaran)
            ->where('id_kk', $request->id_kk)
            ->where('tingkat', $request->tingkat)
            ->get();

        return response()->json($data);
    }

    public function simpanTokenMassal(Request $request)
    {
        $request->validate([
            'tanggal_ujian' => 'required|date',
            'jam_ke' => 'required|numeric',
            'tingkat' => 'required',
            'kode_kk' => 'required',
            'kode_ujian' => 'required',
            'mata_pelajaran' => 'required',
            'tokens' => 'required|array',
        ]);

        foreach ($request->tokens as $kodeRombel => $token) {
            if ($token) {
                TokenSoalUjian::create([
                    'kode_ujian'     => $request->kode_ujian,
                    'tanggal_ujian'  => $request->tanggal_ujian,
                    'sesi_ujian'     => $request->jam_ke,
                    'matapelajaran'  => $request->mata_pelajaran,
                    'kelas'          => $kodeRombel, // asumsinya 'kelas' adalah kode_rombel
                    'token_soal'     => $token,
                ]);
            }
        }

        return response()->json(['success' => true, 'message' => 'Token berhasil disimpan.']);
    }
}
