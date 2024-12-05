<?php

namespace App\Http\Requests\Kurikulum\DataKBM;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class MataPelajaranRequest extends FormRequest
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
            'kelompok' => [
                'required',
                'string',
            ],
            'kode' => [
                'required',
                'string',
            ],
            'nourut' => [
                'required',
                'integer',
            ],
            'kel_mapel' => [
                'required',
                'string',
                'max:50',
                Rule::unique('mata_pelajarans', 'kel_mapel')
                    ->ignore($this->route('mata_pelajaran')), // Ensure uniqueness across records
            ],
            'mata_pelajaran' => [
                'required',
                'string',
                'max:255',
            ],
            'inisial_mp' => [
                'required',
                'string',
                'max:50',
                Rule::unique('mata_pelajarans', 'inisial_mp')
                    ->ignore($this->route('mata_pelajaran')),
            ],
            'semester_1' => ['boolean'],
            'semester_2' => ['boolean'],
            'semester_3' => ['boolean'],
            'semester_4' => ['boolean'],
            'semester_5' => ['boolean'],
            'semester_6' => ['boolean'],
        ];
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation()
    {
        $this->merge([
            'semester_1' => $this->boolean('semester_1'),
            'semester_2' => $this->boolean('semester_2'),
            'semester_3' => $this->boolean('semester_3'),
            'semester_4' => $this->boolean('semester_4'),
            'semester_5' => $this->boolean('semester_5'),
            'semester_6' => $this->boolean('semester_6'),
        ]);
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages(): array
    {
        return [
            'kelompok.required' => 'Kelompok harus dipilih.',
            'kelompok.string' => 'Kelompok yang dipilih harus teks',

            'kode.required' => 'Kode harus dipilih.',
            'kode.string' => 'Kode yang dipilih harus teks',

            'nourut.required' => 'No. Urut Mata Pelajaran harus diisi.',
            'nourut.integer' => 'No. Urut Mata Pelajaran harus berupa angka.',

            'kel_mapel.required' => 'Kelompok Mapel harus diisi.',
            'kel_mapel.string' => 'Kelompok Mapel harus berupa teks.',
            'kel_mapel.max' => 'Kelompok Mapel tidak boleh lebih dari 50 karakter.',

            'mata_pelajaran.required' => 'Mata Pelajaran harus diisi.',
            'mata_pelajaran.string' => 'Mata Pelajaran harus berupa teks.',
            'mata_pelajaran.max' => 'Mata Pelajaran tidak boleh lebih dari 255 karakter.',

            'inisial_mp.required' => 'Inisial Mata Pelajaran harus diisi.',
            'inisial_mp.string' => 'Inisial Mata Pelajaran harus berupa teks.',
            'inisial_mp.max' => 'Inisial Mata Pelajaran tidak boleh lebih dari 100 karakter.',
            'inisial_mp.unique' => 'Kode Mata Pelajaran sudah digunakan, silakan pilih kode lain.',

            'semester_1.boolean' => 'Nilai untuk Semester 1 tidak valid.',
            'semester_2.boolean' => 'Nilai untuk Semester 2 tidak valid.',
            'semester_3.boolean' => 'Nilai untuk Semester 3 tidak valid.',
            'semester_4.boolean' => 'Nilai untuk Semester 4 tidak valid.',
            'semester_5.boolean' => 'Nilai untuk Semester 5 tidak valid.',
            'semester_6.boolean' => 'Nilai untuk Semester 6 tidak valid.',
        ];
    }
}
