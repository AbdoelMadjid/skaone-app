<?php

namespace App\Http\Requests\WebSite;

use Illuminate\Foundation\Http\FormRequest;

class TeamPengembangRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'namalengkap' => 'required|string|max:255',
            'jeniskelamin' => 'required|in:Laki-laki,Perempuan', // L untuk Laki-laki, P untuk Perempuan
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Photo harus berupa gambar
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'namalengkap.required' => 'Nama lengkap wajib diisi.',
            'namalengkap.string' => 'Nama lengkap harus berupa teks.',
            'jeniskelamin.required' => 'Jenis kelamin wajib diisi.',
            'jeniskelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
            'jabatan.required' => 'Jabatan wajib diisi.',
            'deskripsi.string' => 'Deskripsi harus berupa teks.',
            'photo.image' => 'File photo harus berupa gambar.',
            'photo.mimes' => 'Photo harus berformat: jpeg, png, jpg, gif.',
            'photo.max' => 'Ukuran maksimal file photo adalah 2MB.',
        ];
    }
}
