<?php

namespace App\Http\Controllers\Kurikulum\DokumenSiswa;

use App\Http\Controllers\Controller;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use App\Models\ManajemenSekolah\RombonganBelajar;
use App\Models\ManajemenSekolah\TahunAjaran;
use App\Models\MilihData;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;



class LegerNilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
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

            $kompetensiKeahlianOptions = KompetensiKeahlian::pluck('nama_kk', 'idkk')->toArray();
            $rombonganBelajar = RombonganBelajar::pluck('rombel', 'kode_rombel')->toArray();

            // Cek apakah ada data pada KunciDataKbm untuk id_personil
            $pilihData = MilihData::where('id_personil', $personal_id)->first();
            /* if (!$pilihData || !$pilihData->kode_rombel) {
                return redirect()->back()->with('error', 'Data Kunci Data KBM tidak ditemukan untuk pengguna ini.');
            } */

            // Ambil data tahun ajaran dan semester berdasarkan data di KunciDataKbm atau fallback ke aktif
            $tahunajaran = $pilihData->tahunajaran ?? $tahunAjaranAktif->tahunajaran;
            $ganjilgenap = $pilihData->ganjilgenap ?? $semester->semester;
            /*
            // Ambil kode_rombel dari $pilihData


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
                ->where('peserta_didik_rombels.rombel_kode', $pilihData->kode_rombel)
                ->orderBy('peserta_didik_rombels.nis')
                ->get();

            if ($dataRombel->isEmpty()) {
                return redirect()->back()->with('error', 'Data rombel tidak ditemukan.');
            } */

            $kodeRombel = $pilihData ? $pilihData->kode_rombel : null;

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
                ->join('personil_sekolahs', 'kbm_per_rombels.id_personil', '=', 'personil_sekolahs.id_personil')
                ->select(
                    'kbm_per_rombels.kode_rombel',
                    'kbm_per_rombels.kel_mapel',
                    'kbm_per_rombels.mata_pelajaran',
                    'personil_sekolahs.gelardepan',
                    'personil_sekolahs.namalengkap',
                    'personil_sekolahs.gelarbelakang',
                )
                ->where('kbm_per_rombels.kode_rombel', $kodeRombel)
                ->get();

            return view("pages.kurikulum.dokumensiswa.leger-nilai", [
                'user' => $user,
                'personal_id' => $personal_id,
                'tahunAjaranAktif' => $tahunAjaranAktif,
                'semester' => $semester,
                'tahunAjaranOptions' => $tahunAjaranOptions,
                'kompetensiKeahlianOptions' => $kompetensiKeahlianOptions,
                'rombonganBelajar' => $rombonganBelajar,
                'pilihData' => $pilihData,
                'tahunajaran' => $tahunajaran,
                'ganjilgenap' => $ganjilgenap,
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
            'semester' => 'required',
            'kode_kk' => 'nullable',  // Jika ada nilai, bisa disertakan
            'tingkat' => 'nullable',  // Jika ada nilai, bisa disertakan
            'kode_rombel' => 'nullable',  // Jika ada nilai, bisa disertakan
        ]);

        // Cek apakah data sudah ada
        $existingData = MilihData::where('id_personil', $request->id_personil)->first();

        if ($existingData) {
            // Jika sudah ada, update data
            $existingData->tahunajaran = $request->tahunajaran;
            $existingData->semester = $request->semester;
            $existingData->kode_kk = $request->kode_kk;
            $existingData->tingkat = $request->tingkat;
            $existingData->kode_rombel = $request->kode_rombel;
            $existingData->save();

            /// Redirect atau kembali dengan pesan sukses
            return redirect()->route('kurikulum.dokumentsiswa.leger-nilai.index')->with('success', 'Data berhasil diupdate.');
        } else {
            // Jika belum ada, simpan data baru
            $newData = new MilihData();
            $newData->id_personil = $request->id_personil;
            $newData->tahunajaran = $request->tahunajaran;
            $newData->semester = $request->semester;
            $newData->kode_kk = $request->kode_kk;
            $newData->tingkat = $request->tingkat;
            $newData->kode_rombel = $request->kode_rombel;
            $newData->id_siswa = "";
            $newData->id_guru = "";
            $newData->save();

            // Redirect atau kembali dengan pesan sukses
            return redirect()->route('kurikulum.dokumentsiswa.leger-nilai.index')->with('success', 'Data berhasil ditambahkan.');
        }
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

    public function exportToExcel(Request $request)
    {
        $kodeRombel = $request->input('kode_rombel');

        if (!$kodeRombel) {
            return redirect()->back()->with('error', 'Kode Rombel tidak ditemukan.');
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
            // Pastikan data siswa dipetakan dengan benar
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
            ->join('personil_sekolahs', 'kbm_per_rombels.id_personil', '=', 'personil_sekolahs.id_personil')
            ->select(
                'kbm_per_rombels.kode_rombel',
                'kbm_per_rombels.kel_mapel',
                'kbm_per_rombels.mata_pelajaran',
                'personil_sekolahs.gelardepan',
                'personil_sekolahs.namalengkap',
                'personil_sekolahs.gelarbelakang',
            )
            ->where('kbm_per_rombels.kode_rombel', $kodeRombel)
            ->get();

        // Persiapkan Spreadsheet
        $spreadsheet = new Spreadsheet();
        $sheet1 = $spreadsheet->getActiveSheet();
        $sheet1->setTitle('Nilai Siswa');

        // Set Header
        $totalColumns = 3 + $kelMapelList->count(); // No., NIS, Nama Lengkap, KelMapel, Rata-Rata
        $lastColumn = chr(64 + $totalColumns); // Column letter for the last column
        $sheet1->mergeCells("A1:{$lastColumn}1");
        $sheet1->setCellValue('A1', 'LEGER NILAI ROMBEL ' . $kodeRombel);
        $sheet1->getStyle('A1')->getFont()->setBold(true)->setSize(14);
        $sheet1->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Set header for the table
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

        // Data Sheet 1 - Isikan Data dengan Benar
        $rowNumber = 3; // Start data after header row
        $no = 1;
        foreach ($pivotData as $nis => $data) {
            $row = [$no++, $nis, $data['nama_lengkap']];

            // Pastikan nilai kel_mapel per siswa dituliskan dengan benar
            foreach ($kelMapelList as $kelMapel) {
                $row[] = isset($data[$kelMapel->kel_mapel]) ? $data[$kelMapel->kel_mapel] : '-';
            }
            $row[] = $data['nil_rata_siswa']; // Rata-rata siswa
            $sheet1->fromArray($row, null, "A$rowNumber");
            $rowNumber++; // Increment row number after adding each student
        }

        // Apply borders and auto width for Sheet 1 after data is written
        $highestRow = $sheet1->getHighestRow(); // Get last row number
        $highestColumn = $sheet1->getHighestColumn(); // Get last column letter
        $sheet1->getStyle("A1:{$highestColumn}{$highestRow}")
            ->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);

        // Set auto width for all columns
        foreach (range('A', $highestColumn) as $column) {
            $sheet1->getColumnDimension($column)->setAutoSize(true);
        }

        // Sheet 2 - Daftar Mapel
        $sheet2 = $spreadsheet->createSheet();
        $sheet2->setTitle('Daftar Mapel');

        // Set header for Sheet 2
        $header2 = ['No.', 'Kelompok Mapel', 'Mata Pelajaran'];
        $sheet2->fromArray($header2, null, 'A1');

        // Data for Sheet 2
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

        // Save the file
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Export_Nilai_Siswa_' . $kodeRombel . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$fileName\"");
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}
