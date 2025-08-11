<?php

namespace App\Http\Requests\ManajemenSekolah\BpBk;

use Illuminate\Foundation\Http\FormRequest;

class BpBkSiswaBermasalahRequest extends FormRequest
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
            'tahunajaran' => 'required',
            'semester'    => 'required',
            'tanggal'     => 'required|date',
            'nis'         => 'required',
            'rombel'      => 'required',
            'jenis_kasus' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'tahunajaran.required' => 'Tahun ajaran wajib dipilih.',
            'semester.required'    => 'Semester wajib dipilih.',
            'tanggal.required'     => 'Tanggal wajib diisi.',
            'tanggal.date'         => 'Format tanggal tidak valid.',
            'nis.required'         => 'Nama siswa wajib dipilih.',
            'rombel.required'      => 'Rombel tidak boleh kosong.',
            'jenis_kasus.required' => 'Jenis kasus wajib dipilih.',
        ];
    }
}
