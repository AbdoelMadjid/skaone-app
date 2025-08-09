<?php

namespace App\Http\Requests\Pkl\AdministratorPkl;

use Illuminate\Foundation\Http\FormRequest;

class PerusahaanRequest extends FormRequest
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
            'nama' => 'required|string',
            'alamat' => 'required|string',
            'jabatan' => 'required|string',
            'nama_pembimbing' => 'required|string',
            'nip' => 'nullable|string',
            'nidn' => 'nullable|string',
        ];
    }
}
