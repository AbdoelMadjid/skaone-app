<?php

namespace App\Http\Requests\Kurikulum\PerangkatUjian;

use Illuminate\Foundation\Http\FormRequest;

class RuangUjianRequest extends FormRequest
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
            'kode_ujian' => [
                'required',
                'string',
            ],
            'nomor_ruang' => [
                'required',
                'string',
            ],
            'kelas_kiri' => [
                'required',
                'string',
            ],
            'kelas_kanan' => [
                'required',
                'string',
            ],
            'kode_kelas_kiri' => [
                'required',
                'string',
            ],
            'kode_kelas_kanan' => [
                'required',
                'string',
            ],
        ];
    }
    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'kode_ujian.required' => 'Kode Ujian harus diisi.',
            'nomor_ruang.required' => 'Nomor Ruang harus dipilih.',
            'kelas_kiri.required' => 'Kelas Kiri harus dipilih.',
            'kelas_kanan.required' => 'Kelas Kanan harus dipilih.',
            'kode_kelas_kiri.required' => 'Kode Kelas Kiri harus diisi.',
            'kode_kelas_kanan.required' => 'Kode Kelas Kanan harus diisi.',
        ];
    }
}
