<?php

namespace App\Models\AdministratorPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesertaPrakerin extends Model
{
    use HasFactory;
    protected $table = 'peserta_prakerins';
    protected $fillable = [
        'tahunajaran',
        'kode_kk',
        'nis',
    ];
}
