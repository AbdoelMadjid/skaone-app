<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Border;

class PivotDataExport implements WithMultipleSheets
{
    protected $sheet1Data;
    protected $sheet2Data;

    public function __construct(array $sheet1Data, array $sheet2Data)
    {
        $this->sheet1Data = $sheet1Data;
        $this->sheet2Data = $sheet2Data;
    }

    public function sheets(): array
    {
        return [
            new Sheet1Export($this->sheet1Data),
            new Sheet2Export($this->sheet2Data),
        ];
    }
}

class Sheet1Export implements FromArray, WithHeadings, WithTitle, WithStyles
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        // Ambil semua kelompok mapel untuk header
        $mapelKeys = [];
        foreach ($this->data as $item) {
            foreach ($item as $key => $value) {
                if ($key !== 'nama_lengkap' && $key !== 'nil_rata_siswa' && !in_array($key, $mapelKeys)) {
                    $mapelKeys[] = $key; // Kumpulkan semua kelompok mapel unik
                }
            }
        }

        // Susun header, tambahkan 'No' di awal
        return array_merge(['No', 'NIS', 'Nama Lengkap'], $mapelKeys, ['Rata-Rata']);
    }

    public function array(): array
    {
        // Susun data berdasarkan header dan tambahkan nomor urut
        $mapelKeys = [];
        foreach ($this->data as $item) {
            foreach ($item as $key => $value) {
                if ($key !== 'nama_lengkap' && $key !== 'nil_rata_siswa' && !in_array($key, $mapelKeys)) {
                    $mapelKeys[] = $key;
                }
            }
        }

        $rows = [];
        $no = 1;
        foreach ($this->data as $nis => $item) {
            $row = [$no++, $nis, $item['nama_lengkap']];

            // Tambahkan nilai berdasarkan urutan kelompok mapel di header
            foreach ($mapelKeys as $mapel) {
                $row[] = $item[$mapel] ?? null; // Gunakan nilai atau null jika tidak ada
            }

            $row[] = $item['nil_rata_siswa'] ?? null; // Tambahkan nilai rata-rata siswa
            $rows[] = $row;
        }

        return $rows;
    }

    public function title(): string
    {
        return 'LEGER';
    }

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
    }
}

class Sheet2Export implements FromArray, WithHeadings, WithTitle, WithStyles
{
    protected $data;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function headings(): array
    {
        return ['No', 'Kode Rombel', 'Kelompok Mapel', 'Mata Pelajaran', 'Guru Pengajar'];
    }

    public function array(): array
    {
        $rows = [];
        $no = 1;
        foreach ($this->data as $item) {
            $rows[] = [
                $no++, // Nomor urut
                $item->kode_rombel,
                $item->kel_mapel,
                $item->mata_pelajaran,
                $item->gelardepan . $item->namalengkap . ',' . $item->gelarbelakang,
            ];
        }

        return $rows;
    }

    public function title(): string
    {
        return 'MATA PELAJARAN';
    }

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
    }
}
