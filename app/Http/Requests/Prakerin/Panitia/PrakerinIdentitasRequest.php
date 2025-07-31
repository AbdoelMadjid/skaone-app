<?php

namespace App\Http\Requests\Prakerin\Panitia;

use Illuminate\Foundation\Http\FormRequest;

class PrakerinIdentitasRequest extends FormRequest
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
            'nama'            => 'required|string|max:255',
            'tahunajaran'     => 'required|string|max:9', // contoh: 2024/2025
            'tanggal_mulai'   => 'required|date|before_or_equal:tanggal_selesai',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status'          => 'required|string|in:Aktif,Non Aktif', // sesuaikan enum jika ada
        ];
    }
    /**
     * Pesan kustom untuk setiap validasi.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'nama.required'            => 'Nama kegiatan wajib diisi.',
            'nama.max'                 => 'Nama kegiatan maksimal 255 karakter.',

            'tahunajaran.required'     => 'Tahun ajaran wajib diisi.',
            'tahunajaran.max'          => 'Format tahun ajaran tidak boleh lebih dari 9 karakter.',

            'tanggal_mulai.required'   => 'Tanggal mulai wajib diisi.',
            'tanggal_mulai.date'       => 'Format tanggal mulai tidak valid.',
            'tanggal_mulai.before_or_equal' => 'Tanggal mulai tidak boleh lebih besar dari tanggal selesai.',

            'tanggal_selesai.required' => 'Tanggal selesai wajib diisi.',
            'tanggal_selesai.date'     => 'Format tanggal selesai tidak valid.',
            'tanggal_selesai.after_or_equal' => 'Tanggal selesai tidak boleh lebih kecil dari tanggal mulai.',

            'status.required'          => 'Status wajib diisi.',
            'status.in'                => 'Status hanya boleh berupa: Aktif atau Non Aktif.',
        ];
    }
}
