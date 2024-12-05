<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;

class JabatanLainRequest extends FormRequest
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
            'jabatan' => [
                'required',
                'string',
            ],
            'namalengkap' => [
                'required',
                'string',
            ],
            'mulai_tahun' => [
                'required',
                'string',
            ],
            'akhir_tahun' => [
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
            'jabatan.required' => 'Jenis Jabatan harus di pilih.',
            'namalengkap.required' => 'Nama Lengkap harus dipilih.',
            'mulai_tahun.required' => 'Mulai tahun harus dipilih.',
            'akhir_tahun.required' => 'Selesai tahun harus dipilih.',
        ];
    }
}
