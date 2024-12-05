<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;

class TahunAjaranRequest extends FormRequest
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
            'tahunajaran' => [
                'required',
                'string',
                'max:255',
                'regex:/^\d{4}\-\d{4}$/'
            ],
            'status' => [
                'required',
                'in:Aktif,Non Aktif'
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'tahunajaran.required' => 'Tahun Ajaran harus diisi. Ex. 2024-2025',
            'tahunajaran.regex' => 'Format Tahun Ajaran harus xxxx-xxxx',
            'status.required' => 'Harus dipilih Aktif atau Non Aktif.',
        ];
    }
}
