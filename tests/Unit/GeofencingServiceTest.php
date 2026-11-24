<?php

namespace Tests\Unit;

use App\Models\AttendanceLocation;
use App\Services\GeofencingService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GeofencingServiceTest extends TestCase
{
    use RefreshDatabase;

    protected GeofencingService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new GeofencingService;
    }

    /**
     * Uji rumus Haversine menghitung jarak spasial dengan akurat.
     */
    public function test_calculate_distance_meters_is_accurate(): void
    {
        // Titik 1: Monas Jakarta (-6.1753924, 106.8271528)
        // Titik 2: Bundaran HI (-6.1950000, 106.8230000)
        // Jarak matematis: ~2.22 km (2220 meter)
        $distance = $this->service->calculateDistanceMeters(
            -6.1753924,
            106.8271528,
            -6.1950000,
            106.8230000
        );

        $this->assertGreaterThan(2100.0, $distance);
        $this->assertLessThan(2300.0, $distance);

        // Jarak titik yang sama harus 0
        $this->assertSame(0.0, $this->service->calculateDistanceMeters(-6.9885, 109.1378, -6.9885, 109.1378));
    }

    /**
     * Uji validasi lokasi dalam radius dan akurasi GPS baik: diterima (allowed = true).
     */
    public function test_validate_location_within_radius_is_allowed(): void
    {
        $location = new AttendanceLocation([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        // Berjarak ~15 meter dari titik sentral, akurasi 12 meter
        $result = $this->service->validateLocation(
            -6.9886000,
            109.1378500,
            12.0,
            $location
        );

        $this->assertTrue($result['allowed']);
        $this->assertNull($result['reason']);
        $this->assertLessThan(100.0, $result['distance_meters']);
        $this->assertSame(12.0, $result['accuracy_meters']);
    }

    /**
     * Uji validasi lokasi di luar radius geofence: ditolak (allowed = false).
     */
    public function test_validate_location_outside_radius_is_rejected(): void
    {
        $location = new AttendanceLocation([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        // Berjarak ~550 meter (di luar radius 100m)
        $result = $this->service->validateLocation(
            -6.9835000,
            109.1378000,
            15.0,
            $location
        );

        $this->assertFalse($result['allowed']);
        $this->assertNotNull($result['reason']);
        $this->assertStringContainsString('di luar radius', $result['reason']);
        $this->assertGreaterThan(100.0, $result['distance_meters']);
    }

    /**
     * Uji akurasi GPS di atas batas toleransi: ditolak (allowed = false).
     */
    public function test_validate_location_with_poor_gps_accuracy_is_rejected(): void
    {
        $location = new AttendanceLocation([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        // Posisi persis di pusat, namun akurasi GPS buruk (85 meter > batas 50 meter)
        $result = $this->service->validateLocation(
            -6.9885000,
            109.1378000,
            85.0,
            $location
        );

        $this->assertFalse($result['allowed']);
        $this->assertNotNull($result['reason']);
        $this->assertStringContainsString('Akurasi GPS terlalu rendah', $result['reason']);
    }

    /**
     * Uji akurasi GPS bernilai 0 atau negatif: ditolak.
     */
    public function test_validate_location_with_zero_or_negative_accuracy_is_rejected(): void
    {
        $location = new AttendanceLocation([
            'name' => 'SPPG Kalisapu',
            'latitude' => -6.9885000,
            'longitude' => 109.1378000,
            'radius_meters' => 100,
            'max_gps_accuracy_meters' => 50,
            'is_active' => true,
        ]);

        $result = $this->service->validateLocation(
            -6.9885000,
            109.1378000,
            0.0,
            $location
        );

        $this->assertFalse($result['allowed']);
        $this->assertStringContainsString('Akurasi GPS terlalu rendah', $result['reason']);
    }

    /**
     * Uji ketika tidak ada lokasi aktif yang ditemukan: ditolak.
     */
    public function test_validate_location_without_location_returns_error(): void
    {
        $result = $this->service->validateLocation(-6.9885, 109.1378, 10.0, null);

        $this->assertFalse($result['allowed']);
        $this->assertStringContainsString('tidak ditemukan', $result['reason']);
    }
}
