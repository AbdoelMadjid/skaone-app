<?php

namespace App\Http\Controllers\GuruMapel;

use App\DataTables\GuruMapel\TujuanPembelajaranDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\GuruMapel\TujuanPembelajaranRequest;
use App\Models\GuruMapel\CpTerpilih;
use App\Models\GuruMapel\MateriAjar;
use App\Models\GuruMapel\TujuanPembelajaran;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TujuanPembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TujuanPembelajaranDataTable $tujuanPembelajaranDataTable)
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

        $KbmPersonil = KbmPerRombel::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->orderBy('kel_mapel')
            ->orderBy('kode_rombel')
            ->get();

        // Jika belum memiliki jam mengajar
        if ($KbmPersonil->isEmpty()) {
            return redirect()->route('dashboard')->with('errorSwal', 'Maaf, Anda belum memiliki <b>Jam Mengajar</b> pada <b>tahun ajaran</b> dan <b>semester</b> saat ini. Silakan hubungi bagian Kurikulum.');
        }

        $cpOptions = CpTerpilih::where('cp_terpilihs.id_personil', $personal_id)
            ->where('tahunajaran', $tahunAjaran->tahunajaran)
            ->where('ganjilgenap', $semester->semester)
            ->join('capaian_pembelajarans', 'cp_terpilihs.kode_cp', '=', 'capaian_pembelajarans.kode_cp')
            ->orderBy('cp_terpilihs.kode_cp') // Mengurutkan berdasarkan kode_cp
            ->get([
                'cp_terpilihs.kode_cp',
                'cp_terpilihs.kel_mapel',
                'cp_terpilihs.kode_rombel',
                'cp_terpilihs.tingkat',
                'cp_terpilihs.jml_materi',
                'capaian_pembelajarans.fase',
                'capaian_pembelajarans.element',
                'capaian_pembelajarans.nama_matapelajaran',
            ])
            ->groupBy('kode_cp') // Mengelompokkan berdasarkan kode_cp
            ->map(function ($group) {
                $item = $group->first(); // Ambil data pertama dari grup
                return [
                    'kode_cp' => $item->kode_cp,
                    'kel_mapel' => $item->kel_mapel,
                    'kode_rombel' => $item->kode_rombel,
                    'jml_materi' => $item->jml_materi,
                    'tingkat' => $item->tingkat,
                    'fase' => $item->fase,
                    'element' => $item->element,
                    'nama_matapelajaran' => $item->nama_matapelajaran,
                ];
            });

        if ($cpOptions->isEmpty()) {
            return redirect()->route('gurumapel.adminguru.capaian-pembelajaran.index')->with('warningSwal', 'Anda belum memilih <b>Capaian Pembelajaran</b>. Silakan pilih terlebih dahulu sebelum mengakses menu Tujuan Pembelajaran.');
        }

        return $tujuanPembelajaranDataTable->render(
            'pages.gurumapel.tujuan-pembelajaran',
            compact(
                'personal_id',
                'tahunAjaran',
                'semester',
                'fullName',
                'cpOptions',
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

    public function hapusTujuanPembelajaran(Request $request)
    {
        $ids = $request->ids;
        if (is_array($ids) && !empty($ids)) {
            TujuanPembelajaran::whereIn('id', $ids)->delete();
            return response()->json(['success' => 'Data berhasil dihapus!']);
        }

        return response()->json(['error' => 'Tidak ada data yang dihapus!'], 400);
    }

    public function getRombel(Request $request)
    {
        $personalId = $request->input('personal_id');
        $kodeCp = $request->input('kode_cp');

        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        $rombels = DB::table('cp_terpilihs')
            ->where('cp_terpilihs.id_personil', $personalId)
            ->where('cp_terpilihs.kode_cp', $kodeCp)
            ->where('cp_terpilihs.tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('cp_terpilihs.ganjilgenap', $semesterAktif->semester)
            ->select('cp_terpilihs.*')
            ->get();

        return response()->json($rombels); // Return the data as JSON
    }


    public function getIsiCP(Request $request)
    {
        $kodeCp = $request->get('kode_cp'); // Get the kode_cp from the request

        // Query the database for the matching capaian_pembelajaran
        $capaian = DB::table('capaian_pembelajarans')
            ->where('kode_cp', $kodeCp)
            ->first(); // Assuming only one record will match

        // Return both isi_cp and element in JSON format
        if ($capaian) {
            return response()->json([
                'isi_cp' => $capaian->isi_cp,
                'element' => $capaian->element, // Include element field
            ]);
        } else {
            return response()->json([
                'isi_cp' => '',
                'element' => '', // Empty response for element if no data found
            ]);
        }
    }


    public function getKodeRombel(Request $request)
    {
        $personalId = $request->get('id_personil'); // Get the personal_id from the request
        $kodeCp = $request->get('kode_cp'); // Get the kode_cp from the request

        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }


        // Query the database for matching records in cp_terpilihs
        $kodeRombels = DB::table('cp_terpilihs')
            ->where('cp_terpilihs.id_personil', $personalId)
            ->where('cp_terpilihs.kode_cp', $kodeCp)
            ->where('cp_terpilihs.tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('cp_terpilihs.ganjilgenap', $semesterAktif->semester)
            ->pluck('kode_rombel'); // Get all matching kode_rombel values

        // Return the array of kode_rombel values as a JSON response
        return response()->json(['kode_rombel' => $kodeRombels]);
    }

    public function getKodeMapel(Request $request)
    {
        $personalId = $request->get('id_personil'); // Get the personal_id from the request
        $kodeCp = $request->get('kode_cp'); // Get the kode_cp from the request


        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Query the database for matching records in cp_terpilihs
        $kodeMapels = DB::table('cp_terpilihs')
            ->where('cp_terpilihs.id_personil', $personalId)
            ->where('cp_terpilihs.kode_cp', $kodeCp)
            ->where('cp_terpilihs.tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('cp_terpilihs.ganjilgenap', $semesterAktif->semester)
            ->pluck('kel_mapel'); // Get all matching kode_rombel values

        // Return the array of kode_rombel values as a JSON response
        return response()->json(['kel_mapel' => $kodeMapels]);
    }

    public function checkTujuanPembelajaran(Request $request)
    {
        $kodeCp = $request->input('kode_cp');
        $idPersonil = $request->input('id_personil');

        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }


        // Cek apakah kode_cp sudah ada di tabel materi_ajars
        $exists = DB::table('tujuan_pembelajarans')
            ->where('id_personil', $idPersonil)
            ->where('kode_cp', $kodeCp)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
            ->exists();

        if ($exists) {
            return response()->json(['exists' => true, 'message' => "Tujuan Pembelajaran untuk Kode CP $kodeCp sudah dibuat."]);
        }

        return response()->json(['exists' => false]);
    }


    public function saveTujuanPembelajaran(TujuanPembelajaranRequest $request)
    {
        // Validasi input
        /*         $request->validate([
            'selected_rombel_ids' => 'required',
            'kel_mapel' => 'required',
            'personal_id' => 'required',
            'tahunajaran' => 'required',
            'ganjilgenap' => 'required',
            'semester' => 'required',
            'tingkat' => 'required',
            'selected_tp_data' => 'required', // JSON string berisi data materi
        ]);
 */
        $request->validate([
            'tp_isi.*' => ['required', function ($attribute, $value, $fail) {
                $wordCount = str_word_count($value);
                if ($wordCount > 25) {
                    $fail("The text in $attribute exceeds the maximum allowed word count of 25.");
                }
            }],
        ]);

        // Ambil data dari request
        $kode_rombel = explode(',', $request->input('selected_rombel_ids'));
        $kel_mapel = explode(',', $request->input('kel_mapel'));
        $id_personil = $request->input('personal_id');
        $tahunAjaran = $request->input('tahunajaran');
        $semester = $request->input('semester');
        $ganjilgenap = $request->input('ganjilgenap');
        $tingkat = $request->input('tingkat');
        $selected_tp_data = json_decode($request->input('selected_tp_data'), true);

        if (count($kel_mapel) !== count($kode_rombel)) {
            return redirect()->back()->withErrors(['error' => 'Jumlah kode mapel tidak sesuai dengan jumlah rombel']);
        }

        // Iterasi dan simpan data
        foreach ($kode_rombel as $index => $rombel) {
            $current_kel_mapel = $kel_mapel[$index] ?? null;

            foreach ($selected_tp_data as $tp) {
                TujuanPembelajaran::create([
                    'tahunajaran' => $tahunAjaran,
                    'ganjilgenap' => $ganjilgenap,
                    'semester' => $semester,
                    'tingkat' => $tingkat,
                    'kode_rombel' => $rombel,
                    'kel_mapel' => $current_kel_mapel, // Gunakan kel_mapel berdasarkan indeks
                    'id_personil' => $id_personil,
                    'kode_cp' => $tp['kode_cp'],
                    'tp_kode' => $tp['tp_kode'],
                    'tp_no' => $tp['tp_no'],
                    'tp_isi' => $tp['tp_isi'],
                    'tp_desk_tinggi' => $tp['tp_desk_tinggi'],
                    'tp_desk_rendah' => $tp['tp_desk_rendah'],
                ]);
            }
        }

        return redirect()->route('gurumapel.adminguru.tujuan-pembelajaran.index')
            ->with('success', 'Tujuan Pembelajaran berhasil disimpan.');
    }

    /* public function updateTujuanPembelajaran(Request $request, $id)
    {
        // Validasi data
        $validatedData = $request->validate([
            'tp_isi' => 'required|string|max:255',
        ]);

        // Cari record berdasarkan ID
        $row = TujuanPembelajaran::find($id);

        if ($row) {
            // Update data
            $row->tp_isi = $validatedData['tp_isi'];
            $row->save(); // Simpan perubahan

            return redirect()->back()->with('success', 'Data berhasil diperbarui!');
        }

        return redirect()->back()->with('error', 'Data tidak ditemukan!');
    } */

    public function updateTujuanPembelajaran(Request $request, $id)
    {
        // Validasi data input
        $validatedData = $request->validate([
            'tp_isi' => 'required|string|max:255',
        ]);

        // Cari record tujuan pembelajaran berdasarkan ID
        $tujuanPembelajaran = TujuanPembelajaran::find($id);

        if ($tujuanPembelajaran) {
            // Update kolom tp_isi di tabel tujuan_pembelajarans
            $tujuanPembelajaran->tp_isi = $validatedData['tp_isi'];
            $tujuanPembelajaran->save();

            // Identifikasi kolom yang perlu diperbarui di nilai_formatif
            $tpNo = $tujuanPembelajaran->tp_no; // Misalnya tp_no = 1
            $tpColumn = "tp_isi_$tpNo"; // Contoh: tp_isi_1

            // Update tabel nilai_formatif
            DB::table('nilai_formatif')
                ->where('tahunajaran', $tujuanPembelajaran->tahunajaran)
                ->where('ganjilgenap', $tujuanPembelajaran->ganjilgenap)
                ->where('semester', $tujuanPembelajaran->semester)
                ->where('tingkat', $tujuanPembelajaran->tingkat)
                ->where('kode_rombel', $tujuanPembelajaran->kode_rombel)
                ->where('kel_mapel', $tujuanPembelajaran->kel_mapel)
                ->where('id_personil', $tujuanPembelajaran->id_personil)
                ->update([$tpColumn => $validatedData['tp_isi']]);

            return response()->json(['message' => 'Data berhasil diperbarui!']);
        }

        return response()->json(['message' => 'Data tidak ditemukan!'], 404);
    }
}
