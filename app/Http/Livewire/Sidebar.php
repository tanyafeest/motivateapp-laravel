<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Sidebar extends Component
{
    public function render()
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc

        return view('livewire.sidebar');
    }
}
