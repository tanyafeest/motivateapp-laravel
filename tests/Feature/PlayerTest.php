<?php

namespace Tests\Feature;

use Tests\TestCase;

class PlayerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/player'); // the controller return Redirection URLs

        $response->assertStatus(302); //So the HTTP state code is 202 if it's OK,
    }
}
