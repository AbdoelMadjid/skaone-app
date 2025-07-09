<?php

namespace App\Http\Controllers\GuruMapel;

use App\DataTables\GuruMapel\PerangkatAjarDataTable;
use App\Helpers\PdfHelper;
use App\Http\Controllers\Controller;
use App\Models\GuruMapel\PerangkatAjar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PerangkatAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(PerangkatAjarDataTable $perangkatAjarData)
    {
        return $perangkatAjarData->render('pages.gurumapel.perangkat-ajar');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.gurumapel.perangkat-ajar-form', [
            'data' => new PerangkatAjar(),
            'action' => route('gurumapel.adminguru.perangkat-ajar.store')
        ]);
    }

    public function upload(Request $request)
    {
        $request->validate([
            'tingkat' => 'required',
            'mata_pelajaran' => 'required',
            'doc_analis_waktu' => 'nullable|file|mimes:pdf|max:5120',
            'doc_cp' => 'nullable|file|mimes:pdf|max:5120',
            'doc_tp' => 'nullable|file|mimes:pdf|max:5120',
            'doc_rpp' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $user = Auth::user();
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first();
        $semester = Semester::where('status', 'Aktif')
            ->where('tahun_ajaran_id', $tahunAjaran->id)
            ->first();

        // Cek jika entri sudah ada
        $existing = PerangkatAjar::where('id_personil', $user->personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('semester', $semester->semester)
            ->where('tingkat', $request->tingkat)
            ->where('mata_pelajaran', $request->mata_pelajaran)
            ->first();

        $data = [
            'id_personil' => $user->personal_id,
            'tahunajaran' => $tahunAjaran->tahunajaran,
            'semester' => $semester->semester,
            'tingkat' => $request->tingkat,
            'mata_pelajaran' => $request->mata_pelajaran,
        ];

        // Dokumen yang akan diupdate
        $fields = [
            'doc_analis_waktu' => ['folder' => 'perangkat-ajar/aw', 'prefix' => 'aw_'],
            'doc_cp' => ['folder' => 'perangkat-ajar/cp', 'prefix' => 'cp_'],
            'doc_tp' => ['folder' => 'perangkat-ajar/tp', 'prefix' => 'tp_'],
            'doc_rpp' => ['folder' => 'perangkat-ajar/modul-ajar', 'prefix' => 'modul_'],
        ];

        foreach ($fields as $field => $info) {
            if ($request->hasFile($field)) {
                // Hapus file lama jika ada
                if ($existing && $existing->$field) {
                    $oldPath = base_path($info['folder'] . '/' . $existing->$field);
                    if (file_exists($oldPath)) {
                        unlink($oldPath);
                    }
                }

                // Upload baru
                $data[$field] = PdfHelper::uploadPdf(
                    $request->file($field),
                    $info['folder'],
                    $info['prefix'],
                    $data,                      // ← metadata untuk nama file
                    $existing->$field ?? null  // ← nama file lama untuk dihapus
                );
            }
        }

        // Simpan data
        if ($existing) {
            $existing->update($data);
        } else {
            PerangkatAjar::create($data);
        }

        return redirect()->back()->with('success', 'Perangkat ajar berhasil disimpan.');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tingkat' => 'required',
            'mata_pelajaran' => 'required',
            'doc_cp' => 'nullable|file|mimes:pdf|max:5120',
            'doc_tp' => 'nullable|file|mimes:pdf|max:5120',
            'doc_rpp' => 'nullable|file|mimes:pdf|max:5120',
            'doc_analis_waktu' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $user = Auth::user();
        $tahunAjaran = TahunAjaran::where('status', 'Aktif')->first();
        $semester = Semester::where('status', 'Aktif')->where('tahun_ajaran_id', $tahunAjaran->id)->first();

        $data = [
            'id_personil' => $user->personal_id,
            'tahunajaran' => $tahunAjaran->tahunajaran,
            'semester' => $semester->semester,
            'tingkat' => $request->tingkat,
            'mata_pelajaran' => $request->mata_pelajaran,
        ];

        if ($request->hasFile('doc_cp')) {
            $data['doc_cp'] = PdfHelper::uploadPdf($request->file('doc_cp'), 'perangkat-ajar/cp', 'cp_');
        }
        if ($request->hasFile('doc_tp')) {
            $data['doc_tp'] = PdfHelper::uploadPdf($request->file('doc_tp'), 'perangkat-ajar/tp', 'tp_');
        }
        if ($request->hasFile('doc_rpp')) {
            $data['doc_rpp'] = PdfHelper::uploadPdf($request->file('doc_rpp'), 'perangkat-ajar/modul-ajar', 'modul_');
        }
        if ($request->hasFile('doc_analis_waktu')) {
            $data['doc_analis_waktu'] = PdfHelper::uploadPdf($request->file('doc_analis_waktu'), 'perangkat-ajar/analisis', 'analisis_');
        }

        // Jika data sudah ada, update, kalau belum insert
        $existing = PerangkatAjar::where('id_personil', $user->personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('semester', $semester->semester)
            ->where('tingkat', $request->tingkat)
            ->where('mata_pelajaran', $request->mata_pelajaran)
            ->first();

        if ($existing) {
            $existing->update($data);
        } else {
            PerangkatAjar::create($data);
        }

        return responseSuccess('Perangkat ajar berhasil disimpan');

        //return responseSuccess();
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
