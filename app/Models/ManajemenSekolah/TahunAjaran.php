<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TahunAjaran extends Model
{
    use HasFactory;
    protected $table = 'tahun_ajarans';
    protected $fillable = [
        'tahunajaran',
        'status',
    ];

    /**
     * Relasi one-to-many dengan Semester.
     */
    public function semesters(): HasMany
    {
        return $this->hasMany(Semester::class);
    }

    /**
     * Scope untuk hanya mengambil tahun ajaran yang aktif.
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }
}
