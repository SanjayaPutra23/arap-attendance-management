<?php

namespace App\Services;

use App\Models\AttendanceLocation;

class GeofencingService
{
    /**
     * Radius rata-rata bumi dalam meter (WGS84).
     */
    public const EARTH_RADIUS_METERS = 6371000.0;

    /**
     * Hitung jarak spasial antara 2 titik koordinat bumi dalam satuan meter
     * menggunakan formula Haversine akurat.
     *
     * @param  float  $lat1  Latitude titik awal
     * @param  float  $lng1  Longitude titik awal
     * @param  float  $lat2  Latitude titik kedua
     * @param  float  $lng2  Longitude titik kedua
     * @return float Jarak dalam meter
     */
    public function calculateDistanceMeters(float $lat1, float $lng1, float $lat2, float $lng2): float
    {
        $phi1 = deg2rad($lat1);
        $phi2 = deg2rad($lat2);
        $deltaPhi = deg2rad($lat2 - $lat1);
        $deltaLambda = deg2rad($lng2 - $lng1);

        $a = sin($deltaPhi / 2.0) ** 2 +
            cos($phi1) * cos($phi2) * (sin($deltaLambda / 2.0) ** 2);

        $c = 2.0 * atan2(sqrt($a), sqrt(1.0 - $a));

        return round(self::EARTH_RADIUS_METERS * $c, 2);
    }

    /**
     * Validasi lokasi presensi relawan terhadap titik sentral lokasi aktif dan batas akurasi GPS.
     *
     * @param  float  $lat  Latitude relawan dari GPS
     * @param  float  $lng  Longitude relawan dari GPS
     * @param  float  $accuracyMeters  Akurasi sensor GPS perangkat dalam meter
     * @param  AttendanceLocation|null  $location  Lokasi acuan (opsional, default: lokasi aktif pertama)
     * @return array{
     *     allowed: bool,
     *     distance_meters: float,
     *     max_radius_meters: int,
     *     accuracy_meters: float,
     *     max_accuracy_meters: int,
     *     reason: string|null,
     *     location: AttendanceLocation|null
     * }
     */
    public function validateLocation(
        float $lat,
        float $lng,
        float $accuracyMeters,
        ?AttendanceLocation $location = null
    ): array {
        $targetLocation = $location ?? AttendanceLocation::where('is_active', true)->first();

        if (! $targetLocation) {
            return [
                'allowed' => false,
                'distance_meters' => 0.0,
                'max_radius_meters' => 0,
                'accuracy_meters' => $accuracyMeters,
                'max_accuracy_meters' => 0,
                'reason' => 'Lokasi presensi aktif SPPG Kalisapu tidak ditemukan pada sistem.',
                'location' => null,
            ];
        }

        $maxRadius = (int) $targetLocation->radius_meters;
        $maxAccuracy = (int) $targetLocation->max_gps_accuracy_meters;

        // 1. Validasi akurasi GPS
        if ($accuracyMeters <= 0.0 || $accuracyMeters > (float) $maxAccuracy) {
            return [
                'allowed' => false,
                'distance_meters' => 0.0,
                'max_radius_meters' => $maxRadius,
                'accuracy_meters' => $accuracyMeters,
                'max_accuracy_meters' => $maxAccuracy,
                'reason' => "Akurasi GPS terlalu rendah ({$accuracyMeters} m). Maksimal yang diizinkan {$maxAccuracy} m. Mohon tunggu sinyal GPS stabil atau pindah ke area terbuka.",
                'location' => $targetLocation,
            ];
        }

        // 2. Hitung jarak Haversine
        $distance = $this->calculateDistanceMeters(
            $lat,
            $lng,
            (float) $targetLocation->latitude,
            (float) $targetLocation->longitude
        );

        // 3. Validasi radius geofence
        if ($distance > (float) $maxRadius) {
            return [
                'allowed' => false,
                'distance_meters' => $distance,
                'max_radius_meters' => $maxRadius,
                'accuracy_meters' => $accuracyMeters,
                'max_accuracy_meters' => $maxAccuracy,
                'reason' => "Anda berada di luar radius lokasi {$targetLocation->name} (jarak {$distance} m, batas radius {$maxRadius} m).",
                'location' => $targetLocation,
            ];
        }

        // 4. Lolos semua validasi
        return [
            'allowed' => true,
            'distance_meters' => $distance,
            'max_radius_meters' => $maxRadius,
            'accuracy_meters' => $accuracyMeters,
            'max_accuracy_meters' => $maxAccuracy,
            'reason' => null,
            'location' => $targetLocation,
        ];
    }
}
