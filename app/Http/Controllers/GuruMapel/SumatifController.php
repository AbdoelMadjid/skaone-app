<?php

namespace App\Http\Controllers\GuruMapel;

use App\DataTables\GuruMapel\SumatifDataTable;
use App\Exports\PenilaianSumatifExport;
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
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;

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
            return redirect()->route('dashboard')->with('errorSwal', 'Maaf, Anda belum memiliki <b>Jam Mengajar</b> <br>pada <b>tahun ajaran</b> dan <b>semester</b> saat ini.<br> Silakan hubungi bagian Kurikulum.');
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
    public function createNilai($kode_rombel, $kel_mapel, $id_personil)
    {
        // Ambil tahun ajaran dan semester aktif
        $tahunAjaranAktif = TahunAjaran::where('status', 'Aktif')->first();
        $semesterAktif = null;

        if ($tahunAjaranAktif) {
            $semesterAktif = Semester::where('status', 'Aktif')
                ->where('tahun_ajaran_id', $tahunAjaranAktif->id)
                ->first();
        }

        // Cari data berdasarkan parameter
        $data = KbmPerRombel::where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
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
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
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
            ->where('kbm_per_rombels.kel_mapel', $kel_mapel)
            ->where('kbm_per_rombels.tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('kbm_per_rombels.ganjilgenap', $semesterAktif->semester)
            ->get();

        $tujuanPembelajaran = TujuanPembelajaran::where('id_personil', $id_personil)
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('tahunajaran', $tahunAjaranAktif->tahunajaran)
            ->where('ganjilgenap', $semesterAktif->semester)
            ->orderBy('tp_kode')
            ->get();

        return view('pages.gurumapel.sumatif-create', [
            'data' => $data,
            'jumlahTP' => $jumlahTP,
            'pesertaDidik' => $pesertaDidik,
            'tujuanPembelajaran' => $tujuanPembelajaran,
            'fullName' => $fullName,
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
                'nis' => trim($nis),
                'sts' => $sts,
                'sas' => $request->sas[$nis],
                'rerata_sumatif' => $request->input("rerata_sumatif_$nis"),
            ]);
        }

        return redirect()->route('gurumapel.penilaian.sumatif.editNilai', [
            'kode_rombel' => $request->kode_rombel,
            'kel_mapel' => $request->kel_mapel,
            'id_personil' => $request->id_personil,
            'tahunajaran' => $request['tahunajaran'],
            'ganjilgenap' => $request['ganjilgenap'],
        ])->with('toast_success', 'Data Nilai Sumatif berhasil disimpan.');
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
    public function editNilai($kode_rombel, $kel_mapel, $id_personil, $tahunajaran, $ganjilgenap)
    {
        $data = KbmPerRombel::where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
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
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->count();

        $nilaiSumatif = NilaiSumatif::where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
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
            ->where('kbm_per_rombels.kel_mapel', $kel_mapel)
            ->where('kbm_per_rombels.tahunajaran', $tahunajaran)
            ->where('kbm_per_rombels.ganjilgenap', $ganjilgenap)
            ->get()
            ->map(function ($siswa) use ($nilaiSumatif) {
                // Tambahkan nilai STS dan SAS ke data siswa
                $siswa->sts = $nilaiSumatif[$siswa->nis]->sts ?? null;
                $siswa->sas = $nilaiSumatif[$siswa->nis]->sas ?? null;
                return $siswa;
            });

        $tujuanPembelajaran = TujuanPembelajaran::where('id_personil', $id_personil)
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->orderBy('tp_kode')
            ->get();

        return view('pages.gurumapel.sumatif-edit', [
            'data' => $data,
            'jumlahTP' => $jumlahTP,
            'nilaiSumatif' => $nilaiSumatif,
            'pesertaDidik' => $pesertaDidik,
            'tujuanPembelajaran' => $tujuanPembelajaran,
            'fullName' => $fullName,
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
                ->where('tahunajaran', $data->tahunajaran)
                ->where('ganjilgenap', $data->ganjilgenap)
                ->where('nis', trim($nis))
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

        return redirect()->route('gurumapel.penilaian.sumatif.editNilai', [
            'kode_rombel' => $data->kode_rombel,
            'kel_mapel' => $data->kel_mapel,
            'id_personil' => $data->id_personil,
            'tahunajaran' => $data->tahunajaran,
            'ganjilgenap' => $data->ganjilgenap,
        ])->with('toast_success', 'Data Nilai Sumatif berhasil diupdate.');

        /*         return redirect()->route('gurumapel.penilaian.sumatif.index')
            ->with('toast_success', 'Data berhasil disimpan!'); */
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function hapusNilaiSumatif(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'kode_rombel' => 'required|string',
            'kel_mapel' => 'required|string',
            'id_personil' => 'required|string',
            'tahunajaran' => 'required|string',
            'ganjilgenap' => 'required|string',
        ]);

        // Hapus data sesuai parameter
        $deleted = NilaiSumatif::where('kode_rombel', $request->kode_rombel)
            ->where('kel_mapel', $request->kel_mapel)
            ->where('id_personil', $request->id_personil)
            ->where('tahunajaran', $request->tahunajaran)
            ->where('ganjilgenap', $request->ganjilgenap)
            ->delete();

        if ($deleted) {
            return response()->json(['message' => 'Data berhasil dihapus!'], 200);
        }

        return response()->json(['message' => 'Gagal menghapus data!'], 500);
    }

    public function exportExcelSumatif(Request $request)
    {
        $kode_rombel = $request->kode_rombel;
        $kel_mapel = $request->kel_mapel;
        $id_personil = $request->id_personil;
        $tahunajaran = $request->tahunajaran;
        $ganjilgenap = $request->ganjilgenap;

        // Validasi keberadaan data
        $data = KbmPerRombel::where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->first();

        if (!$data) {
            return redirect()->back()->with('error', 'Data tidak ditemukan');
        }

        // Ambil nama lengkap personil
        $personil = PersonilSekolah::where('id_personil', $id_personil)->first();
        $fullName = $personil
            ? trim(($personil->gelardepan ? $personil->gelardepan . ' ' : '') . $personil->namalengkap . ($personil->gelarbelakang ? ', ' . $personil->gelarbelakang : ''))
            : 'Unknown';

        // Hitung jumlah TP
        $jumlahTP = DB::table('tujuan_pembelajarans')
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->count();

        // Ambil peserta didik
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
            ->where('kbm_per_rombels.kel_mapel', $kel_mapel)
            ->where('kbm_per_rombels.tahunajaran', $tahunajaran)
            ->where('kbm_per_rombels.ganjilgenap', $ganjilgenap)
            ->get();

        // Parameter untuk eksport
        $params = [
            'tahunajaran' => $tahunajaran,
            'ganjilgenap' => $ganjilgenap,
            'semester' => $data->semester,
            'tingkat' => $data->tingkat,
            'id_personil' => $data->id_personil,
            'kode_rombel' => $kode_rombel,
            'kel_mapel' => $kel_mapel,
            'id_personil' => $id_personil,
            'pesertaDidik' => $pesertaDidik,
            'mata_pelajaran' => $data->mata_pelajaran,
        ];

        // Ganti karakter "/" di $data->mata_pelajaran dengan karakter yang aman untuk nama file
        $mataPelajaran = trim(preg_replace('/[^\w\- ]/', '-', $data->mata_pelajaran));
        // Unduh file Excel
        $fileName = "Penilaian_Sumatif_{$mataPelajaran}_{$kode_rombel}_{$personil->namalengkap}.xlsx";
        return Excel::download(new PenilaianSumatifExport($params), $fileName);
    }

    public function uploadNilaiSumatif(Request $request)
    {
        $request->validate([
            'file_excel' => 'required|mimes:xlsx,xls',
        ]);

        $file = $request->file('file_excel');

        try {
            // Load file Excel
            $spreadsheet = IOFactory::load($file->getPathname());
            $sheet = $spreadsheet->getActiveSheet();

            // Iterasi setiap baris mulai dari baris kedua (mengabaikan header)
            $data = [];
            foreach ($sheet->getRowIterator(2) as $row) {
                $rowIndex = $row->getRowIndex();

                // Ambil data dari kolom sesuai urutan
                $tahunajaran = $sheet->getCell("A{$rowIndex}")->getValue();
                $ganjilgenap = $sheet->getCell("B{$rowIndex}")->getValue();
                $semester = $sheet->getCell("C{$rowIndex}")->getValue();
                $tingkat = $sheet->getCell("D{$rowIndex}")->getValue();
                $kode_rombel = $sheet->getCell("E{$rowIndex}")->getValue();
                $kel_mapel = $sheet->getCell("F{$rowIndex}")->getValue();
                $id_personil = $sheet->getCell("G{$rowIndex}")->getValue();
                $nis = $sheet->getCell("H{$rowIndex}")->getValue();

                // Abaikan kolom nama siswa (I)
                $sts = $sheet->getCell("J{$rowIndex}")->getValue();
                $sas = $sheet->getCell("K{$rowIndex}")->getValue();

                $rerata_sumatif = $sheet->getCell("L{$rowIndex}")->getCalculatedValue(); // Menggunakan getCalculatedValue()

                // Tambahkan ke array data
                $data[] = [
                    'tahunajaran' => $tahunajaran,
                    'ganjilgenap' => $ganjilgenap,
                    'semester' => $semester,
                    'tingkat' => $tingkat,
                    'kode_rombel' => $kode_rombel,
                    'kel_mapel' => $kel_mapel,
                    'id_personil' => $id_personil,
                    'nis' => trim($nis),
                    'sts' => $sts,
                    'sas' => $sas,
                    'rerata_sumatif' => $rerata_sumatif,
                ];
            }

            // Insert data ke database
            NilaiSumatif::insert($data);

            return redirect()->route('gurumapel.penilaian.sumatif.editNilai', [
                'kode_rombel' => $kode_rombel,
                'kel_mapel' => $kel_mapel,
                'id_personil' => $id_personil,
                'tahunajaran' => $tahunajaran,
                'ganjilgenap' => $ganjilgenap,
            ])->with('toast_success', 'Data Nilai Sumatif berhasil diunggah ke database.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
