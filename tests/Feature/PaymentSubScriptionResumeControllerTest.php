<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;

class PaymentSubScriptionResumeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_PaymentSubScriptionResumeController_Testing()
    {
        $this->actingAs(User::factory()->create());

        $this->markTestSkipped('');

        $response->assertStatus(200);
    }
}
