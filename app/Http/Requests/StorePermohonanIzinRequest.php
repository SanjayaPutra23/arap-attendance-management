<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StorePermohonanIzinRequest extends FormRequest
{
    /**
     * Tentukan apakah user diizinkan mengajukan izin.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Aturan validasi pengajuan izin / sakit.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'jenis' => ['required', 'in:izin,sakit'],
            'tgl_mulai' => ['required', 'date'],
            'tgl_selesai' => ['required', 'date', 'after_or_equal:tgl_mulai'],
            'alasan' => ['required', 'string', 'max:1000'],
            'surat_dokter' => ['nullable', 'file', 'mimes:pdf,jpg,jpeg,png', 'max:3072'],
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
            'jenis.required' => 'Jenis permohonan (Izin atau Sakit) wajib dipilih.',
            'jenis.in' => 'Jenis permohonan harus berupa izin atau sakit.',
            'tgl_mulai.required' => 'Tanggal mulai izin wajib diisi.',
            'tgl_mulai.date' => 'Format tanggal mulai tidak valid.',
            'tgl_selesai.required' => 'Tanggal selesai izin wajib diisi.',
            'tgl_selesai.date' => 'Format tanggal selesai tidak valid.',
            'tgl_selesai.after_or_equal' => 'Tanggal selesai harus sama dengan atau setelah tanggal mulai.',
            'alasan.required' => 'Keterangan atau alasan izin wajib diisi.',
            'alasan.max' => 'Alasan maksimal 1.000 karakter.',
            'surat_dokter.file' => 'Lampiran bukti surat harus berupa file valid.',
            'surat_dokter.mimes' => 'Format file bukti harus berupa PDF, JPG, JPEG, atau PNG.',
            'surat_dokter.max' => 'Ukuran file bukti maksimal 3 MB.',
        ];
    }
}
