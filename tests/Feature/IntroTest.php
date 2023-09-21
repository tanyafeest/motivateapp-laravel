<?php

namespace Tests\Feature;

use App\Http\Livewire\Intro;
use Livewire\Livewire;
use Tests\TestCase;

class IntroTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Livewire::test(Intro::class)
            ->assertSee('');
    }
}
