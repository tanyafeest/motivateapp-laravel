<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Http\Livewire\Upgrade;
use Livewire\Livewire;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpgradeLivewireTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::factory()->create();
        Auth::login($user);
        $this->markTestSkipped("");
        Livewire::test(Upgrade::class)->assertSee('Upgrade');
    }
}
