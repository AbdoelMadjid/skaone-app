<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class PdfHelper
{
    public static function uploadPdf($file, $directory, $prefix = '', $dataMeta = [], $oldFileName = null)
    {
        $baseDir = base_path($directory);

        if (!file_exists($baseDir)) {
            mkdir($baseDir, 0755, true);
        }

        // Hapus file lama jika ada
        if ($oldFileName) {
            $oldPath = $baseDir . '/' . $oldFileName;
            if (file_exists($oldPath)) {
                unlink($oldPath);
            }
        }

        // Buat nama file dari data meta
        $filename = $prefix .
            ($dataMeta['id_personil'] ?? 'unknown') . '-' .
            ($dataMeta['tahunajaran'] ?? 'ta') . '-' .
            ($dataMeta['semester'] ?? 'smt') . '-' .
            ($dataMeta['tingkat'] ?? 'tk') . '-' .
            Str::slug($dataMeta['mata_pelajaran'] ?? 'mapel') .
            '.' . $file->getClientOriginalExtension();

        // Simpan file
        $file->move($baseDir, $filename);

        return $filename;
    }
}
