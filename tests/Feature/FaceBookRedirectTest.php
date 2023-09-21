<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Redirect;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;

class FaceBookRedirectTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testFacebookredirect()
    {
        // Mock the Socialite driver to simulate the redirect
        Socialite::shouldReceive('facebook')->andReturn(
            Redirect::to('/')
        );
        $this->markTestSkipped('');
        // Perform a GET request to the controller's route
        $response = $this->get('/oauth/facebook');

        // Assert that the response is a redirect response
        $response->assertStatus(302);

        // Assert that the response redirects to the expected URL
        $response->assertRedirect('/');
    }
}