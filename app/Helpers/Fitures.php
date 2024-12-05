<?php

namespace App\Helpers;

use App\Models\AppSupport\AppFitur;

class Fitures
{
    public static function getFiturAktif()
    {
        $fitur = AppFitur::where('aktif', 'Aktif')->get();
        $hasil = [];

        foreach ($fitur as $f) {
            // Mengambil view berdasarkan nama_fitur
            if (view()->exists("layouts.features.{$f->nama_fitur}")) {
                $hasil[] = "layouts.features.{$f->nama_fitur}";
            }
        }

        return $hasil;
    }

    public static function isFiturAktif($namaFitur)
    {
        // Mengecek apakah fitur dengan nama tertentu aktif
        return AppFitur::where('nama_fitur', $namaFitur)->where('aktif', 'Aktif')->exists();
    }
}
