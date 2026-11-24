<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePesertaRequest extends FormRequest
{
    /**
     * Tentukan apakah user memiliki otoritas menambah pegawai/relawan.
     */
    public function authorize(): bool
    {
        return Gate::allows('umum');
    }

    /**
     * Aturan validasi pembuatan data pegawai.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:50', 'unique:pesertas,nik'],
            'uid' => ['nullable', 'integer', 'unique:pesertas,uid'],
            'jabatan' => ['required', 'string', 'max:100'],
            'type' => ['nullable', 'string', 'max:50'],
            'telp' => ['nullable', 'string', 'max:50'],

            // Akun Login Pengguna Opsional
            'create_account' => ['nullable', 'boolean'],
            'email' => ['required_if:create_account,1', 'nullable', 'string', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required_if:create_account,1', 'nullable', 'string', 'min:6'],
            'role' => ['nullable', 'string', 'exists:roles,name'],
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
            'name.required' => 'Nama lengkap pegawai wajib diisi.',
            'nik.required' => 'Nomor Induk Kependudukan (NIK) wajib diisi.',
            'nik.unique' => 'NIK ini sudah terdaftar di sistem.',
            'uid.integer' => 'Nomor UID mesin harus berupa bilangan bulat.',
            'uid.unique' => 'Nomor UID mesin ini sudah dipakai oleh peserta lain.',
            'jabatan.required' => 'Divisi atau jabatan pegawai wajib dipilih.',
            'email.required_if' => 'Alamat email akun login wajib diisi jika membuat akun.',
            'email.unique' => 'Alamat email ini sudah terdaftar untuk pengguna lain.',
            'password.required_if' => 'Password login wajib diisi jika membuat akun.',
            'password.min' => 'Password minimal 6 karakter.',
        ];
    }

    /**
     * Normalisasi input sebelum validasi.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('create_account')) {
            $this->merge([
                'create_account' => filter_var($this->input('create_account'), FILTER_VALIDATE_BOOLEAN),
            ]);
        }
    }
}
