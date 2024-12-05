<?php

namespace App\Http\Requests\Kurikulum\DataKBM;

use Illuminate\Foundation\Http\FormRequest;

class KbmPerRombelRequest extends FormRequest
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
            /* 'kode_mapel_rombel' => 'required|string|max:255',
            'tahunajaran'       => 'required|regex:/^\d{4}-\d{4}$/|max:9|valid_years',
            'kode_kk'           => 'required|string|max:150',
            'tingkat'           => 'required|integer|min:10|max:12',
            'ganjilgenap'       => 'required|in:Genap,Ganjil',
            'semester'          => 'required|integer|min:1|max:6',
            'kode_rombel'       => 'required|string|max:150',
            'rombel'            => 'required|string|max:150',
            'kel_mapel'         => 'required|string|max:150',
            'kode_mapel'        => 'required|string|max:150',
            'mata_pelajaran'    => 'required|string|max:150', */
            'kkm'               => 'required|numeric|min:60|max:100',
            'id_personil'       => 'required|string|max:20',
        ];
    }

    /**
     * Get custom messages for validation errors.
     */
    public function messages()
    {
        return [
            /* 'kode_mapel_rombel.required' => 'Kode mapel rombel wajib diisi.',
            'kode_mapel_rombel.string'   => 'Kode mapel rombel harus berupa string.',
            'kode_mapel_rombel.max'      => 'Kode mapel rombel tidak boleh lebih dari 255 karakter.', // Menyesuaikan dengan aturan maksimal 255 karakter
            'tahunajaran.required'       => 'Tahun ajaran wajib diisi.',
            'tahunajaran.regex'          => 'Tahun ajaran harus dalam format xxxx-xxxx.',
            'tahunajaran.max'            => 'Tahun ajaran tidak boleh lebih dari 9 karakter.',
            'kode_kk.required'           => 'Kode kompetensi keahlian wajib diisi.',
            'kode_kk.max'                => 'Kode kompetensi keahlian tidak boleh lebih dari 150 karakter.',
            'tingkat.required'           => 'Tingkat kelas wajib diisi.',
            'tingkat.integer'            => 'Tingkat kelas harus berupa angka.',
            'tingkat.min'                => 'Tingkat tidak boleh kurang dari 10.',
            'tingkat.max'                => 'Tingkat tidak boleh lebih dari 12.',
            'ganjilgenap.required'       => 'Semester (Genap/Ganjil) wajib diisi.',
            'ganjilgenap.in'             => 'Semester harus berupa "Genap" atau "Ganjil".',
            'semester.required'          => 'Semester wajib diisi.',
            'semester.integer'           => 'Semester harus berupa angka.',
            'semester.min'               => 'Semester tidak boleh kurang dari 1.',
            'semester.max'               => 'Semester tidak boleh lebih dari 6.',
            'kode_rombel.required'       => 'Kode rombel wajib diisi.',
            'kode_rombel.max'            => 'Kode rombel tidak boleh lebih dari 150 karakter.',
            'rombel.required'            => 'Rombel wajib diisi.',
            'rombel.max'                 => 'Rombel tidak boleh lebih dari 150 karakter.',
            'kel_mapel.required'         => 'Kelompok mata pelajaran wajib diisi.',
            'kel_mapel.max'              => 'Kelompok mata pelajaran tidak boleh lebih dari 150 karakter.',
            'kode_mapel.required'        => 'Kode mata pelajaran wajib diisi.',
            'kode_mapel.max'             => 'Kode mata pelajaran tidak boleh lebih dari 150 karakter.',
            'mata_pelajaran.required'    => 'Nama mata pelajaran wajib diisi.',
            'mata_pelajaran.max'         => 'Nama mata pelajaran tidak boleh lebih dari 150 karakter.', */
            'kkm.required'               => 'KKM wajib diisi.',
            'kkm.numeric'                => 'KKM harus berupa angka.',
            'kkm.min'                    => 'KKM tidak boleh kurang dari 60.',
            'kkm.max'                    => 'KKM tidak boleh lebih dari 100.',
            'id_personil.required'       => 'ID personil wajib diisi.',
            'id_personil.string'         => 'ID personil harus berupa string.',
            'id_personil.max'            => 'ID personil tidak boleh lebih dari 20 karakter.',
        ];
    }
}
