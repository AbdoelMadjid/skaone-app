<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KompetensiKeahlian extends Model
{
    use HasFactory;
    protected $table = 'kompetensi_keahlians';
    protected $primaryKey = 'idkk';
    public $incrementing = false; // Matikan auto-increment
    protected $keyType = 'char'; // Set tipe primary key sebagai string

    // Kolom yang boleh diisi
    protected $fillable = ['idkk', 'id_bk', 'id_pk', 'nama_kk', 'singkatan'];

    public function bidangKeahlian()
    {
        return $this->belongsTo(BidangKeahlian::class, 'id_bk', 'idbk');
    }

    public function programKeahlian()
    {
        return $this->belongsTo(ProgramKeahlian::class, 'id_pk', 'idpk');
    }

    public function getIdBkNamaBkAttribute()
    {
        return "{$this->id_bk} - {$this->bidangKeahlian->nama_bk}";
    }

    public function getIdPkNamaPkAttribute()
    {
        return "{$this->id_pk} - {$this->programKeahlian->nama_pk}";
    }
}
