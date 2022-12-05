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

    public function secondStepSubmit()
    {
        $this->currentStep = 3;
    }

    public function thirdStepSubmit()
    {
        $this->currentStep = 4;
    }

    public function fourthStepSubmit()
    {
        $this->currentStep = 5;
    }

    public function fifthStepSubmit()
    {
        $this->currentStep = 6;
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
