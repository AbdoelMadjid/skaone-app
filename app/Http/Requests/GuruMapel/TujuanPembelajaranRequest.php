<?php

namespace App\Http\Requests\GuruMapel;

use Illuminate\Foundation\Http\FormRequest;

class TujuanPembelajaranRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $tpData = json_decode($this->input('selected_tp_data'), true);

            if (!is_array($tpData) || count($tpData) === 0) {
                $validator->errors()->add('selected_tp_data', 'Data tujuan pembelajaran tidak boleh kosong.');
                return;
            }

            foreach ($tpData as $index => $tp) {
                if (empty($tp['tp_isi'])) {
                    $validator->errors()->add("tp_isi_$index", "Tujuan Pembelajaran harus diisi pada baris ke-" . ($index + 1));
                }
            }
        });
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'selected_rombel_ids' => 'required|string',
            'kel_mapel' => 'required|string',
            'personal_id' => 'required',
            'tahunajaran' => 'required',
            'ganjilgenap' => 'required',
            'semester' => 'required',
            'tingkat' => 'required',
            'selected_tp_data' => 'required|json',
            'tp_isi.*' => ['required', function ($attribute, $value, $fail) {
                if (str_word_count($value) > 25) {
                    $fail("Jumlah kata di $attribute melebihi 25.");
                }
            }],
        ];
    }

    public function messages()
    {
        return [
            'selected_rombel_ids.required' => 'Rombel harus dipilih.',
            'kel_mapel.required' => 'Kelompok mapel wajib diisi.',
            'personal_id.required' => 'Guru belum ditentukan.',
            'tahunajaran.required' => 'Tahun ajaran belum diatur.',
            'ganjilgenap.required' => 'Semester ganjil/genap belum diisi.',
            'semester.required' => 'Semester belum dipilih.',
            'tingkat.required' => 'Tingkat belum ditentukan.',
            'selected_tp_data.required' => 'Data tujuan pembelajaran tidak boleh kosong.',
            'selected_tp_data.json' => 'Format tujuan pembelajaran tidak valid.',
            'tp_isi.*.required' => 'Isi Tujuan Pembelajaran tidak boleh kosong.',
            'tp_isi.*.max_words' => 'Isi Tujuan Pembelajaran maksimal 25 kata.'
        ];
    }
}
