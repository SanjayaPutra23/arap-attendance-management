<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreMobileAttendanceRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type' => ['required', 'string', 'in:check_in,check_out'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
            'accuracy' => ['required', 'numeric', 'gt:0'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,jpg,png,webp', 'max:5120'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'type.required' => 'Jenis presensi (check-in / check-out) wajib dipilih.',
            'type.in' => 'Jenis presensi tidak valid.',
            'latitude.required' => 'Koordinat latitude GPS wajib tersedia.',
            'longitude.required' => 'Koordinat longitude GPS wajib tersedia.',
            'accuracy.required' => 'Akurasi GPS wajib tersedia.',
            'accuracy.gt' => 'Akurasi GPS harus bernilai lebih besar dari 0 meter.',
            'photo.required' => 'Foto selfie kamera langsung wajib diambil.',
            'photo.file' => 'Berkas foto tidak valid.',
            'photo.image' => 'Berkas yang dikirim harus berupa format gambar.',
            'photo.mimes' => 'Format gambar harus berupa JPEG, PNG, atau WebP.',
            'photo.max' => 'Ukuran berkas foto selfie maksimal 5 MB.',
        ];
    }
}
