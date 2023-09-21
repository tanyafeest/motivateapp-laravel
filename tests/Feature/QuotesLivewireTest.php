<?php

namespace Tests\Feature;

use App\Http\Livewire\QuotesSongs;
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
        Livewire::test(QuotesSongs::class)->assertSee('Quotes');
    }
}
