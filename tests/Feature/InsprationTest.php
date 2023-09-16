<?php

namespace Tests\Feature;

use Tests\TestCase;

class InsprationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/inspiration'); // the controller return Redirection URLs

        $response->assertStatus(302); //So the HTTP state code is 202 if it's OK,
    }
}
