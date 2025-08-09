<?php

namespace App\Http\Requests\Pkl\PesertaDidikPkl;

use Illuminate\Foundation\Http\FormRequest;

class JurnalPklRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_penempatan' => ['required', 'string'], // Harus ada dan tipe string
            'tanggal_kirim' => ['required', 'date'],  // Optional, tapi harus format tanggal jika diisi
            'element'       => ['required', 'string'], // Optional, tipe string
            'id_tp'         => ['required', 'string'], // Optional, tipe string
            'keterangan'    => ['required', 'string'], // Optional, tipe teks
            'gambar'        => ['nullable', 'image', 'max:2048'], // Optional, harus berupa gambar max 2MB
            'validasi'      => ['nullable', 'string'], // Optional, tipe string
        ];
    }

    public function messages(): array
    {
        return [
            'id_penempatan.required' => 'Id penempatan wajib diisi.',
            'tanggal_kirim.required'     => 'Tanggal kirim harus diisi.',
            'tanggal_kirim.date'     => 'Tanggal kirim harus berupa format tanggal yang valid.',
            'element.required'     => 'Element harus dipilih.',
            'id_tp.required'     => 'Tujuan Pembelajaran harus dipilih.',
            'keterangan.required'     => 'Keterangan harus diisi.',
            'gambar.image'           => 'File harus berupa gambar.',
            'gambar.max'             => 'Ukuran gambar tidak boleh lebih dari 2MB.',
        ];
    }
}
