<?php

namespace App\Models\ManajemenSekolah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangKeahlian extends Model
{
    use HasFactory;
    protected $table = 'bidang_keahlians';
    protected $primaryKey = 'idbk';
    public $incrementing = false; // Matikan auto-increment
    protected $keyType = 'char'; // Set tipe primary key sebagai string

    // Kolom yang boleh diisi
    protected $fillable = ['idbk', 'nama_bk'];

    public function programKeahlians()
    {
        return $this->hasMany(ProgramKeahlian::class, 'id_bk', 'idbk');
    }

    public function kompetensiKeahlians()
    {
        return $this->hasMany(KompetensiKeahlian::class, 'id_bk', 'idbk');
    }
}
