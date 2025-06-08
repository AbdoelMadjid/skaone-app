<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\Kurikulum\DokumenSiswa\PilihRemedial;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\MilihData;
use App\Models\User;
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
        if (auth()->check()) {
            $user = User::find(Auth::user()->id);
            $personal_id = $user->personal_id;

            $tahunMasuk = PesertaDidik::select('thnajaran_masuk')
                ->distinct()
                ->orderBy('thnajaran_masuk', 'asc')
                ->pluck('thnajaran_masuk');

            // Cek apakah ada data pada KunciDataKbm untuk id_personil
            $pilihData = PilihRemedial::where('id_user', $personal_id)->first();

            // Ambil data tahun ajaran dan semester berdasarkan data di KunciDataKbm atau fallback ke aktif
            $thnMasuk = $pilihData ? $pilihData->tahun_masuk : null;

            return view("pages.kurikulum.dokumensiswa.remedial-peserta-didik", [
                'user' => $user,
                'personal_id' => $personal_id,
                'tahunMasuk' => $tahunMasuk,
                'thnMasuk' => $thnMasuk,
            ]);
        }

        // Jika user tidak login, redirect ke halaman login
        return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
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




    public function getTahunAjaranRombel(Request $request)
    {
        $request->validate([
            'kode_kk' => 'required',
        ]);

        $tahunAjarans = PesertaDidikRombel::where('kode_kk', $request->kode_kk)
            ->select('tahun_ajaran')
            ->distinct()
            ->orderBy('tahun_ajaran', 'desc')
            ->pluck('tahun_ajaran');

        return response()->json($tahunAjarans);
    }

    public function getRombelTingkatByTahun(Request $request)
    {
        $request->validate([
            'kode_kk' => 'required',
            'tahun_ajaran' => 'required',
        ]);

        $tingkats = PesertaDidikRombel::where('kode_kk', $request->kode_kk)
            ->where('tahun_ajaran', $request->tahun_ajaran)
            ->select('rombel_tingkat')
            ->distinct()
            ->orderBy('rombel_tingkat')
            ->pluck('rombel_tingkat');

        return response()->json($tingkats);
    }

    public function getRombelList(Request $request)
    {
        $request->validate([
            'kode_kk' => 'required',
            'tahun_ajaran' => 'required',
            'rombel_tingkat' => 'required',
        ]);

        $rombels = PesertaDidikRombel::where('kode_kk', $request->kode_kk)
            ->where('tahun_ajaran', $request->tahun_ajaran)
            ->where('rombel_tingkat', $request->rombel_tingkat)
            ->select('rombel_kode', 'rombel_nama')
            ->distinct()
            ->orderBy('rombel_nama')
            ->get();

        return response()->json($rombels);
    }

    public function getTableSiswaByRombel(Request $request)
    {
        $request->validate([
            'kode_kk' => 'required',
            'tahun_ajaran' => 'required',
            'rombel_tingkat' => 'required',
            'rombel_kode' => 'required',
        ]);

        $siswas = DB::table('peserta_didik_rombels AS pr')
            ->join('peserta_didiks AS pd', 'pr.nis', '=', 'pd.nis')
            ->where('pr.kode_kk', $request->kode_kk)
            ->where('pr.tahun_ajaran', $request->tahun_ajaran)
            ->where('pr.rombel_tingkat', $request->rombel_tingkat)
            ->where('pr.rombel_kode', $request->rombel_kode)
            ->select('pr.nis', 'pd.nama_lengkap', 'pd.jenis_kelamin')
            ->distinct()
            ->get();

        return view('pages.kurikulum.dokumensiswa.remedial-peserta-didik-tampil', ['siswas' => $siswas]);
    }





    //// UNTUK DI HAPUS ..................................................
    public function getKodeRombelRemedial(Request $request)
    {
        $tahunAjaran = $request->query('tahunajaran');
        $kodeKk = $request->query('kode_kk');
        $tingkat = $request->query('tingkat');

        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $tahunAjaran)
            ->where('id_kk', $kodeKk)
            ->where('tingkat', $tingkat)
            ->get(['rombel', 'kode_rombel']);

        return response()->json($rombonganBelajar);
    }

    public function getRombelDanSiswa(Request $request)
    {
        $tahunajaran = $request->tahunajaran;
        $kode_kk = $request->kode_kk;
        $tingkat = $request->tingkat;
        $kode_rombel = $request->kode_rombel;

        $rombels = RombonganBelajar::where('tahunajaran', $tahunajaran)
            ->where('id_kk', $kode_kk)
            ->where('tingkat', $tingkat)
            ->get(['kode_rombel', 'rombel']);

        $rombelOptions = $rombels->map(fn($r) => [
            'kode_rombel' => $r->kode_rombel,
            'rombel' => $r->rombel,
        ]);

        $html = '';
        $waliKelas = null;

        if ($kode_rombel) {
            $pesertaDidik = DB::table('peserta_didik_rombels')
                ->join('rombongan_belajars', function ($join) {
                    $join->on('peserta_didik_rombels.tahun_ajaran', '=', 'rombongan_belajars.tahunajaran')
                        ->on('peserta_didik_rombels.kode_kk', '=', 'rombongan_belajars.id_kk')
                        ->on('peserta_didik_rombels.rombel_tingkat', '=', 'rombongan_belajars.tingkat')
                        ->on('peserta_didik_rombels.rombel_kode', '=', 'rombongan_belajars.kode_rombel');
                })
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->leftJoin('personil_sekolahs', 'rombongan_belajars.wali_kelas', '=', 'personil_sekolahs.id_personil')
                ->where('peserta_didik_rombels.tahun_ajaran', $tahunajaran)
                ->where('peserta_didik_rombels.kode_kk', $kode_kk)
                ->where('peserta_didik_rombels.rombel_tingkat', $tingkat)
                ->where('peserta_didik_rombels.rombel_kode', $kode_rombel)
                ->select(
                    'peserta_didik_rombels.rombel_nama',
                    'peserta_didik_rombels.nis',
                    'peserta_didiks.nama_lengkap',
                    'peserta_didiks.jenis_kelamin',
                    'personil_sekolahs.nip',
                    'personil_sekolahs.gelardepan',
                    'personil_sekolahs.namalengkap as nama_wali',
                    'personil_sekolahs.gelarbelakang'
                )
                ->get();

            if ($pesertaDidik->count()) {
                $first = $pesertaDidik->first();
                $namaWali = trim("{$first->gelardepan} {$first->nama_wali} {$first->gelarbelakang}");
                $waliKelas = [
                    'nama' => $namaWali,
                    'nip' => $first->nip ?? '-'
                ];
            }

            $html = view('pages.kurikulum.dokumensiswa._partial-data-siswa', compact('pesertaDidik'))->render();
        }

        return response()->json([
            'rombels' => $rombelOptions,
            'html' => $html,
            'wali_kelas' => $waliKelas
        ]);
    }
}
