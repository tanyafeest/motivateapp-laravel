<?php

namespace Tests\Feature;

use Tests\TestCase;

class OAuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/oauth');

        $response->assertSee('MotiveMob');
    }
}
