<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreMesinRequest extends FormRequest
{
    /**
     * Tentukan apakah user memiliki hak akses menambah mesin.
     */
    public function authorize(): bool
    {
        return Gate::allows('umum');
    }

    /**
     * Aturan validasi penyimpanan mesin baru.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'tipe' => ['required', 'string', 'in:ip,usb'],
            'ip' => ['required_if:tipe,ip', 'nullable', 'ip'],
            'port' => ['required_if:tipe,ip', 'nullable', 'integer', 'between:1,65535'],
            'grup' => ['nullable', 'integer'],
        ];
    }

    /**
     * Pesan error validasi bahasa Indonesia.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama mesin fingerprint wajib diisi.',
            'tipe.required' => 'Tipe koneksi mesin (IP / USB) wajib dipilih.',
            'tipe.in' => 'Tipe koneksi harus berupa IP atau USB.',
            'ip.required_if' => 'Alamat IP wajib diisi jika tipe mesin adalah IP.',
            'ip.ip' => 'Format alamat IP tidak valid (contoh: 192.168.1.8).',
            'port.required_if' => 'Nomor Port wajib diisi jika tipe mesin adalah IP.',
            'port.integer' => 'Port harus berupa angka.',
            'port.between' => 'Nomor port harus berada di antara 1 dan 65535 (default: 4370).',
        ];
    }
}
