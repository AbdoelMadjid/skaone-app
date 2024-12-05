<?php

namespace App\Http\Requests\Kurikulum\DataKBM;

use Illuminate\Foundation\Http\FormRequest;

class PesertaDidikRombelRequest extends FormRequest
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
            'tahun_ajaran' => 'required|string|max:255',
            'kode_kk' => 'required|string|max:255',
            'rombel_tingkat' => 'required|in:10,11,12',
            'rombel_kode' => 'required|string|max:255',
            'rombel_nama' => 'required|string|max:255',
            'nis' => 'nullable|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'tahun_ajaran.required' => 'Tahun ajaran harus diisi.',
            'tahun_ajaran.string' => 'Tahun ajaran harus berupa string.',
            'tahun_ajaran.max' => 'Tahun ajaran tidak boleh lebih dari 255 karakter.',

            'kode_kk.required' => 'Kode KK harus diisi.',
            'kode_kk.string' => 'Kode KK harus berupa string.',
            'kode_kk.max' => 'Kode KK tidak boleh lebih dari 255 karakter.',

            'rombel_tingkat.required' => 'Tingkat rombel harus dipilih.',
            'rombel_tingkat.in' => 'Tingkat rombel harus salah satu dari: 10, 11, 12.',

            'rombel_kode.required' => 'Kode rombel harus diisi.',
            'rombel_kode.string' => 'Kode rombel harus berupa string.',
            'rombel_kode.max' => 'Kode rombel tidak boleh lebih dari 255 karakter.',

            'rombel_nama.required' => 'Nama rombel harus diisi.',
            'rombel_nama.string' => 'Nama rombel harus berupa string.',
            'rombel_nama.max' => 'Nama rombel tidak boleh lebih dari 255 karakter.',

            'nis.string' => 'NIS harus berupa string.',
            'nis.max' => 'NIS tidak boleh lebih dari 255 karakter.',
        ];
    }
}
