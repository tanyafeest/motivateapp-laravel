<?php

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PublicTest extends TestCase
{
    use RefreshDatabase; // If you need to interact with the database

    // Define any setup or teardown methods as needed

    public function testRedirectWithShareLink()
    {
        $this->markTestSkipped('');
        // Define the share link and optional full name
        $shareLink = 'example-share-link';
        $fullName = 'John Doe'; // You can set this to null if you want to test without a full name

        // Perform a GET request to the controller's route
        $response = $this->get('/public/'.$shareLink.'/'.$fullName);

        // Assert that the response is a redirect response
        $response->assertRedirect();

        // Assert that the session contains the expected values
        $this->assertEquals($shareLink, session('temp_inspiration_share_link'));
        $this->assertEquals($fullName, session('temp_inspiration_full_name'));

        // Assert that the redirect URL matches the intended route
        $response->assertRedirect(route('register'));
    }
}
