<?php

namespace Tests\Feature;

use App\Http\Livewire\QuotesSongs;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Livewire;
use Tests\TestCase;

class QuotesLivewireTest extends TestCase
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
        Livewire::test(QuotesSongs::class)->assertSee('Quotes');
    }
}
