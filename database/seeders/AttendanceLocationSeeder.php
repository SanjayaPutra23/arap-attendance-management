<?php

namespace Database\Seeders;

use App\Models\AttendanceLocation;
use Illuminate\Database\Seeder;

class AttendanceLocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Lokasi default SPPG Kalisapu dibuat secara idempotent (firstOrCreate).
     * Dilarang menyentuh / menimpa tabel lama.
     */
    public function run(): void
    {
        AttendanceLocation::firstOrCreate(
            [
                'name' => 'SPPG Kalisapu',
            ],
            [
                'address' => 'Dapur SPPG Kalisapu, Kec. Slawi, Kab. Tegal, Jawa Tengah',
                // Koordinat awal titik sentral SPPG Kalisapu (dapat dikustomisasi admin di Phase 4/5)
                'latitude' => -6.9885000,
                'longitude' => 109.1378000,
                'radius_meters' => 100,
                'max_gps_accuracy_meters' => 50,
                'is_active' => true,
            ]
        );
    }
}
