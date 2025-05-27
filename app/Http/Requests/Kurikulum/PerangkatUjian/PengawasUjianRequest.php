<?php

namespace App\Http\Requests\Kurikulum\PerangkatUjian;

use Illuminate\Foundation\Http\FormRequest;

class PengawasUjianRequest extends FormRequest
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
            'tanggal_ujian' => [
                'required',
                'date',
            ],
            'jam_ke' => [
                'required',
                'string',
            ],
            'kode_pengawas' => [
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
            'tanggal_ujian.required' => 'Tanggal Ujian harus dipilih.',
            'jam_ke.required' => 'Jam Ke harus dipilih.',
            'kode_pengawas.required' => 'Pengawas harus dipilih.',
        ];
    }
}
