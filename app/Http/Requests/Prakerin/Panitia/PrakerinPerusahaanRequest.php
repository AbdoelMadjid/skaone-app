<?php

namespace App\Http\Requests\Prakerin\Panitia;

use Illuminate\Foundation\Http\FormRequest;

class PrakerinPerusahaanRequest extends FormRequest
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
            'id_pimpinan' => 'nullable|string',
            'jabatan_pimpinan' => 'nullable|string',
            'nama_pimpinan' => 'nullable|string',
            'no_ident_pimpinan' => 'nullable|string',
            'id_pembimbing' => 'nullable|string',
            'jabatan_pembimbing' => 'nullable|string',
            'nama_pembimbing' => 'nullable|string',
            'no_ident_pembimbing' => 'nullable|string',
            'status' => 'required|string',
        ];
    }
}
