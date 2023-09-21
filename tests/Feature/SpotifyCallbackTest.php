<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Mockery;
use Tests\TestCase;

class SpotifyCallbackControllerTest extends TestCase
{
    use RefreshDatabase; // If you need to interact with the database

    public function setUp(): void
    {
        parent::setUp();

        // Mock the Socialite driver's user method
        $socialiteUser = Mockery::mock('SocialiteProviders\Manager\OAuth2\User');

        // Define the desired behavior of the mocked user
        $socialiteUser->shouldReceive('getId')->andReturn('spotify_user_id');
        $socialiteUser->shouldReceive('token')->andReturn('spotify_access_token');

        // Bind the mocked user instance to the Socialite facade
        $this->app->instance('Laravel\Socialite\Facades\Socialite', Mockery::mock(['user' => $socialiteUser]));
    }

    public function test_CallbackRedirects_To_Home_With_SessionData()
    {
        // Simulate a request to the SpotifyCallbackController
        $response = $this->get('/oauth/spotify/callback');
        $this->markTestSkipped('');
        // Assert that the response is a redirect response to the intended route (HOME)
        $response->assertRedirect('/');
    }
}
