<?php

namespace App\Http\Controllers\GuruMapel;

use App\DataTables\GuruMapel\DataCpTerpilihDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuruMapel\DataCpTerpilihRequest;
use App\Models\GuruMapel\CpTerpilih;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataCpTerpilihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DataCpTerpilihDataTable $dataCpTerpilihDataTable)
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

        // Retrieve capaian_pembelajarans based on kel_mapel and tingkat from kbmPerRombels
        $koderombelArray = $kbmPerRombels->pluck('kode_rombel')->toArray();
        $kodemapelArray = $kbmPerRombels->pluck('kode_mapel')->toArray();


        $KbmPersonil = KbmPerRombel::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->orderBy('kel_mapel')
            ->orderBy('kode_rombel')
            ->get();

        // Cek kbm per rombel
        if ($kbmPerRombels->isEmpty()) {
            return redirect()->route('dashboard')->with('warningGuruMapel', 'Maaf, Anda belum memiliki <b>JAM MENGAJAR</b> <br>pada <b>tahun ajaran</b> dan <b>semester</b> sekarang. <br>Silakan hubungi bagian Kurikulum.');
        }

        $mapelOptions = KbmPerRombel::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->get()
            ->mapWithKeys(function ($item) {
                return [
                    $item->kel_mapel . '-' . $item->tingkat => [
                        'nama_kk' => $item->nama_kk,
                        'tingkat' => $item->tingkat,
                        'kel_mapel' => $item->kel_mapel,
                        'mata_pelajaran' => $item->mata_pelajaran,
                    ]
                ];
            })
            ->toArray();

        return $dataCpTerpilihDataTable->render(
            'pages.gurumapel.data-kbm-cp-terpilih',
            compact(
                'kbmPerRombels',
                'KbmPersonil',
                'personal_id',
                'tahunAjaran',
                'semester',
                'fullName',
                'mapelOptions',
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

    public function updateJmlMateri(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:cp_terpilihs,id',  // Sesuaikan dengan nama tabel dan primary key
            'jml_materi' => 'required|integer|min:1|max:6',
        ]);

        $cpTerpilih = CpTerpilih::find($validated['id']);
        $cpTerpilih->jml_materi = $validated['jml_materi'];
        if ($cpTerpilih->save()) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 500);
    }

    public function checkCPTerpilih(Request $request)
    {
        $kelMapel = $request->input('kel_mapel');
        $personalId = $request->input('id_personil');
        $tingkat = $request->input('tingkat');


        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }


        // Cek apakah kode_cp sudah ada di tabel materi_ajars
        $exists = DB::table('cp_terpilihs')
            ->where('tingkat', $tingkat)
            ->where('kel_mapel', $kelMapel)
            ->where('id_personil', $personalId)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
            ->exists();

        if ($exists) {
            return response()->json(['exists' => true, 'message' => "Materi Ajar untuk Kode Mapel $kelMapel sudah dibuat."]);
        }

        return response()->json(['exists' => false]);
    }

    public function getRombel(Request $request)
    {
        $kelMapel = $request->input('kel_mapel');
        $tingkat = $request->input('tingkat');
        $personalId = $request->input('personal_id');


        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }


        // Cek apakah sudah ada data di tabel cp_terpilihs
        $cpExists = DB::table('cp_terpilihs')
            ->where('tingkat', $tingkat)
            ->where('kel_mapel', $kelMapel)
            ->where('id_personil', $personalId)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
            ->exists();

        if ($cpExists) {
            return response()->json(['status' => 'error', 'message' => 'CP untuk Kode Mapel ' . $kelMapel . ' sudah dipilih'], 400);
        }

        // Jika tidak ada, lanjutkan pengambilan data rombel
        $rombels = KbmPerRombel::where('id_personil', $personalId)
            ->where('kel_mapel', $kelMapel)
            ->where('tingkat', $tingkat)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
            ->get(['kode_rombel', 'rombel']);

        return response()->json($rombels);
    }


    // CapaianPembelajaranController.php
    public function getCapaianPembelajaran(Request $request)
    {
        $kelMapel = $request->kel_mapel;
        $tingkat = $request->tingkat;
        $personalId = $request->input('personal_id');


        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }


        // Cek apakah sudah ada data di tabel cp_terpilihs
        $cpExists = DB::table('cp_terpilihs')
            ->where('tingkat', $tingkat)
            ->where('kel_mapel', $kelMapel)
            ->where('id_personil', $personalId)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
            ->exists();

        if ($cpExists) {
            return response()->json(['status' => 'error', 'message' => 'CP untuk Kode Mapel ' . $kelMapel . ' sudah dipilih'], 400);
        }

        // Jika tidak ada, lanjutkan pengambilan data capaian pembelajaran
        $data = DB::table('capaian_pembelajarans')
            ->join('kbm_per_rombels', function ($join) {
                $join->on('capaian_pembelajarans.tingkat', '=', 'kbm_per_rombels.tingkat')
                    ->on('capaian_pembelajarans.inisial_mp', '=', 'kbm_per_rombels.kel_mapel');
            })
            ->select(
                'kbm_per_rombels.kel_mapel',
                'capaian_pembelajarans.tingkat',
                'kbm_per_rombels.mata_pelajaran',
                'capaian_pembelajarans.kode_cp',
                'capaian_pembelajarans.fase',
                'capaian_pembelajarans.element',
                'capaian_pembelajarans.isi_cp'
            )
            ->where('kbm_per_rombels.kel_mapel', $kelMapel)
            ->where('kbm_per_rombels.tingkat', $tingkat)
            ->groupBy(
                'kbm_per_rombels.kel_mapel',
                'kbm_per_rombels.mata_pelajaran',
                'capaian_pembelajarans.kode_cp',
                'capaian_pembelajarans.tingkat',
                'capaian_pembelajarans.fase',
                'capaian_pembelajarans.element',
                'capaian_pembelajarans.isi_cp'
            )
            ->get();

        return response()->json($data);
    }


    public function saveCpTerpilih(DataCpTerpilihRequest $request)
    {
        try {
            $kode_rombel = explode(',', $request->selected_rombel_ids);
            $selected_cp_data = json_decode($request->selected_cp_data, true);

            foreach ($kode_rombel as $rombel) {
                foreach ($selected_cp_data as $cp_data) {
                    CpTerpilih::create([
                        'tahunajaran' => $request->tahunajaran,
                        'ganjilgenap' => $request->ganjilgenap,
                        'semester' => $request->semester,
                        'tingkat' => $request->tingkat,
                        'kode_rombel' => $rombel,
                        'kel_mapel' => $request->kel_mapel,
                        'id_personil' => $request->personal_id,
                        'kode_cp' => $cp_data['kode_cp'],
                        'jml_materi' => $cp_data['jml_materi'],
                    ]);
                }
            }

            return response()->json(['status' => 'success', 'message' => 'Data berhasil disimpan.']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => 'Terjadi kesalahan saat menyimpan data.']);
        }
    }


    public function hapusCPPilihan(Request $request)
    {
        $ids = $request->ids;
        if (is_array($ids) && !empty($ids)) {
            CpTerpilih::whereIn('id', $ids)->delete();
            return response()->json(['success' => 'Data berhasil dihapus!']);
        }

        return response()->json(['error' => 'Tidak ada data yang dihapus!'], 400);
    }
}
