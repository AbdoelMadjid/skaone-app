<?php

namespace App\Http\Requests\WebSite;

use Illuminate\Foundation\Http\FormRequest;

class PhotoSlideRequest extends FormRequest
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
        return [
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi untuk file gambar
            'alt_text' => 'nullable|string|max:255', // teks alternatif opsional
            'interval' => 'required|integer|min:1000', // interval tampilan (minimal 1000ms)
            'is_active' => 'required|boolean', // status aktif atau tidak
        ];
    }

    public function messages()
    {
        return [
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Format gambar harus berupa jpeg, png, jpg, atau gif.',
            'gambar.max' => 'Ukuran gambar tidak boleh lebih dari 2MB.',
            'interval.required' => 'Interval waktu harus diisi.',
            'interval.integer' => 'Interval harus berupa angka.',
            'interval.min' => 'Interval minimum adalah 1000 milidetik.',
            'is_active.required' => 'Status aktif harus diisi.',
            'is_active.boolean' => 'Status aktif harus berupa nilai benar atau salah.',
        ];
    }
}
