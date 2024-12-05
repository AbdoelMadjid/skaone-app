<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;

class KepalaSekolahRequest extends FormRequest
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
            'nama' => [
                'required',
                'string',
                'max:50',
            ],
            'nip' => [
                'required',
                'string',
                'regex:/^\d{8} \d{6} [12] \d{3}$/',
                'max:25',
            ],
            'tahunajaran' => [
                'required',
                'string',
                'regex:/^\d{4}-\d{4}$/', // Format Tahun Ajaran YYYY-YYYY
                'size:9',
            ],
            'semester' => [
                'required',
                'string',
                'in:Genap,Ganjil', // Hanya menerima Genap atau Ganjil
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'nama.required' => 'Nama kepala sekolah wajib diisi.',
            'nama.max' => 'Nama tidak boleh lebih dari 50 karakter.',

            'nip.required' => 'NIP wajib diisi.',
            'nip.regex' => 'Format NIP tidak valid. Format yang benar adalah 19740302 199803 1 002.',
            'nip.max' => 'NIP tidak boleh lebih dari 25 karakter.',

            'tahunajaran.required' => 'Tahun ajaran wajib diisi.',
            'tahunajaran.regex' => 'Format tahun ajaran tidak valid. Gunakan format YYYY-YYYY, contoh: 2024-2025.',
            'tahunajaran.size' => 'Tahun ajaran harus terdiri dari 9 karakter (YYYY-YYYY).',

            'semester.required' => 'Semester wajib diisi.',
            'semester.in' => 'Semester hanya dapat berisi "Genap" atau "Ganjil".',
        ];
    }
}
