<?php

namespace App\Http\Controllers\GuruMapel;

use App\DataTables\GuruMapel\FormatifDataTable;
use App\Exports\PenilaianFormatifExport;
use App\Http\Controllers\Controller;
use App\Models\GuruMapel\NilaiFormatif;
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

class FormatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(FormatifDataTable $formatifDataTable)
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

        return $formatifDataTable->render(
            'pages.gurumapel.formatif',
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
            ->where('id_personil', $id_personil)
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

        return view('pages.gurumapel.formatif-create', [
            'data' => $data,
            'jumlahTP' => $jumlahTP,
            'pesertaDidik' => $pesertaDidik,
            'tujuanPembelajaran' => $tujuanPembelajaran,
            'fullName' => $fullName,
            'action' => route('gurumapel.penilaian.formatif.store')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Ambil semua data dari request
        $data = $request->all();

        // Loop melalui setiap siswa
        foreach ($data['tp_nilai'] as $nis => $tpNilai) {
            // Inisialisasi array data untuk disimpan
            $saveData = [
                'tahunajaran' => $data['tahunajaran'],
                'ganjilgenap' => $data['ganjilgenap'],
                'semester' => $data['semester'],
                'tingkat' => $data['tingkat'],
                'kode_rombel' => $data['kode_rombel'],
                'kel_mapel' => $data['kel_mapel'],
                'id_personil' => $data['id_personil'],
                'nis' => trim($nis),
                'rerata_formatif' => $data["rerata_formatif_$nis"] ?? 0,
            ];

            // Proses pengisian TP isi dan TP nilai
            for ($i = 1; $i <= 9; $i++) {
                $saveData["tp_isi_$i"] = $data["tp_isi_{$nis}_$i"] ?? null;
                $saveData["tp_nilai_$i"] = $tpNilai["tp_$i"] ?? null;
            }

            // Simpan ke database
            NilaiFormatif::updateOrCreate(
                [
                    'tahunajaran' => $data['tahunajaran'],
                    'ganjilgenap' => $data['ganjilgenap'],
                    'semester' => $data['semester'],
                    'kode_rombel' => $data['kode_rombel'],
                    'kel_mapel' => $data['kel_mapel'],
                    'nis' => trim($nis),
                ],
                $saveData
            );
        }

        return redirect()->route('gurumapel.penilaian.formatif.editNilai', [
            'kode_rombel' => $data['kode_rombel'],
            'kel_mapel' => $data['kel_mapel'],
            'id_personil' => $data['id_personil'],
            'tahunajaran' => $data['tahunajaran'],
            'ganjilgenap' => $data['ganjilgenap'],
        ])->with('toast_success', 'Data Nilai Formatif berhasil disimpan.');
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
        // Cari data berdasarkan parameter
        $data = KbmPerRombel::where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
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
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->count();

        $nilaiFormatif = NilaiFormatif::where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('id_personil', $id_personil)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->get()
            ->keyBy('nis'); // Buat array dengan key NIS

        // Ambil peserta didik terkait rombel
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
            ->map(function ($siswa) use ($nilaiFormatif, $jumlahTP) {
                // Tambahkan nilai TP dan rerata ke data siswa
                $nilai = $nilaiFormatif[$siswa->nis] ?? null;

                // Loop untuk setiap TP
                for ($i = 1; $i <= $jumlahTP; $i++) {
                    $tpField = "tp_nilai_{$i}";
                    $siswa->{$tpField} = $nilai->{$tpField} ?? null; // Isi nilai TP atau null
                }

                // Tambahkan rata-rata
                $siswa->rerata_formatif = $nilai->rerata_formatif ?? null;

                return $siswa;
            });

        $tujuanPembelajaran = TujuanPembelajaran::where('id_personil', $id_personil)
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->orderBy('tp_kode')
            ->get();

        return view('pages.gurumapel.formatif-edit', [
            'data' => $data,
            'jumlahTP' => $jumlahTP,
            'pesertaDidik' => $pesertaDidik,
            'tujuanPembelajaran' => $tujuanPembelajaran,
            'fullName' => $fullName,
            'action' => route('gurumapel.penilaian.formatif.store')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Ambil semua data dari request
        $data = $request->all();

        // Loop melalui setiap siswa
        foreach ($data['tp_nilai'] as $nis => $tpNilai) {
            // Inisialisasi array data untuk disimpan
            $saveData = [
                'tahunajaran' => $data['tahunajaran'],
                'ganjilgenap' => $data['ganjilgenap'],
                'semester' => $data['semester'],
                'tingkat' => $data['tingkat'],
                'kode_rombel' => $data['kode_rombel'],
                'kel_mapel' => $data['kel_mapel'],
                'id_personil' => $data['id_personil'],
                'nis' => trim($nis),
                'rerata_formatif' => $data["rerata_formatif_$nis"] ?? 0,
            ];

            // Proses pengisian TP isi dan TP nilai
            for ($i = 1; $i <= 9; $i++) {
                $saveData["tp_isi_$i"] = $data["tp_isi_{$nis}_$i"] ?? null;
                $saveData["tp_nilai_$i"] = $tpNilai["tp_$i"] ?? null;
            }

            // Simpan ke database
            NilaiFormatif::updateOrCreate(
                [
                    'tahunajaran' => $data['tahunajaran'],
                    'ganjilgenap' => $data['ganjilgenap'],
                    'semester' => $data['semester'],
                    'kode_rombel' => $data['kode_rombel'],
                    'kel_mapel' => $data['kel_mapel'],
                    'nis' => trim($nis),
                ],
                $saveData
            );
        }

        return redirect()->route('gurumapel.penilaian.formatif.editNilai', [
            'kode_rombel' => $data['kode_rombel'],
            'kel_mapel' => $data['kel_mapel'],
            'id_personil' => $data['id_personil'],
            'tahunajaran' => $data['tahunajaran'],
            'ganjilgenap' => $data['ganjilgenap'],
        ])->with('toast_success', 'Data Nilai Formatif berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function hapusNilaiFormatif(Request $request)
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
        $deleted = NilaiFormatif::where('kode_rombel', $request->kode_rombel)
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

    public function exportExcelFormatif(Request $request)
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

        $tujuanPembelajaran = TujuanPembelajaran::where('id_personil', $id_personil)
            ->where('kode_rombel', $kode_rombel)
            ->where('kel_mapel', $kel_mapel)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->orderBy('tp_kode')
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
            'jumlahTP' => $jumlahTP,
            'pesertaDidik' => $pesertaDidik,
            'mata_pelajaran' => $data->mata_pelajaran,
            'tujuanPembelajaran' => $tujuanPembelajaran,
        ];

        // Ganti karakter "/" di $data->mata_pelajaran dengan karakter yang aman untuk nama file
        $mataPelajaran = trim(preg_replace('/[^\w\- ]/', '-', $data->mata_pelajaran));
        // Unduh file Excel
        $fileName = "Penilaian_Formatif_{$mataPelajaran}_{$kode_rombel}_{$personil->namalengkap}.xlsx";
        return Excel::download(new PenilaianFormatifExport($params), $fileName);
    }

    public function uploadNilaiFormatif(Request $request)
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
                $tp_isi_1 = $sheet->getCell("J{$rowIndex}")->getValue();
                $tp_isi_2 = $sheet->getCell("K{$rowIndex}")->getValue();
                $tp_isi_3 = $sheet->getCell("L{$rowIndex}")->getValue();
                $tp_isi_4 = $sheet->getCell("M{$rowIndex}")->getValue();
                $tp_isi_5 = $sheet->getCell("N{$rowIndex}")->getValue();
                $tp_isi_6 = $sheet->getCell("O{$rowIndex}")->getValue();
                $tp_isi_7 = $sheet->getCell("P{$rowIndex}")->getValue();
                $tp_isi_8 = $sheet->getCell("Q{$rowIndex}")->getValue();
                $tp_isi_9 = $sheet->getCell("R{$rowIndex}")->getValue();

                $tp_nilai_1 = $sheet->getCell("S{$rowIndex}")->getValue();
                $tp_nilai_2 = $sheet->getCell("T{$rowIndex}")->getValue();
                $tp_nilai_3 = $sheet->getCell("U{$rowIndex}")->getValue();
                $tp_nilai_4 = $sheet->getCell("V{$rowIndex}")->getValue();
                $tp_nilai_5 = $sheet->getCell("W{$rowIndex}")->getValue();
                $tp_nilai_6 = $sheet->getCell("X{$rowIndex}")->getValue();
                $tp_nilai_7 = $sheet->getCell("Y{$rowIndex}")->getValue();
                $tp_nilai_8 = $sheet->getCell("Z{$rowIndex}")->getValue();
                $tp_nilai_9 = $sheet->getCell("AA{$rowIndex}")->getValue();

                $rerata_formatif = $sheet->getCell("AB{$rowIndex}")->getCalculatedValue(); // Menggunakan getCalculatedValue()

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
                    'tp_isi_1' => $tp_isi_1,
                    'tp_isi_2' => $tp_isi_2,
                    'tp_isi_3' => $tp_isi_3,
                    'tp_isi_4' => $tp_isi_4,
                    'tp_isi_5' => $tp_isi_5,
                    'tp_isi_6' => $tp_isi_6,
                    'tp_isi_7' => $tp_isi_7,
                    'tp_isi_8' => $tp_isi_8,
                    'tp_isi_9' => $tp_isi_9,
                    'tp_nilai_1' => $tp_nilai_1,
                    'tp_nilai_2' => $tp_nilai_2,
                    'tp_nilai_3' => $tp_nilai_3,
                    'tp_nilai_4' => $tp_nilai_4,
                    'tp_nilai_5' => $tp_nilai_5,
                    'tp_nilai_6' => $tp_nilai_6,
                    'tp_nilai_7' => $tp_nilai_7,
                    'tp_nilai_8' => $tp_nilai_8,
                    'tp_nilai_9' => $tp_nilai_9,
                    'rerata_formatif' => $rerata_formatif,
                ];
            }

            // Insert data ke database
            NilaiFormatif::insert($data);

            return redirect()->route('gurumapel.penilaian.formatif.editNilai', [
                'kode_rombel' => $kode_rombel,
                'kel_mapel' => $kel_mapel,
                'id_personil' => $id_personil,
                'tahunajaran' => $tahunajaran,
                'ganjilgenap' => $ganjilgenap,
            ])->with('toast_success', 'Data Nilai Formatif berhasil diunggah ke database.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
