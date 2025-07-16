<?php

namespace App\Helpers;

use Intervention\Image\ImageManager;
use Intervention\Image\Facades\Image;
//use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Illuminate\Support\Str;

class ImageHelper
{
    /**
     * Upload dan kompres gambar (kompatibel Intervention Image v2)
     *
     * @param \Illuminate\Http\UploadedFile $file
     * @param string $directory — direktori relatif dari base_path
     * @param string|null $oldFileName — nama file lama yang akan dihapus
     * @param int $maxWidth — batas maksimum lebar gambar
     * @param int $quality — kualitas kompresi JPG
     * @param string $prefix — prefix nama file
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
        $imageName = $prefix . Str::uuid() . '.' . $file->getClientOriginalExtension();

        // Resize dan kompres
        $img = Image::make($file->getPathname());

        if ($img->width() > $maxWidth) {
            $targetHeight = intval($maxWidth * ($img->height() / $img->width()));
            $img->resize($maxWidth, $targetHeight, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
        }

        // Simpan dalam format JPG terkompresi
        $img->save($publicPath . '/' . $imageName, $quality, 'jpg');

        return $imageName;
    }

    /**
     * Generate <img> tag dengan fallback default berdasarkan gender
     */
    public static function getAvatarImageTag(
        ?string $filename,
        string $gender,
        string $folder,
        string $defaultMaleImage,
        string $defaultFemaleImage,
        int $width = 50,
        string $class = 'rounded avatar-sm'
    ): string {
        $imagePath = base_path("images/{$folder}/{$filename}");

        $defaultPhotoPath = $gender === 'Laki-laki'
            ? asset("images/{$defaultMaleImage}")
            : asset("images/{$defaultFemaleImage}");

        $photoUrl = ($filename && file_exists($imagePath))
            ? asset("images/{$folder}/{$filename}")
            : $defaultPhotoPath;

        return '<img src="' . $photoUrl . '" alt="Foto" width="' . $width . '" class="' . $class . '" />';
    }
}
