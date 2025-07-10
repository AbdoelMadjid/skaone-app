<?php

namespace App\Http\Controllers\Kurikulum\DokumenGuru;

use App\DataTables\Kurikulum\DokumenGuru\ArsipPerangkatAjarDataTable;
use App\Http\Controllers\Controller;
use App\Models\GuruMapel\PerangkatAjar;
use Illuminate\Http\Request;

class ArsipPerangkatAjarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArsipPerangkatAjarDataTable $arsipPerangkatAjarDataTable)
    {
        return $arsipPerangkatAjarDataTable->render('pages.kurikulum.dokumenguru.arsip-perangkat-ajar');
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

    public function destroyArsipPerangkatAjar(Request $request)
    {
        $request->validate([
            'id_personil' => 'required',
            'tahunajaran' => 'required',
            'semester' => 'required',
            'tingkat' => 'required',
            'mata_pelajaran' => 'required',
        ]);

        $data = PerangkatAjar::where([
            'id_personil' => $request->id_personil,
            'tahunajaran' => $request->tahunajaran,
            'semester' => $request->semester,
            'tingkat' => $request->tingkat,
            'mata_pelajaran' => $request->mata_pelajaran,
        ])->first();

        if (!$data) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        $fields = [
            'doc_analis_waktu' => 'perangkat-ajar/aw',
            'doc_cp' => 'perangkat-ajar/cp',
            'doc_tp' => 'perangkat-ajar/tp',
            'doc_rpp' => 'perangkat-ajar/modul-ajar',
        ];

        foreach ($fields as $field => $folder) {
            if ($data->$field) {
                $filePath = base_path($folder . '/' . $data->$field);
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
        }

        $data->delete();

        return response()->json(['message' => 'Perangkat ajar berhasil dihapus.']);
    }
}
