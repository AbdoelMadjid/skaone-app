<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProgramKeahlian extends Model
{
    use HasFactory;
    protected $table = 'program_keahlians';
    protected $primaryKey = 'idpk';
    public $incrementing = false; // Matikan auto-increment
    protected $keyType = 'char'; // Set tipe primary key sebagai string

    // Kolom yang boleh diisi
    protected $fillable = ['idpk', 'id_bk', 'nama_pk'];

    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bk', 'idbk');
    }

    public function kompetensiKeahlians()
    {
        return $this->hasMany(KompetensiKeahlian::class, 'id_pk', 'idpk');
    }

    public function getIdBkNamaBkAttribute()
    {
        return "{$this->id_bk} - {$this->bidangKeahlian->nama_bk}";
    }
}
