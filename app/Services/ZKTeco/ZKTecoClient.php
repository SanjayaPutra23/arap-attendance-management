<?php

declare(strict_types=1);

namespace App\Services\ZKTeco;

use RuntimeException;
use Socket;
use Throwable;

class ZKTecoClient implements ZKTecoClientInterface
{
    public const USHRT_MAX = 65535;

    public const CMD_CONNECT = 1000;

    public const CMD_EXIT = 1001;

    public const CMD_ENABLE_DEVICE = 1002;

    public const CMD_DISABLE_DEVICE = 1003;

    public const CMD_DEVICE = 11;

    public const CMD_ATTLOG_RRQ = 13;

    public const CMD_PREPARE_DATA = 1500;

    public const CMD_DATA = 1501;

    public const CMD_FREE_DATA = 1502;

    public const CMD_ACK_OK = 2000;

    public const CMD_ACK_ERROR = 2001;

    public const CMD_ACK_DATA = 2002;

    public const CMD_ACK_UNAUTH = 2005;

    protected ?Socket $socket = null;

    protected string $ip = '';

    protected int $port = 4370;

    protected int $timeoutSeconds = 4;

    protected int $sessionId = 0;

    protected int $replyId = 65534;

    protected string $receivedData = '';

    protected bool $connected = false;

    /**
     * Membuka koneksi UDP ke mesin absensi ZKTeco.
     */
    public function connect(string $ip, int $port = 4370, int $timeoutSeconds = 4): bool
    {
        $this->ensureSocketsExtensionLoaded();

        $this->ip = $ip;
        $this->port = $port;
        $this->timeoutSeconds = $timeoutSeconds;
        $this->sessionId = 0;
        $this->replyId = self::USHRT_MAX - 1;
        $this->receivedData = '';
        $this->connected = false;

        $sock = @socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
        if ($sock === false) {
            return false;
        }

        $this->socket = $sock;

        $timeout = ['sec' => $this->timeoutSeconds, 'usec' => 0];
        @socket_set_option($this->socket, SOL_SOCKET, SO_RCVTIMEO, $timeout);
        @socket_set_option($this->socket, SOL_SOCKET, SO_SNDTIMEO, $timeout);

        $command = self::CMD_CONNECT;
        $buf = self::createHeader($command, 0, 0, $this->replyId, '');

        $sent = @socket_sendto($this->socket, $buf, strlen($buf), 0, $this->ip, $this->port);
        if ($sent === false) {
            $this->disconnect();

            return false;
        }

        try {
            $from = '';
            $fromPort = 0;
            $read = @socket_recvfrom($this->socket, $this->receivedData, 1024, 0, $from, $fromPort);

            if ($read === false || strlen($this->receivedData) < 8) {
                $this->disconnect();

                return false;
            }

            $u = unpack('H2h1/H2h2/H2h3/H2h4/H2h5/H2h6', substr($this->receivedData, 0, 8));
            if ($u === false) {
                $this->disconnect();

                return false;
            }

            $session = hexdec($u['h6'].$u['h5']);
            if (empty($session)) {
                $this->disconnect();

                return false;
            }

            $this->sessionId = $session;
            $this->connected = self::checkValidReply($this->receivedData);

            if (! $this->connected) {
                $this->disconnect();
            }

            return $this->connected;
        } catch (Throwable) {
            $this->disconnect();

            return false;
        }
    }

    /**
     * Menutup koneksi UDP dan melepaskan resource socket.
     */
    public function disconnect(): void
    {
        if ($this->connected && $this->socket !== null) {
            try {
                $u = unpack('H2h1/H2h2/H2h3/H2h4/H2h5/H2h6/H2h7/H2h8', substr($this->receivedData, 0, 8));
                $replyId = ($u !== false && isset($u['h8'], $u['h7'])) ? hexdec($u['h8'].$u['h7']) : 0;
                $buf = self::createHeader(self::CMD_EXIT, 0, $this->sessionId, $replyId, '');
                @socket_sendto($this->socket, $buf, strlen($buf), 0, $this->ip, $this->port);
            } catch (Throwable) {
                // Abaikan error saat disconnect
            }
        }

        if ($this->socket !== null) {
            @socket_close($this->socket);
            $this->socket = null;
        }

        $this->connected = false;
        $this->sessionId = 0;
        $this->receivedData = '';
    }

    /**
     * Memeriksa status koneksi aktif.
     */
    public function isConnected(): bool
    {
        return $this->connected && $this->socket !== null;
    }

    /**
     * Mengambil nama perangkat mesin absensi jika tersedia.
     */
    public function getDeviceName(): ?string
    {
        if (! $this->isConnected()) {
            return null;
        }

        $res = $this->sendCommand(self::CMD_DEVICE, '~DeviceName');
        if ($res === false || ! is_string($res)) {
            return null;
        }

        $clean = trim(str_replace(chr(0), '', $res));
        if (str_starts_with($clean, '~DeviceName=')) {
            $clean = substr($clean, 12);
        }

        return $clean !== '' ? $clean : null;
    }

