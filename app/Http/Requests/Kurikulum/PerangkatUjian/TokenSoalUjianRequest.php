<?php

namespace App\Http\Requests\Kurikulum\PerangkatUjian;

use Illuminate\Foundation\Http\FormRequest;

class TokenSoalUjianRequest extends FormRequest
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
            'tanggal_ujian' => [
                'required',
                'date',
            ],
            'sesi_ujian' => [
                'required',
                'string',
            ],
            'matapelajaran' => [
                'required',
                'string',
            ],
            'kelas' => [
                'required',
                'string',
            ],
            'token_soal' => [
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
            'tanggal_ujian.required' => 'Tanggal Ujian harus dipilih.',
            'sesi_ujian.required' => 'Sesi Ujian harus dipilih.',
            'matapelajaran.required' => 'Mata Pelajaran harus diisi.',
            'kelas.required' => 'Kelas harus diisi.',
            'token_soal.required' => 'Token Ujian harus diisi.',
        ];
    }
}
