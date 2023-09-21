<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TwitterRedirectControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testRedirectToTwitterOAuth()
    {
        $response = $this->get('/oauth/twitter'); // Replace with the actual route

        $response->assertStatus(302); // Expecting a redirect response
    }

    // Add more test methods as needed
}
