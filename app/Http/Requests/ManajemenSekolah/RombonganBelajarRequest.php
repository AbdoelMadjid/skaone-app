<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RombonganBelajarRequest extends FormRequest
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
                'size:9', // Assuming the format is YYYY-YYYY, which is 9 characters long
            ],
            'id_kk' => [
                'required',
                'string',
            ],
            'tingkat' => [
                'required',
                'string',
                'in:10,11,12', // Must be one of these values
            ],
            'singkatan_kk' => [
                'required',
                'string',
                'max:10', // Adjust max length as necessary
            ],
            'pararel' => [
                'required',
                'string',
                'in:1,2,3,4,5,6,7', // Must be one of these values
            ],
            'rombel' => [
                'required',
                'string',
                'max:255', // Adjust max length as necessary
            ],
            'kode_rombel' => [
                'required',
                'string',
                'max:255', // Adjust max length as necessary
                Rule::unique('rombongan_belajars', 'kode_rombel')
                    ->ignore($this->rombongan_belajar), // Ensure uniqueness across all records
            ],
            'wali_kelas' => [
                'required',
                'string',
                'max:255',
                Rule::unique('rombongan_belajars')
                    ->where('tahunajaran', $this->input('tahunajaran')) // Ensures wali_kelas is unique within the same tahunajaran
                    ->ignore($this->rombongan_belajar), // Ignore current record when updating
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'tahunajaran.required' => 'Tahun Ajaran harus diisi.',
            'tahunajaran.size' => 'Tahun Ajaran harus dalam format YYYY-YYYY.',
            'id_kk.required' => 'Id Kompetensi Keahlian harus diisi.',
            'tingkat.required' => 'Tingkat harus diisi.',
            'tingkat.in' => 'Tingkat harus salah satu dari 10, 11, atau 12.',
            'singkatan_kk.required' => 'Singkatan Kompetensi Keahlian harus diisi.',
            'pararel.required' => 'Pararel harus diisi.',
            'pararel.in' => 'Pararel harus salah satu dari 1, 2, 3, 4, 5, 6, atau 7.',
            'rombel.required' => 'Rombel harus diisi.',
            'kode_rombel.required' => 'Kode Rombel harus diisi.',
            'kode_rombel.unique' => 'Kode Rombel sudah ada, silakan untuk atur kembali kelas nya.',
            'wali_kelas.unique' => 'Wali Kelas ini sudah digunakan untuk rombel lain pada tahun ajaran yang sama. Silakan pilih wali kelas yang berbeda atau periksa kembali data Anda.',
        ];
    }
}
