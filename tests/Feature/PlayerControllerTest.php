<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class PlayerControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_PlayerController_Testing()
    {
        $this->actingAs(User::factory()->create());

        $this->markTestSkipped('');

        $response = $this->get('/player');
        
        

        $response->assertStatus(200);
    }
}
