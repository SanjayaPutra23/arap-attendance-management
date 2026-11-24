<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UpdatePesertaRequest extends FormRequest
{
    /**
     * Tentukan apakah user memiliki otoritas memperbarui data pegawai.
     */
    public function authorize(): bool
    {
        return Gate::allows('umum');
    }

    /**
     * Aturan validasi pembaruan pegawai.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $pesertaId = $this->route('pegawai') ?? $this->route('peserta');
        if (is_object($pesertaId)) {
            $pesertaId = $pesertaId->id;
        }

        return [
            'name' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:50', Rule::unique('pesertas', 'nik')->ignore($pesertaId)],
            'uid' => ['nullable', 'integer', Rule::unique('pesertas', 'uid')->ignore($pesertaId)],
            'jabatan' => ['required', 'string', 'max:100'],
            'type' => ['nullable', 'string', 'max:50'],
            'telp' => ['nullable', 'string', 'max:50'],

            // Pengelolaan Akun Pengguna Terkait
            'manage_account' => ['nullable', 'boolean'],
            'email' => ['nullable', 'string', 'email', 'max:255'],
            'password' => ['nullable', 'string', 'min:6'],
            'role' => ['nullable', 'string', 'exists:roles,name'],
        ];
    }

    /**
     * Pesan error validasi.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama lengkap pegawai wajib diisi.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.unique' => 'NIK ini sudah digunakan oleh pegawai lain.',
            'uid.integer' => 'UID mesin harus berupa bilangan bulat.',
            'uid.unique' => 'UID mesin ini sudah digunakan oleh pegawai lain.',
            'jabatan.required' => 'Divisi atau jabatan pegawai wajib diisi.',
            'password.min' => 'Password minimal 6 karakter jika ingin diubah.',
        ];
    }

    /**
     * Normalisasi input.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('manage_account')) {
            $this->merge([
                'manage_account' => filter_var($this->input('manage_account'), FILTER_VALIDATE_BOOLEAN),
            ]);
        }
    }
}
