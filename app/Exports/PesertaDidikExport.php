<?php

namespace App\Exports;

use App\Models\ManajemenSekolah\PesertaDidik as ManajemenSekolahPesertaDidik;
use App\Models\PesertaDidik;
use Maatwebsite\Excel\Concerns\FromCollection;

class PesertaDidikExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return ManajemenSekolahPesertaDidik::all();
    }

    public function headings(): array
    {
        return [
            'NIS',
            'NISN',
            'Tahun Ajaran Masuk',
            'Kode KK',
            'Nama Lengkap',
            'Tempat Lahir',
            'Tanggal Lahir',
            'Jenis Kelamin',
            'Agama',
            'Status Dalam Keluarga',
            'Anak Ke',
            'Sekolah Asal',
            'Diterima Kelas',
            'Diterima Tanggal',
            'Asal Siswa',
            'Keterangan Pindah',
            'Alamat Blok',
            'Alamat Nomor Rumah',
            'Alamat RT',
            'Alamat RW',
            'Alamat Desa',
            'Alamat Kecamatan',
            'Alamat Kabupaten',
            'Alamat Kode Pos',
            'Kontak Telepon',
            'Kontak Email',
            'Foto',
            'Status',
            'Alasan Status',
        ];
    }
}
