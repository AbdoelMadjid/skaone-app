<?php

namespace App\Http\Requests\Kurikulum\DataKBM;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CapaianPembelajaranRequest extends FormRequest
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
            'kode_cp' => [
                'required',
                'string',
                Rule::unique('capaian_pembelajarans', 'kode_cp')
                    ->ignore($this->route('capaian_pembelajaran')), // Ensure uniqueness across records
            ],
            'tingkat' => [
                'required',
                'string',
            ],
            'fase' => [
                'required',
                'string',
            ],
            'element' => [
                'nullable',
                'string',
            ],
            'inisial_mp' => [
                'required',
                'string',
            ],
            'nomor_urut' => [
                'required',
                'string',
            ],
            'isi_cp' => [
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
            'kode_cp.unique' => 'Kode capaian pembelajaran sudah digunakan. Silakan pilih kode yang lain.',
            'tingkat.required' => 'Tingkat harus di pilih.',
            'fase.required' => 'Ranah CP  harus dipilih.',
            'inisial_mp.required' => 'Inisial Mata Pelajaran harus diisi.',
            'nomor_urut.required' => 'Nomor Urut CP harus dipilih.',
            'isi_cp.required' => 'Isi CP harus diisi.',
            'kode_cp.required' => 'Kode CP harus diisi.',
        ];
    }
}
