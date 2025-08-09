<?php

namespace App\Http\Requests\Pkl\PembimbingPkl;

use Illuminate\Foundation\Http\FormRequest;

class AbsensiPembimbingPklRequest extends FormRequest
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
            'nis'       => ['required', 'string'], // Harus ada dan tipe string
            'tanggal'   => ['required', 'date'],  // Optional, tapi harus format tanggal jika diisi
            'status'    => ['required', 'string'], // Optional, tipe string
        ];
    }
    /**
     * Get the custom messages for validator errors.
     *
     */
    public function messages()
    {
        return [
            'nis.required' => 'Siswa harus dipilih.',
            'tanggal.required' => 'Tanggal Absensi harus diisi.',
            'status.required' => 'Status Kehadiran harus dipilih.',
        ];
    }
}
