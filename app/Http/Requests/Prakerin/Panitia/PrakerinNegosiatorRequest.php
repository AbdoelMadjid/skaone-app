<?php

namespace App\Http\Requests\Prakerin\Panitia;

use Illuminate\Foundation\Http\FormRequest;

class PrakerinNegosiatorRequest extends FormRequest
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
            'tahunajaran' => 'required|string|max:9', // contoh: 2024/2025
            'id_personil' => 'required|string|exists:personil_sekolahs,id_personil', // asumsi: ada tabel personils
            'gol_ruang'   => 'nullable|string',
            'jabatan'   => 'nullable|string',
            'id_nego'     => 'required|string|max:100', // asumsi: relasi ke tabel negosiators
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'tahunajaran.required' => 'Tahun ajaran wajib diisi.',
            'tahunajaran.max'      => 'Tahun ajaran maksimal 9 karakter.',

            'id_personil.required' => 'Personil wajib dipilih.',
            'id_personil.exists'   => 'Personil yang dipilih tidak valid.',

            'gol_ruang.nullable'   => 'Golongan dan ruang wajib diisi.',
            'gol_ruang.max'        => 'Golongan dan ruang maksimal 120 karakter.',

            'jabatan.nullable'   => 'Jabatan wajib diisi.',
            'jabatan.max'        => 'Jabatan maksimal 120 karakter.',

            'id_nego.required'     => 'Negosiator wajib dipilih.',
            'id_nego.exists'       => 'Negosiator yang dipilih tidak valid.',
        ];
    }
}
