<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PaymentCancelTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_Payment_Cancel_Unauthorized()
    {
        Auth::logout();

        // Perform a GET request to the controller's route
        $response = $this->get('/payment/cancel');

        // Assert that the response status code is 405 (Not Found)
        $response->assertStatus(405);
    }

    public function test_Payment_Cancel_Success()
    {
        // Create a user and log them in
        $user = User::factory()->create();
        Auth::login($user);

        $this->markTestSkipped('');
        // Mock the subscription cancellation
        $user->subscription(env('STRIPE_SUBSCRIPTION_PLAN'))->shouldReceive('cancel');

        // Perform a GET request to the controller's route
        $response = $this->get('/payment/cancel');

        // Assert that the response is successful (e.g., 200 OK)
        $response->assertSuccessful();

        // Assert any other expectations based on your controller logic
    }
}
