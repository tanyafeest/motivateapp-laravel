<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Inspiration;

class InspirationScreenShotControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_InspirationScreenShotController_Testing()
    {
        $this->actingAs(User::factory()->create());

        $this->markTestSkipped('');
        
        $inspiration = Inspiration::factory()->create();

        // Make a request to the controller's __invoke method
        $response = $this->get("/inspiration-screenshot/{$inspiration->id}"); // Adjust the URL as needed

        // Assert that the response has a successful status code
        $response->assertStatus(200);

        // Assert that the response contains the inspiration data
        $response->assertViewHas('inspiration', $inspiration);
    }
}
