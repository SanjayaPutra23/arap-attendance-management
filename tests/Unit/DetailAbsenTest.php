<?php

namespace Tests\Unit;

use App\Models\DetailAbsen;
use PHPUnit\Framework\TestCase;

class DetailAbsenTest extends TestCase
{
    /**
     * Uji parsing format string legacy presensi {tanggal}_{libur}_{jam_masuk}_{jam_pulang}&
     */
    public function test_parse_presensi_entries_with_valid_legacy_string(): void
    {
        $detailAbsen = new DetailAbsen;
        $raw = '2026-10-12_0_07:33:28_18:46:29&2026-10-13_0_07:39:06_18:47:25&2026-10-14_0_07:35:12_19:14:04&';

        $entries = $detailAbsen->parsePresensiEntries($raw);

        $this->assertCount(3, $entries);

        $this->assertSame('2026-10-12', $entries[0]['tanggal']);
        $this->assertSame(0, $entries[0]['libur']);
        $this->assertFalse($entries[0]['is_libur']);
        $this->assertSame('07:33:28', $entries[0]['jam_masuk']);
        $this->assertSame('18:46:29', $entries[0]['jam_pulang']);

        $this->assertSame('2026-10-13', $entries[1]['tanggal']);
        $this->assertSame('07:39:06', $entries[1]['jam_masuk']);
        $this->assertSame('18:47:25', $entries[1]['jam_pulang']);
    }

    /**
     * Uji parsing ketika jam masuk / pulang bernilai 0 (tidak hadir / tidak absen).
     */
    public function test_parse_presensi_entries_with_zero_times(): void
    {
        $detailAbsen = new DetailAbsen;
        $raw = '2026-10-15_0_0_0&2026-10-16_0_07:15:00_0&2026-10-17_1_0_0&';

        $entries = $detailAbsen->parsePresensiEntries($raw);

        $this->assertCount(3, $entries);

        // Kasus 1: jam masuk dan pulang bernilai 0
        $this->assertSame('2026-10-15', $entries[0]['tanggal']);
        $this->assertNull($entries[0]['jam_masuk']);
        $this->assertNull($entries[0]['jam_pulang']);
        $this->assertFalse($entries[0]['is_libur']);

        // Kasus 2: hanya check-in (jam pulang 0)
        $this->assertSame('2026-10-16', $entries[1]['tanggal']);
        $this->assertSame('07:15:00', $entries[1]['jam_masuk']);
        $this->assertNull($entries[1]['jam_pulang']);

        // Kasus 3: hari libur (libur = 1)
        $this->assertSame('2026-10-17', $entries[2]['tanggal']);
        $this->assertSame(1, $entries[2]['libur']);
        $this->assertTrue($entries[2]['is_libur']);
    }

    /**
     * Uji parsing dengan input kosong atau null.
     */
    public function test_parse_presensi_entries_with_empty_or_null(): void
    {
        $detailAbsen = new DetailAbsen;

        $this->assertSame([], $detailAbsen->parsePresensiEntries(''));
        $this->assertSame([], $detailAbsen->parsePresensiEntries(null));
        $this->assertSame([], $detailAbsen->parsePresensiEntries('   '));
    }
}
