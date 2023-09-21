
<?php
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class PaymentSubscriptionTest extends TestCase
{
    use RefreshDatabase; // If you need to interact with the database

    // Define any setup or teardown methods as needed

    public function test_Subscription_Unauthorized()
    {
        // Ensure there's no authenticated user
        Auth::logout();

        // Perform a POST request to the controller's route
        $response = $this->post('/payment-subscription', [
            'payment_method' => 'payment_method_token', // Replace with an actual token
        ]);

        // Assert that the response status code is 404 (Not Found)
        $response->assertStatus(404);

        // Assert any other expectations based on your controller logic
    }

    public function test_Subscription_Success()
    {
        // Create a user and log them in
        $user = User::factory()->create();
        Auth::login($user);

        $this->markTestSkipped('');
        // Perform a POST request to the controller's route with a valid payment method token
        $response = $this->post('/payment-subscription', [
            'payment_method' => 'payment_method_token', // Replace with an actual token
        ]);

        // Assert that the response is a redirect response
        $response->assertRedirect();

        // Assert any other expectations based on your controller logic
    }

    public function test_Subscription_Error()
    {
        // Create a user and log them in
        $user = User::factory()->create();
        Auth::login($user);

        // Mock Stripe API calls to simulate an error (e.g., using a testing library like Stripe Mock)
        // For example, you can use the "stripe/stripe-mock" library to simulate Stripe behavior

        // Perform a POST request to the controller's route
        $this->markTestSkipped('need actual token');

        $response = $this->post('/payment-subscription', [
            'payment_method' => 'payment_method_token', // Replace with an actual token
        ]);

        // Assert that the response is a redirect response with errors
        $response->assertRedirect()->assertSessionHasErrors(['message']);

        // Assert any other expectations based on your controller logic
    }
}
