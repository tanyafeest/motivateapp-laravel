<?php

namespace Tests\Feature;

use App\Http\Livewire\Onboarding;
use Livewire\Livewire;
use Tests\TestCase;

class OnboardingLivewireTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        Livewire::test(Onboarding::class)->assertSee('How It Works');
    }
}
