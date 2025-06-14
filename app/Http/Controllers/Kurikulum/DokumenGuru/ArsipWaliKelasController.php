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
use Illuminate\Support\Facades\DB;

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
            'ganjilgenap' => $request->ganjilgenap,
            'kode_kk' => $request->kode_kk,
            'tingkat' => $request->tingkat,
            'kode_rombel' => $request->kode_rombel,
        ];

        PilihArsipWaliKelas::updateOrCreate(
            ['id_user' => $userId],
            $data
        );

        return response()->json(['success' => true]);
    }

    public function getPilihanWaliKelas()
    {
        $userId = Auth::id();

        $data = PilihArsipWaliKelas::where('id_user', $userId)->first();

        return response()->json($data);
    }

    public function getRombelWalas(Request $request)
    {
        $tahunAjaran = $request->get('tahun_ajaran');
        $kodeKK = $request->get('kode_kk');
        $tingKat = $request->get('tingkat');

        // Mengambil data rombongan belajar sesuai tahun ajaran dan kompetensi keahlian
        $rombonganBelajar = RombonganBelajar::where('tahunajaran', $tahunAjaran)
            ->where('id_kk', $kodeKK)
            ->where('tingkat', $tingKat)
            ->pluck('rombel', 'kode_rombel'); // Mengambil kolom rombel dan kode_rombel

        return response()->json($rombonganBelajar); // Mengembalikan data sebagai JSON
    }

    public function getTabContent(Request $request)
    {
        $tahunajaran = $request->tahun_ajaran;
        $semester = $request->semester;
        $kode_kk = $request->kode_kk;
        $tingkat = $request->tingkat;
        $kode_rombel = $request->kode_rombel;

        // Data Kelas
        $dataKelas = DB::table('peserta_didik_rombels')
            ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->leftJoin('peserta_didik_ortus', 'peserta_didiks.nis', '=', 'peserta_didik_ortus.nis')
            ->where('peserta_didik_rombels.tahun_ajaran', $tahunajaran)
            ->where('peserta_didik_rombels.kode_kk', $kode_kk)
            ->where('peserta_didik_rombels.rombel_tingkat', $tingkat)
            ->where('peserta_didik_rombels.rombel_kode', $kode_rombel)
            ->select(
                'peserta_didik_rombels.nis',
                'peserta_didiks.nama_lengkap',
                'peserta_didiks.jenis_kelamin',
                'peserta_didiks.tempat_lahir',
                'peserta_didiks.tanggal_lahir',
                'peserta_didiks.alamat_desa',
                'peserta_didiks.alamat_kec',
                'peserta_didiks.alamat_kab',
                'peserta_didik_ortus.nm_ayah',
                'peserta_didik_ortus.nm_ibu'
            )
            ->get();

        $absensi = AbsensiSiswa::where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $semester)
            ->where('kode_rombel', $kode_rombel)
            ->with(['pesertaDidik' => function ($q) {
                $q->select('nis', 'nama_lengkap');
            }])
            ->get();

        $eskul = Ekstrakurikuler::where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $semester)
            ->where('kode_rombel', $kode_rombel)
            ->with(['pesertaDidik' => function ($q) {
                $q->select('nis', 'nama_lengkap');
            }])
            ->get();

        $catatanWalas = CatatanWaliKelas::where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $semester)
            ->where('kode_rombel', $kode_rombel)
            ->with(['pesertaDidik' => function ($q) {
                $q->select('nis', 'nama_lengkap');
            }])
            ->get();


        // Ambil wali kelas
        $rombongan = RombonganBelajar::where('tahunajaran', $tahunajaran)
            ->where('id_kk', $kode_kk)
            ->where('tingkat', $tingkat)
            ->where('kode_rombel', $kode_rombel)
            ->first();

        $wali = $rombongan && $rombongan->wali_kelas
            ? PersonilSekolah::where('id_personil', $rombongan->wali_kelas)->first()
            : null;


        $viewDataKelas = view('pages.kurikulum.dokumenguru.arsip-walikelas-datakelas', compact('dataKelas', 'semester'))->render();
        $viewAbsensi = view('pages.kurikulum.dokumenguru.arsip-walikelas-absensi', compact('absensi', 'semester'))->render();
        $viewEskul = view('pages.kurikulum.dokumenguru.arsip-walikelas-eskul', compact('eskul', 'semester'))->render();
        $viewCatatanWalas = view('pages.kurikulum.dokumenguru.arsip-walikelas-catatanwalas', compact('catatanWalas', 'semester'))->render();
        $viewNamaWali = view('pages.kurikulum.dokumenguru.arsip-walikelas-nama', compact('wali'))->render();

        return response()->json([
            'data_kelas' => $viewDataKelas,
            'absensi' => $viewAbsensi,
            'eskul' => $viewEskul,
            'catatanWalas' => $viewCatatanWalas,
            'nama_wali' => $viewNamaWali,
        ]);
    }
}
