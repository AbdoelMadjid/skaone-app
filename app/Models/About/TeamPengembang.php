<?php

namespace App\Models\About;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamPengembang extends Model
{
    use HasFactory;
    protected $table = 'team_pengembangs';
    protected $fillable = [
        'namalengkap',
        'jeniskelamin',
        'jabatan',
        'deskripsi',
        'photo',
    ];
}
