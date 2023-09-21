<?php

namespace Tests\Feature;

use App\Http\Livewire\Nav;
use Livewire\Livewire;
use Tests\TestCase;

class NavLivewireTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Livewire::test(Nav::class)->assertSee('');
    }
}
