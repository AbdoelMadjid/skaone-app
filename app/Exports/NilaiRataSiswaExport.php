<?php

namespace App\Exports;

use App\Models\NilaiRataSiswa;
use Maatwebsite\Excel\Concerns\FromCollection;

class NilaiRataSiswaExport implements FromCollection
{
    protected $pivotData;
    protected $kelMapelList;

    public function __construct($pivotData, $kelMapelList)
    {
        $this->pivotData = $pivotData;
        $this->kelMapelList = $kelMapelList;
    }

    public function collection()
    {
        // Return the data to be exported
        return collect($this->pivotData);
    }

    public function headings(): array
    {
        $headings = ['No.', 'NIS', 'Nama Lengkap'];

        foreach ($this->kelMapelList as $kelMapel) {
            $headings[] = $kelMapel->kel_mapel;
        }

        $headings[] = 'Nilai Rata-Rata';

        return $headings;
    }

    public function map($row): array
    {
        $mappedRow = [
            // No.
            '',
            $row['nis'],
            $row['nama_lengkap'],
        ];

        foreach ($this->kelMapelList as $kelMapel) {
            $mappedRow[] = $row[$kelMapel->kel_mapel] ?? '-';
        }

        $mappedRow[] = $row['nil_rata_siswa'];

        return $mappedRow;
    }
}
