<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HeaderProfile extends Component
{
    public $text;

    public function render()
    {
        return view('livewire.header-profile');
    }
}
