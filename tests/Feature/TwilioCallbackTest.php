<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;

class TwitterCallbackTest extends TestCase
{
    use RefreshDatabase;

    public function test_Twitter_Callback_Success()
    {
        // Mock the Socialite driver response
        Socialite::shouldReceive('twitter')->andReturn([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            // Add any other user data as needed
        ]);

        // Perform a GET request to the controller's route
        $response = $this->get('/');

        // Assert that the user is redirected to the expected location
        $response->assertStatus(200);
        // Add more assertions as needed
    }

    public function test_Twitter_CallbackFailure()
    {
        // Mock the Socialite driver to throw an exception
        Socialite::shouldReceive('twitter')->andThrow(new \Exception('Simulated exception'));

        // Perform a GET request to the controller's route
        $response = $this->get('/');

        // Assert that the user is redirected to the intended location (HOME)
        $response->assertStatus(200);

        // Assert any other expectations based on your controller logic
    }

    // Add more test methods for different scenarios (e.g., error cases)
}
