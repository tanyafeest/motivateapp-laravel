<?php

namespace Tests\Feature;

use App\Http\Livewire\Settings;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class SettingLivewireTest extends TestCase
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
        Livewire::test(Settings::class)->assertSee('View');
    }
}
