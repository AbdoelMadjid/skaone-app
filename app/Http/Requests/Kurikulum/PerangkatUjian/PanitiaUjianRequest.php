<?php

namespace App\Http\Requests\Kurikulum\PerangkatUjian;

use Illuminate\Foundation\Http\FormRequest;

class PanitiaUjianRequest extends FormRequest
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
            'id_personil' => [
                'required',
                'string',
            ],
            'nip' => [
                'required',
                'string',
            ],
            'nama_lengkap' => [
                'required',
                'string',
            ],
            'jabatan' => [
                'nullable',
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
            'id_personil.required' => 'Personil harus dipilih.',
            'nip.required' => 'NIP harus diisi.',
            'nama_lengkap.required' => 'Nama Lengkap harus diisi.',
            'jabatan.required' => 'Jabatan harus dipilih.',
        ];
    }
}
