<?php

namespace Tests\Feature;

use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * Root url redirects to dashboard.
     */
    public function test_the_application_redirects_root_to_dashboard(): void
    {
        $response = $this->get('/');

        $response->assertStatus(302);
        $response->assertRedirect('/dashboard');
    }
}
