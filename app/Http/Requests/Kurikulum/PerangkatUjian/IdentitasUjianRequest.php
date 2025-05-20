<?php

namespace App\Http\Requests\Kurikulum\PerangkatUjian;

use Illuminate\Foundation\Http\FormRequest;

class IdentitasUjianRequest extends FormRequest
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
            'tahun_ajaran' => [
                'required',
                'string',
            ],
            'semester' => [
                'required',
                'string',
            ],
            'nama_ujian' => [
                'required',
                'string',
            ],
            'kode_ujian' => [
                'required',
                'string',
            ],
            'tgl_ujian_awal' => [
                'required',
                'date',
            ],
            'tgl_ujian_akhir' => [
                'required',
                'date',
            ],
            'titimangsa_ujian' => [
                'required',
                'date',
            ],
            'status' => [
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
            'tahun_ajaran.required' => 'Tahun Ajaran harus dipilih.',
            'semester.required' => 'Semester harus dipilih.',
            'nama_ujian.required' => 'Nama Ujian harus diisi.',
            'kode_ujian.required' => 'Kode Ujian harus diisi.',
            'tgl_ujian_awal.required' => 'Tanggal Ujian Awal harus diisi.',
            'tgl_ujian_akhir.required' => 'Tanggal Ujian Akhir harus diisi.',
            'titimangsa_ujian.required' => 'Titimangsa Ujian harus diisi.',
            'status.required' => 'Status harus dipilih.',
        ];
    }
}
