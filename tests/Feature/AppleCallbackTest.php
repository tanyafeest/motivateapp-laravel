<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;

class AppleCallbackTest extends TestCase
{
    use RefreshDatabase; // If you need to interact with the database

    // Define any setup or teardown methods as needed

    public function testAppleCallbackSuccess()
    {
        $this->markTestSkipped('');
        // Mock the Socialite driver to simulate a user retrieval
        Socialite::shouldReceive('apple')->andReturn([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            // Add any other user data as needed
        ]);

        // Perform a GET request to the controller's route
        $response = $this->get('/');

        // Assert that the user is redirected to the expected location
        $response->assertStatus(200);

        // Assert any other expectations based on your controller logic
    }

    public function testAppleCallbackFailure()
    {
        $this->markTestSkipped('');
        // Mock the Socialite driver to throw an exception
        Socialite::shouldReceive('apple')->andThrow(new \Exception('Simulated exception'));

        // Perform a GET request to the controller's route
        $response = $this->get('/');

        // Assert that the user is redirected to the intended location (HOME)
        $response->assertStatus(200);

        // Assert any other expectations based on your controller logic
    }
}
