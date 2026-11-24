<?php

namespace Tests\Feature;

use App\Models\Libur;
use App\Models\Setting;
use DateTime;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SettingAndLiburHelperTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Uji helper Setting::getValue() membaca setting jam kerja.
     */
    public function test_setting_get_value_returns_configured_value_or_default(): void
    {
        Setting::create([
            'name' => 'jam_datang_officer',
            'value' => '08:00:00',
        ]);

        Setting::create([
            'name' => 'jam_pulang_officer',
            'value' => '17:00:00',
        ]);

        $this->assertSame('08:00:00', Setting::getValue('jam_datang_officer'));
        $this->assertSame('17:00:00', Setting::getValue('jam_pulang_officer'));

        // Default fallback ketika setting tidak ditemukan
        $this->assertSame('07:00:00', Setting::getValue('jam_datang_unknown', '07:00:00'));
        $this->assertNull(Setting::getValue('non_existent_key'));
    }

    /**
     * Uji helper Libur::isLibur() dan Libur::getKeterangan().
     */
    public function test_libur_helpers_identify_holidays_accurately(): void
    {
        Libur::create([
            'tanggal' => '2026-12-25',
            'ket' => 'Hari Raya Natal',
        ]);

        // Kasus legacy tanggal tanpa leading zero
        Libur::create([
            'tanggal' => '2026-6-1',
            'ket' => 'Hari Lahirnya Pancasila',
        ]);

        // Cek dengan string format Y-m-d
        $this->assertTrue(Libur::isLibur('2026-12-25'));
        $this->assertSame('Hari Raya Natal', Libur::getKeterangan('2026-12-25'));

        // Cek dengan instance DateTime
        $this->assertTrue(Libur::isLibur(new DateTime('2026-12-25')));

        // Cek varian tanggal tanpa leading zero vs zero-padded
        $this->assertTrue(Libur::isLibur('2026-06-01'));
        $this->assertTrue(Libur::isLibur('2026-6-1'));
        $this->assertSame('Hari Lahirnya Pancasila', Libur::getKeterangan('2026-06-01'));

        // Cek tanggal bukan hari libur
        $this->assertFalse(Libur::isLibur('2026-11-24'));
        $this->assertNull(Libur::getKeterangan('2026-11-24'));
    }
}
