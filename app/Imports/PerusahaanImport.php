<?php

namespace App\Imports;

use App\Models\Prakerin\Admin\Perusahaan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PerusahaanImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Perusahaan([
            'nama' => $row['nama'] ?? null,
            'alamat' => $row['alamat'] ?? null,
        ]);
    }
}
