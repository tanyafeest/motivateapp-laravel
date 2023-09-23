<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HeaderProfile extends Component
{
    public $text;

    public function render()
    {
        abort_if(! Auth::user(), 404);

        return view('livewire.header-profile');
    }
}
