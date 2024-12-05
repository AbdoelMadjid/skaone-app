<?php

namespace App\Imports;

use App\Models\ManajemenSekolah\PesertaDidik as ManajemenSekolahPesertaDidik;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PesertaDidikImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new ManajemenSekolahPesertaDidik([
            'nis' => $row['nis'] ?? null,
            'nisn' => $row['nisn'] ?? null,
            'thnajaran_masuk' => $row['thnajaran_masuk'] ?? null,
            'kode_kk' => $row['kode_kk'] ?? null,
            'nama_lengkap' => $row['nama_lengkap'] ?? null,
            'tempat_lahir' => $row['tempat_lahir'] ?? null,
            'tanggal_lahir' => isset($row['tanggal_lahir']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $row['tanggal_lahir']) : null,
            'jenis_kelamin' => $row['jenis_kelamin'] ?? null,
            'agama' => $row['agama'] ?? null,
            'status_dalam_kel' => $row['status_dalam_kel'] ?? 'Anak Kandung', // Set default value
            'anak_ke' => $row['anak_ke'] ?? null,
            'sekolah_asal' => $row['sekolah_asal'] ?? null,
            'diterima_kelas' => $row['diterima_kelas'] ?? '10',
            'diterima_tanggal' => isset($row['diterima_tanggal']) ? \Carbon\Carbon::createFromFormat('Y-m-d', $row['diterima_tanggal']) : null,
            'asalsiswa' => $row['asalsiswa'] ?? 'Siswa Baru',
            'keterangan_pindah' => $row['keterangan_pindah'] ?? null,
            'alamat_blok' => $row['alamat_blok'] ?? null,
            'alamat_norumah' => $row['alamat_norumah'] ?? null,
            'alamat_rt' => $row['alamat_rt'] ?? null,
            'alamat_rw' => $row['alamat_rw'] ?? null,
            'alamat_desa' => $row['alamat_desa'] ?? null,
            'alamat_kec' => $row['alamat_kec'] ?? null,
            'alamat_kab' => $row['alamat_kab'] ?? null,
            'alamat_kodepos' => $row['alamat_kodepos'] ?? null,
            'kontak_telepon' => $row['kontak_telepon'] ?? null,
            'kontak_email' => $row['kontak_email'] ?? null,
            'foto' => $row['foto'] ?? null,
            'status' => $row['status'] ?? 'Aktif', // Set default value
            'alasan_status' => $row['alasan_status'] ?? null,
        ]);
    }
}
