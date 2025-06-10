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
                    $mapel->thnajaran = $tahunAjarans[$tingkat];
                    $mapel->gg = $semester;
                    $mapel->tkt = $tingkat;
                    $mapel->kode_kk = $kodeKk;

                    $waliKelas = DB::table('rombongan_belajars')
                        ->join('personil_sekolahs', 'rombongan_belajars.wali_kelas', '=', 'personil_sekolahs.id_personil')
                        ->where('rombongan_belajars.kode_rombel', $rombelKode)
                        ->select(
                            'rombongan_belajars.*',
                            'personil_sekolahs.nip',
                            'personil_sekolahs.gelardepan',
                            'personil_sekolahs.namalengkap',
                            'personil_sekolahs.gelarbelakang'
                        )
                        ->first();


                    $tpQuery = TujuanPembelajaran::where([
                        'tahunajaran'   => $tahunAjarans[$tingkat],
                        'ganjilgenap'   => $semester,
                        'tingkat'       => $tingkat,
                        'kode_rombel'   => $rombelKode,
                        'kel_mapel'     => $mapel->kel_mapel,
                    ]);

                    $mapel->jumlah_tp = $tpQuery->count();

                    $personilIds = $tpQuery->distinct()->pluck('id_personil');
                    $personils = PersonilSekolah::whereIn('id_personil', $personilIds)->get();

                    $mapel->personil_info = $personils->map(function ($p) {
                        return $p->id_personil . ' – ' . trim("{$p->gelardepan} {$p->namalengkap} {$p->gelarbelakang}");
                    })->implode(', ');


                    // Ambil nilai formatif
                    $nilaiFormatif = NilaiFormatif::where([
                        'tahunajaran'   => $tahunAjarans[$tingkat],
                        'ganjilgenap'   => $semester,
                        'tingkat'       => $tingkat,
                        'kode_rombel'   => $rombelKode,
                        'kel_mapel'     => $mapel->kel_mapel,
                        'nis'           => $nis,
                    ])->whereIn('id_personil', $personilIds)->first();

                    $nilai_formatif_kurang_kkm = false;
                    $nilaiList = [];

                    if ($nilaiFormatif) {
                        for ($i = 1; $i <= $mapel->jumlah_tp; $i++) {
                            $field = "tp_nilai_$i";
                            $nilai = $nilaiFormatif->$field;

                            if (!is_null($nilai)) {
                                $warna = $nilai < $mapel->kkm ? 'text-danger' : '';
                                if ($warna) $nilai_formatif_kurang_kkm = true;
                                $nilaiList[] = "<span class='$warna'>($nilai)</span>";
                            }
                        }

                        $mapel->nilai_formatif = implode(' ', $nilaiList);
                        $mapel->rerata_formatif = $nilaiFormatif->rerata_formatif;
                        $mapel->rerata_formatif_label = $nilaiFormatif->rerata_formatif < $mapel->kkm
                            ? "<span class='text-danger'>{$nilaiFormatif->rerata_formatif}</span>"
                            : $nilaiFormatif->rerata_formatif;
                    } else {
                        $mapel->nilai_formatif = '-';
                        $mapel->rerata_formatif = '-';
                        $mapel->rerata_formatif_label = '-';
                    }

                    // Nilai Sumatif
                    $nilaiSumatif = NilaiSumatif::where([
                        'tahunajaran'   => $tahunAjarans[$tingkat],
                        'ganjilgenap'   => $semester,
                        'tingkat'       => $tingkat,
                        'kode_rombel'   => $rombelKode,
                        'kel_mapel'     => $mapel->kel_mapel,
                        'nis'           => $nis,
                    ])->whereIn('id_personil', $personilIds)->first();

                    $nilai_sumatif_kurang_kkm = false;

                    if ($nilaiSumatif) {
                        $sts = $nilaiSumatif->sts;
                        $sas = $nilaiSumatif->sas;

                        $stsLabel = $sts < $mapel->kkm ? "<span class='text-danger'>($sts)</span>" : "($sts)";
                        $sasLabel = $sas < $mapel->kkm ? "<span class='text-danger'>($sas)</span>" : "($sas)";
                        if ($sts < $mapel->kkm || $sas < $mapel->kkm) $nilai_sumatif_kurang_kkm = true;

                        $mapel->nilai_sumatif = $stsLabel . ' ' . $sasLabel;
                        $mapel->rerata_sumatif = $nilaiSumatif->rerata_sumatif;
                        $mapel->rerata_sumatif_label = $nilaiSumatif->rerata_sumatif < $mapel->kkm
                            ? "<span class='text-danger'>{$nilaiSumatif->rerata_sumatif}</span>"
                            : $nilaiSumatif->rerata_sumatif;
                    } else {
                        $mapel->nilai_sumatif = '-';
                        $mapel->rerata_sumatif = '-';
                        $mapel->rerata_sumatif_label = '-';
                    }

                    // Nilai Akhir (rerata kedua rerata)
                    if (is_numeric($mapel->rerata_formatif) && is_numeric($mapel->rerata_sumatif)) {
                        $na = round(($mapel->rerata_formatif + $mapel->rerata_sumatif) / 2);
                        $mapel->nilai_akhir = $na;
                        $mapel->nilai_akhir_label = $na < $mapel->kkm
                            ? "<span class='text-danger'>{$na}</span>"
                            : $na;
                    } else {
                        $mapel->nilai_akhir = '-';
                        $mapel->nilai_akhir_label = '-';
                    }

                    $mapel->show_cetak_remedial = $nilai_formatif_kurang_kkm || $nilai_sumatif_kurang_kkm || (
                        is_numeric($mapel->nilai_akhir) && $mapel->nilai_akhir < $mapel->kkm
                    );
                }

                $data[$tingkat][strtolower($semester)] = $mapels;
            }
        }

        $siswa = PesertaDidik::where('nis', $nis)->first();

        return view('pages.kurikulum.dokumensiswa.remedial-peserta-didik-tampil-nilai', [
            'data' => $data,
            'siswa' => $siswa,
            'tahunAjarans' => $tahunAjarans,
            'waliKelas' => $waliKelas,
        ]);
    }


    public function cetakRemedial(Request $request)
    {
        $nis = $request->nis;
        $tahunajaran = $request->tahunajaran;
        $tingkat = $request->tingkat;
        $ganjilgenap = $request->ganjilgenap;
        $kode_rombel = $request->kode_rombel;
        $kel_mapel = $request->kel_mapel;
        $kode_mapel = $request->kode_mapel;
        $id_personil = $request->id_personil;

        $siswa = PesertaDidik::where('nis', $nis)->first();
        $datapersonil = PersonilSekolah::where('id_personil', $id_personil)->first();

        $mapel = KbmPerRombel::where([
            //'peserta_didik_nis' => $nis,
            'tahunajaran' => $tahunajaran,
            'tingkat' => $tingkat,
            'ganjilgenap' => $ganjilgenap,
            'kode_rombel' => $kode_rombel,
            'kel_mapel' => $kel_mapel,
            'kode_mapel' => $kode_mapel,
            'id_personil' => $id_personil,
        ])->first();

        $tpQuery = TujuanPembelajaran::where([
            'tahunajaran'   => $tahunajaran,
            'ganjilgenap'   => $ganjilgenap,
            'tingkat'       => $tingkat,
            'kode_rombel'   => $kode_rombel,
            'kel_mapel'     => $mapel->kel_mapel,
        ]);

        $mapel->jumlah_tp = $tpQuery->count();

        $personilIds = $tpQuery->distinct()->pluck('id_personil');
        $personils = PersonilSekolah::whereIn('id_personil', $personilIds)->get();

        $mapel->personil_info = $personils->map(function ($p) {
            return trim("{$p->gelardepan} {$p->namalengkap} {$p->gelarbelakang}");
        })->implode(', ');

        // Ambil nilai formatif
        $nilaiFormatif = NilaiFormatif::where([
            'tahunajaran'   => $tahunajaran,
            'ganjilgenap'   => $ganjilgenap,
            'tingkat'       => $tingkat,
            'kode_rombel'   => $kode_rombel,
            'kel_mapel'     => $mapel->kel_mapel,
            'nis'           => $nis,
        ])->whereIn('id_personil', $personilIds)->first();

        $nilai_formatif_kurang_kkm = false;
        $nilaiList = [];

        if ($nilaiFormatif) {
            for ($i = 1; $i <= $mapel->jumlah_tp; $i++) {
                $field = "tp_nilai_$i";
                $nilai = $nilaiFormatif->$field;

                if (!is_null($nilai)) {
                    $warna = $nilai < $mapel->kkm ? 'text-danger' : '';
                    if ($warna) $nilai_formatif_kurang_kkm = true;
                    $nilaiList[] = "<span class='$warna'>($nilai)</span>";
                }
            }

            $mapel->nilai_formatif = implode(' ', $nilaiList);
            $mapel->rerata_formatif = $nilaiFormatif->rerata_formatif;
            $mapel->rerata_formatif_label = $nilaiFormatif->rerata_formatif < $mapel->kkm
                ? "<span class='text-danger'>{$nilaiFormatif->rerata_formatif}</span>"
                : $nilaiFormatif->rerata_formatif;
        } else {
            $mapel->nilai_formatif = '-';
            $mapel->rerata_formatif = '-';
            $mapel->rerata_formatif_label = '-';
        }

        // Nilai Sumatif
        $nilaiSumatif = NilaiSumatif::where([
            'tahunajaran'   => $tahunajaran,
            'ganjilgenap'   => $ganjilgenap,
            'tingkat'       => $tingkat,
            'kode_rombel'   => $kode_rombel,
            'kel_mapel'     => $mapel->kel_mapel,
            'nis'           => $nis,
        ])->whereIn('id_personil', $personilIds)->first();

        $nilai_sumatif_kurang_kkm = false;

        if ($nilaiSumatif) {
            $sts = $nilaiSumatif->sts;
            $sas = $nilaiSumatif->sas;

            $stsLabel = $sts < $mapel->kkm ? "<span class='text-danger'>($sts)</span>" : "($sts)";
            $sasLabel = $sas < $mapel->kkm ? "<span class='text-danger'>($sas)</span>" : "($sas)";
            if ($sts < $mapel->kkm || $sas < $mapel->kkm) $nilai_sumatif_kurang_kkm = true;

            $mapel->nilai_sumatif = $stsLabel . ' ' . $sasLabel;
            $mapel->rerata_sumatif = $nilaiSumatif->rerata_sumatif;
            $mapel->rerata_sumatif_label = $nilaiSumatif->rerata_sumatif < $mapel->kkm
                ? "<span class='text-danger'>{$nilaiSumatif->rerata_sumatif}</span>"
                : $nilaiSumatif->rerata_sumatif;
        } else {
            $mapel->nilai_sumatif = '-';
            $mapel->rerata_sumatif = '-';
            $mapel->rerata_sumatif_label = '-';
        }

        // Nilai Akhir (rerata kedua rerata)
        if (is_numeric($mapel->rerata_formatif) && is_numeric($mapel->rerata_sumatif)) {
            $na = round(($mapel->rerata_formatif + $mapel->rerata_sumatif) / 2);
            $mapel->nilai_akhir = $na;
            $mapel->nilai_akhir_label = $na < $mapel->kkm
                ? "<span class='text-danger'>{$na}</span>"
                : $na;
        } else {
            $mapel->nilai_akhir = '-';
            $mapel->nilai_akhir_label = '-';
        }


        return view('pages.kurikulum.dokumensiswa.remedial-peserta-didik-cetak', [
            'siswa' => $siswa,
            'datapersonil' => $datapersonil,
            'mapel' => $mapel,
            'nilaiFormatif' => $nilaiFormatif,
            'nilaiSumatif' => $nilaiSumatif,
        ]);
    }


    public function cetakRemedialOLD(Request $request)
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
