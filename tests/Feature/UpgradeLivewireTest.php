<?php

namespace Tests\Feature;

use App\Http\Livewire\Upgrade;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

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
        $this->markTestSkipped('');
        Livewire::test(Upgrade::class)->assertSee('Upgrade');
    }
}
