<?php

namespace App\Http\Requests\Admin;

use App\Models\Libur;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateLiburRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()?->can('umum') ?? false;
    }

    public function rules(): array
    {
        $liburRoute = $this->route('libur');
        $liburId = $liburRoute instanceof Libur ? $liburRoute->id : $liburRoute;

        return [
            'tanggal' => ['required', 'date_format:Y-m-d', Rule::unique('liburs', 'tanggal')->ignore($liburId)],
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
