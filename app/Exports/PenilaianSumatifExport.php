<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PenilaianSumatifExport implements FromArray, WithHeadings, WithTitle, WithStyles
{
    protected $params;

    public function __construct(array $params)
    {
        $this->params = $params;
    }

    /**
     * Define the headings for the Excel file.
     */
    public function headings(): array
    {
        return [
            'Tahun Ajaran',
            'Ganjil/Genap',
            'Semester',
            'Tingkat',
            'Kode Rombel',
            'Kelompok Mapel',
            'ID Personil',
            'NIS',
            'Nama Lengkap',
            'STS',
            'SAS',
            'Rerata Sumatif',
        ];
    }

    /**
     * Generate the data for the Excel file.
     */
    public function array(): array
    {
        $pesertaDidik = $this->params['pesertaDidik'];
        $data = [];
        $rowNumber = 2; // Mulai dari baris kedua (karena baris pertama untuk heading)

        foreach ($pesertaDidik as $siswa) {
            $sts = $siswa->sts ?? ''; // Nilai STS (kosong jika tidak ada)
            $sas = $siswa->sas ?? ''; // Nilai SAS (kosong jika tidak ada)
            $rerataFormula = "=IF(AND(J{$rowNumber}=\"\",K{$rowNumber}=\"\"),\"\",ROUND((J{$rowNumber}+K{$rowNumber})/2,0))";

            $data[] = [
                'tahunajaran' => $this->params['tahunajaran'],
                'ganjilgenap' => $this->params['ganjilgenap'],
                'semester' => $this->params['semester'],
                'tingkat' => $this->params['tingkat'],
                'kode_rombel' => $this->params['kode_rombel'],
                'kel_mapel' => $this->params['kel_mapel'],
                'id_personil' => $this->params['id_personil'],
                'nis' => $siswa->nis,
                'nama_lengkap' => $siswa->nama_lengkap,
                'sts' => $sts,
                'sas' => $sas,
                'rerata_sumatif' => $rerataFormula,
            ];
            $rowNumber++;
        }

        return $data;
    }

    /**
     * Set the title for the sheet.
     */
    public function title(): string
    {
        return 'Penilaian Sumatif';
    }

    /**
     * Apply styles.
     */
    public function styles(Worksheet $sheet)
    {
        $highestColumn = $sheet->getHighestColumn(); // Kolom terakhir
        $highestColumnIndex = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::columnIndexFromString($highestColumn); // Indeks kolom terakhir

        // Set auto-size untuk setiap kolom
        for ($col = 1; $col <= $highestColumnIndex; $col++) {
            $columnLetter = \PhpOffice\PhpSpreadsheet\Cell\Coordinate::stringFromColumnIndex($col); // Konversi indeks menjadi huruf kolom
            $sheet->getColumnDimension($columnLetter)->setAutoSize(true); // Atur auto-size
        }

        // Terapkan border pada seluruh tabel
        $highestRow = $sheet->getHighestRow(); // Baris terakhir
        $sheet->getStyle("A1:{$highestColumn}{$highestRow}")->applyFromArray([
            'borders' => [
                'allBorders' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                    'color' => ['argb' => '000000'],
                ],
            ],
        ]);

        // Set header menjadi bold
        $sheet->getStyle("A1:{$highestColumn}1")->applyFromArray([
            'font' => [
                'bold' => true,
            ],
        ]);

        // Set proteksi untuk seluruh sheet
        $sheet->getProtection()->setSheet(true); // Aktifkan proteksi

        // Buka proteksi hanya untuk kolom J dan K
        $highestRow = $sheet->getHighestRow(); // Baris terakhir
        $sheet->getStyle("J2:J{$highestRow}")->getProtection()->setLocked(false); // Kolom J (STS)
        $sheet->getStyle("K2:K{$highestRow}")->getProtection()->setLocked(false); // Kolom K (SAS)
    }
}
