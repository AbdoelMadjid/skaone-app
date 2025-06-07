<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
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

            // Cek apakah ada tahun ajaran aktif
            $tahunAjaranAktif = TahunAjaran::aktif()->first();
            if (!$tahunAjaranAktif) {
                return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
            }

            // Cek apakah ada semester aktif untuk tahun ajaran tersebut
            $semester = $tahunAjaranAktif->semesters()->where('status', 'Aktif')->first();
            if (!$semester) {
                return redirect()->back()->with('error', 'Tidak ada semester aktif.');
            }

            // Ambil semua opsi tahun ajaran
            $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

            $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
            $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

            // Cek apakah ada data pada KunciDataKbm untuk id_personil
            $pilihData = MilihData::where('id_personil', $personal_id)->first();

            // Ambil data tahun ajaran dan semester berdasarkan data di KunciDataKbm atau fallback ke aktif
            $tahunajaran = $pilihData->tahunajaran ?? $tahunAjaranAktif->tahunajaran;
            $ganjilgenap = $pilihData->semester ?? $semester->semester;

            // Ambil kode_rombel dari $pilihData
            $kodeRombel = $pilihData ? $pilihData->kode_rombel : null;

            $pesertaDidik = collect(); // default: empty collection
            $waliKelas = null;

            if ($kodeRombel) {
                // Ambil data peserta didik + wali kelas
                $pesertaDidik = DB::table('peserta_didik_rombels')
                    ->join('rombongan_belajars', function ($join) {
                        $join->on('peserta_didik_rombels.tahun_ajaran', '=', 'rombongan_belajars.tahunajaran')
                            ->on('peserta_didik_rombels.kode_kk', '=', 'rombongan_belajars.id_kk')
                            ->on('peserta_didik_rombels.rombel_tingkat', '=', 'rombongan_belajars.tingkat')
                            ->on('peserta_didik_rombels.rombel_kode', '=', 'rombongan_belajars.kode_rombel');
                    })
                    ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                    ->leftJoin('personil_sekolahs', 'rombongan_belajars.wali_kelas', '=', 'personil_sekolahs.id_personil')
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
                    ->where('peserta_didik_rombels.rombel_kode', $kodeRombel) // <- Tambahkan ini
                    ->get();

                // Ambil data wali kelas dari baris pertama saja (karena diasumsikan 1 rombel)
                $waliKelas = null;
                if ($pesertaDidik->count()) {
                    $first = $pesertaDidik->first();
                    $namaWali = trim("{$first->gelardepan} {$first->nama_wali} {$first->gelarbelakang}");
                    $waliKelas = [
                        'nama' => $namaWali,
                        'nip' => $first->nip ?? '-'
                    ];
                }
            }

            return view("pages.kurikulum.dokumensiswa.remedial-peserta-didik", [
                'user' => $user,
                'personal_id' => $personal_id,
                'tahunAjaranAktif' => $tahunAjaranAktif,
                'semester' => $semester,
                'tahunAjaranOptions' => $tahunAjaranOptions,
                'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
                'rombonganBelajar' => $rombonganBelajar,
                'pilihData' => $pilihData,
                'tahunajaran' => $tahunajaran,
                'ganjilgenap' => $ganjilgenap,
                'pesertaDidik' => $pesertaDidik,
                'waliKelas' => $waliKelas,
            ]);
        }

        // Jika user tidak login, redirect ke halaman login
        return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
        //return view('pages.kurikulum.dokumensiswa.remedial-peserta-didik');
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
