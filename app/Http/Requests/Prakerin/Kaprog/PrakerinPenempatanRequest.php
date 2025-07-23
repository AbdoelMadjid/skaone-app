<?php

namespace App\Http\Requests\Prakerin\Kaprog;

use Illuminate\Foundation\Http\FormRequest;

class PrakerinPenempatanRequest extends FormRequest
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
            'tahunajaran' => 'required|string',
            'kode_kk' => 'required|string',
            'nis' => 'required|string',
            'id_dudi' => 'required|string',
        ];
    }
}
