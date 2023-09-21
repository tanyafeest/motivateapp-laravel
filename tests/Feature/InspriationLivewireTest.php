<?php

namespace Tests\Feature;

use App\Http\Livewire\Inspiration;
use Livewire\Livewire;
use Tests\TestCase;

class InspriationLivewireTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->markTestSkipped('');
        Livewire::test(Inspiration::class)
            ->assertSee('Rockstar');
    }
}
