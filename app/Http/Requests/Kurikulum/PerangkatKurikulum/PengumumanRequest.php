<?php

namespace App\Http\Requests\Kurikulum\PerangkatKurikulum;

use Illuminate\Foundation\Http\FormRequest;

class PengumumanRequest extends FormRequest
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
            'judul' => [
                'required',
                'string',
            ],
            'isi' => [
                'required',
                'string',
            ],
            'tanggal' => [
                'required',
                'date',
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'judul.required' => 'Judul harus dipilih.',
            'isi.required' => 'Isi Pengumuman harus diisi.',
            'tanggal.required' => 'Tanggal harus diisi.',
        ];
    }
}
