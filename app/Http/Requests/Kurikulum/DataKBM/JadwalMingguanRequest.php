<?php

namespace App\Http\Requests\Kurikulum\DataKBM;

use Illuminate\Foundation\Http\FormRequest;

class JadwalMingguanRequest extends FormRequest
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
            'tahunajaran' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'kode_kk' => 'required|string|max:255',
            'tingkat' => 'required|string|max:10',
            'kode_rombel' => 'required|string|max:255',
            'id_personil' => 'required|string|exists:personil_sekolahs,id_personil',
            'mata_pelajaran' => 'required|string|max:255',
            'hari' => 'required|string|max:20',
            'jam_ke' => 'required|array|min:1',
            'jam_ke.*' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'tahunajaran.required'    => 'Tahun ajaran harus diisi.',
            'semester.required'       => 'Semester harus diisi.',
            'kode_kk.required'        => 'Kompetensi keahlian harus diisi.',
            'tingkat.required'        => 'Tingkat harus diisi.',
            'tingkat.integer'         => 'Tingkat harus berupa angka.',
            'kode_rombel.required'    => 'Rombongan belajar harus diisi.',
            'id_personil.required'    => 'Guru pengampu harus dipilih.',
            'id_personil.exists'      => 'Guru yang dipilih tidak ditemukan.',
            'mata_pelajaran.required' => 'Mata pelajaran harus dipilih.',
            'hari.required'           => 'Hari harus dipilih.',
            'hari.in'                 => 'Hari tidak valid.',
            'jam_ke.required'         => 'Jam ke harus dipilih.',
            'jam_ke.array'            => 'Format jam ke tidak valid.',
            'jam_ke.*.integer'        => 'Setiap jam ke harus berupa angka.',
            'jam_ke.*.min'            => 'Nilai jam ke minimal 1.',
            'jam_ke.*.max'            => 'Nilai jam ke maksimal 12.',
        ];
    }
}
