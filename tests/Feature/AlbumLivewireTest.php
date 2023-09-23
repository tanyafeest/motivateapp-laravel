<?php

namespace Tests\Feature;

use App\Http\Livewire\Album;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class AlbumTest extends TestCase
{
    use RefreshDatabase;

    public function testAlbumComponentRenders()
    {
        $user = User::factory()->create();
        Auth::login($user);
        Livewire::test(Album::class)
            ->assertSee('Stronger'); // Replace with your component content
        // Add more assertions as needed
    }

    // Add more test methods as needed
}
