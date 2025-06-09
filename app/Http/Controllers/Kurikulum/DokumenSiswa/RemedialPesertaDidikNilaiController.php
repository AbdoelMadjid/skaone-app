<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\Http\Controllers\Controller;
use App\Models\GuruMapel\NilaiFormatif;
use App\Models\GuruMapel\NilaiSumatif;
use App\Models\GuruMapel\TujuanPembelajaran;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\MilihData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RemedialPesertaDidikNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("pages.kurikulum.dokumensiswa.remedial-peserta-didik");
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
        // Validasi input data
        $request->validate([
            'id_personil' => 'required|exists:users,personal_id', // Pastikan id_personil valid
            'tahunajaran' => 'required',
            'semester' => 'required',
            'kode_kk' => 'nullable',  // Jika ada nilai, bisa disertakan
            'tingkat' => 'nullable',  // Jika ada nilai, bisa disertakan
            'kode_rombel' => 'nullable',  // Jika ada nilai, bisa disertakan
        ]);

        // Cek apakah data sudah ada
        $existingData = MilihData::where('id_personil', $request->id_personil)->first();

        if ($existingData) {
            // Jika sudah ada, update data
            $existingData->tahunajaran = $request->tahunajaran;
            $existingData->semester = $request->semester;
            $existingData->kode_kk = $request->kode_kk;
            $existingData->tingkat = $request->tingkat;
            $existingData->kode_rombel = $request->kode_rombel;
            $existingData->save();

            /// Redirect atau kembali dengan pesan sukses
            return redirect()->route('kurikulum.dokumentsiswa.remedial-peserta-didik.index')->with('success', 'Data berhasil diupdate.');
        } else {
            // Jika belum ada, simpan data baru
            $newData = new MilihData();
            $newData->id_personil = $request->id_personil;
            $newData->tahunajaran = $request->tahunajaran;
            $newData->semester = $request->semester;
            $newData->kode_kk = $request->kode_kk;
            $newData->tingkat = $request->tingkat;
            $newData->kode_rombel = $request->kode_rombel;
            $newData->id_siswa = "";
            $newData->id_guru = "";
            $newData->save();

            // Redirect atau kembali dengan pesan sukses
            return redirect()->route('kurikulum.dokumentsiswa.remedial-peserta-didik.index')->with('success', 'Data berhasil ditambahkan.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function getTahunAjaran()
    {
        $tahunAjaran = PesertaDidik::select('thnajaran_masuk')
            ->distinct()
            ->orderBy('thnajaran_masuk', 'desc')
            ->pluck('thnajaran_masuk');

        return response()->json($tahunAjaran);
    }

    public function getKompetensiKeahlian($tahun)
    {
        // Ambil kode_kk dari peserta_didik berdasarkan thnajaran_masuk
        $kodeKks = PesertaDidik::where('thnajaran_masuk', $tahun)
            ->select('kode_kk')
            ->distinct()
            ->pluck('kode_kk');

        // Ambil nama_kk dari model KompetensiKeahlian berdasarkan kode_kk
        $kompetensis = KompetensiKeahlian::whereIn('idkk', $kodeKks)
            ->select('idkk as kode_kk', 'nama_kk')
            ->get();

        return response()->json($kompetensis);
    }


    public function filterSiswa(Request $request)
    {
        $tahun = $request->thnajaran_masuk;
        $kodeKk = $request->kode_kk;

        // Step 1: Ambil peserta didik yang sesuai filter
        $siswas = PesertaDidik::where('thnajaran_masuk', $tahun)
            ->where('kode_kk', $kodeKk)
            ->get()
            ->keyBy('nis'); // Key by NIS untuk lookup cepat

        // Step 2: Ambil NIS siswa yang cocok
        $nises = $siswas->keys();

        // Step 3: Ambil data rombel siswa berdasarkan NIS (tingkat 10, 11, 12)
        $rombels = PesertaDidikRombel::whereIn('nis', $nises)
            ->get()
            ->groupBy('nis');

        return view('pages.kurikulum.dokumensiswa.remedial-peserta-didik-tampil', compact('rombels', 'siswas'));
    }

    public function cekMataPelajaran(Request $request)
    {
        $nis = $request->nis;
        $kodeKk = $request->kode_kk;

        $rombels = [
            10 => $request->rombel10,
            11 => $request->rombel11,
            12 => $request->rombel12,
        ];

        $tahunAjarans = [
            10 => $request->thnajaran10,
            11 => $request->thnajaran11,
            12 => $request->thnajaran12,
        ];

        $data = [];

        foreach ([10, 11, 12] as $tingkat) {
            $rombelKode = $rombels[$tingkat];
            if (!$rombelKode) continue;

            foreach (['Ganjil', 'Genap'] as $semester) {
                $mapels = KbmPerRombel::where([
                    'kode_kk' => $kodeKk,
                    'tingkat' => $tingkat,
                    'ganjilgenap' => $semester,
                    'kode_rombel' => $rombelKode,
                ])->get();

                foreach ($mapels as $mapel) {
                    $tpQuery = TujuanPembelajaran::where([
                        'tahunajaran' => $tahunAjarans[$tingkat],
                        'ganjilgenap' => $semester,
                        'tingkat' => $tingkat,
                        'kode_rombel' => $rombelKode,
                        'kel_mapel' => $mapel->kel_mapel,
                    ]);

                    $mapel->jumlah_tp = $tpQuery->count();

                    $personilIds = $tpQuery->distinct()->pluck('id_personil');
                    $personils = PersonilSekolah::whereIn('id_personil', $personilIds)->get();

                    $mapel->personil_info = $personils->map(function ($p) {
                        return $p->id_personil . ' – ' . trim("{$p->gelardepan} {$p->namalengkap} {$p->gelarbelakang}");
                    })->implode(', ');

                    // Ambil nilai formatif
                    $nilaiFormatif = NilaiFormatif::where([
                        'tahunajaran' => $tahunAjarans[$tingkat],
                        'ganjilgenap' => $semester,
                        'tingkat' => $tingkat,
                        'kode_rombel' => $rombelKode,
                        'kel_mapel' => $mapel->kel_mapel,
                        'nis' => $nis,
                    ])->whereIn('id_personil', $personilIds)->first();

                    if ($nilaiFormatif) {
                        $nilaiList = [];
                        for ($i = 1; $i <= $mapel->jumlah_tp; $i++) {
                            $field = "tp_nilai_$i";
                            $val = $nilaiFormatif->$field;
                            if (!is_null($val)) {
                                $class = ($val < $mapel->kkm) ? 'text-danger' : '';
                                $nilaiList[] = "<span class='{$class}'>($val)</span>";
                            }
                        }

                        $rr = $nilaiFormatif->rerata_formatif;
                        $rrClass = ($rr < $mapel->kkm) ? 'text-danger' : '';
                        $mapel->nilai_formatif = implode(' ', $nilaiList);
                        $mapel->rerata_formatif = "<span class='{$rrClass}'>$rr</span>";
                        $mapel->rerata_formatif_angka = $rr; // simpan nilai mentah
                    } else {
                        $mapel->nilai_formatif = '-';
                        $mapel->rerata_formatif = '-';
                    }

                    // NILAI SUMATIF
                    $nilaiSumatif = NilaiSumatif::where([
                        'tahunajaran'   => $tahunAjarans[$tingkat],
                        'ganjilgenap'   => $semester,
                        'tingkat'       => $tingkat,
                        'kode_rombel'   => $rombelKode,
                        'kel_mapel'     => $mapel->kel_mapel,
                        'nis'           => $nis,
                    ])->whereIn('id_personil', $personilIds)->first();

                    if ($nilaiSumatif) {
                        $sts = $nilaiSumatif->sts;
                        $sas = $nilaiSumatif->sas;
                        $rerataSumatif = $nilaiSumatif->rerata_sumatif;

                        $stsClass = ($sts < $mapel->kkm) ? 'text-danger' : '';
                        $sasClass = ($sas < $mapel->kkm) ? 'text-danger' : '';
                        $rrClass  = ($rerataSumatif < $mapel->kkm) ? 'text-danger' : '';

                        $mapel->nilai_sumatif = "<span class='{$stsClass}'>($sts)</span> <span class='{$sasClass}'>($sas)</span>";
                        $mapel->rerata_sumatif = "<span class='{$rrClass}'>$rerataSumatif</span>";
                        $mapel->rerata_sumatif_angka = $rerataSumatif;

                        // Hitung Nilai Akhir
                        if (is_numeric($mapel->rerata_formatif_angka ?? null) && is_numeric($mapel->rerata_sumatif_angka ?? null)) {
                            $na = round(($mapel->rerata_formatif_angka + $mapel->rerata_sumatif_angka) / 2);
                            $naClass = ($na < $mapel->kkm) ? 'text-danger' : '';
                            $mapel->nilai_akhir = "<span class='{$naClass}'>$na</span>";
                        } else {
                            $mapel->nilai_akhir = '-';
                        }
                    } else {
                        $mapel->nilai_sumatif = '-';
                        $mapel->rerata_sumatif = '-';
                        $mapel->nilai_akhir = '-';
                    }
                }

                $data[$tingkat][strtolower($semester)] = $mapels;
            }
        }

        $siswa = PesertaDidik::where('nis', $nis)->first();

        return view('pages.kurikulum.dokumensiswa.remedial-peserta-didik-tampil-nilai', [
            'data' => $data,
            'siswa' => $siswa,
            'tahunAjarans' => $tahunAjarans,
        ]);
    }

    public function cetakRemedial(Request $request)
    {
        $siswa = PesertaDidik::where('nis', $request->nis)->firstOrFail();
        $mapel = KbmPerRombel::where([
            'kode_rombel' => $request->kode_rombel,
            'kel_mapel' => $request->kel_mapel,
        ])->firstOrFail();

        $nilaiFormatif = NilaiFormatif::where([
            'tahunajaran' => $request->tahunajaran,
            'ganjilgenap' => $request->ganjilgenap,
            'tingkat' => $request->tingkat,
            'kode_rombel' => $request->kode_rombel,
            'kel_mapel' => $request->kel_mapel,
            'nis' => $request->nis,
            'id_personil' => $request->id_personil,
        ])->first();

        $nilaiSumatif = NilaiSumatif::where([
            'tahunajaran' => $request->tahunajaran,
            'ganjilgenap' => $request->ganjilgenap,
            'tingkat' => $request->tingkat,
            'kode_rombel' => $request->kode_rombel,
            'kel_mapel' => $request->kel_mapel,
            'nis' => $request->nis,
            'id_personil' => $request->id_personil,
        ])->first();

        $jumlahTp = TujuanPembelajaran::where([
            'tahunajaran' => $request->tahunajaran,
            'ganjilgenap' => $request->ganjilgenap,
            'tingkat' => $request->tingkat,
            'kode_rombel' => $request->kode_rombel,
            'kel_mapel' => $request->kel_mapel,
        ])->count();

        return view('pages.kurikulum.dokumensiswa.remedial-peserta-didik-cetak', [
            'siswa' => $siswa,
            'mapel' => $mapel,
            'nilaiFormatif' => $nilaiFormatif,
            'nilaiSumatif' => $nilaiSumatif,
            'jumlahTp' => $jumlahTp,
            'tahunajaran' => $request->tahunajaran,
            'ganjilgenap' => $request->ganjilgenap,
        ]);
    }
}
