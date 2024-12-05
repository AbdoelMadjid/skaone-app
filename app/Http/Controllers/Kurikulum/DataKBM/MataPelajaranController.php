<?php

namespace App\Http\Controllers\Kurikulum\DataKBM;

use App\DataTables\Kurikulum\DataKBM\MataPelajaranDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Kurikulum\DataKBM\MataPelajaranRequest;
use App\Models\AppSupport\Referensi;
use App\Models\Kurikulum\DataKBM\MataPelajaran;
use App\Models\ManajemenSekolah\KompetensiKeahlian;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class MataPelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(MataPelajaranDataTable $mataPelajaranDataTable)
    {
        return $mataPelajaranDataTable->render('pages.kurikulum.datakbm.mata-pelajaran');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nourutOptions = [];
        for ($i = 1; $i <= 15; $i++) {
            $nourutOptions[$i] = (string) $i;
        }

        $kodeMapel = Referensi::where('jenis', 'KodeMapel')->pluck('data', 'data')->toArray();
        $kompetensiKeahlians = KompetensiKeahlian::all(); // Ambil data kompetensi keahlian

        return view('pages.kurikulum.datakbm.mata-pelajaran-form', [
            'data' => new MataPelajaran(),
            'nourutOptions' => $nourutOptions,
            'kodeMapel' => $kodeMapel,
            'kompetensiKeahlians' => $kompetensiKeahlians, // Kirim data kompetensi keahlian ke view
            'action' => route('kurikulum.datakbm.mata-pelajaran.store'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MataPelajaranRequest $request)
    {
        $mataPelajaran = new MataPelajaran($request->validated());
        $mataPelajaran->save();

        // Simpan ke tabel mata_pelajar_per_jurusans
        if ($request->has('kode_kk')) {
            foreach ($request->kode_kk as $kode_kk) {
                $mataPelajaran->mataPelajarPerJurusan()->create([
                    'kode_kk' => $kode_kk,
                    'kel_mapel' => $mataPelajaran->kel_mapel,
                    'kode_mapel' => $kode_kk . '-' . $mataPelajaran->kel_mapel,
                    'mata_pelajaran' => $mataPelajaran->mata_pelajaran,
                    'semester_1' => $mataPelajaran->semester_1,
                    'semester_2' => $mataPelajaran->semester_2,
                    'semester_3' => $mataPelajaran->semester_3,
                    'semester_4' => $mataPelajaran->semester_4,
                    'semester_5' => $mataPelajaran->semester_5,
                    'semester_6' => $mataPelajaran->semester_6,
                ]);
            }
        }

        return responseSuccess();
    }

    /**
     * Display the specified resource.
     */
    public function show(MataPelajaran $mataPelajaran)
    {
        $nourutOptions = [];
        for ($i = 1; $i <= 15; $i++) {
            $nourutOptions[$i] = (string) $i; // Key and value both are the same, e.g., '1' => '1'
        }

        $kodeMapel = Referensi::where('jenis', 'KodeMapel')->pluck('data', 'data')->toArray();
        return view('pages.kurikulum.datakbm.mata-pelajaran-form', [
            'data' => $mataPelajaran,
            'nourutOptions' => $nourutOptions,
            'kodeMapel' => $kodeMapel,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MataPelajaran $mataPelajaran)
    {
        $nourutOptions = [];
        for ($i = 1; $i <= 15; $i++) {
            $nourutOptions[$i] = (string) $i;
        }

        $kodeMapel = Referensi::where('jenis', 'KodeMapel')->pluck('data', 'data')->toArray();
        $kompetensiKeahlians = KompetensiKeahlian::all(); // Ambil data kompetensi keahlian
        $selectedIdKk = $mataPelajaran->mataPelajarPerJurusan()->pluck('kode_kk')->toArray(); // Ambil data idkk yang sudah terpilih

        return view('pages.kurikulum.datakbm.mata-pelajaran-form', [
            'data' => $mataPelajaran,
            'nourutOptions' => $nourutOptions,
            'kodeMapel' => $kodeMapel,
            'kompetensiKeahlians' => $kompetensiKeahlians, // Kirim data kompetensi keahlian ke view
            'selectedIdKk' => $selectedIdKk, // Kirim idkk yang sudah terpilih
            'action' => route('kurikulum.datakbm.mata-pelajaran.update', $mataPelajaran->id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MataPelajaranRequest $request, MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->fill($request->validated());
        $mataPelajaran->save();

        // Update data di tabel mata_pelajar_per_jurusans
        $mataPelajaran->mataPelajarPerJurusan()->delete(); // Hapus data lama
        if ($request->has('kode_kk')) {
            foreach ($request->kode_kk as $kode_kk) {
                $mataPelajaran->mataPelajarPerJurusan()->create([
                    'kode_kk' => $kode_kk,
                    'kel_mapel' => $mataPelajaran->kel_mapel,
                    'kode_mapel' => $kode_kk . '-' . $mataPelajaran->kel_mapel,
                    'mata_pelajaran' => $mataPelajaran->mata_pelajaran,
                    'semester_1' => $mataPelajaran->semester_1,
                    'semester_2' => $mataPelajaran->semester_2,
                    'semester_3' => $mataPelajaran->semester_3,
                    'semester_4' => $mataPelajaran->semester_4,
                    'semester_5' => $mataPelajaran->semester_5,
                    'semester_6' => $mataPelajaran->semester_6,
                ]);
            }
        }

        return responseSuccess();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->delete();

        return responseSuccessDelete();
    }

    // Metode untuk ekspor data ke Excel
    public function mapelexportExcel()
    {
        $mataPelajarans = MataPelajaran::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Menambahkan judul di baris pertama
        $sheet->setCellValue('A1', 'Data Mata Pelajaran');
        $sheet->mergeCells('A1:L1'); // Menggabungkan sel dari A1 sampai L1
        $sheet->getStyle('A1')->getFont()->setBold(true); // Membuat judul tebal
        $sheet->getStyle('A1')->getFont()->setSize(14); // Mengatur ukuran font
        $sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

        // Membuat baris kedua kosong
        $sheet->setCellValue('A2', '');

        // Menambahkan header/kolom di baris ketiga
        $sheet->setCellValue('A3', 'ID');
        $sheet->setCellValue('B3', 'Kelompok');
        $sheet->setCellValue('C3', 'No Urut');
        $sheet->setCellValue('D3', 'Kelompok Mapel');
        $sheet->setCellValue('E3', 'Mata Pelajaran');
        $sheet->setCellValue('F3', 'Inisial MP');
        $sheet->setCellValue('G3', 'Semester 1');
        $sheet->setCellValue('H3', 'Semester 2');
        $sheet->setCellValue('I3', 'Semester 3');
        $sheet->setCellValue('J3', 'Semester 4');
        $sheet->setCellValue('K3', 'Semester 5');
        $sheet->setCellValue('L3', 'Semester 6');

        $sheet->getStyle('A3:L3')->getFont()->setBold(true); // Membuat header tebal
        $sheet->getStyle('A3:L3')->getAlignment()->setHorizontal('center'); // Meratakan teks di tengah
        $sheet->getStyle('A3:L3')->getBorders()->getAllBorders()->setBorderStyle('thin'); // Menambahkan border

        // Mengatur lebar kolom A hingga L kecuali kolom I
        foreach (range('A', 'L') as $columnID) {
            if ($columnID !== 'I') {
                $sheet->getColumnDimension($columnID)->setAutoSize(true);
            }
        }

        // Mengatur lebar kolom I secara manual agar sesuai dengan judul kolom
        $sheet->getColumnDimension('I')->setWidth(15); // Sesuaikan dengan lebar teks header "Semester 3"


        // Mengatur tinggi baris judul kolom menjadi 25 piksel
        $sheet->getRowDimension(3)->setRowHeight(25);

        // Mengatur teks pada header agar berada di tengah secara vertikal dan horizontal
        $sheet->getStyle('A3:L3')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
        $sheet->getStyle('A3:L3')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

        // Menambahkan data mulai dari baris keempat
        $row = 4;
        foreach ($mataPelajarans as $mataPelajaran) {
            $sheet->setCellValue('A' . $row, $mataPelajaran->id);
            $sheet->setCellValue('B' . $row, $mataPelajaran->kelompok);
            $sheet->setCellValue('C' . $row, $mataPelajaran->nourut);
            $sheet->setCellValue('D' . $row, $mataPelajaran->kel_mapel);
            $sheet->setCellValue('E' . $row, $mataPelajaran->mata_pelajaran);
            $sheet->setCellValue('F' . $row, $mataPelajaran->inisial_mp);
            $sheet->setCellValue('G' . $row, $mataPelajaran->semester_1 ? '1' : '0');
            $sheet->setCellValue('H' . $row, $mataPelajaran->semester_2 ? '1' : '0');
            $sheet->setCellValue('I' . $row, $mataPelajaran->semester_3 ? '1' : '0');
            $sheet->setCellValue('J' . $row, $mataPelajaran->semester_4 ? '1' : '0');
            $sheet->setCellValue('K' . $row, $mataPelajaran->semester_5 ? '1' : '0');
            $sheet->setCellValue('L' . $row, $mataPelajaran->semester_6 ? '1' : '0');

            // Menambahkan border untuk setiap sel dalam baris
            $sheet->getStyle('A' . $row . ':L' . $row)
                ->getBorders()->getAllBorders()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN);
            $sheet->getStyle('A' . $row . ':D' . $row)->getAlignment()->setHorizontal('center');
            $sheet->getStyle('G' . $row . ':L' . $row)->getAlignment()->setHorizontal('center');

            $row++;
        }

        // Menambahkan satu baris kosong setelah data terakhir
        $row++;

        // Menambahkan tanggal hari ini dan keterangan di baris berikutnya
        $sheet->setCellValue('I' . $row, 'Majalengka, ' . now()->format('d F Y'));
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Menambahkan teks "Wakil Kepala Sekolah Bidang Kurikulum"
        $row++;
        $sheet->setCellValue('I' . $row, 'Wakil Kepala Sekolah Bidang Kurikulum');
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Menambahkan 3 baris kosong
        $row += 3;

        // Menambahkan teks "ABDUL MADJID, S.Pd., M.Pd."
        $sheet->setCellValue('I' . $row, 'ABDUL MADJID, S.Pd., M.Pd.');
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Menambahkan teks NIP
        $row++;
        $sheet->setCellValue('I' . $row, 'NIP. 197611282000121002');
        $sheet->getStyle('I' . $row)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

        // Setelah semua data diisi, terapkan pengaturan font untuk seluruh sheet
        /* $sheet->getStyle('A1:L' . $row) // Rentang dari A1 sampai ke baris terakhir yang diisi
            ->getFont()->setName('Times New Roman')->setSize(12); */

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $fileName = 'MataPelajaran.xlsx';
        $filePath = storage_path('app/public/' . $fileName);
        $writer->save($filePath);

        // Return response untuk download file
        return response()->download($filePath);
    }

    // Metode untuk impor data dari Excel
    public function mapelimportExcel(Request $request)
    {
        // Validasi file
        $this->validate($request, [
            'file' => 'required|mimes:xlsx,csv,xls'
        ]);

        // Menangkap file excel
        $file = $request->file('file');
        $filePath = $file->store('temp'); // Simpan file di storage/app/temp

        // Memuat file spreadsheet
        $spreadsheet = IOFactory::load(storage_path('app/' . $filePath));
        $sheet = $spreadsheet->getActiveSheet();
        $row = 2; // Mulai dari baris kedua (baris pertama biasanya header)

        while ($sheet->getCell('A' . $row)->getValue() != '') {
            MataPelajaran::create([
                'kelompok' => $sheet->getCell('B' . $row)->getValue(),
                'nourut' => $sheet->getCell('C' . $row)->getValue(),
                'kel_mapel' => $sheet->getCell('D' . $row)->getValue(),
                'mata_pelajaran' => $sheet->getCell('E' . $row)->getValue(),
                'inisial_mp' => $sheet->getCell('F' . $row)->getValue(),
                'semester_1' => $sheet->getCell('G' . $row)->getValue() == '1',
                'semester_2' => $sheet->getCell('H' . $row)->getValue() == '1',
                'semester_3' => $sheet->getCell('I' . $row)->getValue() == '1',
                'semester_4' => $sheet->getCell('J' . $row)->getValue() == '1',
                'semester_5' => $sheet->getCell('K' . $row)->getValue() == '1',
                'semester_6' => $sheet->getCell('L' . $row)->getValue() == '1',
            ]);
            $row++;
        }

        return redirect()->back()->with('success', 'Data berhasil diimpor!');
    }
}
