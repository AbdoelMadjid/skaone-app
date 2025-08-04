<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PesertaDidikRequest extends FormRequest
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
            'nis' => [
                'required',
                Rule::unique('peserta_didiks')->ignore($this->peserta_didik),
            ],
            'nisn' => [
                'required',
                Rule::unique('peserta_didiks')->ignore($this->peserta_didik),
            ],
            'thnajaran_masuk' => 'required|string|max:255',
            'kode_kk' => 'required|string|max:255',
            'nama_lengkap' => 'required|string|max:255',
            'tempat_lahir' => 'nullable|string|max:255',
            'tanggal_lahir' => 'nullable|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'agama' => 'required|in:Islam,Protestan,Katolik,Hindu,Budha,Konghucu,Advent',
            'status_dalam_kel' => 'required|in:Anak Kandung,Anak Angkat,Anak Tiri',
            'anak_ke' => 'nullable|integer|min:1',
            'sekolah_asal' => 'nullable|string|max:255',
            'diterima_kelas' => 'required|in:10,11,12',
            'diterima_tanggal' => 'nullable|date',
            'asalsiswa' => 'required|in:Siswa Baru,Pindahan',
            'keterangan_pindah' => 'nullable|string|max:255',
            'alamat_blok' => 'nullable|string|max:255',
            'alamat_norumah' => 'nullable|string|max:255',
            'alamat_rt' => 'nullable|string|max:255',
            'alamat_rw' => 'nullable|string|max:255',
            'alamat_desa' => 'nullable|string|max:255',
            'alamat_kec' => 'nullable|string|max:255',
            'alamat_kab' => 'nullable|string|max:255',
            'alamat_kodepos' => 'nullable|string|max:15',
            'kontak_telepon' => 'nullable|string|max:15',
            'kontak_email' => 'nullable|email|max:255',
            'foto' => 'nullable|image|max:2048', // Validasi untuk upload gambar
            'status' => 'required|in:Aktif,Lulus,Pindah,Keluar',
            'alasan_status' => 'nullable|string|max:255',
        ];
    }

    /**
     * Get the custom messages for validation errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'nis.required' => 'NIS wajib diisi.',
            'nis.unique' => 'NIS sudah terdaftar.',
            'nisn.required' => 'NISN wajib diisi.',
            'nisn.unique' => 'NISN sudah terdaftar.',
            'nisn.size' => 'NISN harus terdiri dari 10 karakter.',
            'thnajaran_masuk.required' => 'Tahun ajaran masuk wajib diisi.',
            'kode_kk.required' => 'Kode Kompetensi Keahlian wajib diisi.',
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin harus antara Laki-laki atau Perempuan.',
            'agama.required' => 'Agama wajib dipilih.',
            'agama.in' => 'Agama yang dipilih tidak valid.',
            'status_dalam_kel.required' => 'Status dalam keluarga wajib dipilih.',
            'status_dalam_kel.in' => 'Status dalam keluarga tidak valid.',
            'anak_ke.integer' => 'Anak ke harus berupa angka.',
            'diterima_kelas.required' => 'Kelas diterima wajib dipilih.',
            'diterima_kelas.in' => 'Kelas diterima tidak valid.',
            'asalsiswa.required' => 'Asal siswa wajib dipilih.',
            'asalsiswa.in' => 'Asal siswa tidak valid.',
            'foto.image' => 'File yang diunggah harus berupa gambar.',
            'foto.max' => 'Ukuran gambar maksimal adalah 2MB.',
            'status.required' => 'Status siswa wajib dipilih.',
            'status.in' => 'Status siswa tidak valid.',
        ];
    }
}
