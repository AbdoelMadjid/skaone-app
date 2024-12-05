<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;

class PesertaDidikOrtuRequest extends FormRequest
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
            'nis' => 'required|exists:peserta_didiks,nis',
            'status' => 'required|string|max:255',
            'nm_ayah' => 'nullable|string|max:255',
            'nm_ibu' => 'nullable|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'ortu_alamat_blok' => 'nullable|string|max:255',
            'ortu_alamat_norumah' => 'nullable|string|max:50',
            'ortu_alamat_rt' => 'nullable|string|max:50',
            'ortu_alamat_rw' => 'nullable|string|max:50',
            'ortu_alamat_desa' => 'nullable|string|max:255',
            'ortu_alamat_kec' => 'nullable|string|max:255',
            'ortu_alamat_kab' => 'nullable|string|max:255',
            'ortu_alamat_kodepos' => 'nullable|string|max:50',
            'ortu_kontak_telepon' => 'nullable|string|max:50',
            'ortu_kontak_email' => 'nullable|email|max:255',
        ];
    }
}
