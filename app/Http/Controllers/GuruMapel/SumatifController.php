<?php

namespace App\Http\Controllers\GuruMapel;

use App\DataTables\GuruMapel\SumatifDataTable;
use App\Http\Controllers\Controller;
use App\Models\GuruMapel\NilaiSumatif;
use App\Models\GuruMapel\TujuanPembelajaran;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SumatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SumatifDataTable $sumatifDataTable)
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

        return $sumatifDataTable->render(
            'pages.gurumapel.sumatif',
            compact(
                'kbmPerRombel',
                'personal_id',
                'tahunAjaran',
                'semester',
                'fullName',
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($kode_rombel, $kel_mapel, $id_personil)
    {
        // Cari data berdasarkan parameter
        $data = KbmPerRombel::where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Get the namalengkap of the logged-in user from personil_sekolahs table
        $personil = PersonilSekolah::where('id_personil', $id_personil)->first();
        // Concatenate gelardepan, namalengkap, and gelarbelakang
        $fullName = $personil
            ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') . $personil->namalengkap . ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
            : 'Unknown';

        $jumlahTP = DB::table('tujuan_pembelajarans')
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->count();

        $pesertaDidik = DB::table('kbm_per_rombels')
            ->join('peserta_didik_rombels', 'peserta_didik_rombels.rombel_kode', '=', 'kbm_per_rombels.kode_rombel')
            ->join('peserta_didiks', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'kbm_per_rombels.kode_rombel',
                'kbm_per_rombels.rombel',
                'peserta_didik_rombels.nis',
                'peserta_didiks.nama_lengkap'
            )
            ->where('kbm_per_rombels.id_personil', $id_personil)
            ->where('kbm_per_rombels.kode_rombel', $kode_rombel)
            ->get();

        $tujuanPembelajaran = TujuanPembelajaran::where('id_personil', $id_personil)
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->orderBy('tp_kode')
            ->get();

        return view('pages.gurumapel.sumatif-create-form', [
            'data' => $data,
            'jumlahTP' => $jumlahTP,
            'pesertaDidik' => $pesertaDidik,
            'tujuanPembelajaran' => $tujuanPembelajaran,
            'fullName' => $fullName,
            'action' => route('gurumapel.penilaian.sumatif.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'tahunajaran' => 'required|string',
            'ganjilgenap' => 'required|string',
            'semester' => 'required|string',
            'tingkat' => 'required|string',
            'kode_rombel' => 'required|string',
            'kel_mapel' => 'required|string',
            'id_personil' => 'required|string',
            'sts.*' => 'nullable|numeric',
            'sas.*' => 'nullable|numeric',
            'rerata_sumatif_.*' => 'nullable|numeric',
        ]);

        // Loop untuk menyimpan data setiap siswa
        foreach ($request->sts as $nis => $sts) {
            // Jika nilai kosong (null), set ke 0
            //$sts = $sts ?? 0;
            //$sas = $request->sas[$nis] ?? 0;
            //$rerata_sumatif = $request->input("rerata_sumatif_$nis", 0); // Jika null, set ke 0

            // Simpan data ke database
            NilaiSumatif::create([
                'tahunajaran' => $request->tahunajaran,
                'ganjilgenap' => $request->ganjilgenap,
                'semester' => $request->semester,
                'tingkat' => $request->tingkat,
                'kode_rombel' => $request->kode_rombel,
                'kel_mapel' => $request->kel_mapel,
                'id_personil' => $request->id_personil,
                'nis' => $nis,
                'sts' => $sts,
                'sas' => $request->sas[$nis],
                'rerata_sumatif' => $request->input("rerata_sumatif_$nis"),
            ]);
        }

        return responseSuccess();
        // Redirect dengan pesan sukses
        //return redirect()->back()->with('success', 'Data nilai sumatif berhasil disimpan.');
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
    public function edit($kode_rombel, $kel_mapel, $id_personil)
    {
        $data = KbmPerRombel::where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        $personil = PersonilSekolah::where('id_personil', $id_personil)->first();
        $fullName = $personil
            ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') . $personil->namalengkap . ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
            : 'Unknown';

        $jumlahTP = DB::table('tujuan_pembelajarans')
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->count();

        $nilaiSumatif = NilaiSumatif::where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->get()
            ->keyBy('nis'); // Buat array dengan key NIS

        $pesertaDidik = DB::table('kbm_per_rombels')
            ->join('peserta_didik_rombels', 'peserta_didik_rombels.rombel_kode', '=', 'kbm_per_rombels.kode_rombel')
            ->join('peserta_didiks', 'peserta_didiks.nis', '=', 'peserta_didik_rombels.nis')
            ->select(
                'peserta_didik_rombels.nis',
                'peserta_didiks.nama_lengkap'
            )
            ->where('kbm_per_rombels.id_personil', $id_personil)
            ->where('kbm_per_rombels.kode_rombel', $kode_rombel)
            ->get()
            ->map(function ($siswa) use ($nilaiSumatif) {
                // Tambahkan nilai STS dan SAS ke data siswa
                $siswa->sts = $nilaiSumatif[$siswa->nis]->sts ?? null;
                $siswa->sas = $nilaiSumatif[$siswa->nis]->sas ?? null;
                return $siswa;
            });

        return view('pages.gurumapel.sumatif-edit-form', [
            'data' => $data,
            'jumlahTP' => $jumlahTP,
            'nilaiSumatif' => $nilaiSumatif,
            'pesertaDidik' => $pesertaDidik,
            'fullName' => $fullName,
            'action' => route('gurumapel.penilaian.sumatif.update', $data->id)
        ]);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'sts' => 'array',
            'sts.*' => 'nullable|numeric|min:0|max:100', // Validasi untuk nilai STS
            'sas' => 'array',
            'sas.*' => 'nullable|numeric|min:0|max:100', // Validasi untuk nilai SAS
        ]);

        // Ambil data berdasarkan ID
        $data = KbmPerRombel::find($id);
        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Update data sumatif per siswa
        foreach ($request->sts as $nis => $stsValue) {
            // Cari nilai sumatif berdasarkan NIS dan update
            $nilaiSumatif = NilaiSumatif::where('kode_rombel', $data->kode_rombel)
                ->where('kel_mapel', $data->kel_mapel)
                ->where('id_personil', $data->id_personil)
                ->where('nis', $nis)
                ->first();

            if ($nilaiSumatif) {
                // Update nilai STS
                $nilaiSumatif->sts = $stsValue;

                // Update nilai SAS hanya jika ada nilai, jika tidak biarkan null
                $nilaiSumatif->sas = isset($request->sas[$nis]) ? $request->sas[$nis] : null;

                // Jika ada nilai STS dan SAS, hitung rerata sumatif, jika tidak biarkan kosong
                if ($nilaiSumatif->sts !== null && $nilaiSumatif->sas !== null) {
                    $nilaiSumatif->rerata_sumatif = ($nilaiSumatif->sts + $nilaiSumatif->sas) / 2;
                } else {
                    $nilaiSumatif->rerata_sumatif = null; // Kosongkan jika tidak ada nilai STS dan SAS
                }

                // Simpan perubahan
                $nilaiSumatif->save();
            }
        }

        // Redirect kembali dengan pesan sukses
        return responseSuccess(true);
    }

    /* public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'sts.*' => 'required|numeric|min:0|max:100',
            'sas.*' => 'required|numeric|min:0|max:100',
        ]);

        foreach ($validated['sts'] as $nis => $sts) {
            NilaiSumatif::updateOrCreate(
                ['nis' => $nis, 'id_kbm_rombel' => $id],
                ['sts' => $sts, 'sas' => $validated['sas'][$nis]]
            );
        }

        return redirect()->route('gurumapel.penilaian.sumatif.index')->with('success', 'Data berhasil diperbarui!');
    } */

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
