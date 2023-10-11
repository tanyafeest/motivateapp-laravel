<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PaymentSubScriptionCancelControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_PaymentSubScription_Cancel_Testing()
    {

        $this->actingAs(User::factory()->create());

        $this->markTestSkipped('');

        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
