<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase; // If you need to interact with the database

    public function testRedirectToOauthIfSessionDataIsMissing()
    {
        // Simulate a request to the RegisterController without session data
        $response = $this->get('/register');

        // Assert that the response is a redirect response
        $response->assertRedirect('/oauth');
    }

    public function testViewIsRenderedWithSportsData()
    {
        // Set session data to simulate a user being authenticated
        session(['temp_name' => 'John', 'temp_email' => 'john@example.com']);

        // Simulate a request to the RegisterController with session data
        $response = $this->get('/register');

        // Assert that the response is a view response
        $response->assertViewIs('auth.register');

        // Assert that the view has the 'sports' variable
        $response->assertViewHas('sports');

        // You can add additional assertions here based on your requirements
    }
}
