<?php

namespace App\Http\Requests\Kurikulum\PerangkatUjian;

use Illuminate\Foundation\Http\FormRequest;

class DenahRuanganUjianRequest extends FormRequest
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
            'kode_ruang' => [
                'required',
                'string',
            ],
            'label' => [
                'required',
                'string',
            ],
            'x' => [
                'required',
                'string',
            ],
            'y' => [
                'required',
                'string',
            ],
            'warna' => [
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
            'kode_ruang.required' => 'Kode Ruang harus diisi.',
            'label.required' => 'Label harus diisi.',
            'x.required' => 'Koordinat X harus diisi.',
            'y.required' => 'Koordinat Y harus diisi.',
            'warna.required' => 'Warna harus diisi.',
        ];
    }
}
