<?php

namespace App\Http\Controllers\Kurikulum\PerangkatKurikulum;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\PesertaDidikRombel;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;

class BerkasCetakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
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

        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();
        $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();

        // Ambil input asli dari form
        $input = [
            'tahun_ajaran' => $request->input('tahun_ajaran'),
            'kode_kk' => $request->input('kode_kk'),
            'tingkat' => $request->input('tingkat'),
            'rombel_kode' => $request->input('rombel_kode'),
        ];

        // Untuk ambil data rombel
        $rombonganBelajarOptions = [];
        if ($input['tahun_ajaran'] && $input['kode_kk'] && $input['tingkat']) {
            $rombonganBelajarOptions = RombonganBelajar::where('tahunajaran', $input['tahun_ajaran'])
                ->where('id_kk', $input['kode_kk'])
                ->where('tingkat', $input['tingkat'])
                ->pluck('rombel', 'kode_rombel')
                ->toArray();
        }

        // Untuk ambil data siswa
        $pesertaDidikRombels = [];
        if ($input['tahun_ajaran'] && $input['kode_kk'] && $input['tingkat'] && $input['rombel_kode']) {
            $pesertaDidikRombels = PesertaDidikRombel::with('pesertaDidik')
                ->where('tahun_ajaran', $input['tahun_ajaran'])
                ->where('kode_kk', $input['kode_kk'])
                ->where('rombel_tingkat', $input['tingkat']) // ← penting: pakai rombel_tingkat
                ->where('rombel_kode', $input['rombel_kode'])
                ->orderBy('nis')
                ->get();
        }

        return view('pages.kurikulum.perangkatkurikulum.berkas-cetak', [
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
            'rombonganBelajarOptions' => $rombonganBelajarOptions,
            'filters' => $input,
            'pesertaDidikRombels' => $pesertaDidikRombels,
            'semester' => $semester,
        ]);
    }

    public function getRombelByFilter(Request $request)
    {
        $rombel = RombonganBelajar::where('tahunajaran', $request->tahunajaran)
            ->where('id_kk', $request->kode_kk)
            ->where('tingkat', $request->tingkat)
            ->pluck('rombel', 'kode_rombel');

        return response()->json($rombel);
    }
}