    /**
     * Mengambil seluruh catatan log presensi yang tersimpan di mesin.
     *
     * @return list<array{
     *     uid: int,
     *     iduser: int|string,
     *     state: int,
     *     timestamp: string,
     *     type: int
     * }>
     */
    public function getAttendanceLogs(): array
    {
        if (! $this->isConnected()) {
            return [];
        }

        $session = $this->sendCommand(self::CMD_ATTLOG_RRQ, '', true);
        if ($session === false) {
            return [];
        }

        $rawStream = $this->receiveData();
        if ($rawStream === '' || strlen($rawStream) < 40) {
            return [];
        }

        // 4 bytes pertama setelah header data awal adalah offset
        $attData = substr($rawStream, 10);
        $attendance = [];

        while (strlen($attData) >= 40) {
            $chunk = substr($attData, 0, 40);
            $parsed = self::parseAttendanceRecord($chunk);
            if ($parsed !== null) {
                $attendance[] = $parsed;
            }
            $attData = substr($attData, 40);
        }

        // Kirim perintah free data untuk membersihkan buffer mesin
        try {
            $this->sendCommand(self::CMD_FREE_DATA);
        } catch (Throwable) {
            // Non-kritis
        }

        return $attendance;
    }

    /**
     * Mengirim paket perintah ke mesin absensi ZKTeco.
     */
    protected function sendCommand(int $command, string $payload = '', bool $isData = false): string|int|false
    {
        if (! $this->isConnected()) {
            return false;
        }

        $u = unpack('H2h1/H2h2/H2h3/H2h4/H2h5/H2h6/H2h7/H2h8', substr($this->receivedData, 0, 8));
        $replyId = ($u !== false && isset($u['h8'], $u['h7'])) ? hexdec($u['h8'].$u['h7']) : 0;

        $buf = self::createHeader($command, 0, $this->sessionId, $replyId, $payload);
        $sent = @socket_sendto($this->socket, $buf, strlen($buf), 0, $this->ip, $this->port);
        if ($sent === false) {
            return false;
        }

        try {
            $from = '';
            $fromPort = 0;
            $read = @socket_recvfrom($this->socket, $this->receivedData, 1024, 0, $from, $fromPort);
            if ($read === false || strlen($this->receivedData) < 8) {
                return false;
            }

            $u = unpack('H2h1/H2h2/H2h3/H2h4/H2h5/H2h6', substr($this->receivedData, 0, 8));
            if ($u === false) {
                return false;
            }

            $session = hexdec($u['h6'].$u['h5']);

            if (! $isData && $this->sessionId === $session) {
                return substr($this->receivedData, 8);
            }

            if ($isData && ! empty($session)) {
                return $session;
            }

            return false;
        } catch (Throwable) {
            return false;
        }
    }

    /**
     * Menerima aliran data biner dari mesin (multi-packet stream).
     */
    protected function receiveData(int $maxErrors = 5): string
    {
        if (! $this->isConnected()) {
            return '';
        }

        $size = self::getSize($this->receivedData);
        if ($size === false || $size <= 0) {
            return '';
        }

        $data = '';
        $received = 0;
        $errors = 0;
        $first = true;

        while ($size > $received) {
            $dataRec = '';
            $from = '';
            $fromPort = 0;
            $ret = @socket_recvfrom($this->socket, $dataRec, 1032, 0, $from, $fromPort);

            if ($ret === false) {
                $errors++;
                if ($errors >= $maxErrors) {
                    return '';
                }
                usleep(50000); // 50ms wait

                continue;
            }

            if (! $first) {
                $dataRec = substr($dataRec, 8);
            }

            $data .= $dataRec;
            $received += strlen($dataRec);
            $first = false;
        }

        // Flush socket buffer
        $flush = '';
        $from = '';
        $fromPort = 0;
        @socket_recvfrom($this->socket, $flush, 1024, 0, $from, $fromPort);

        return $data;
    }

    /**
     * Validasi ketersediaan ekstensi PHP sockets.
     */
    protected function ensureSocketsExtensionLoaded(): void
    {
        if (! extension_loaded('sockets') || ! function_exists('socket_create')) {
            throw new RuntimeException(
                "Ekstensi PHP 'sockets' tidak aktif di server. Aktifkan 'extension=sockets' pada file php.ini Anda."
            );
        }
    }

    /**
     * Membuat header paket UDP ZKTeco 8-byte lengkap dengan Checksum.
     */
    public static function createHeader(int $command, int $chksum, int $sessionId, int $replyId, string $payload = ''): string
    {
        $buf = pack('SSSS', $command, $chksum, $sessionId, $replyId).$payload;
        $bytes = unpack('C'.(8 + strlen($payload)).'c', $buf);
        if ($bytes === false) {
            return $buf;
        }

        $chksumVal = self::createChecksum($bytes);
        $replyId = ($replyId + 1) % self::USHRT_MAX;

        return pack('SSSS', $command, $chksumVal, $sessionId, $replyId).$payload;
    }

