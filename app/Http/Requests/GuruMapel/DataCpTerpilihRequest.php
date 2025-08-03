<?php

namespace App\Http\Requests\GuruMapel;

use Illuminate\Foundation\Http\FormRequest;

class DataCpTerpilihRequest extends FormRequest
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
            'selected_rombel_ids' => 'required|string', // pastikan selected_rombel_ids adalah string yang berisi ID rombel yang dipilih
            'kel_mapel' => 'required|string', // validasi kel_mapel
            'personal_id' => 'required|string', // validasi personal_id
            'tahunajaran' => 'required|string', // validasi tahun ajaran
            'ganjilgenap' => 'required|string', // validasi semester ganjil/genap
            'semester' => 'required|string', // validasi semester
            'tingkat' => 'required|string', // validasi tingkat
            'selected_cp_data' => 'required|json', // validasi data CP harus array
            'selected_cp_data.*.kode_cp' => 'required|string', // validasi setiap item dalam selected_cp_data harus memiliki kode_cp
            'selected_cp_data.*.jml_materi' => 'required|integer|min:1', // validasi setiap item dalam selected_cp_data harus memiliki jml_materi yang lebih besar dari 0
        ];
    }

    /**
     * Mendapatkan pesan kesalahan untuk aturan validasi yang ditentukan.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'selected_rombel_ids.required' => 'Rombel harus dipilih.',
            'kel_mapel.required' => 'Mata pelajaran harus dipilih.',
            'personal_id.required' => 'Personal ID harus diisi.',
            'tahunajaran.required' => 'Tahun ajaran harus diisi.',
            'ganjilgenap.required' => 'Semester harus diisi.',
            'semester.required' => 'Semester harus diisi.',
            'tingkat.required' => 'Tingkat harus diisi.',
            'selected_cp_data.required' => 'Capaian pembelajaran harus dipilih.',
            'selected_cp_data.*.kode_cp.required' => 'Kode CP harus diisi untuk setiap capaian pembelajaran.',
            'selected_cp_data.*.jml_materi.required' => 'Jumlah materi harus diisi untuk setiap capaian pembelajaran.',
            'selected_cp_data.*.jml_materi.min' => 'Jumlah materi harus lebih besar dari 0.',
        ];
    }
}
