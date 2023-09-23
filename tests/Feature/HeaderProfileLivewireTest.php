<?php

namespace Tests\Feature;

use App\Http\Livewire\HeaderProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class HeaderProfileLivewireTest extends TestCase
{
    use RefreshDatabase;

    public function testAlbumComponentRenders()
    {
        $user = User::factory()->create();
        Auth::login($user);
        Livewire::test(HeaderProfile::class)
            ->assertSee('Account'); // Replace with your component content

        // Add more assertions as needed
    }
}
