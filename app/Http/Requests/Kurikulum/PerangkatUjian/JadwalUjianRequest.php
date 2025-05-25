<?php

namespace App\Http\Requests\Kurikulum\PerangkatUjian;

use Illuminate\Foundation\Http\FormRequest;

class JadwalUjianRequest extends FormRequest
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
            'kode_kk' => [
                'required',
                'string',
            ],
            'tingkat' => [
                'required',
                'string',
            ],
            'tanggal' => [
                'required',
                'date',
            ],
            'jam_ke' => [
                'required',
                'string',
            ],
            'jam_ujian' => [
                'required',
                'string',
            ],
            'mata_pelajaran' => [
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
            'kode_kk.required' => 'Kompetensi Keahlian harus dipilih.',
            'tingkat.required' => 'Tingkat harus dipilih.',
            'tanggal.required' => 'Tanggal harus dipilih.',
            'jam_ke.required' => 'Jam Ke Kiri harus dipilih.',
            'jam_ujian.required' => 'Jam Ujian harus diisi.',
            'mata_pelajaran.required' => 'Mata Pelajaran harus dipilih.',
        ];
    }
}
