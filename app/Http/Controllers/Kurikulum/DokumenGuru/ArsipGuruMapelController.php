<?php

namespace App\Http\Controllers\Kurikulum\DokumenGuru;

use App\DataTables\Kurikulum\DokumenGuru\ArsipNgajarDataTable;
use App\Exports\PenilaianFormatifExport;
use App\Exports\PenilaianSumatifExport;
use App\Http\Controllers\Controller;
use App\Models\GuruMapel\NilaiFormatif;
use App\Models\GuruMapel\NilaiSumatif;
use App\Models\GuruMapel\TujuanPembelajaran;
use App\Models\Kurikulum\DataKBM\KbmPerRombel;
use App\Models\Kurikulum\DokumenGuru\PilihArsipGuru;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\IOFactory;


class ArsipGuruMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ArsipNgajarDataTable $arsipNgajarDataTable)
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        $dataPilGuru = PilihArsipGuru::where('id_personil', $personal_id)->first();

        // CEK apakah dataPilWalas ADA
        if (!$dataPilGuru) {
            return redirect()->route('dashboard')->with('errorAmbilData', '<p class="text-danger mx-4 mb-0">Anda belum memiliki akses ke menu ini.</p> <p class="fs-6">Silakan hubungi Developer Aplikasi ini. </p> <p class="fs-1"><i class="lab las la-grin"></i> <i class="lab las la-grin"></i> <i class="lab las la-grin"></i></p>');
        }

        $tahunAjaran = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

        // Ambil semua id_personil guru yang mengajar di kbm_per_rombels
        $daftarGuruIDs = KbmPerRombel::where('tahunajaran', $dataPilGuru->tahunajaran ?? '')
            ->where('ganjilgenap', $dataPilGuru->ganjilgenap ?? '')
            ->pluck('id_personil')
            ->unique()
            ->toArray();

        // Ambil data nama lengkap guru dari personil_sekolahs berdasarkan ID di atas
        $daftarGuru = PersonilSekolah::whereIn('id_personil', $daftarGuruIDs)->get();

        // Ambil semua user yang punya role 'master'
        $usersWithMasterRole = User::role('admin')->get();

        // Ambil semua id_personil dari user tersebut
        $idPersonilList = $usersWithMasterRole->pluck('personal_id')->filter()->unique();

        // Ambil data PersonilSekolah berdasarkan id_personil
        $personilSekolah = PersonilSekolah::whereIn('id_personil', $idPersonilList)
            ->pluck('namalengkap', 'id_personil')
            ->toArray();

        return $arsipNgajarDataTable->render('pages.kurikulum.dokumenguru.arsip-gurumapel', [
            'tahunAjaran' => $tahunAjaran,
            'personal_id' => $personal_id,
            'selectedTahunajaran' => $dataPilGuru->tahunajaran ?? '',
            'selectedSemester' => $dataPilGuru->ganjilgenap ?? '',
            'selectedGuru' => $dataPilGuru->id_guru ?? '',
            'daftarGuru' => $daftarGuru,
            'dataPilGuru' => $dataPilGuru,
            'personilSekolah' => $personilSekolah,
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

    public function simpanPilihan(Request $request)
    {
        $request->validate([
            'tahunajaran' => 'required|string',
            'ganjilgenap' => 'required|string',
            'id_guru' => 'required|string',
        ]);

        $personal_id = Auth::user()->personal_id;

        PilihArsipGuru::updateOrCreate(
            ['id_personil' => $personal_id],
            [
                'tahunajaran' => $request->tahunajaran,
                'ganjilgenap' => $request->ganjilgenap,
                'id_guru' => $request->id_guru
            ]
        );

        return response()->json([
            'success' => true,
            'message' => "Pilihan berhasil di simpan"
        ]);
    }

    public function simpanPilihanGuru(Request $request)
    {
        $validatedData = $request->validate([
            'id_personil' => 'required|string',
            'tahunajaran' => 'required|string',
            'ganjilgenap' => 'required|string',
            'id_guru' => 'required|string',
        ]);

        PilihArsipGuru::updateOrCreate(
            ['id_personil' => $validatedData['id_personil']],
            $validatedData
        );

        return redirect()->back()->with('success', 'Data berhasil disimpan.');
    }

    public function getGuruByTahunSemester(Request $request)
    {
        $user = Auth::user();
        $personal_id = $user->personal_id;

        $tahunajaran = $request->tahunajaran;
        $ganjilgenap = $request->ganjilgenap;

        if (!$tahunajaran || !$ganjilgenap) {
            return response()->json(['options' => []]);
        }

        // Ambil id_guru yang tersimpan sebelumnya
        $selected = PilihArsipGuru::where('id_personil', $personal_id)
            ->where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->value('id_guru');

        // Ambil semua id_personil guru dari kbm_per_rombels sesuai tahun + ganjilgenap
        $guruIDs = KbmPerRombel::where('tahunajaran', $tahunajaran)
            ->where('ganjilgenap', $ganjilgenap)
            ->pluck('id_personil')
            ->unique()
            ->filter(); // buang null jika ada

        // Ambil data personilnya
        $guruList = PersonilSekolah::whereIn('id_personil', $guruIDs)->get();

        // Format data untuk select2
        $options = $guruList->map(function ($guru) use ($selected) {
            $nama = trim("{$guru->gelardepan} {$guru->namalengkap} {$guru->gelarbelakang}");
            return [
                'id' => $guru->id_personil,
                'text' => $nama,
                'selected' => $guru->id_personil == $selected,
            ];
        });

        return response()->json(['options' => $options]);
    }

    public function createNilaiFormatif($kode_rombel, $kel_mapel, $id_personil)
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

        return view('pages.kurikulum.dokumenguru.formatif-create', [
            'data' => $data,
            'jumlahTP' => $jumlahTP,
            'pesertaDidik' => $pesertaDidik,
            'tujuanPembelajaran' => $tujuanPembelajaran,
            'fullName' => $fullName,
            'action' => route('kurikulum.dokumenguru.formatif.storenilaiFormatif')
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeNilaiFormatif(Request $request)
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

        return redirect()->route('kurikulum.dokumenguru.arsip-gurumapel.formatif.editNilai', [
            'kode_rombel' => $data['kode_rombel'],
            'kel_mapel' => $data['kel_mapel'],
            'id_personil' => $data['id_personil'],
            'tahunajaran' => $data['tahunajaran'],
            'ganjilgenap' => $data['ganjilgenap'],
        ])->with('toast_success', 'Data Nilai Formatif berhasil disimpan.');
    }

    public function editNilaiFormatif($kode_rombel, $kel_mapel, $id_personil, $tahunajaran, $ganjilgenap)
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

        return view('pages.kurikulum.dokumenguru.formatif-edit', [
            'data' => $data,
            'jumlahTP' => $jumlahTP,
            'pesertaDidik' => $pesertaDidik,
            'tujuanPembelajaran' => $tujuanPembelajaran,
            'fullName' => $fullName,
            'action' => route('kurikulum.dokumenguru.formatif.storenilaiFormatif')
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateNilaiFormatif(Request $request, string $id)
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

        return redirect()->route('kurikulum.dokumenguru.arsip-gurumapel.formatif.editNilai', [
            'kode_rombel' => $data['kode_rombel'],
            'kel_mapel' => $data['kel_mapel'],
            'id_personil' => $data['id_personil'],
            'tahunajaran' => $data['tahunajaran'],
            'ganjilgenap' => $data['ganjilgenap'],
        ])->with('toast_success', 'Data Nilai Formatif berhasil diupdate.');
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

            return redirect()->route('kurikulum.dokumenguru.arsip-gurumapel.formatif.editNilai', [
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

    /////========================== sumatif ========================



    /**
     * Show the form for creating a new resource.
     */
    public function createNilaiSumatif($kode_rombel, $kel_mapel, $id_personil)
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

        return view('pages.kurikulum.dokumenguru.sumatif-create', [
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
    public function storeNilaiSumatif(Request $request)
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

        return redirect()->route('kurikulum.dokumenguru.arsip-gurumapel.sumatif.editNilai', [
            'kode_rombel' => $request->kode_rombel,
            'kel_mapel' => $request->kel_mapel,
            'id_personil' => $request->id_personil,
            'tahunajaran' => $request['tahunajaran'],
            'ganjilgenap' => $request['ganjilgenap'],
        ])->with('toast_success', 'Data Nilai Sumatif berhasil disimpan.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function editNilaiSumatif($kode_rombel, $kel_mapel, $id_personil, $tahunajaran, $ganjilgenap)
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

        return view('pages.kurikulum.dokumenguru.sumatif-edit', [
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
    public function updateNilaiSumatif(Request $request, $id)
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

        return redirect()->route('kurikulum.dokumenguru.arsip-gurumapel.sumatif.editNilai', [
            'kode_rombel' => $data->kode_rombel,
            'kel_mapel' => $data->kel_mapel,
            'id_personil' => $data->id_personil,
            'tahunajaran' => $data->tahunajaran,
            'ganjilgenap' => $data->ganjilgenap,
        ])->with('toast_success', 'Data Nilai Sumatif berhasil diupdate.');

        /*         return redirect()->route('gurumapel.penilaian.sumatif.index')
            ->with('toast_success', 'Data berhasil disimpan!'); */
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

            return redirect()->route('kurikulum.dokumenguru.arsip-gurumapel.sumatif.editNilai', [
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
