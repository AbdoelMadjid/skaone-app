<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KompetensiKeahlianRequest extends FormRequest
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
            'idkk' => [
                'required',
                'digits:3', // Ensures exactly 3 digits
                Rule::unique('kompetensi_keahlians')->ignore($this->kompetensi_keahlian),
            ],
            'id_bk' => [
                'required',
            ],
            'id_pk' => [
                'required',
            ],
            'nama_kk' => [
                'required',
                'string',
                'max:255',
                'regex:/^([A-Z][a-z]*)+( [A-Z][a-z]*)*$/', // Ensures each word starts with a capital letter
            ],
            'singkatan' => [
                'required',
                'string',
                'max:5', // Ensures the singkatan is no more than 5 characters
                'regex:/^[A-Z]+$/', // Ensures all characters are uppercase and no spaces
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'idkk.required' => 'Id Kompetensi Keahlian harus diisi.',
            'idkk.digits' => 'Id Kompetensi Keahlian harus terdiri dari tepat 3 digit angka.',
            'idkk.unique' => 'Id Kompetensi Keahlian sudah ada.',

            'id_bk.required' => 'Bidang Keahlian harus dipilih.',
            'id_pk.required' => 'Program Keahlian harus dipilih.',

            'nama_kk.required' => 'Nama Kompetensi Keahlian harus diisi.',
            'nama_kk.string' => 'Nama Kompetensi Keahlian harus berupa teks.',
            'nama_kk.max' => 'Nama Kompetensi Keahlian tidak boleh lebih dari 255 karakter.',
            'nama_kk.regex' => 'Setiap kata pada Nama Kompetensi Keahlian harus diawali dengan huruf kapital.',

            'singkatan.required' => 'Singkatan harus diisi.',
            'singkatan.string' => 'Singkatan harus berupa teks.',
            'singkatan.max' => 'Singkatan tidak boleh lebih dari 5 karakter.',
            'singkatan.regex' => 'Singkatan harus berupa huruf besar semua tanpa spasi.',
        ];
    }
}
