<?php

namespace App\Http\Requests\Kurikulum\PerangkatUjian;

use Illuminate\Foundation\Http\FormRequest;

class PesertaUjianRequest extends FormRequest
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
            'nomor_ruang' => ['required', 'string'],
            'kode_kelas_kiri' => ['nullable', 'string'],
            'kode_kelas_kanan' => ['nullable', 'string'],
            'kelas_kiri' => ['nullable', 'string'],
            'kelas_kanan' => ['nullable', 'string'],
            'siswa_kiri.*' => ['string'], // tidak perlu lagi 'required'
            'siswa_kanan.*' => ['string'],
        ];
    }
    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'nomor_ruang.required' => 'Nomor Ruang harus dipilih.',
            'siswa_kiri.*.required' => 'Setiap siswa kiri harus memiliki NIS.',
            'siswa_kanan.*.required' => 'Setiap siswa kanan harus memiliki NIS.',
        ];
    }
}
