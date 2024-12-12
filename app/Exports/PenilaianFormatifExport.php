<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Protection;

class PenilaianFormatifExport implements FromArray, WithHeadings, ShouldAutoSize, WithStyles
{
    protected $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    /**
     * Data array to be exported.
     */
    public function array(): array
    {
        $header = [
            'Tahun Ajaran',
            'Ganjil/Genap',
            'Semester',
            'Tingkat',
            'Kode Rombel',
            'Kelompok Mapel',
            'ID Personil',
            'NIS',
            'Nama Siswa',
            'TP Isi 1',
            'TP Isi 2',
            'TP Isi 3',
            'TP Isi 4',
            'TP Isi 5',
            'TP Isi 6',
            'TP Isi 7',
            'TP Isi 8',
            'TP Isi 9',
            'TP Nilai 1',
            'TP Nilai 2',
            'TP Nilai 3',
            'TP Nilai 4',
            'TP Nilai 5',
            'TP Nilai 6',
            'TP Nilai 7',
            'TP Nilai 8',
            'TP Nilai 9',
            'Rata-rata'
        ];

        $data = [];
        $tujuanPembelajaran = $this->params['tujuanPembelajaran'] ?? [];
        $pesertaDidik = $this->params['pesertaDidik'] ?? [];

        foreach ($pesertaDidik as $siswa) {
            $row = [
                $this->params['tahunajaran'],
                $this->params['ganjilgenap'],
                $this->params['semester'],
                $this->params['tingkat'],
                $this->params['kode_rombel'],
                $this->params['kel_mapel'],
                $this->params['id_personil'],
                $siswa->nis,
                $siswa->nama_lengkap,
            ];

            // Tambahkan TP Isi
            for ($i = 0; $i < 9; $i++) {
                $row[] = $tujuanPembelajaran[$i]->tp_isi ?? '';
            }

            // Tambahkan TP Nilai (kosong karena input manual)
            for ($i = 0; $i < 9; $i++) {
                $row[] = '';
            }

            // Tambahkan Rata-rata
            $row[] = '';

            $data[] = $row;
        }

        return array_merge([$header], $data);
    }

    /**
     * Headings for Excel.
     */
    public function headings(): array
    {
        return [];
    }

    /**
     * Apply styles.
     */
    public function styles(Worksheet $sheet)
    {
        $highestRow = $sheet->getHighestRow();
        $highestColumn = $sheet->getHighestColumn();

        $jumlahTP = $this->params['jumlahTP'];
        $startColumnIndex = 19; // Kolom 'S' adalah kolom ke-19

        // Set border untuk semua sel
        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Set header menjadi bold
        $sheet->getStyle('A1:' . $sheet->getHighestColumn() . '1')->applyFromArray([
            'font' => ['bold' => true],
        ]);

        // Tambahkan rumus rata-rata di tiap baris
        for ($row = 2; $row <= $highestRow; $row++) {

            // Tentukan kolom awal dan akhir
            $startColumn = 'S'; // Kolom awal
            $startIndex = Coordinate::columnIndexFromString($startColumn); // Indeks angka kolom 'S'
            $endColumn = Coordinate::stringFromColumnIndex($startIndex + $jumlahTP - 1); // Kolom akhir

            if (!preg_match('/^[A-Z]+$/', $startColumn) || !preg_match('/^[A-Z]+$/', $endColumn)) {
                throw new \Exception("Kolom tidak valid: {$startColumn} - {$endColumn}");
            }

            // Buat formula
            $cellFormula = "=IF(SUM({$startColumn}{$row}:{$endColumn}{$row})=0, 0, ROUND(SUM({$startColumn}{$row}:{$endColumn}{$row})/{$jumlahTP}, 0))";

            // Debug formula
            //dd($cellFormula);

            // Tetapkan nilai formula ke sel
            $sheet->setCellValue("AB{$row}", $cellFormula);
        }

        // Aktifkan proteksi pada lembar kerja
        $sheet->getProtection()->setSheet(true);
        $sheet->getProtection()->setPassword('your_password'); // Ganti dengan password proteksi

        // Tandai semua sel sebagai dilindungi (default)
        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->getProtection()->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_PROTECTED);

        // Hapus proteksi pada kolom TP_Nilai
        for ($i = 1; $i <= $jumlahTP; $i++) {
            $columnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($startColumnIndex + $i - 1);
            $sheet->getStyle("{$columnIndex}2:{$columnIndex}{$highestRow}")
                ->getProtection()
                ->setLocked(\PhpOffice\PhpSpreadsheet\Style\Protection::PROTECTION_UNPROTECTED);
        }

        // Tambahkan logika untuk menyembunyikan kolom J - R
        for ($col = 'J'; $col <= 'R'; $col++) {
            $sheet->getColumnDimension($col)->setVisible(false);
        }
    }
}
