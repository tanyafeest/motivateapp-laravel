<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Quote;

class Onboarding extends Component
{
    public $randomConfidenceQuote = null;
    public $randomPotentialQuote = null;
    public $randomDeterminationQuote = null;
    public $randomResilienceQuote = null;


    // mount
    public function mount()
    {
        $this->randomConfidenceQuote = Quote::inRandomOrder()->confidence()->first();
        $this->randomPotentialQuote = Quote::inRandomOrder()->potential()->first();
    }

    // render
    public function render()
    {
        return view('livewire.onboarding');
    }
}
