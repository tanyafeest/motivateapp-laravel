<?php

namespace Tests\Feature;

use App\Http\Livewire\HeaderProfile;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class HeaderProfileLivewireTest extends TestCase
{
    use RefreshDatabase;

    public function testAlbumComponentRenders()
    {
        Livewire::test(HeaderProfile::class)
            ->assertSee('Lisa Smith'); // Replace with your component content

        // Add more assertions as needed
    }
}
