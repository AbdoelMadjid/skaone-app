<?php

namespace App\Http\Requests\WebSite;

use Illuminate\Foundation\Http\FormRequest;

class ProfilLulusanProspekRequest extends FormRequest
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
            'id_kk' => 'required|exists:kompetensi_keahlians,idkk',
            'tipe' => 'required|in:profil_lulusan,prospek_kerja',
            'deskripsi' => 'required|array|min:1',
            'deskripsi.*' => 'required|string',
        ];
    }
    /**
     * Pesan error custom (opsional)
     */
    public function messages(): array
    {
        return [
            'id_kk.required'        => 'Program studi wajib dipilih.',
            'id_kk.exists'          => 'Program studi tidak valid.',

            'tipe.required'         => 'Tipe wajib diisi.',
            'tipe.in'               => 'Tipe hanya boleh berisi "profil_lulusan" atau "prospek_kerja".',

            'deskripsi.required'    => 'Minimal satu deskripsi wajib diisi.',
            'deskripsi.array'       => 'Format deskripsi tidak valid.',
            'deskripsi.min'         => 'Minimal harus ada satu deskripsi.',

            'deskripsi.*.required'  => 'Deskripsi tidak boleh kosong.',
            'deskripsi.*.string'    => 'Deskripsi harus berupa teks.',
        ];
    }
}
