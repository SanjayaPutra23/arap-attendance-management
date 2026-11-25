<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreLiburRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('umum') ?? false;
    }

    public function rules(): array
    {
        return [
            'tanggal' => ['required', 'date_format:Y-m-d', 'unique:liburs,tanggal'],
            'ket' => ['required', 'string', 'max:255'],
        ];
    }

    public function messages(): array
    {
        return [
            'tanggal.required' => 'Tanggal hari libur wajib diisi.',
            'tanggal.date_format' => 'Format tanggal harus YYYY-MM-DD.',
            'tanggal.unique' => 'Tanggal ini sudah terdaftar sebagai hari libur.',
            'ket.required' => 'Keterangan hari libur wajib diisi.',
            'ket.max' => 'Keterangan hari libur maksimal 255 karakter.',
        ];
    }
}
