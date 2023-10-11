<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Socialite\Facades\Socialite;
use Tests\TestCase;

class facebookCallbackControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_FacebookCallbackController_Testing_Success()
    {
        Socialite::shouldReceive('facebook')->andReturn([
            'id' => 1,
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            // Add any other user data as needed
        ]);

        // Perform a GET request to the Home controller's route 
        $response = $this->get('/');

        // Assert that the user is redirected to the expected location
        $response->assertSee('Select');
    }

    public function test_FacebookCallbackController_Testing_Failure()
    {
         // Mock the Socialite driver to throw an exception
         Socialite::shouldReceive('facebook')->andThrow(new \Exception('Simulated exception'));

         // Perform a GET request to the controller's route
         $response = $this->get('/');
 
         // Assert that the user is redirected to the intended location (HOME)
         $response->assertSee('Select');
    }
}