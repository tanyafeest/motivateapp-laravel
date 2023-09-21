<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;

class GoogleRedirectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testGoogle_redirect()
    {
        // Mock the Socialite driver to simulate the redirect
        Socialite::shouldReceive('google')->andReturn(
            Redirect::to('/')
        );
        $this->markTestSkipped('');
        // Perform a GET request to the controller's route
        $response = $this->get('/oauth/google');

        // Assert that the response is a redirect response
        $response->assertStatus(302);

        // Assert that the response redirects to the expected URL
        $response->assertRedirect('/');
    }
}
