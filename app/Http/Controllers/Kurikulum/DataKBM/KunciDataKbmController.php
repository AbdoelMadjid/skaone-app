<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\KunciDataKBMDataTable;
use App\Http\Controllers\Controller;
use App\Models\Kurikulum\DataKBM\KunciDataKbm;
use App\Models\Kurikulum\DokumenSiswa\PilihCetakRapor;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\PersonilSekolah;
use App\Models\ManajemenSekolah\PesertaDidik;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\Semester;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\NilaiRataSiswaExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class KunciDataKbmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(KunciDataKBMDataTable $kunciDataKBMDataTable)
    {
        if (auth()->check()) {
            $user = User::find(Auth::user()->id);
            $personal_id = $user->personal_id;

            // Cek apakah ada tahun ajaran aktif
            $tahunAjaranAktif = TahunAjaran::aktif()->first();
            if (!$tahunAjaranAktif) {
                return redirect()->back()->with('error', 'Tidak ada tahun ajaran aktif.');
            }

            // Cek apakah ada semester aktif untuk tahun ajaran tersebut
            $semester = $tahunAjaranAktif->semesters()->where('status', 'Aktif')->first();
            if (!$semester) {
                return redirect()->back()->with('error', 'Tidak ada semester aktif.');
            }

            // Ambil semua opsi tahun ajaran
            $tahunAjaranOptions = TahunAjaran::pluck('tahunajaran', 'tahunajaran')->toArray();

            // Cek apakah ada data pada KunciDataKbm untuk id_personil
            $dataPilCR = KunciDataKbm::where('id_personil', $personal_id)->first();
            if (!$dataPilCR || !$dataPilCR->kode_rombel) {
                return redirect()->back()->with('error', 'Data Kunci Data KBM tidak ditemukan untuk pengguna ini.');
            }

            // Ambil data tahun ajaran dan semester berdasarkan data di KunciDataKbm atau fallback ke aktif
            $tahunajaran = $dataPilCR->tahunajaran ?? $tahunAjaranAktif->tahunajaran;
            $ganjilgenap = $dataPilCR->ganjilgenap ?? $semester->semester;

            // Ambil kode_rombel dari $dataPilCR
            $kodeRombel = $dataPilCR->kode_rombel;

            // Ambil data rombel
            $dataRombel = DB::table('peserta_didik_rombels')
                ->join('peserta_didiks', 'peserta_didik_rombels.nis', '=', 'peserta_didiks.nis')
                ->select(
                    'peserta_didik_rombels.tahun_ajaran',
                    'peserta_didik_rombels.kode_kk',
                    'peserta_didik_rombels.rombel_tingkat',
                    'peserta_didik_rombels.rombel_kode',
                    'peserta_didik_rombels.rombel_nama',
                    'peserta_didik_rombels.nis',
                    'peserta_didiks.nama_lengkap',
                )
                ->where('peserta_didik_rombels.rombel_kode', $dataPilCR->kode_rombel)
                ->orderBy('peserta_didik_rombels.nis')
                ->get();

            if ($dataRombel->isEmpty()) {
                return redirect()->back()->with('error', 'Data rombel tidak ditemukan.');
            }

            // Dapatkan semua kel_mapel
            $kelMapelList = DB::table('kbm_per_rombels')
                ->select('kel_mapel')
                ->distinct()
                ->where('kode_rombel', $kodeRombel)
                ->get();

            // Dapatkan nilai rata-rata per kel_mapel untuk setiap siswa
            $nilaiRataSiswa = DB::select("
        SELECT
            pd.nis,
            pd.nama_lengkap,
            kr.kel_mapel,
            ROUND((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2) AS nilai_kel_mapel
        FROM
            peserta_didik_rombels pr
        INNER JOIN
            peserta_didiks pd ON pr.nis = pd.nis
        INNER JOIN
            kbm_per_rombels kr ON pr.rombel_kode = kr.kode_rombel
        LEFT JOIN
            nilai_formatif nf ON pr.nis = nf.nis AND kr.kel_mapel = nf.kel_mapel
        LEFT JOIN
            nilai_sumatif ns ON pr.nis = ns.nis AND kr.kel_mapel = ns.kel_mapel
        WHERE
            pr.rombel_kode = ?
        ORDER BY
            pd.nis, kr.kel_mapel
    ", [$kodeRombel]);

            // Pivoting data programatis di PHP
            $pivotData = [];
            foreach ($nilaiRataSiswa as $nilai) {
                $pivotData[$nilai->nis]['nama_lengkap'] = $nilai->nama_lengkap;
                $pivotData[$nilai->nis][$nilai->kel_mapel] = $nilai->nilai_kel_mapel;
            }

            // Hitung rata-rata siswa
            foreach ($pivotData as $nis => &$data) {
                $sum = array_sum(array_slice($data, 1)); // Mulai dari elemen kedua (kel_mapel) ke atas
                $count = count($data) - 1; // Kurangi nama_lengkap
                $data['nil_rata_siswa'] = round($sum / $count, 2);
            }


            // Dapatkan semua kel_mapel
            $listMapel = DB::table('kbm_per_rombels')
                ->where('kode_rombel', $kodeRombel)
                ->get();

            return $kunciDataKBMDataTable->render('pages.kurikulum.datakbm.kunci-data-kbm', [
                'user' => $user,
                'personal_id' => $personal_id,
                'tahunAjaranAktif' => $tahunAjaranAktif,
                'semester' => $semester,
                'tahunAjaranOptions' => $tahunAjaranOptions,
                'dataPilCR' => $dataPilCR,
                'tahunajaran' => $tahunajaran,
                'ganjilgenap' => $ganjilgenap,
                'dataRombel' => $dataRombel,
                'pivotData' => $pivotData,
                'kelMapelList' => $kelMapelList,
                'listMapel' => $listMapel,
            ]);
        }

        // Jika user tidak login, redirect ke halaman login
        return redirect()->route('login')->with('error', 'Anda harus login untuk mengakses halaman ini.');
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
        // Validasi input data
        $request->validate([
            'id_personil' => 'required|exists:users,personal_id', // Pastikan id_personil valid
            'tahunajaran' => 'required',
            'ganjilgenap' => 'required',
        ]);

        // Cek apakah data sudah ada
        $existingData = KunciDataKbm::where('id_personil', $request->id_personil)->first();

        if ($existingData) {
            // Jika sudah ada, kembalikan response error
            return back()->with('error', 'Data sudah ada.');
        }

        // Simpan data baru
        $newData = new KunciDataKbm();
        $newData->id_personil = $request->id_personil;
        $newData->tahunajaran = $request->tahunajaran;
        $newData->ganjilgenap = $request->ganjilgenap;
        $newData->save();

        // Redirect atau kembali dengan pesan sukses
        return redirect()->route('kurikulum.datakbm.kunci-data-kbm.index')->with('success', 'Data berhasil ditambahkan.');
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

    public function updateKunciData(Request $request)
    {
        $user = Auth::user();

        // Data yang diterima dari permintaan
        $dataToUpdate = $request->only(['tahunajaran', 'ganjilgenap', 'semester', 'kode_kk', 'tingkat', 'kode_rombel']);

        // Perbarui data di tabel `kunci_data_kbm`
        $updated = KunciDataKbm::where('id_personil', $user->personal_id)->update($dataToUpdate);

        if ($updated) {
            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui']);
        } else {
            return response()->json(['success' => false, 'message' => 'Data tidak ditemukan untuk diperbarui']);
        }
    }

    public function updateTahunAjaran(Request $request)
    {
        // Ambil data id_personil dari user yang sedang login
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'tahunajaran' => 'required',
        ]);

        // Cek apakah data untuk id_personil ada
        $data = KunciDataKbm::where('id_personil', $user->personal_id)->first();

        if ($data) {
            // Jika data ditemukan, perbarui tahunajaran
            $data->tahunajaran = $request->tahunajaran;
            $data->save();

            // Kembalikan response sukses
            return response()->json(['success' => true, 'message' => 'Tahun Ajaran berhasil diperbarui']);
        }

        // Jika data tidak ditemukan
        return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
    }


    public function updateGanjilGenap(Request $request)
    {
        // Ambil data id_personil dari user yang sedang login
        $user = Auth::user();

        // Validasi input
        $request->validate([
            'ganjilgenap' => 'required',
        ]);

        // Cek apakah data untuk id_personil ada
        $data = KunciDataKbm::where('id_personil', $user->personal_id)->first();

        if ($data) {
            // Jika data ditemukan, perbarui ganjilgenap
            $data->ganjilgenap = $request->ganjilgenap;
            $data->save();

            // Kembalikan response sukses
            return response()->json(['success' => true, 'message' => 'Semester berhasil diperbarui']);
        }

        // Jika data tidak ditemukan
        return response()->json(['success' => false, 'message' => 'Data tidak ditemukan']);
    }

    public function exportToExcel(Request $request)
    {
        $kodeRombel = $request->input('kode_rombel');

        if (!$kodeRombel) {
            return redirect()->back()->with('error', 'Kode Rombel tidak ditemukan.');
        }

        $kelMapelList = DB::table('kbm_per_rombels')
            ->select('kel_mapel')
            ->distinct()
            ->where('kode_rombel', $kodeRombel)
            ->get();

        $listMapel = DB::table('kbm_per_rombels')
            ->where('kode_rombel', $kodeRombel)
            ->get();

        $nilaiRataSiswa = DB::select("
        SELECT
            pd.nis,
            pd.nama_lengkap,
            kr.kel_mapel,
            ROUND((COALESCE(nf.rerata_formatif, 0) + COALESCE(ns.rerata_sumatif, 0)) / 2) AS nilai_kel_mapel
        FROM
            peserta_didik_rombels pr
        INNER JOIN
            peserta_didiks pd ON pr.nis = pd.nis
        INNER JOIN
            kbm_per_rombels kr ON pr.rombel_kode = kr.kode_rombel
        LEFT JOIN
            nilai_formatif nf ON pr.nis = nf.nis AND kr.kel_mapel = nf.kel_mapel
        LEFT JOIN
            nilai_sumatif ns ON pr.nis = ns.nis AND kr.kel_mapel = ns.kel_mapel
        WHERE
            pr.rombel_kode = ?
        ORDER BY
            pd.nis, kr.kel_mapel
    ", [$kodeRombel]);

        $pivotData = [];
        foreach ($nilaiRataSiswa as $nilai) {
            $pivotData[$nilai->nis]['nama_lengkap'] = $nilai->nama_lengkap;
            $pivotData[$nilai->nis][$nilai->kel_mapel] = $nilai->nilai_kel_mapel;
        }

        foreach ($pivotData as $nis => &$data) {
            $sum = array_sum(array_slice($data, 1));
            $count = count($data) - 1;
            $data['nil_rata_siswa'] = round($sum / $count, 2);
        }

        $spreadsheet = new Spreadsheet();

        // Sheet 1
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('Nilai Siswa');

        // Merge title cell and set title
        $totalColumns = 3 + $kelMapelList->count(); // No., NIS, Nama Lengkap, KelMapel, Rata-Rata
        $lastColumn = chr(64 + $totalColumns); // Menghitung huruf kolom terakhir
        $sheet1->mergeCells("A1:{$lastColumn}1");
        $sheet1->setCellValue('A1', 'LEGER NILAI ROMBEL ' . $kodeRombel);
        $sheet1->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet1->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Apply borders to the table excluding the title
        $highestRow = $sheet1->getHighestRow(); // Mengambil baris terakhir
        $sheet1->getStyle("A2:{$lastColumn}{$highestRow}")
            ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Set auto width for all columns
        foreach (range('A', $lastColumn) as $column) {
            $sheet1->getColumnDimension($column)->setAutoSize(true);
        }

        // Header sheet 1
        $header1 = ['No.', 'NIS', 'Nama Lengkap'];
        foreach ($kelMapelList as $kelMapel) {
            $header1[] = $kelMapel->kel_mapel;
        }
        $header1[] = 'Nilai Rata-Rata';

        $sheet1->fromArray($header1, null, 'A2');

        // Style header row
        $sheet1->getStyle("A2:{$lastColumn}2")
            ->getFill()->setFillType(Fill::FILL_SOLID)->getStartColor()->setRGB('D3D3D3');
        $sheet1->getStyle("A2:{$lastColumn}2")
            ->getFont()->setBold(true);
        $sheet1->getStyle("A2:{$lastColumn}2")
            ->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Data sheet 1
        $rowNumber = 3; // Start data after header row
        $no = 1;
        foreach ($pivotData as $nis => $data) {
            $row = [$no++, $nis, $data['nama_lengkap']];
            foreach ($kelMapelList as $kelMapel) {
                $row[] = $data[$kelMapel->kel_mapel] ?? '-';
            }
            $row[] = $data['nil_rata_siswa'];
            $sheet1->fromArray($row, null, "A$rowNumber");
            $rowNumber++;
        }

        // Apply borders and auto width for Sheet 1
        $highestRow = $sheet1->getHighestRow(); // Mengambil baris terakhir
        $highestColumn = $sheet1->getHighestColumn(); // Mengambil kolom terakhir
        $sheet1->getStyle("A1:{$highestColumn}{$highestRow}")
            ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Set auto width untuk semua kolom
        foreach (range('A', $highestColumn) as $column) {
            $sheet1->getColumnDimension($column)->setAutoSize(true);
        }

        // Sheet 2
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Daftar Mapel');

        // Header sheet 2
        $header2 = ['No.', 'Kelompok Mapel', 'Mata Pelajaran'];
        $sheet2->fromArray($header2, null, 'A1');

        // Data sheet 2
        $rowNumber = 2;
        foreach ($listMapel as $index => $kelMapel) {
            $row = [$index + 1, $kelMapel->kel_mapel, $kelMapel->mata_pelajaran];
            $sheet2->fromArray($row, null, "A$rowNumber");
            $rowNumber++;
        }

        // Apply borders and auto width for Sheet 2
        $sheet2->getStyle('A1:' . $sheet2->getHighestColumn() . $sheet2->getHighestRow())
            ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        foreach (range('A', $sheet2->getHighestColumn()) as $column) {
            $sheet2->getColumnDimension($column)->setAutoSize(true);
        }

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);

        $fileName = 'Export_Nilai_Siswa_' . $kodeRombel . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
