<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class LogoJurusanRequest extends FormRequest
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
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:256000',
            'kode_kk' => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'logo.image' => 'File harus berupa gambar.',
            'logo.mimes' => 'Format gambar harus berupa jpeg, png, jpg, atau gif.',
            'logo.max' => 'Ukuran gambar tidak boleh lebih dari 250MB.',
            'kode_kk.required' => 'Kompetensi Keahlian harus dipilih.',
        ];
    }
}
