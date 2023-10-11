<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OAuthControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_OAuthController_Testing()
    {
        $this->markTestSkipped('');

        $response = $this->get('/oauth');

        $response->assertStatus(200);
    }
}
