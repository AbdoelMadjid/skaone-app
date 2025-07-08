<?php

namespace App\Http\Controllers\GuruMapel;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DeskripsiNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        // Retrieve the active academic year
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Check if an active academic year is found
        if (!$tahunAjaran) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Retrieve the active semester related to the active academic year
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaran->id)
            ->first();

        // Check if an active semester is found
        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        // Get the namalengkap of the logged-in user from personil_sekolahs table
        $personil = PersonilSekolah::where('id_personil', $personal_id)->first();
        // Concatenate gelardepan, namalengkap, and gelarbelakang
        $fullName = $personil
            ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') . $personil->namalengkap . ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
            : 'Unknown';

        // Retrieve a single KBM record for the current user, academic year, and semester
        $kbmPerRombel = KbmPerRombel::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->first();

        if (!$kbmPerRombel) {
            return redirect()->route('dashboard')->with('errorSwal', 'Maaf, Anda belum memiliki <b>Jam Mengajar</b> <br>pada <b>tahun ajaran</b> dan <b>semester</b> saat ini.<br> Silakan hubungi bagian Kurikulum.');
        }

        $KbmPersonil = KbmPerRombel::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->orderBy('kel_mapel')
            ->orderBy('kode_rombel')
            ->get();

        return view(
            'pages.gurumapel.deskripsi-nilai',
            compact(
                'kbmPerRombel',
                'personal_id',
                'personil',
                'tahunAjaran',
                'semester',
                'fullName',
                'KbmPersonil',
            )
        );
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

    public function getNilaiFormatif(Request $request)
    {
        $id_personil = $request->input('id_personil');
        $kode_rombel = $request->input('kode_rombel');
        $kel_mapel = $request->input('kel_mapel');

        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Ambil jumlah TP dari tabel tujuan_pembelajarans
        $jumlahTP = DB::table('tujuan_pembelajarans')
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
            ->count();

        // Ambil jumlah TP dari tabel tujuan_pembelajarans
        $JmlSiswa = DB::table('peserta_didik_rombels')
            ->where('rombel_kode', $kode_rombel)
            ->count();

        // Jalankan query untuk mendapatkan data siswa beserta nilai formatif dan sumatif
        $data = DB::select("
            SELECT
            personil_sekolahs.gelardepan,
            personil_sekolahs.namalengkap,
            personil_sekolahs.gelarbelakang,
            kbm_per_rombels.kode_rombel,
            kbm_per_rombels.kel_mapel,
            kbm_per_rombels.id_personil,
            kbm_per_rombels.rombel,
            kbm_per_rombels.mata_pelajaran,
            peserta_didik_rombels.nis,
            peserta_didiks.nama_lengkap,
            nilai_formatif.id,
            nilai_formatif.tp_isi_1,
            nilai_formatif.tp_isi_2,
            nilai_formatif.tp_isi_3,
            nilai_formatif.tp_isi_4,
            nilai_formatif.tp_isi_5,
            nilai_formatif.tp_isi_6,
            nilai_formatif.tp_isi_7,
            nilai_formatif.tp_isi_8,
            nilai_formatif.tp_isi_9,
            nilai_formatif.tp_nilai_1,
            nilai_formatif.tp_nilai_2,
            nilai_formatif.tp_nilai_3,
            nilai_formatif.tp_nilai_4,
            nilai_formatif.tp_nilai_5,
            nilai_formatif.tp_nilai_6,
            nilai_formatif.tp_nilai_7,
            nilai_formatif.tp_nilai_8,
            nilai_formatif.tp_nilai_9,
            nilai_formatif.rerata_formatif,
            nilai_sumatif.sts,
            nilai_sumatif.sas,
            nilai_sumatif.kel_mapel AS kel_mapel_sumatif,
            nilai_sumatif.rerata_sumatif,
            ((COALESCE(nilai_formatif.rerata_formatif, 0) + COALESCE(nilai_sumatif.rerata_sumatif, 0)) / 2) AS nilai_na
        FROM kbm_per_rombels
        INNER JOIN peserta_didik_rombels ON kbm_per_rombels.kode_rombel = peserta_didik_rombels.rombel_kode
        INNER JOIN peserta_didiks ON peserta_didik_rombels.nis = peserta_didiks.nis
        INNER JOIN personil_sekolahs ON kbm_per_rombels.id_personil=personil_sekolahs.id_personil
        LEFT JOIN nilai_formatif ON peserta_didik_rombels.nis = nilai_formatif.nis
            AND nilai_formatif.id_personil = ?
            AND nilai_formatif.kode_rombel = ?
            AND nilai_formatif.kel_mapel = ?
            AND nilai_formatif.tahunajaran = ?
            AND nilai_formatif.ganjilgenap = ?
        LEFT JOIN nilai_sumatif ON peserta_didik_rombels.nis = nilai_sumatif.nis
            AND nilai_sumatif.id_personil = ?
            AND nilai_sumatif.kode_rombel = ?
            AND nilai_sumatif.kel_mapel = ?
            AND nilai_sumatif.tahunajaran = ?
            AND nilai_sumatif.ganjilgenap = ?
        WHERE
            kbm_per_rombels.id_personil = ?
            AND kbm_per_rombels.kode_rombel = ?
            AND kbm_per_rombels.kel_mapel = ?
            AND kbm_per_rombels.tahunajaran = ?
            AND kbm_per_rombels.ganjilgenap = ?
        ORDER BY peserta_didik_rombels.nis
        ", [
            $id_personil,
            $kode_rombel,
            $kel_mapel,
            $tahunAjaranAktif->tahunajaran,
            $semesterAktif->semester,
            $id_personil,
            $kode_rombel,
            $kel_mapel,
            $tahunAjaranAktif->tahunajaran,
            $semesterAktif->semester,
            $id_personil,
            $kode_rombel,
            $kel_mapel,
            $tahunAjaranAktif->tahunajaran,
            $semesterAktif->semester,
        ]);

        return response()->json([
            'data' => $data,
            'jumlahTP' => $jumlahTP,
            'JmlSiswa' => $JmlSiswa,
        ]);
    }
}
