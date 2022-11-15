<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Button extends Component
{

    public $isFilled;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($isFilled)
    {
        $this->isFilled = $isFilled;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button');
    }
}
