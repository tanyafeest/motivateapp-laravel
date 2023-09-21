<?php

namespace Tests\Feature;

use Tests\TestCase;

class InspirationTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/inspiration');

        $response->assertStatus(302);
    }
}
