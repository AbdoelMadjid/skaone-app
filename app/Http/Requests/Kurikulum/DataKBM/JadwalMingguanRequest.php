<?php

namespace App\Http\Requests\Kurikulum\DataKBM;

use App\Models\Kurikulum\DataKBM\JadwalMingguan;
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

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $id_personil = $this->id_personil;
            $hari = $this->hari;
            $jam_ke = is_array($this->jam_ke) ? $this->jam_ke : json_decode($this->jam_ke, true);
            $kode_rombel = $this->kode_rombel;
            $tahunajaran = $this->tahunajaran;
            $semester = $this->semester;

            // Ambil semua jadwal pada hari itu dan jam ke yang sama, untuk tahunajaran dan semester yang sama
            $existing = JadwalMingguan::where('tahunajaran', $tahunajaran)
                ->where('semester', $semester)
                ->where('hari', $hari)
                ->whereIn('jam_ke', $jam_ke)
                ->get();

            foreach ($jam_ke as $jam) {
                foreach ($existing as $jadwal) {
                    // Bentrok karena guru yang sama sudah ada jadwal di jam itu
                    if ($jadwal->id_personil == $id_personil) {
                        $validator->errors()->add('jam_ke', "Guru sudah ada jadwal di hari $hari jam ke-$jam");
                    }

                    // Bentrok karena rombel sudah ada jadwal di jam itu
                    if ($jadwal->kode_rombel == $kode_rombel) {
                        $validator->errors()->add('jam_ke', "Rombel sudah ada jadwal di hari $hari jam ke-$jam");
                    }
                }
            }
        });
    }
}
