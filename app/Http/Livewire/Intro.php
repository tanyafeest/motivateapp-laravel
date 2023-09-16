<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Intro extends Component
{
    public $layout;

    public $bg;

    public function render()
    {
        return view('livewire.intro');
    }
}
