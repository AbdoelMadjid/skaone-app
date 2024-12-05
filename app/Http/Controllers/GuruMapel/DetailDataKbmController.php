<?php

namespace App\Http\Controllers\GuruMapel;

use App\DataTables\GuruMapel\DataKbmDataTable;
use App\Http\Controllers\Controller;
use App\Models\GuruMapel\CpTerpilih;
use App\Models\GuruMapel\MateriAjar;
use App\Models\Kurikulum\DataKBM\CapaianPembelajaran;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DetailDataKbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(DataKbmDataTable $dataKbmDataTable)
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
        $kodemapelArray = $kbmPerRombels->pluck('kel_mapel')->toArray();

        // Query untuk mengambil data
        $capaianPembelajarans = DB::table('cp_terpilihs')
            ->join('kbm_per_rombels', function ($join) {
                $join->on('cp_terpilihs.kode_rombel', '=', 'kbm_per_rombels.kode_rombel')
                    ->on('cp_terpilihs.kel_mapel', '=', 'kbm_per_rombels.kel_mapel');
            })
            ->join('capaian_pembelajarans', 'cp_terpilihs.kode_cp', '=', 'capaian_pembelajarans.kode_cp')
            ->select(
                'cp_terpilihs.id',
                'cp_terpilihs.id_personil',
                'kbm_per_rombels.rombel',
                'kbm_per_rombels.mata_pelajaran',
                'capaian_pembelajarans.kode_cp',
                'capaian_pembelajarans.tingkat',
                'capaian_pembelajarans.fase',
                'capaian_pembelajarans.element',
                'capaian_pembelajarans.inisial_mp',
                'capaian_pembelajarans.nama_matapelajaran',
                'capaian_pembelajarans.nomor_urut',
                'capaian_pembelajarans.isi_cp'
            )
            ->where('cp_terpilihs.id_personil', $personal_id)
            ->orderBy('cp_terpilihs.id', 'asc') // Urutkan berdasarkan id
            ->orderBy('kbm_per_rombels.rombel', 'asc') // Urutkan berdasarkan rombel
            ->get();

        // Cek jumlah data materi_ajars yang sesuai dengan kode_rombel dan kel_mapel dari kbm_per_rombels
        $rombelMapelPairs = $kbmPerRombels->map(function ($kbm) {
            return [
                'kode_rombel' => $kbm->kode_rombel,
                'kel_mapel' => $kbm->kel_mapel,
            ];
        })->toArray();

        // Menghitung jumlah materi ajar yang sesuai dengan kode_rombel dan kel_mapel
        $jumlahMateriAjar = CpTerpilih::where(function ($query) use ($rombelMapelPairs) {
            foreach ($rombelMapelPairs as $pair) {
                $query->orWhere(function ($subQuery) use ($pair) {
                    $subQuery->where('kode_rombel', $pair['kode_rombel'])
                        ->where('kel_mapel', $pair['kel_mapel']);
                });
            }
        })->count();

        return $dataKbmDataTable->render(
            'pages.gurumapel.data-kbm-detail',
            compact(
                'kbmPerRombels',
                'capaianPembelajarans',
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

    public function updateKkm(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:kbm_per_rombels,id',  // Sesuaikan dengan nama tabel dan primary key
            'kkm' => 'required|integer|min:60|max:100',
        ]);

        $kbm = KbmPerRombel::find($validated['id']);
        $kbm->kkm = $validated['kkm'];
        if ($kbm->save()) {
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 500);
    }
}
