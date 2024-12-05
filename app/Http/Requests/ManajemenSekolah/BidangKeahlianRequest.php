<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class BidangKeahlianRequest extends FormRequest
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
            'idbk' => [
                'required',
                'digits:2', // Exactly 2 digits, e.g., 01, 02, ..., 09, 10, etc.
                Rule::unique('bidang_keahlians')->ignore($this->bidang_keahlian),
            ],
            'nama_bk' => [
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
            'idbk.required' => 'Id Bidang Keahlian harus diisi.',
            'idbk.digits' => 'Id Bidang Keahlian harus terdiri dari 2 digit angka.',
            'idbk.unique' => 'Id Bidang Keahlian sudah ada.',
            'idbk.string' => 'Id Bidang Keahlian harus berupa teks.',
            'nama_bk.required' => 'Nama Bidang Keahlian harus diisi.',
            'nama_bk.regex' => 'Setiap kata pada Nama Bidang Keahlian harus diawali dengan huruf kapital.',
        ];
    }
}
