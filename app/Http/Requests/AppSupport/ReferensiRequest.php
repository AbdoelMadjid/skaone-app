<?php

namespace App\Http\Requests\AppSupport;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ReferensiRequest extends FormRequest
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
    public function rules()
    {
        $id = $this->route('referensi') ? $this->route('referensi')->id : null;

        return [
            'jenis' => 'required_without:jenis_new',
            'jenis_new' => 'required_if:jenis,new',
            'data' => [
                'required',
                'string',
                Rule::unique('referensis')->where(function ($query) {
                    $jenis = $this->input('jenis') == 'new' ? $this->input('jenis_new') : $this->input('jenis');
                    return $query->where('jenis', $jenis);
                })->ignore($id), // Ignore the current record if updating
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     */
    public function messages(): array
    {
        return [
            'jenis.required_without' => 'Jenis Referensi harus diisi jika tidak menambahkan jenis baru.',
            'jenis_new.required_if' => 'Jenis Referensi baru harus diisi jika memilih "Tambah Jenis Baru".',
            'data.required' => 'Data Referensi harus diisi.',
            'data.unique' => 'Data Referensi sudah ada untuk jenis referensi yang dipilih. Silakan masukkan data yang berbeda.',
        ];
    }
}
