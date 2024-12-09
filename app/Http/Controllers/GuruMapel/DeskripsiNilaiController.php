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
            return redirect()->back()->with('error', 'Tidak ada data KBM ditemukan.');
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

        // Hitung jumlah TP
        $jumlahTP = DB::table('tujuan_pembelajarans')
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->count();

        // Query data nilai formatif dan data siswa
        /* $data = DB::table('nilai_formatif')
            ->join('peserta_didiks', 'nilai_formatif.nis', '=', 'peserta_didiks.nis')
            ->select(
                'peserta_didiks.nis',
                'peserta_didiks.nama_lengkap',
                'nilai_formatif.*'
            )
            ->where('nilai_formatif.id_personil', $id_personil)
            ->where('nilai_formatif.kode_rombel', $kode_rombel)
            ->where('nilai_formatif.kel_mapel', $kel_mapel)
            ->get(); */

        $data = DB::table('nilai_formatif')
            ->join('peserta_didiks', 'nilai_formatif.nis', '=', 'peserta_didiks.nis')
            ->join('kbm_per_rombels', function ($join) use ($id_personil, $kode_rombel, $kel_mapel) {
                $join->on('nilai_formatif.kode_rombel', '=', 'kbm_per_rombels.kode_rombel')
                    ->where('kbm_per_rombels.id_personil', $id_personil)
                    ->where('kbm_per_rombels.kel_mapel', $kel_mapel);
            })
            ->select(
                'peserta_didiks.nis',
                'peserta_didiks.nama_lengkap',
                'nilai_formatif.*',
                'kbm_per_rombels.rombel',
                'kbm_per_rombels.mata_pelajaran'
            )
            ->where('nilai_formatif.id_personil', $id_personil)
            ->where('nilai_formatif.kode_rombel', $kode_rombel)
            ->where('nilai_formatif.kel_mapel', $kel_mapel)
            ->orderBy('nilai_formatif.nis')
            ->get();

        return response()->json([
            'data' => $data,
            'jumlahTP' => $jumlahTP, // Kirim jumlah TP
        ]);
    }
}
