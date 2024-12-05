<?php

namespace App\Http\Requests\ManajemenSekolah;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class IdentitasSekolahRequest extends FormRequest
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
            'npsn' => [
                'required',
                'digits:8', // Ensures exactly 8 digits
                Rule::unique('identitas_sekolah')->ignore($this->identitas_sekolah),
            ],
            'nama_sekolah' => [
                'required',
                'string',
                'max:255',
            ],
            'status' => [
                'required',
                'string',
                'max:50',
            ],
            'alamat_jalan' => [
                'nullable',
                'string',
                'max:100',
            ],
            'alamat_no' => [
                'nullable',
                'string',
                'max:20',
            ],
            'alamat_blok' => [
                'nullable',
                'string',
                'max:100',
            ],
            'alamat_rt' => [
                'nullable',
                'string',
                'max:5',
            ],
            'alamat_rw' => [
                'nullable',
                'string',
                'max:5',
            ],
            'alamat_desa' => [
                'required',
                'string',
                'max:100',
            ],
            'alamat_kec' => [
                'required',
                'string',
                'max:100',
            ],
            'alamat_kab' => [
                'required',
                'string',
                'max:100',
            ],
            'alamat_provinsi' => [
                'required',
                'string',
                'max:100',
            ],
            'alamat_kodepos' => [
                'nullable',
                'string',
                'max:10',
            ],
            'alamat_telepon' => [
                'nullable',
                'string',
                'max:15',
            ],
            'alamat_website' => [
                'nullable',
                'url',
                'max:255',
            ],
            'alamat_email' => [
                'nullable',
                'email',
                'max:255',
            ],
            'logo_sekolah' => [
                'nullable',
                'image',
                'mimes:png, svg',
                'max:2048'
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'npsn.required' => 'NPSN wajib diisi.',
            'npsn.digits' => 'NPSN harus terdiri dari 8 digit angka.',
            'npsn.unique' => 'NPSN sudah terdaftar.',
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'status.required' => 'Status sekolah wajib diisi.',
            'alamat_desa.required' => 'Alamat desa wajib diisi.',
            'alamat_kec.required' => 'Alamat kecamatan wajib diisi.',
            'alamat_kab.required' => 'Alamat kabupaten wajib diisi.',
            'alamat_provinsi.required' => 'Alamat provinsi wajib diisi.',
            'alamat_website.url' => 'Jika diisi, alamat website harus berupa URL yang valid.',
            'alamat_email.email' => 'Jika diisi, alamat email harus berupa alamat email yang valid.',
            'logo_sekolah.image' => 'File logo sekolah harus berupa gambar.',
            'logo_sekolah.mimes' => 'Logo sekolah harus berformat: png, svg.',
            'logo_sekolah.max' => 'Ukuran logo sekolah tidak boleh lebih dari 2MB.',
        ];
    }
}
