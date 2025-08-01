<?php

namespace App\Http\Requests\Prakerin\Panitia;

use Illuminate\Foundation\Http\FormRequest;

class PrakerinAdminNegoRequest extends FormRequest
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
            'tahunajaran'   => 'required|string|max:9', // Contoh: 2024/2025
            'id_perusahaan' => 'required|string|exists:prakerin_perusahaans,id', // asumsi relasi
            'nomor_surat_pengantar'   => 'required|string|max:150',
            'nomor_surat_perintah'   => 'required|string|max:150',
            'nomor_surat_mou'   => 'required|string|max:150',
            'titimangsa'    => 'required|date', // kalau format tanggal, ubah ke `date`
            'tgl_nego'    => 'required|date', // kalau format tanggal, ubah ke `date`
            'id_nego'       => 'required|string|exists:prakerin_negosiators,id_nego', // asumsi relasi
        ];
    }

    /**
     * Pesan validasi kustom.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'tahunajaran.required'   => 'Tahun ajaran wajib diisi.',
            'tahunajaran.max'        => 'Tahun ajaran maksimal 9 karakter.',

            'id_perusahaan.required' => 'Perusahaan wajib dipilih.',
            'id_perusahaan.exists'   => 'Perusahaan yang dipilih tidak ditemukan di database.',

            'nomor_surat_pengantar.required'   => 'Nomor surat pengantar wajib diisi.',
            'nomor_surat_pengantar.max'        => 'Nomor surat pengantar maksimal 150 karakter.',

            'nomor_surat_perintah.required'   => 'Nomor surat perintah wajib diisi.',
            'nomor_surat_perintah.max'        => 'Nomor surat perintah maksimal 150 karakter.',

            'nomor_surat_mou.required'   => 'Nomor surat MOU wajib diisi.',
            'nomor_surat_mou.max'        => 'Nomor surat MOU maksimal 150 karakter.',

            'titimangsa.required'    => 'Titimangsa wajib diisi.',
            'titimangsa.date'         => 'Format tanggal Titimangsa tidak valid.',

            'tgl_nego.required'    => 'Tanggal Negosiasi wajib diisi.',
            'tgl_nego.date'         => 'Format tanggal Negosiasi tidak valid.',

            'id_nego.required'       => 'Negosiator wajib dipilih.',
            'id_nego.exists'         => 'Negosiator yang dipilih tidak valid.',
        ];
    }
}
