<?php

namespace Tests\Feature;

use App\Http\Livewire\Album;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class AlbumTest extends TestCase
{
    use RefreshDatabase;

    public function testAlbumComponentRenders()
    {
        Livewire::test(Album::class)
            ->assertSee('Stronger'); // Replace with your component content

        // Add more assertions as needed
    }

    // Add more test methods as needed
}
