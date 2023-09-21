<?php

namespace Tests\Feature;

use App\Http\Controllers\TwilioWebhookController;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Request;
use Tests\TestCase;

class TwilioWebhookControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testReceiveSMSWithYesResponse()
    {
        $this->markTestSkipped('');
        // Create a user with a specific phone number
        $user = User::factory()->create([
            'phone' => '+1234567890', // Replace with the user's phone number
        ]);

        // Create a request object with the desired message content and phone number
        $request = new Request([
            'Body' => 'Yes', // Replace with the desired message content
            'From' => '+1234567890', // Replace with the user's phone number
        ]);

        // Create an instance of the TwilioWebhookController
        $controller = new TwilioWebhookController();

        // Call the receiveSMS method with the request
        $controller->receiveSMS($request);

        // Assert that the user's sms_frequency has been updated
        $this->assertEquals(1, $user->setting->sms_frequency);

        // Add more assertions as needed
    }

    // Add more test methods for different scenarios (e.g., 'No' response, unsubscribe response, etc.)
}
