<?php

namespace App\Models\Pkl\AdministratorPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenempatanPrakerin extends Model
{
    use HasFactory;
    protected $table = 'penempatan_prakerins';
    protected $fillable = ['tahunajaran', 'kode_kk', 'nis', 'id_dudi'];
}
