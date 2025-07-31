<?php

namespace App\Models\Prakerin\Panitia;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrakerinPerusahaan extends Model
{
    use HasFactory;
    protected $table = 'prakerin_perusahaans';
    protected $fillable = [
        'nama',
        'alamat',
        'id_pimpinan',
        'jabatan_pimpinan',
        'nama_pimpinan',
        'no_ident_pimpinan',
        'id_pembimbing',
        'jabatan_pembimbing',
        'nama_pembimbing',
        'no_ident_pembimbing',
        'status',
    ];
}
