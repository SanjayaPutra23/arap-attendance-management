<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class ReviewPermohonanIzinRequest extends FormRequest
{
    /**
     * Tentukan apakah user berwenang menyetujui/menolak izin.
     */
    public function authorize(): bool
    {
        return Gate::allows('umum');
    }

    /**
     * Aturan validasi persetujuan/penolakan izin.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', 'in:disetujui,ditolak,approved,rejected'],
            'catatan_admin' => ['nullable', 'string', 'max:1000'],
        ];
    }

    /**
     * Pesan validasi bahasa Indonesia.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'status.required' => 'Keputusan status persetujuan wajib ditentukan.',
            'status.in' => 'Keputusan harus berupa disetujui atau ditolak.',
            'catatan_admin.max' => 'Catatan admin maksimal 1.000 karakter.',
        ];
    }
}
