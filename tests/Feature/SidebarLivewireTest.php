<?php

namespace Tests\Feature;

use App\Http\Livewire\Sidebar;
use Livewire\Livewire;
use Tests\TestCase;

class SidebarLivewireTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Livewire::test(Sidebar::class)->assertSee('');
    }
}
