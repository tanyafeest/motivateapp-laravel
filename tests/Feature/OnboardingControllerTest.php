<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class OnboardingControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_OnboardingController_Testing()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/inspiration/onboarding');

        $response->assertStatus(302);
    }
}
