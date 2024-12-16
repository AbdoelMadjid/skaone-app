<?php

namespace App\Http\Controllers\Kurikulum\DokumenGuru;

use App\DataTables\Kurikulum\DokumenGuru\NgajarPerGuruDataTable;
use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PerGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(NgajarPerGuruDataTable $ngajarPerGuruDataTable)
    {
        $user = Auth::user();
        $id_login = $user->personal_id;

        // Ambil semua personil yang memiliki jenispersonil 'Guru', kecuali yang sedang login
        $personils = PersonilSekolah::where('jenispersonil', 'Guru')
            ->where('id_personil', '!=', $id_login)
            ->orderBy('namalengkap') // Mengurutkan berdasarkan nama lengkap
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        // Ambil tahun ajaran yang aktif
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first();

        // Periksa jika tidak ada tahun ajaran aktif
        if (!$tahunAjaran) {
            return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
        }

        // Ambil semester yang aktif berdasarkan tahun ajaran yang aktif
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaran->id) // Pastikan mengacu pada tahun ajaran yang aktif
            ->first();

        // Periksa jika tidak ada semester aktif
        if (!$semester) {
            return redirect()->back()->with('error', 'Tidak ada semester aktif.');
        }

        // Ambil semua tahun ajaran untuk dropdown
        $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        return $ngajarPerGuruDataTable->render('pages.kurikulum.dokumenguru.per-guru', [
            'personils' => $personils,
            'tahunAjaranOptions' => $tahunAjaranOptions,
            'semester' => $semester,
            'tahunAjaran' => $tahunAjaran,
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
}