    /**
     * Perhitungan Checksum biner ZKTeco 16-bit.
     *
     * @param  array<string, int>  $p
     */
    public static function createChecksum(array $p): int
    {
        $l = count($p);
        $chksum = 0;
        $i = $l;
        $j = 1;

        while ($i > 1) {
            $c1 = $p['c'.$j] ?? 0;
            $c2 = $p['c'.($j + 1)] ?? 0;
            $u = unpack('S', pack('C2', $c1, $c2));
            if ($u !== false) {
                $chksum += $u[1];
                if ($chksum > self::USHRT_MAX) {
                    $chksum -= self::USHRT_MAX;
                }
            }
            $i -= 2;
            $j += 2;
        }

        if ($i > 0) {
            $chksum += ($p['c'.$l] ?? 0);
        }

        while ($chksum > self::USHRT_MAX) {
            $chksum -= self::USHRT_MAX;
        }

        $chksum = $chksum > 0 ? -$chksum : abs($chksum);
        $chksum -= 1;

        while ($chksum < 0) {
            $chksum += self::USHRT_MAX;
        }

        return $chksum;
    }

    /**
     * Memeriksa apakah balasan paket mengembalikan status sukses (CMD_ACK_OK atau CMD_ACK_UNAUTH).
     */
    public static function checkValidReply(string $reply): bool
    {
        if (strlen($reply) < 8) {
            return false;
        }

        $u = unpack('H2h1/H2h2', substr($reply, 0, 8));
        if ($u === false) {
            return false;
        }

        $cmd = hexdec($u['h2'].$u['h1']);

        return $cmd === self::CMD_ACK_OK || $cmd === self::CMD_ACK_UNAUTH;
    }

    /**
     * Mendapatkan ukuran total data yang akan dikirim perangkat.
     */
    public static function getSize(string $reply): int|false
    {
        if (strlen($reply) < 12) {
            return false;
        }

        $u = unpack('H2h1/H2h2', substr($reply, 0, 4));
        if ($u === false) {
            return false;
        }

        $cmd = hexdec($u['h2'].$u['h1']);
        if ($cmd !== self::CMD_PREPARE_DATA) {
            return false;
        }

        $sizeUnpack = unpack('H2h1/H2h2/H2h3/H2h4', substr($reply, 8, 4));
        if ($sizeUnpack === false) {
            return false;
        }

        return hexdec($sizeUnpack['h4'].$sizeUnpack['h3'].$sizeUnpack['h2'].$sizeUnpack['h1']);
    }

    /**
     * Membalik pasangan hex (little-endian swap).
     */
    public static function reverseHex(string $hex): string
    {
        $tmp = '';
        for ($i = strlen($hex) - 2; $i >= 0; $i -= 2) {
            $tmp .= substr($hex, $i, 2);
        }

        return $tmp;
    }

    /**
     * Mendekode integer timestamp ZKTeco menjadi format 'Y-m-d H:i:s'.
     */
    public static function decodeTime(int $t): string
    {
        $second = $t % 60;
        $t = (int) ($t / 60);

        $minute = $t % 60;
        $t = (int) ($t / 60);

        $hour = $t % 24;
        $t = (int) ($t / 24);

        $day = ($t % 31) + 1;
        $t = (int) ($t / 31);

        $month = ($t % 12) + 1;
        $t = (int) ($t / 12);

        $year = (int) (floor($t + 2000));

        return sprintf('%04d-%02d-%02d %02d:%02d:%02d', $year, $month, $day, $hour, $minute, $second);
    }

    /**
     * Melakukan parsing 40-byte satu record absensi dari ZKTeco.
     *
     * @return array{uid: int, iduser: string, state: int, timestamp: string, type: int}|null
     */
    public static function parseAttendanceRecord(string $chunk): ?array
    {
        if (strlen($chunk) < 39) {
            return null;
        }

        $u = unpack('H78', substr($chunk, 0, 39));
        if ($u === false || ! isset($u[1])) {
            return null;
        }

        $hex = $u[1];
        if (strlen($hex) < 70) {
            return null;
        }

        $u1 = hexdec(substr($hex, 4, 2));
        $u2 = hexdec(substr($hex, 6, 2));
        $uid = $u1 + ($u2 * 256);

        $idRaw = hex2bin(substr($hex, 8, 18));
        $id = $idRaw !== false ? trim(str_replace(chr(0), '', $idRaw)) : (string) $uid;
        if ($id === '') {
            $id = (string) $uid;
        }

        $state = hexdec(substr($hex, 56, 2));

        $timeHex = self::reverseHex(substr($hex, 58, 8));
        $timestamp = self::decodeTime(hexdec($timeHex));

        $type = hexdec(self::reverseHex(substr($hex, 66, 2)));

        return [
            'uid' => $uid,
            'iduser' => $id,
            'state' => $state,
            'timestamp' => $timestamp,
            'type' => $type,
        ];
    }
}
