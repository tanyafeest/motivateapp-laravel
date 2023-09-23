<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class QuotesSongs extends Component
{
    public function render()
    {
        abort_if(! Auth::user(), 404);

        return view('livewire.quotes-songs');
    }
}
