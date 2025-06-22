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
use App\Models\User;
use App\Models\WaliKelas\AbsensiSiswa;
use App\Models\WaliKelas\CatatanWaliKelas;
use App\Models\WaliKelas\Ekstrakurikuler;
use App\Models\WaliKelas\PesertaDidikNaik;
use App\Models\WaliKelas\PrestasiSiswa;
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
        $user = Auth::user();
        $personal_id = $user->personal_id;

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

        // Ambil semua user yang punya role 'master'
        $usersWithMasterRole = User::role('master')->get();

        // Ambil semua id_personil dari user tersebut
        $idPersonilList = $usersWithMasterRole->pluck('personal_id')->filter()->unique();

        // Ambil data PersonilSekolah berdasarkan id_personil
        $personilSekolah = PersonilSekolah::whereIn('id_personil', $idPersonilList)
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        $dataPilWalas = PilihArsipWaliKelas::where('id_personil', $personal_id)->first();

        // CEK apakah dataPilWalas ADA
        if (!$dataPilWalas) {
            return redirect()->route('dashboard')->with('errorAmbilData', '<p class="text-danger mx-4 mb-0">Anda belum memiliki akses ke menu ini.</p> <p class="fs-6">Silakan hubungi Developer Aplikasi ini. </p> <p class="fs-1"><i class="lab las la-grin"></i> <i class="lab las la-grin"></i> <i class="lab las la-grin"></i></p>');
        }

        $waliKelas = DB::table('wali_kelas')
            ->select(
                'wali_kelas.*',
                'personil_sekolahs.id_personil',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',
                'personil_sekolahs.photo'
            )
            ->join('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('wali_kelas.tahunajaran', $dataPilWalas->tahunajaran)
            ->where('wali_kelas.kode_rombel', $dataPilWalas->kode_rombel)
            ->first();

        return view('pages.kurikulum.dokumenguru.arsip-walikelas', [
            'tahunAjaranOption' => $tahunAjaranOption,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajar' => $rombonganBelajar,
            'dataPilWalas' => $dataPilWalas,
            'personal_id' => $personal_id,
            'waliKelas' => $waliKelas,
            'personilSekolah' => $personilSekolah,
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
        $validatedData = $request->validate([
            'id_personil' => 'required|string',
            'tahunajaran' => 'required|string',
            'ganjilgenap' => 'required|string',
            'kode_kk' => 'required|string',
            'tingkat' => 'required|string',
            'kode_rombel' => 'required|string',
        ]);

        PilihArsipWaliKelas::updateOrCreate(
            ['id_personil' => $validatedData['id_personil']],
            $validatedData
        );

        return redirect()->back()->with('toast_success', 'Data berhasil disimpan.');
    }

    public function getKodeRombel(Request $request)
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

    public function tampilWaliKelas($kode_rombel)
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $dataPilWalas = PilihArsipWaliKelas::where('id_personil', $personal_id)->first();

        // Data Kelas
        $dataKelas = DB::table('peserta_didik_rombels')
            ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
            ->leftJoin('peserta_didik_ortus', 'peserta_didiks.nis', '=', 'peserta_didik_ortus.nis')
            ->where('peserta_didik_rombels.tahun_ajaran', $dataPilWalas->tahunajaran)
            ->where('peserta_didik_rombels.kode_kk', $dataPilWalas->kode_kk)
            ->where('peserta_didik_rombels.rombel_tingkat', $dataPilWalas->tingkat)
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

        $absensi = AbsensiSiswa::where('tahunajaran', $dataPilWalas->tahunajaran)
            ->where('ganjilgenap', $dataPilWalas->ganjilgenap)
            ->where('kode_rombel', $kode_rombel)
            ->with(['pesertaDidik' => function ($q) {
                $q->select('nis', 'nama_lengkap');
            }])
            ->get();

        $eskul = Ekstrakurikuler::where('tahunajaran', $dataPilWalas->tahunajaran)
            ->where('ganjilgenap', $dataPilWalas->ganjilgenap)
            ->where('kode_rombel', $kode_rombel)
            ->with(['pesertaDidik' => function ($q) {
                $q->select('nis', 'nama_lengkap');
            }])
            ->get();

        $catatanWalas = CatatanWaliKelas::where('tahunajaran', $dataPilWalas->tahunajaran)
            ->where('ganjilgenap', $dataPilWalas->ganjilgenap)
            ->where('kode_rombel', $kode_rombel)
            ->with(['pesertaDidik' => function ($q) {
                $q->select('nis', 'nama_lengkap');
            }])
            ->get();

        $prestasiSiswa = PrestasiSiswa::where('tahunajaran', $dataPilWalas->tahunajaran)
            ->where('ganjilgenap', $dataPilWalas->ganjilgenap)
            ->where('kode_rombel', $kode_rombel)
            ->with(['pesertaDidik' => function ($q) {
                $q->select('nis', 'nama_lengkap');
            }])
            ->get();

        $prestasiGrouped = $prestasiSiswa->groupBy('nis');

        // Ambil wali kelas
        $rombongan = RombonganBelajar::where('tahunajaran', $dataPilWalas->tahunajaran)
            ->where('id_kk', $dataPilWalas->kode_kk)
            ->where('tingkat', $dataPilWalas->tingkat)
            ->where('kode_rombel', $kode_rombel)
            ->first();

        $kenaikanKelas = PesertaDidikNaik::where('tahunajaran', $dataPilWalas->tahunajaran)
            ->where('kode_rombel', $kode_rombel)
            ->with(['pesertaDidik' => function ($q) {
                $q->select('nis', 'nama_lengkap');
            }])
            ->get();

        if ($dataPilWalas) {
            return view('pages.kurikulum.dokumenguru.arsip-walikelas-tab-content',  [
                'dataPilWalas' => $dataPilWalas,
                'personal_id' => $personal_id,
                'tahunAjaranAktif' => $tahunAjaranAktif,
                'semester' => $semester,
                'dataKelas' => $dataKelas,
                'absensi' => $absensi,
                'eskul' => $eskul,
                'catatanWalas' => $catatanWalas,
                'prestasiGrouped' => $prestasiGrouped,
                'rombongan' => $rombongan,
                'kenaikanKelas' => $kenaikanKelas,
            ])->render(); // Render hanya bagian detail
        }

        // Jika data rombel tidak ditemukan
        return response()->json(['message' => 'Data siswa tidak ditemukan'], 404);
    }

    public function infoWaliSiswa()
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();

        if (!$tahunAjaranAktif) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
            ->first();

        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        $dataPilWalas = PilihArsipWaliKelas::where('id_personil', $personal_id)->first();

        $waliKelas = DB::table('wali_kelas')
            ->select(
                'wali_kelas.*',
                'personil_sekolahs.id_personil',
                'personil_sekolahs.nip',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',
                'personil_sekolahs.photo'
            )
            ->join('personil_sekolahs', 'wali_kelas.wali_kelas', '=', 'personil_sekolahs.id_personil')
            ->where('wali_kelas.tahunajaran', $dataPilWalas->tahunajaran)
            ->where('wali_kelas.kode_rombel', $dataPilWalas->kode_rombel)
            ->first();

        return view('pages.kurikulum.dokumenguru.arsip-walikelas-info', compact('waliKelas'));
    }
}
