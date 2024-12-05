<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProgramKeahlianRequest extends FormRequest
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
            'idpk' => [
                'required',
                'digits:4', // Ensures exactly 3 digits
                Rule::unique('program_keahlians')->ignore($this->program_keahlian),
            ],
            'id_bk' => [
                'required',
            ],
            'nama_pk' => [
                'required',
                'string',
                'max:255',
                'regex:/^([A-Z][a-z]*)+( [A-Z][a-z]*)*$/', // Ensures each word starts with a capital letter
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'idpk.required' => 'Id Program Keahlian harus diisi.',
            'idpk.digits' => 'Id Program Keahlian harus terdiri dari tepat 3 digit angka.',
            'idpk.unique' => 'Id Program Keahlian sudah ada.',

            'id_bk.required' => 'Bidang Keahlian harus dipilih.',

            'nama_pk.required' => 'Nama Program Keahlian harus diisi.',
            'nama_pk.string' => 'Nama Program Keahlian harus berupa teks.',
            'nama_pk.max' => 'Nama Program Keahlian tidak boleh lebih dari 255 karakter.',
            'nama_pk.regex' => 'Setiap kata pada Nama Program Keahlian harus diawali dengan huruf kapital.',
        ];
    }
}
