<?php

namespace App\Http\Requests\WaliKelas;

use Illuminate\Foundation\Http\FormRequest;

class PrestasiSiswaRequest extends FormRequest
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
            'kode_rombel'   => 'required|string',
            'tahunajaran'   => 'required|string',
            'ganjilgenap'   => 'required|string|in:Ganjil,Genap',
            'semester'      => 'required|integer|between:1,6',
            'nis'           => 'required|string',
            'jenis'         => 'required|string',
            'tingkat'       => 'required|string',
            'juarake'       => 'nullable|string',
            'namalomba'     => 'required|string',
            'tanggal'       => 'required|date',
            'tempat'        => 'required|string',
        ];
    }

    public function messages()
    {
        return [
            'kode_rombel.required'   => 'Kode Rombel harus diisi.',
            'tahunajaran.required'   => 'Tahun Ajaran harus diisi.',
            'ganjilgenap.required'   => 'Semester Ganjil/Genap harus diisi.',
            'nis.required'           => 'NIS siswa harus diisi.',
            'jenis.required'         => 'Jenis prestasi harus dipilih.',
            'tingkat.required'       => 'Tingkat harus harus dipilih.',
            'namalomba.required'     => 'Nama lomba harus diisi.',
            'tanggal.required'       => 'Tanggal lomba harus diisi.',
            'tempat.required'        => 'Tempat lomba harus diisi.',
        ];
    }
}
