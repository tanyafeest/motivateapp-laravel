<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Onboarding extends Component
{
    public $currentStep = 1;

    public function firstStepSubmit()
    {
        $this->currentStep = 2;
    }

    public function back($step)
    {
        $this->currentStep = $step;
    }


    public function render()
    {
        return view('livewire.onboarding')
            ->layout('layouts.guest');
    }
}
