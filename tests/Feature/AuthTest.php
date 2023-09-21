<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_view_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }
}
