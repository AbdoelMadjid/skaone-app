<?php

namespace App\Http\Requests\WebSite;

use Illuminate\Foundation\Http\FormRequest;

class PhotoPersonilRequest extends FormRequest
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
            'no_group'    => 'required|string|max:50',
            'nama_group'  => 'required|string|max:255',
            'no_personil' => 'required|string|max:50',
            'id_personil' => 'required|string',
            'photo'       => 'nullable|image|mimes:jpeg,png,jpg|max:256000',
        ];
    }

    /**
     * Pesan error custom.
     */
    public function messages(): array
    {
        return [
            'no_group.required'    => 'Nomor group wajib dipilih.',
            'nama_group.required'  => 'Nama group wajib dipilih.',
            'no_personil.required' => 'Nomor urut Personil wajib dipilih.',
            'id_personil.required' => 'Nama Personil wajib di pilih.',

            'photo.image'          => 'File harus berupa gambar.',
            'photo.mimes'          => 'Foto hanya boleh berformat jpg, jpeg, atau png.',
            'photo.max'            => 'Ukuran gambar tidak boleh lebih dari 250MB.',
        ];
    }
}
