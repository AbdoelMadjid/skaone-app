<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;

class GuruWaliSiswaRequest extends FormRequest
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
            'tahunajaran' => ['required', 'string', 'exists:tahun_ajarans,tahunajaran'],
            'id_personil' => ['required', 'exists:personil_sekolahs,id_personil'],
            'nis'         => ['required', 'array', 'min:1'],
            'nis.*'       => ['required', 'exists:peserta_didiks,nis'],
            'status'      => ['required', 'string']
        ];
    }

    public function messages(): array
    {
        return [
            'tahunajaran.required' => 'Tahun ajaran wajib dipilih.',
            'tahunajaran.exists'   => 'Tahun ajaran tidak valid.',
            'id_personil.required' => 'Personil sekolah wajib dipilih.',
            'id_personil.exists'   => 'Personil sekolah tidak valid.',
            'nis.required'         => 'Minimal satu siswa harus dipilih.',
            'nis.array'            => 'Data NIS harus berupa array.',
            'nis.*.exists'         => 'NIS salah satu siswa tidak ditemukan.',
            'status.required'      => 'Status wajib diisi.',
        ];
    }
}
