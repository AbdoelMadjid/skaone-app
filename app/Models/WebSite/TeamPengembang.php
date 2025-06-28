<?php

namespace App\Models\WebSite;

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
