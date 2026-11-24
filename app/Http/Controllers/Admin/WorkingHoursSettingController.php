<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UpdateWorkingHoursRequest;
use App\Models\Peserta;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class WorkingHoursSettingController extends Controller
{
    /**
     * Metadata divisi kerja untuk tampilan form.
     *
     * @var array<string, array{label: string, default_in: string, default_out: string}>
     */
    public const DIVISION_METADATA = [
        'officer' => [
            'label' => 'Officer SPPG',
            'description' => 'Penanggung Jawab & Pengawas Operasional Harian',
            'default_in' => '08:00:00',
            'default_out' => '17:00:00',
        ],
        'persiapan' => [
            'label' => 'Divisi Persiapan',
            'description' => 'Persiapan bahan baku dan logistik dapur (Shift Malam)',
            'default_in' => '19:00:00',
            'default_out' => '03:00:00',
        ],
        'pengolahan' => [
            'label' => 'Divisi Pengolahan',
            'description' => 'Memasak dan produksi makanan utama (Shift Dini Hari)',
            'default_in' => '23:00:00',
            'default_out' => '07:00:00',
        ],
        'pemorsian' => [
            'label' => 'Divisi Pemorsian',
            'description' => 'Penimbangan dan pemorsian menu makanan',
            'default_in' => '02:00:00',
            'default_out' => '10:00:00',
        ],
        'distribusi' => [
            'label' => 'Divisi Distribusi',
            'description' => 'Pengiriman dan serah terima paket makanan',
            'default_in' => '06:00:00',
            'default_out' => '14:00:00',
        ],
        'kebersihan' => [
            'label' => 'Divisi Kebersihan',
            'description' => 'Sanitasi dan pembersihan area operasional SPPG',
            'default_in' => '08:00:00',
            'default_out' => '15:00:00',
        ],
        'security' => [
            'label' => 'Divisi Security',
            'description' => 'Pengamanan area dan pos jaga SPPG Kalisapu',
            'default_in' => '07:00:00',
            'default_out' => '19:00:00',
        ],
        'ompreng' => [
            'label' => 'Divisi Ompreng',
            'description' => 'Pencucian, sterilisasi, dan penataan ompreng',
            'default_in' => '13:00:00',
            'default_out' => '21:00:00',
        ],
    ];

    /**
     * Tampilkan form pengaturan jam kerja divisi dan Officer.
     */
    public function index(): View
    {
        $divisionSettings = [];

        foreach (self::DIVISION_METADATA as $key => $meta) {
            $jamDatang = Setting::getValue("jam_datang_{$key}", $meta['default_in']);
            $jamPulang = Setting::getValue("jam_pulang_{$key}", $meta['default_out']);

            // Hitung jumlah peserta aktif pada divisi ini
            $pesertaCount = Peserta::where(function ($q) use ($key) {
                if ($key === 'security') {
                    $q->whereIn(DB::raw('LOWER(jabatan)'), ['security', 'scurity']);
                } else {
                    $q->whereRaw('LOWER(jabatan) = ?', [$key]);
                }
            })->count();

            $divisionSettings[$key] = [
                'key' => $key,
                'label' => $meta['label'],
                'description' => $meta['description'],
                'jam_datang' => $jamDatang,
                'jam_pulang' => $jamPulang,
                'peserta_count' => $pesertaCount,
            ];
        }

        return view('admin.settings.working-hours', [
            'divisions' => $divisionSettings,
        ]);
    }

    /**
     * Perbarui pengaturan jam kerja (hanya mengupdate key jam_datang dan jam_pulang).
     */
    public function update(UpdateWorkingHoursRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $hoursData = $validated['hours'] ?? [];

        foreach ($hoursData as $divisionKey => $times) {
            if (! in_array($divisionKey, UpdateWorkingHoursRequest::ALLOWED_DIVISIONS, true)) {
                continue;
            }

            $jamDatang = $this->formatTimeString($times['jam_datang']);
            $jamPulang = $this->formatTimeString($times['jam_pulang']);

            Setting::updateOrCreate(
                ['name' => "jam_datang_{$divisionKey}"],
                ['value' => $jamDatang]
            );

            Setting::updateOrCreate(
                ['name' => "jam_pulang_{$divisionKey}"],
                ['value' => $jamPulang]
            );
        }

        return redirect()->route('admin.settings.working-hours.index')
            ->with('success', 'Jadwal jam kerja divisi dan Officer berhasil disimpan.');
    }

    /**
     * Pastikan format waktu adalah HH:MM:SS.
     */
    private function formatTimeString(string $time): string
    {
        $time = trim($time);
        if (preg_match('/^([01]?[0-9]|2[0-3]):[0-5][0-9]$/', $time)) {
            return $time.':00';
        }

        return $time;
    }
}
