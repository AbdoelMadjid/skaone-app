<?php

namespace App\Http\Requests\ManajemenSekolah;

use App\Models\AppSupport\Referensi;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PersonilSekolahRequest extends FormRequest
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

        // Ambil nilai-nilai agama dari tabel referensi
        //$agamaValues = Referensi::where('jenis', 'Agama')->pluck('data')->toArray();

        return [
            'id_personil' => [
                'nullable',
                'string',
                Rule::unique('personil_sekolahs')->ignore($this->personil_sekolah),
            ],
            'nip' => [
                'nullable',
                'string',
            ],
            'gelardepan' => [
                'nullable',
                'string',
                'max:255',
            ],
            'namalengkap' => [
                'required',
                'string',
                'max:255',
            ],
            'gelarbelakang' => [
                'nullable',
                'string',
                'max:255',
            ],
            'jeniskelamin' => [
                'required',
                Rule::in(['Laki-laki', 'Perempuan']),
            ],
            'jenispersonil' => [
                'required',
                Rule::in(['Kepala Sekolah', 'Guru', 'Tata Usaha']),
            ],
            'tempatlahir' => [
                'required',
                'string',
                'max:255',
            ],
            'tanggallahir' => [
                'required',
                'date',
            ],
            'agama' => [
                'required',
                'string',
                //Rule::in($agamaValues),
            ],
            'kontak_email' => [
                'required',
                'email',
                'max:255',
                function ($attribute, $value, $fail) {
                    if (!filter_var($value, FILTER_VALIDATE_EMAIL) || !preg_match('/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $value)) {
                        $fail('Format email tidak valid.');
                    }
                },
            ],
            'kontak_hp' => [
                'required',
                'string',
                'max:255',
            ],
            'photo' => [
                'nullable',
                'image',
                //'mimes:png, svg, jpg',
                // 'max:2048'
            ],
            'aktif' => [
                'required',
                Rule::in(['Aktif', 'Tidak Aktif', 'Pensiun', 'Pindah', 'Keluar']),
            ],
            'alamat_blok' => 'nullable|string',
            'alamat_nomor' => 'nullable|string',
            'alamat_rt' => 'nullable|string',
            'alamat_rw' => 'nullable|string',
            'alamat_desa' => 'nullable|string',
            'alamat_kec' => 'nullable|string',
            'alamat_kab' => 'nullable|string',
            'alamat_prov' => 'nullable|string',
            'alamat_kodepos' => 'nullable|string',
            'bg_profil' => 'nullable|string', // Background profil
            'motto_hidup' => 'nullable|string', // Motto hidup
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'namalengkap.required' => 'Nama Lengkap wajib diisi.',
            'jeniskelamin.required' => 'Jenis Kelamin wajib dipilih.',
            'jenispersonil.required' => 'Jenis Personil wajib dipilih.',
            'tempatlahir.required' => 'Tempat Lahir wajib diisi.',
            'tanggallahir.required' => 'Tanggal Lahir wajib diisi.',
            'agama.required' => 'Agama wajib dipilih.',
            //'agama.in' => 'Agama yang dipilih tidak valid.',
            'kontak_email.required' => 'Email wajib diisi.',
            'kontak_email.email' => 'Email tidak valid.',
            'kontak_hp.required' => 'Nomor HP wajib diisi.',
            'photo.image' => 'File Photo harus berupa gambar.',
            //'photo.mimes' => 'Photo harus berformat: png, svg, jpg.',
            //'photo.max' => 'Ukuran Photo tidak boleh lebih dari 2MB.',
            'aktif.required' => 'Status Aktif wajib dipilih.',
        ];
    }
}
