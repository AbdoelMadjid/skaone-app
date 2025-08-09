<?php

namespace App\Http\Requests\Pkl\PembimbingPkl;

use Illuminate\Foundation\Http\FormRequest;

class MonitoringPrakerinRequest extends FormRequest
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
            'id_perusahaan' => ['required', 'string'], // Harus ada dan tipe string
            'id_personil' => ['required', 'string'],  // Optional, tapi harus format tanggal jika diisi
            'tgl_monitoring'       => ['required', 'date'], // Optional, tipe string
            'catatan_monitoring'        => ['nullable', 'string'], // Optional, harus berupa gambar max 2MB

        ];
    }
    /**
     * Get the custom messages for validator errors.
     *
     */
    public function messages()
    {
        return [
            'id_perusahaan.required' => 'Perusahaan harus dipilih.',
            'tgl_monitoring.required' => 'Tanggal monitoring harus diisi.',
            'tgl_monitoring.date' => 'Format tanggal monitoring tidak valid.',
        ];
    }
}
