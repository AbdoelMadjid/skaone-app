<?php

namespace App\Models\Pkl\AdministratorPkl;

use App\Models\ManajemenSekolah\PersonilSekolah;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembimbingPrakerin extends Model
{
    use HasFactory;
    protected $table = 'pembimbing_prakerins';
    protected $fillable = [
        'id_personil',
        'id_penempatan',
    ];

    public function personilSekolah()
    {
        // Anggap relasi ini menggunakan 'id_personil' sebagai foreign key
        return $this->belongsTo(PersonilSekolah::class, 'id_personil');
    }

    // Relasi lainnya untuk PenempatanPrakerin
    public function penempatanPrakerin()
    {
        return $this->hasMany(PenempatanPrakerin::class, 'id_personil');
    }
}
