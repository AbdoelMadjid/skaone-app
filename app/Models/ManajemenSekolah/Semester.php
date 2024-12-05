<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'semesters';
    protected $fillable = ['tahun_ajaran_id', 'semester', 'status'];


    /* protected static function booted()
    {
        static::saving(function ($semester) {
            if ($semester->status === 'Aktif') {
                // Non-aktifkan semua semester lain di tahun ajaran yang sama
                static::where('tahun_ajaran_id', $semester->tahun_ajaran_id)
                    ->where('id', '!=', $semester->id)
                    ->update(['status' => 'Non Aktif']);
            }
        });
    } */

    /**
     * Relasi many-to-one dengan TahunAjaran.
     */
    public function tahunAjaran(): BelongsTo
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}
