<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InspirationControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_InspirationController_Test()
    {
        $response = $this->get('/inspiration');// Go to route with inspiration

        $response->assertStatus(302);//If it's success, Return 302 Http State code.
    }
}
