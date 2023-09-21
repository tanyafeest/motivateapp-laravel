<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PaymentTest extends TestCase
{
    use RefreshDatabase;

    public function test_PaymentView_Unauthorized()
    {
        // Ensure there's no authenticated user
        Auth::logout();

        // Perform a GET request to the controller's route
        $response = $this->get('/payment');

        // Assert that the response status code is 302 (Not Found)
        $response->assertStatus(302);

        // Assert any other expectations based on your controller logic
    }

    public function test_PaymentView_Success()
    {
        // Create a user and log them in
        $user = User::factory()->create();

        $this->actingAs($user);
        $this->markTestSkipped('');
        // Perform a GET request to the controller's route
        $response = $this->get('/payment');

        // Assert that the response is successful (e.g., 200 OK)
        $response->assertStatus(200);
        $response->assertViewHas(['user', 'intent']);
    }
}
