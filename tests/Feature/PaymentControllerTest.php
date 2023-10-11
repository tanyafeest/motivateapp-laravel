<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PaymentControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_PaymentController_Testing()
    {
        $this->actingAs(User::factory()->create());
        $this->markTestSkipped('');
        
        $response = $this->get('/payment');

        $response->assertStatus(200);
    }
}
