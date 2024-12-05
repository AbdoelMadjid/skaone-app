<?php

namespace App\Http\Requests\AppSupport;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AppFiturRequest extends FormRequest
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
        $id = $this->route('app_fitur'); // Adjust based on your actual route parameter name

        return [
            'nama_fitur' => [
                'required',
                'string',
                'regex:/^[a-z0-9-]+$/', // Only lowercase letters, numbers, and hyphens allowed
                Rule::unique('app_fiturs', 'nama_fitur')->ignore($id), // Ignore current record
            ],
            'aktif' => [
                'required',
                'in:Aktif,Non Aktif', // Ensure valid status
            ],
        ];
    }


    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nama_fitur.required' => 'Nama Fitur harus diisi.',
            'nama_fitur.string' => 'Nama Fitur harus berupa teks.',
            'nama_fitur.regex' => 'Nama Fitur hanya boleh terdiri dari huruf kecil, angka, dan tanda hubung (-).',
            'nama_fitur.unique' => 'Nama Fitur sudah ada.',

            'aktif.required' => 'Harus dipilih Aktif atau Non Aktif.',
        ];
    }
}
