<?php

namespace App\Services;

use DateTimeInterface;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use InvalidArgumentException;

class SelfieMediaService
{
    /**
     * Nama disk penyimpanan foto selfie privat.
     */
    public const DISK_NAME = 'attendance_photos';

    /**
     * Lebar maksimal gambar hasil kompresi dalam piksel.
     */
    public const MAX_WIDTH_PX = 800;

    /**
     * Kualitas kompresi JPEG (0 - 100).
     */
    public const JPEG_QUALITY = 80;

    /**
     * Proses dan simpan berkas foto selfie ke private disk.
     *
     * @param  UploadedFile|string  $file  Berkas UploadedFile atau binary string gambar mentah
     * @param  int  $pesertaId  ID peserta pemilik foto
     * @param  string  $type  Jenis presensi ('check_in' atau 'check_out')
     * @param  DateTimeInterface|null  $capturedAt  Timestamp pengambilan foto (default now)
     * @return array{
     *     disk: string,
     *     path: string,
     *     mime_type: string,
     *     file_size_bytes: int,
     *     sha256_hash: string,
     *     captured_at: Carbon
     * }
     *
     * @throws InvalidArgumentException Jika format atau data berkas tidak valid
     */
    public function storeSelfie(
        UploadedFile|string $file,
        int $pesertaId,
        string $type,
        ?DateTimeInterface $capturedAt = null
    ): array {
        $captureTime = $capturedAt ? now()->setTimestamp($capturedAt->getTimestamp()) : now();

        // 1. Ambil raw content
        $rawContent = $file instanceof UploadedFile ? (string) file_get_contents($file->getRealPath()) : $file;

        if (empty($rawContent)) {
            throw new InvalidArgumentException('Berkas foto selfie kosong atau tidak terbaca.');
        }

        // 2. Validasi keabsahan data gambar via GD
        $imageResource = @imagecreatefromstring($rawContent);
        if ($imageResource === false) {
            throw new InvalidArgumentException('Data berkas yang dikirim bukan format gambar valid.');
        }

        // 3. Resize gambar jika lebar melebihi batas maksimal (MAX_WIDTH_PX)
        $origWidth = imagesx($imageResource);
        $origHeight = imagesy($imageResource);

        if ($origWidth > self::MAX_WIDTH_PX) {
            $newWidth = self::MAX_WIDTH_PX;
            $newHeight = (int) round(($origHeight / $origWidth) * $newWidth);

            $resizedResource = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresampled(
                $resizedResource,
                $imageResource,
                0,
                0,
                0,
                0,
                $newWidth,
                $newHeight,
                $origWidth,
                $origHeight
            );
            $finalResource = $resizedResource;
        } else {
            $finalResource = $imageResource;
        }

        // 4. Encode ke JPEG dengan kualitas 80% ke dalam buffer in-memory
        ob_start();
        imagejpeg($finalResource, null, self::JPEG_QUALITY);
        $compressedContent = (string) ob_get_clean();

        // Free GD memory
        if (isset($resizedResource) && is_resource($resizedResource)) {
            imagedestroy($resizedResource);
        }
        if (is_resource($imageResource)) {
            imagedestroy($imageResource);
        }

        if (empty($compressedContent)) {
            throw new InvalidArgumentException('Gagal melakukan kompresi data foto selfie.');
        }

        // 5. Susun path penyimpanan terstruktur
        $dateFolder = $captureTime->format('Y/m/d');
        $randomHash = Str::lower(Str::random(12));
        $timestamp = $captureTime->format('His');
        $sanitizedType = in_array($type, ['check_in', 'check_out'], true) ? $type : 'check_in';
        $filename = "peserta_{$pesertaId}_{$sanitizedType}_{$timestamp}_{$randomHash}.jpg";
        $relativePath = "{$dateFolder}/{$filename}";

        // 6. Simpan ke private disk
        Storage::disk(self::DISK_NAME)->put($relativePath, $compressedContent);

        // 7. Hitung metadata file
        $fileSizeBytes = strlen($compressedContent);
        $sha256Hash = hash('sha256', $compressedContent);

        return [
            'disk' => self::DISK_NAME,
            'path' => $relativePath,
            'mime_type' => 'image/jpeg',
            'file_size_bytes' => $fileSizeBytes,
            'sha256_hash' => $sha256Hash,
            'captured_at' => $captureTime,
        ];
    }
}
