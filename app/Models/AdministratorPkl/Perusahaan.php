<?php

namespace App\Models\AdministratorPkl;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perusahaan extends Model
{
    use HasFactory;
    protected $table = 'perusahaans';
    protected $fillable = [
        'nama',
        'alamat',
        'jabatan',
        'nama_pembimbing',
    ];
}
