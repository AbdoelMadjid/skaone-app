<?php

namespace App\Http\Requests\Pkl\KaprodiPkl;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModulAjarRequest extends FormRequest
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
            'kode_modulajar' => [
                'required',
                'string',
                Rule::unique('modul_ajars', 'kode_modulajar')
                    ->ignore($this->route('modul_ajar')), // Ensure uniqueness across records
            ],
            'tahunajaran' => 'required|string',
            'kode_kk' => 'required|string',
            'kode_cp' => 'required|string',
            'nomor_tp' => 'required|string',
            'isi_tp' => 'required|string',
        ];
    }
    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'kode_modulajar.unique' => 'Kode modul ajar sudah digunakan. Silakan pilih kode yang lain.',
            'tahunajaran.required' => 'Tahun Ajaran harus di pilih.',
            'kode_kk.required' => 'Kompetensi Keahlian harus dipilih.',
            'kode_cp.required' => 'Element harus diisi.',
            'nomor_tp.required' => 'Nomor Urut Modul Ajar harus dipilih.',
            'isi_tp.required' => 'Isi Modul Ajar harus diisi.',
        ];
    }
}
