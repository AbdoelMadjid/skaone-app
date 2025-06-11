<?php

namespace App\Http\Controllers\Kurikulum\DokumenGuru;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\Kurikulum\DokumenGuru\PilihArsipWaliKelas;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\WaliKelas\AbsensiSiswa;
use App\Models\WaliKelas\CatatanWaliKelas;
use App\Models\WaliKelas\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArsipWaliKelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }
        $semesterAktif = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();
        if (!$semesterAktif) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $tahunAjaranOption = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
        $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

        /* $userId = Auth::id();
        $pilihan = PilihArsipWaliKelas::where('id_user', $userId)->first(); */

        return view('pages.kurikulum.dokumenguru.arsip-walikelas', [
            'tahunAjaranOption' => $tahunAjaranOption,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            /* 'pilihan' => $pilihan, */
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

    public function simpanPilihanWalas(Request $request)
    {
        $userId = Auth::id();

        $data = [
            'tahunajaran' => $request->tahunajaran,
            'kode_kk' => $request->kode_kk,
            'tingkat' => $request->tingkat,
            'kode_rombel' => $request->kode_rombel,
            'ganjilgenap' => $request->ganjilgenap,
            'pilih_dokumen' => $request->pilih_dokumen,
        ];

        PilihArsipWaliKelas::updateOrCreate(
            ['id_user' => $userId],
            $data
        );

        return response()->json(['success' => true]);
    }

    public function getRombels(Request $request)
    {
        $tahunajaran = $request->query('tahunajaran');
        $kode_kk = $request->query('kode_kk');
        $tingkat = $request->query('tingkat');

        $rombels = RombonganBelajar::where('tahunajaran', $tahunajaran)
            ->where('id_kk', $kode_kk)
            ->where('tingkat', $tingkat)
            ->select('kode_rombel', 'rombel')
            ->orderBy('rombel')
            ->get();

        return response()->json($rombels);
    }

    public function getWaliKelas(Request $request)
    {
        $tahunajaran = $request->query('tahunajaran');
        $id_kk = $request->query('id_kk');
        $tingkat = $request->query('tingkat');
        $kode_rombel = $request->query('kode_rombel');

        $rombongan = RombonganBelajar::where('tahunajaran', $tahunajaran)
            ->where('id_kk', $id_kk)
            ->where('tingkat', $tingkat)
            ->where('kode_rombel', $kode_rombel)
            ->first();

        if (!$rombongan || !$rombongan->wali_kelas) {
            return view('pages.kurikulum.dokumenguru.arsip-walikelas-nama', ['wali' => null]);
        }

        $wali = PersonilSekolah::where('id_personil', $rombongan->wali_kelas)->first();

        return view('pages.kurikulum.dokumenguru.arsip-walikelas-nama', compact('wali'));
    }

    public function getDokumenWalas(Request $request)
    {
        $dokumen = $request->query('dokumen');
        $semester = $request->query('semester');
        $tahunajaran = $request->query('tahunajaran');
        $kode_kk = $request->query('kode_kk');
        $tingkat = $request->query('tingkat');
        $kode_rombel = $request->query('kode_rombel');

        if ($dokumen === 'dataKelas') {
            $data = PesertaDidikRombel::where('tahun_ajaran', $tahunajaran)
                ->where('kode_kk', $kode_kk)
                ->where('rombel_tingkat', $tingkat)
                ->where('rombel_kode', $kode_rombel)
                ->with(['pesertaDidik' => function ($query) {
                    $query->select(
                        'nis',
                        'nama_lengkap',
                        'jenis_kelamin',
                        'tempat_lahir',
                        'tanggal_lahir',
                        'alamat_desa',
                        'alamat_kec'
                    )->with(['ortus' => function ($q) {
                        $q->select(
                            'nis',
                            'nm_ayah',
                            'nm_ibu',
                            'pekerjaan_ayah',
                            'pekerjaan_ibu',
                            'ortu_alamat_blok',
                            'ortu_alamat_norumah',
                            'ortu_alamat_rt',
                            'ortu_alamat_rw',
                            'ortu_alamat_desa',
                            'ortu_alamat_kec',
                            'ortu_alamat_kab',
                            'ortu_alamat_kodepos',
                            'ortu_kontak_telepon',
                            'ortu_kontak_email'
                        );
                    }]);
                }])
                ->get();

            return view('pages.kurikulum.dokumenguru.arsip-walikelas-datakelas', compact('data', 'semester'));
        }


        if ($dokumen === 'absensiSiswa') {
            $data = AbsensiSiswa::where('tahunajaran', $tahunajaran)
                ->where('ganjilgenap', $semester)
                ->where('kode_rombel', $kode_rombel)
                ->with(['pesertaDidik' => function ($q) {
                    $q->select('nis', 'nama_lengkap');
                }])
                ->get();

            return view('pages.kurikulum.dokumenguru.arsip-walikelas-absensi', compact('data', 'semester'));
        }

        if ($dokumen === 'catatanWalas') {
            $data = CatatanWaliKelas::where('tahunajaran', $tahunajaran)
                ->where('ganjilgenap', $semester)
                ->where('kode_rombel', $kode_rombel)
                ->with(['pesertaDidik' => function ($q) {
                    $q->select('nis', 'nama_lengkap');
                }])
                ->get();

            return view('pages.kurikulum.dokumenguru.arsip-walikelas-catatanwalas', compact('data', 'semester'));
        }

        if ($dokumen === 'eskulSiswa') {
            $data = Ekstrakurikuler::where('tahunajaran', $tahunajaran)
                ->where('ganjilgenap', $semester)
                ->where('kode_rombel', $kode_rombel)
                ->with(['pesertaDidik' => function ($q) {
                    $q->select('nis', 'nama_lengkap');
                }])
                ->get();

            return view('pages.kurikulum.dokumenguru.arsip-walikelas-eskul', compact('data', 'semester'));
        }

        return response('Dokumen tidak dikenali.', 400);
    }

    public function getPilihanWalikelas()
    {
        $userId = Auth::id();

        $data = PilihArsipWaliKelas::where('id_user', $userId)->first();

        if ($data) {
            return response()->json([
                'tahunajaran' => $data->tahunajaran,
                'kode_kk' => $data->kode_kk,
                'tingkat' => $data->tingkat,
                'kode_rombel' => $data->kode_rombel,
                'ganjilgenap' => $data->ganjilgenap,
                'pilih_dokumen' => $data->pilih_dokumen,
            ]);
        }

        return response()->json(null);
    }
}
