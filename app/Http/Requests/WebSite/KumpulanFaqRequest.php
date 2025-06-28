<?php

namespace App\Http\Requests\WebSite;

use Illuminate\Foundation\Http\FormRequest;

class KumpulanFaqRequest extends FormRequest
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
            'kategori' => [
                'required',
                'string',
            ],
            'pertanyaan' => [
                'required',
                'string',
            ],
            'jawaban' => [
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
            'kategori.required' => 'Kategori harus di pilih.',
            'pertanyaan.required' => 'Pertanyaan harus diisi.',
            'jawaban.required' => 'Jawaban harus diisi.',
        ];
    }
}
