<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;

class DashboardControllerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_DashboardController_Test()
    {
        $this->actingAs(User::factory()->create());

        $response = $this->get('/dashboard'); // the controller return Redirection URLs

        $response->assertStatus(200); //So the HTTP state code is 200 if it's OK,

    }
}
