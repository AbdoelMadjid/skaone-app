<?php

namespace App\Helpers;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Str;

class ImageHelper
{
    /**
     * Upload dan kompres gambar
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory — direktori relatif dari public/
     * @param string|null $oldFileName — nama file lama yang akan dihapus
     * @param int $maxWidth — batas maksimum lebar gambar
     * @param int $quality — kualitas kompresi JPG
     * @return string nama file baru yang disimpan
     */
    public static function uploadCompressedImage($file, $directory, $oldFileName = null, $maxWidth = 600, $quality = 75, $prefix = '')
    {
        $publicPath = base_path($directory);

        // Buat folder jika belum ada
        if (!file_exists($publicPath)) {
            mkdir($publicPath, 0755, true);
        }

        // Hapus file lama jika ada
        if ($oldFileName) {
            $oldFilePath = $publicPath . '/' . $oldFileName;
            if (file_exists($oldFilePath)) {
                unlink($oldFilePath);
            }
        }

        // Generate nama file baru
        $imageName = $prefix . Str::uuid() . '.' . $file->extension();

        // Resize dan kompres
        $manager = new ImageManager(new GdDriver());
        $img = $manager->read($file->getPathname());

        if ($img->width() > $maxWidth) {
            $targetHeight = intval($maxWidth * ($img->height() / $img->width()));
            $img->resize($maxWidth, $targetHeight, ['preventUpsize' => true]);
        }

        $img->toJpeg($quality)->save($publicPath . '/' . $imageName);

        return $imageName;
    }
}
