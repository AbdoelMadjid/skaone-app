<?php

namespace App\Http\Requests\AppSupport;

use Illuminate\Foundation\Http\FormRequest;

class AppProfilRequest extends FormRequest
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
            'app_nama' => 'required|string|max:15',
            'app_deskripsi' => [
                'required',
                'string',
                'max:255', // Assuming each word is not more than 50 characters
                'regex:/^(\b\w+\b[\s\r\n]*){1,10}$/', // Ensures a maximum of 5 words
            ],
            'app_tahun' => [
                'required',
                'digits:4', // Ensures exactly 4 digits
                'integer',
            ],
            'app_pengembang' => [
                'required',
                'string',
                'max:15',
            ],
            'app_icon' => [
                'nullable',
                'image',
                'mimes:png,svg',
                'max:2048',
                'dimensions:width=32', // Ensures width is exactly 32 pixels
            ],
            'app_logo' => [
                'nullable',
                'image',
                'mimes:png,svg',
                'max:2048',
                'dimensions:width=246,height=52', // Ensures width is 187 pixels and height is 32 pixels
            ],
        ];
    }


    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'app_nama.required' => 'Nama Aplikasi harus diisi.',
            'app_nama.max' => 'Nama Aplikasi tidak boleh lebih dari 15 huruf.',
            'app_nama.string' => 'Nama Aplikasi harus berupa teks.',

            'app_deskripsi.required' => 'Deskripsi aplikasi harus diisi.',
            'app_deskripsi.string' => 'Deskripsi aplikasi harus berupa teks.',
            'app_deskripsi.max' => 'Deskripsi aplikasi tidak boleh lebih dari 255 karakter.',
            'app_deskripsi.regex' => 'Deskripsi aplikasi tidak boleh lebih dari 10 kata.',

            'app_tahun.required' => 'Tahun Ajaran harus diisi.',
            'app_tahun.digits' => 'Tahun Ajaran harus berupa 4 digit angka.',
            'app_tahun.integer' => 'Tahun Ajaran harus berupa angka.',

            'app_pengembang.required' => 'Nama Pengembang harus diisi.',
            'app_pengembang.string' => 'Nama Pengembang harus berupa teks.',
            'app_pengembang.max' => 'Nama Pengembang tidak boleh lebih dari 15 karakter.',

            'app_icon.image' => 'File icon aplikasi harus berupa gambar.',
            'app_icon.mimes' => 'Icon aplikasi harus berformat: png, svg.',
            'app_icon.max' => 'Ukuran icon aplikasi tidak boleh lebih dari 2MB.',
            'app_icon.dimensions' => 'Icon aplikasi harus berukuran tepat 32 piksel lebar.',

            'app_logo.image' => 'File logo aplikasi harus berupa gambar.',
            'app_logo.mimes' => 'Logo aplikasi harus berformat: png, svg.',
            'app_logo.max' => 'Ukuran logo aplikasi tidak boleh lebih dari 2MB.',
            'app_logo.dimensions' => 'Logo aplikasi harus berukuran tepat 187 piksel lebar dan 32 piksel tinggi.',
        ];
    }
}
