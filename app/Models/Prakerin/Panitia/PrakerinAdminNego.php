<?php

namespace App\Models\Prakerin\Panitia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrakerinAdminNego extends Model
{
    use HasFactory;
    protected $table = 'prakerin_admin_negos';
    protected $fillable = [
        'tahunajaran',
        'id_perusahaan',
        'nomor_surat_pengantar',
        'nomor_surat_perintah',
        'nomor_surat_mou',
        'titimangsa',
        'tgl_nego',
        'id_nego',
    ];
}
