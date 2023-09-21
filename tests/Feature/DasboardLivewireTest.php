<?php

namespace Tests\Feature;

use App\Http\Livewire\Dashboard;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class DasboardLivewireTest extends TestCase
{
    use RefreshDatabase;

    public function testDasboardComponentRenders()
    {

        $user = User::factory()->create();
        Auth::login($user);
        $this->markTestSkipped('');
        Livewire::test(Dashboard::class)
            ->assertSee('Received'); // Replace with your component content

        // Add more assertions as needed
    }

    // Add more test methods as needed
}
