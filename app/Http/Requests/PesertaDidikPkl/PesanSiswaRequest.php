<?php

namespace App\Http\Requests\PesertaDidikPkl;

use Illuminate\Foundation\Http\FormRequest;

class PesanSiswaRequest extends FormRequest
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
            /* 'sender_id' => 'required|string',
            'receiver_id' => 'required|string',
            'message' => 'required|string|max:1000',
            'read_status' => 'required|string|in:BELUM,SUDAH', */
            'sender_id'       => ['required', 'string'], // Harus ada dan tipe string
            'receiver_id'   => ['required', 'string'],  // Optional, tapi harus format tanggal jika diisi
            'message'    => ['required', 'string', 'max:1000'], // Optional, tipe string
            'read_status'    => ['required', 'string'], // Optional, tipe string
        ];
    }

    /**
     * Pesan kesalahan khusus untuk setiap aturan.
     */
    public function messages(): array
    {
        return [
            'sender_id.required' => 'Pengirim harus dipilih.',
            'receiver_id.required' => 'Penerima harus dipilih.',
            'message.required' => 'Isi pesan tidak boleh kosong.',
            'message.max' => 'Isi pesan tidak boleh lebih dari 1000 karakter.',
            'read_status.required' => 'Status pesan tidak boleh kosong.',
        ];
    }
}
