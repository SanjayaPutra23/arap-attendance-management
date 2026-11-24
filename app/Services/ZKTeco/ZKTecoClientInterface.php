<?php

declare(strict_types=1);

namespace App\Services\ZKTeco;

interface ZKTecoClientInterface
{
    /**
     * Membuka koneksi UDP ke mesin absensi ZKTeco.
     *
     * @param  string  $ip  Alamat IP perangkat
     * @param  int  $port  Port UDP (default 4370)
     * @param  int  $timeoutSeconds  Batas waktu komunikasi dalam detik (default 4 detik)
     * @return bool True jika berhasil terkoneksi
     */
    public function connect(string $ip, int $port = 4370, int $timeoutSeconds = 4): bool;

    /**
     * Menutup koneksi UDP dan melepaskan resource socket.
     */
    public function disconnect(): void;

    /**
     * Memeriksa apakah socket saat ini dalam keadaan terkoneksi.
     */
    public function isConnected(): bool;

    /**
     * Mengambil nama perangkat mesin absensi jika tersedia.
     */
    public function getDeviceName(): ?string;

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
    public function getAttendanceLogs(): array;
}
