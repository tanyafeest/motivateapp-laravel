<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\User;
use Tests\TestCase;


class PaymentSubScriptionControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->actingAs(User::factory()->create());

        $this->markTestSkipped('');

        $response = $this->get('/payment/subscription');

        $response->assertStatus(200);
    }
}
