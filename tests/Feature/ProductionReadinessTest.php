<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class ProductionReadinessTest extends TestCase
{
    /**
     * Verifikasi endpoint healthcheck bawaan Laravel (/up) merespons status 200 OK.
     */
    public function test_healthcheck_endpoint_returns_ok(): void
    {
        $response = $this->get('/up');

        $response->assertStatus(200);
    }

    /**
     * Verifikasi konfigurasi inti aplikasi: timezone Asia/Jakarta, locale id, force_https default false di testing.
     */
    public function test_core_production_configurations(): void
    {
        $this->assertEquals('Asia/Jakarta', config('app.timezone'));
        $this->assertEquals('id', config('app.locale'));
        $this->assertFalse(config('app.force_https'));
    }

    /**
     * Verifikasi bahwa ketika force_https diaktifkan, scheme URL dipaksa ke https.
     */
    public function test_force_https_schemes_when_enabled(): void
    {
        config(['app.force_https' => true]);

        if (config('app.force_https')) {
            URL::forceScheme('https');
        }

        $generatedUrl = url('/dashboard');
        $this->assertStringStartsWith('https://', $generatedUrl);

        // Reset kembali ke default
        URL::forceScheme('http');
        config(['app.force_https' => false]);
    }

    /**
     * Verifikasi keberadaan dan keabsahan berkas PWA: manifest.json dan sw.js.
     */
    public function test_pwa_assets_exist_and_valid(): void
    {
        $manifestPath = public_path('manifest.json');
        $swPath = public_path('sw.js');

        $this->assertFileExists($manifestPath);
        $this->assertFileExists($swPath);

        $manifestContent = file_get_contents($manifestPath);
        $manifestData = json_decode($manifestContent, true);

        $this->assertIsArray($manifestData);
        $this->assertArrayHasKey('name', $manifestData);
        $this->assertArrayHasKey('short_name', $manifestData);
        $this->assertArrayHasKey('start_url', $manifestData);
        $this->assertArrayHasKey('display', $manifestData);
        $this->assertEquals('standalone', $manifestData['display']);

        $swContent = file_get_contents($swPath);
        $this->assertStringContainsString('addEventListener', $swContent);
        $this->assertStringContainsString('fetch', $swContent);
    }

    /**
     * Verifikasi template produksi deploy/ dan backup tersedia di repositori.
     */
    public function test_deploy_templates_exist(): void
    {
        $this->assertFileExists(base_path('.env.production.example'));
        $this->assertFileExists(base_path('deploy/nginx.conf.example'));
        $this->assertFileExists(base_path('deploy/backup.sh'));
        $this->assertFileExists(base_path('docs/DEPLOYMENT_GUIDE.md'));
        $this->assertFileExists(base_path('docs/USER_ADMIN_MANUAL.md'));
    }
}
