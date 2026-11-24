<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UploadUsbLogRequest extends FormRequest
{
    /**
     * Tentukan apakah user memiliki hak akses mengunggah log USB.
     */
    public function authorize(): bool
    {
        return Gate::allows('umum');
    }

    /**
     * Aturan validasi file upload log USB .dat.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'filedata' => [
                'required',
                'file',
                'max:10240', // Maksimal 10 MB
                function ($attribute, $value, $fail) {
                    $ext = strtolower((string) $value->getClientOriginalExtension());
                    if (! in_array($ext, ['dat', 'txt'], true)) {
                        $fail('Berkas yang diunggah harus memiliki ekstensi .dat atau .txt standar ekspor USB ZKTeco.');
                    }
                },
            ],
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
            'filedata.required' => 'Silakan pilih berkas .dat hasil ekspor USB dari mesin ZKTeco.',
            'filedata.file' => 'Berkas yang diunggah tidak valid.',
            'filedata.max' => 'Ukuran berkas maksimal adalah 10 MB.',
        ];
    }
}
