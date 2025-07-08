<?php

namespace App\Http\Controllers\GuruMapel;

use App\DataTables\GuruMapel\DataKbmDataTable;
use App\Http\Controllers\Controller;
use App\Models\GuruMapel\MateriAjar;
use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataKbmController extends Controller
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

        // Get the kbm_per_rombels records that match the logged-in user's personal_id, active academic year, and semester
        $kbmPerRombels = KbmPerRombel::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->get();

        // Cek kbm per rombel
        if ($kbmPerRombels->isEmpty()) {
            return redirect()->route('dashboard')->with('warningGuruMapel', 'Maaf, Anda belum memiliki <b>JAM MENGAJAR</b> <br>pada <b>tahun ajaran</b> dan <b>semester</b> sekarang. <br>Silakan hubungi bagian Kurikulum.');
        }

        // Loop untuk menambahkan jumlah siswa ke setiap rombel
        foreach ($kbmPerRombels as $kbm) {
            $kbm->jumlahSiswa = DB::table('peserta_didik_rombels')
                ->where('rombel_kode', $kbm->kode_rombel)
                ->count();
        }

        foreach ($kbmPerRombels as $cp) {
            $cp->jumlahCP = DB::table('capaian_pembelajarans')
                ->where('inisial_mp', $cp->kel_mapel)
                ->where('tingkat', $cp->tingkat)
                ->count();
        }


        // Filter data berdasarkan tingkat
        $rombel10 = $kbmPerRombels->where('tingkat', '10');
        $rombel11 = $kbmPerRombels->where('tingkat', '11');
        $rombel12 = $kbmPerRombels->where('tingkat', '12');

        // Menghitung jumlah data per tingkat
        $jmlRombel10 = $rombel10->count();
        $jmlRombel11 = $rombel11->count();
        $jmlRombel12 = $rombel12->count();


        // Retrieve capaian_pembelajarans based on kel_mapel and tingkat from kbmPerRombels
        $kelMapelArray = $kbmPerRombels->pluck('kel_mapel')->toArray();
        $tingkatArray = $kbmPerRombels->pluck('tingkat')->toArray();

        $capaianPembelajarans = CapaianPembelajaran::whereIn('inisial_mp', $kelMapelArray)
            ->whereIn('tingkat', $tingkatArray)
            ->get();

        return view(
            'pages.gurumapel.data-kbm',
            compact(
                'kbmPerRombels',
                'capaianPembelajarans',
                'personal_id',
                'tahunAjaran',
                'semester',
                'fullName',
                'rombel10',
                'rombel11',
                'rombel12',
                'jmlRombel10',
                'jmlRombel11',
                'jmlRombel12',
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
    public function show(KbmPerRombel $kbmPerRombel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KbmPerRombel $kbmPerRombel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KbmPerRombel $kbmPerRombel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KbmPerRombel $kbmPerRombel)
    {
        //
    }

    public function fetchData(Request $request)
    {
        $inisialMp = $request->input('inisial_mp');
        $tingkat = $request->input('tingkat');

        $capaianPembelajaran = CapaianPembelajaran::where('inisial_mp', $inisialMp)
            ->where('tingkat', $tingkat)
            ->get(['kode_cp', 'tingkat', 'fase', 'element', 'nama_matapelajaran', 'nomor_urut', 'isi_cp']);

        return response()->json($capaianPembelajaran);
    }
}
