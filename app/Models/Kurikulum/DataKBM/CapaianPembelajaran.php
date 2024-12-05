<?php

namespace App\Models\Kurikulum\DataKBM;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CapaianPembelajaran extends Model
{
    use HasFactory;
    protected $table = 'capaian_pembelajarans';
    protected $fillable = [
        'kode_cp',
        'tingkat',
        'fase',
        'element',
        'inisial_mp',
        'nama_matapelajaran',
        'nomor_urut',
        'isi_cp',
    ];

    public function kbmPerRombel()
    {
        return $this->belongsTo(KbmPerRombel::class, 'inisial_mp', 'kel_mapel');
    }

    /* // Override boot method to add custom behavior
    protected static function boot()
    {
        parent::boot();

        // Event that runs before creating a new record
        static::creating(function ($model) {
            // Check if id_cp is null or empty
            if (empty($model->id_cp)) {
                // Generate new id_cp in the format 'cp_00001', 'cp_00002', etc.
                $latestId = self::orderBy('id_cp', 'desc')->first();
                if ($latestId) {
                    $latestIdNumber = intval(substr($latestId->id_cp, 3)); // Extract number from 'cp_XXXXX'
                    $newIdNumber = $latestIdNumber + 1;
                    $model->id_cp = 'cp_' . str_pad($newIdNumber, 5, '0', STR_PAD_LEFT); // Format the new id_cp
                } else {
                    // If no record exists, set the first ID
                    $model->id_cp = 'cp_00001';
                }
            }
        });
    } */
}
