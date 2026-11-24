<?php

namespace App\Http\Requests\Admin;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateWorkingHoursRequest extends FormRequest
{
    /**
     * Divisi / Jabatan yang diizinkan untuk diatur jam kerjanya.
     *
     * @var list<string>
     */
    public const ALLOWED_DIVISIONS = [
        'officer',
        'persiapan',
        'pengolahan',
        'pemorsian',
        'distribusi',
        'kebersihan',
        'security',
        'ompreng',
    ];

    /**
     * Tentukan apakah user berwenang mengubah pengaturan jam kerja.
     */
    public function authorize(): bool
    {
        return Gate::allows('umum');
    }

    /**
     * Aturan validasi pengaturan jam kerja.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'hours' => ['required', 'array'],
            'hours.*' => ['array'],
            'hours.*.jam_datang' => [
                'required',
                'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/',
            ],
            'hours.*.jam_pulang' => [
                'required',
                'regex:/^([01]?[0-9]|2[0-3]):[0-5][0-9](:[0-5][0-9])?$/',
            ],
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
            'hours.required' => 'Data jam kerja per divisi wajib dikirim.',
            'hours.array' => 'Format payload jam kerja tidak valid.',
            'hours.*.jam_datang.required' => 'Jam datang wajib diisi.',
            'hours.*.jam_datang.regex' => 'Format jam datang harus HH:MM atau HH:MM:SS (contoh: 08:00 atau 08:00:00).',
            'hours.*.jam_pulang.required' => 'Jam pulang wajib diisi.',
            'hours.*.jam_pulang.regex' => 'Format jam pulang harus HH:MM atau HH:MM:SS (contoh: 17:00 atau 17:00:00).',
        ];
    }

    /**
     * Normalisasi input form (mendukung array 'hours' maupun input flat).
     */
    protected function prepareForValidation(): void
    {
        $hours = $this->input('hours');

        // Jika user submit input flat: jam_datang_{divisi} dan jam_pulang_{divisi}
        if (! is_array($hours)) {
            $structured = [];
            foreach (self::ALLOWED_DIVISIONS as $divisi) {
                $datang = $this->input("jam_datang_{$divisi}");
                $pulang = $this->input("jam_pulang_{$divisi}");

                if ($datang !== null || $pulang !== null) {
                    $structured[$divisi] = [
                        'jam_datang' => $datang,
                        'jam_pulang' => $pulang,
                    ];
                }
            }

            if (! empty($structured)) {
                $this->merge(['hours' => $structured]);
            }
        }
    }
}
