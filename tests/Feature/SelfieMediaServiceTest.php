<?php

namespace Tests\Feature;

use App\Services\SelfieMediaService;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use InvalidArgumentException;
use Tests\TestCase;

class SelfieMediaServiceTest extends TestCase
{
    protected SelfieMediaService $service;

    protected function setUp(): void
    {
        parent::setUp();
        $this->service = new SelfieMediaService;
        Storage::fake('attendance_photos');
    }

    /**
     * Uji penyimpanan foto selfie valid ke private disk terkompresi dan ter-hash SHA-256.
     */
    public function test_store_selfie_with_valid_image(): void
    {
        // Buat berkas gambar JPEG valid menggunakan GD in-memory
        $img = imagecreatetruecolor(1000, 750);
        $bgColor = imagecolorallocate($img, 30, 58, 138); // ARAP Blue
        imagefill($img, 0, 0, $bgColor);

        ob_start();
        imagejpeg($img, null, 90);
        $rawBytes = (string) ob_get_clean();
        imagedestroy($img);

        $uploadedFile = UploadedFile::fake()->createWithContent('selfie.jpg', $rawBytes);

        $result = $this->service->storeSelfie($uploadedFile, 473, 'check_in');

        $this->assertSame('attendance_photos', $result['disk']);
        $this->assertSame('image/jpeg', $result['mime_type']);
        $this->assertNotEmpty($result['path']);
        $this->assertNotEmpty($result['sha256_hash']);
        $this->assertGreaterThan(0, $result['file_size_bytes']);

        // Verifikasi fisik file pada disk fake
        Storage::disk('attendance_photos')->assertExists($result['path']);

        $storedBytes = Storage::disk('attendance_photos')->get($result['path']);
        $this->assertSame($result['sha256_hash'], hash('sha256', $storedBytes));
        $this->assertSame($result['file_size_bytes'], strlen($storedBytes));

        // Verifikasi resize: lebar tidak boleh lebih dari MAX_WIDTH_PX (800)
        $savedImage = imagecreatefromstring($storedBytes);
        $this->assertNotFalse($savedImage);
        $this->assertLessThanOrEqual(800, imagesx($savedImage));
        imagedestroy($savedImage);
    }

    /**
     * Uji penolakan berkas non-gambar palsu (misal plain text berkedok foto).
     */
    public function test_store_selfie_with_fake_non_image_throws_exception(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Data berkas yang dikirim bukan format gambar valid.');

        $fakeFile = UploadedFile::fake()->createWithContent('fake.jpg', 'Ini bukan gambar biner valid');

        $this->service->storeSelfie($fakeFile, 473, 'check_in');
    }

    /**
     * Uji penolakan berkas kosong.
     */
    public function test_store_selfie_with_empty_file_throws_exception(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Berkas foto selfie kosong');

        $emptyFile = UploadedFile::fake()->createWithContent('empty.jpg', '');

        $this->service->storeSelfie($emptyFile, 473, 'check_in');
    }
}
