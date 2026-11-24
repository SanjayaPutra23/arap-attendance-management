<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateAttendanceLocationRequest extends FormRequest
{
    /**
     * Tentukan apakah user berwenang memperbarui lokasi geofence.
     */
    public function authorize(): bool
    {
        return Gate::allows('umum');
    }

    /**
     * Aturan validasi pembaruan lokasi geofence.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:150'],
            'address' => ['nullable', 'string', 'max:255'],
            'latitude' => ['required', 'numeric', 'between:-90,90'],
            'longitude' => ['required', 'numeric', 'between:-180,180'],
            'radius_meters' => ['required', 'integer', 'min:10', 'max:5000'],
            'max_gps_accuracy_meters' => ['required', 'integer', 'min:10', 'max:1000'],
            'is_active' => ['nullable', 'boolean'],
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
            'name.required' => 'Nama lokasi wajib diisi.',
            'latitude.required' => 'Koordinat Latitude wajib diisi.',
            'latitude.numeric' => 'Latitude harus berupa angka numerik valid.',
            'latitude.between' => 'Latitude harus berada dalam rentang -90 hingga 90 derajat.',
            'longitude.required' => 'Koordinat Longitude wajib diisi.',
            'longitude.numeric' => 'Longitude harus berupa angka numerik valid.',
            'longitude.between' => 'Longitude harus berada dalam rentang -180 hingga 180 derajat.',
            'radius_meters.required' => 'Radius geofence wajib diisi.',
            'radius_meters.integer' => 'Radius geofence harus berupa bilangan bulat.',
            'radius_meters.min' => 'Radius minimal adalah 10 meter.',
            'radius_meters.max' => 'Radius maksimal adalah 5.000 meter.',
            'max_gps_accuracy_meters.required' => 'Batas toleransi akurasi GPS wajib diisi.',
            'max_gps_accuracy_meters.integer' => 'Toleransi akurasi GPS harus berupa bilangan bulat.',
            'max_gps_accuracy_meters.min' => 'Toleransi akurasi minimal 10 meter.',
            'max_gps_accuracy_meters.max' => 'Toleransi akurasi maksimal 1.000 meter.',
        ];
    }

    /**
     * Persiapkan input sebelum validasi.
     */
    protected function prepareForValidation(): void
    {
        if ($this->has('is_active')) {
            $this->merge([
                'is_active' => filter_var($this->input('is_active'), FILTER_VALIDATE_BOOLEAN),
            ]);
        }
    }
}
