<?php

declare(strict_types=1);

namespace Tests\Unit;

use App\Services\ZKTeco\ZKTecoClient;
use PHPUnit\Framework\TestCase;

class ZKTecoClientTest extends TestCase
{
    /**
     * Test 1: Verifikasi fungsi decodeTime ZKTeco.
     */
    public function test_decode_time_correctly_formats_timestamp(): void
    {
        // Sample encoded timestamp: 2026-11-24 15:30:45
        // Menghitung encodeTime sesuai rumus ZKTeco
        $year = 2026;
        $month = 11;
        $day = 24;
        $hour = 15;
        $minute = 30;
        $second = 45;

        $encoded = (($year % 100) * 12 * 31 + (($month - 1) * 31) + $day - 1) *
            (24 * 60 * 60) + ($hour * 60 + $minute) * 60 + $second;

        $decoded = ZKTecoClient::decodeTime($encoded);
        $this->assertEquals('2026-11-24 15:30:45', $decoded);
    }

    /**
     * Test 2: Verifikasi fungsi reverseHex (little-endian byte swap).
     */
    public function test_reverse_hex_swaps_byte_pairs(): void
    {
        $hex = '12345678';
        $reversed = ZKTecoClient::reverseHex($hex);
        $this->assertEquals('78563412', $reversed);

        $shortHex = '0001';
        $this->assertEquals('0100', ZKTecoClient::reverseHex($shortHex));
    }

    /**
     * Test 3: Verifikasi pembuatan header paket UDP ZKTeco.
     */
    public function test_create_header_creates_valid_8_byte_header(): void
    {
        $command = ZKTecoClient::CMD_CONNECT;
        $sessionId = 0;
        $replyId = 65534;
        $payload = '';

        $header = ZKTecoClient::createHeader($command, 0, $sessionId, $replyId, $payload);

        $this->assertEquals(8, strlen($header));

        $u = unpack('Scommand/Schecksum/Ssession/Sreply', $header);
        $this->assertIsArray($u);
        $this->assertEquals($command, $u['command']);
        $this->assertEquals($sessionId, $u['session']);
        // Checksum tidak boleh nol setelah dihitung
        $this->assertGreaterThan(0, $u['checksum']);
    }

    /**
     * Test 4: Verifikasi validasi reply paket (checkValidReply).
     */
    public function test_check_valid_reply(): void
    {
        // CMD_ACK_OK = 2000 (0x07D0 -> little endian: D0 07)
        $ackOkPacket = pack('SSSS', ZKTecoClient::CMD_ACK_OK, 0, 10, 1);
        $this->assertTrue(ZKTecoClient::checkValidReply($ackOkPacket));

        // CMD_ACK_UNAUTH = 2005 (0x07D5 -> little endian: D5 07)
        $ackUnauthPacket = pack('SSSS', ZKTecoClient::CMD_ACK_UNAUTH, 0, 10, 1);
        $this->assertTrue(ZKTecoClient::checkValidReply($ackUnauthPacket));

        // CMD_ACK_ERROR = 2001
        $ackErrorPacket = pack('SSSS', ZKTecoClient::CMD_ACK_ERROR, 0, 10, 1);
        $this->assertFalse(ZKTecoClient::checkValidReply($ackErrorPacket));

        // Packet terlalu pendek (< 8 bytes)
        $this->assertFalse(ZKTecoClient::checkValidReply('short'));
    }

    /**
     * Test 5: Verifikasi ekstraksi ukuran buffer data (getSize).
     */
    public function test_get_size_extracts_data_length(): void
    {
        // CMD_PREPARE_DATA = 1500, size = 400 bytes
        $size = 400;
        $packet = pack('SSSS', ZKTecoClient::CMD_PREPARE_DATA, 0, 1, 1).pack('V', $size);

        $extractedSize = ZKTecoClient::getSize($packet);
        $this->assertEquals(400, $extractedSize);

        // Bukan CMD_PREPARE_DATA
        $otherPacket = pack('SSSS', ZKTecoClient::CMD_ACK_OK, 0, 1, 1).pack('V', $size);
        $this->assertFalse(ZKTecoClient::getSize($otherPacket));
    }

    /**
     * Test 6: Verifikasi parsing biner 40-byte satu record absensi.
     */
    public function test_parse_attendance_record_extracts_correct_fields(): void
    {
        // Konstruksi dummy 40-byte log presensi
        // uid = 101, iduser = "101", state = 1, timestamp = 2026-11-24 07:45:00, type = 0
        $encodedTime = ZKTecoClientTest::calculateEncodedTime(2026, 11, 24, 7, 45, 0);

        // 4 bytes header dummy: 00 00 65 00 (uid=101)
        // 9 bytes (18 hex chars) id: "101\0\0\0\0\0\0"
        // state = 1 (fingerprint)
        // timestamp = 4 bytes
        // type = 0 (check-in)

        $hex = '0000'.'6500'; // u1=0x65(101), u2=0x00 -> uid=101
        $hex .= bin2hex(str_pad('101', 9, chr(0))); // 18 hex chars (bytes 4..12)
        $hex .= str_repeat('00', 15); // 15 bytes padding (bytes 13..27) -> offset 56 hex
        $hex .= '01'; // state = 1 (offset 56..57)
        $hexTime = sprintf('%08x', $encodedTime);
        $hexTimeReversed = ZKTecoClient::reverseHex($hexTime);
        $hex .= $hexTimeReversed; // timestamp (offset 58..65)
        $hex .= '00'; // type = 0 (offset 66..67)
        $hex .= str_repeat('00', 6); // 6 bytes padding -> 40 bytes total

        $binaryChunk = hex2bin($hex);
        $this->assertNotFalse($binaryChunk);

        $record = ZKTecoClient::parseAttendanceRecord($binaryChunk);
        $this->assertNotNull($record);
        $this->assertEquals(101, $record['uid']);
        $this->assertEquals('101', $record['iduser']);
        $this->assertEquals(1, $record['state']);
        $this->assertEquals('2026-11-24 07:45:00', $record['timestamp']);
        $this->assertEquals(0, $record['type']);
    }

    public static function calculateEncodedTime(int $year, int $month, int $day, int $hour, int $minute, int $second): int
    {
        return (($year % 100) * 12 * 31 + (($month - 1) * 31) + $day - 1) *
            (24 * 60 * 60) + ($hour * 60 + $minute) * 60 + $second;
    }
}
