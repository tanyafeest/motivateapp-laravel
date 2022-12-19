<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Onboarding extends Component
{
    public $currentMStep = 1;
    public $currentStep = 6;


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
        $this->currentStep = 6;
    }


    public function firstMStepSubmit()
    {
        $this->currentMStep = 2;
    }

    public function secondMStepSubmit()
    {
        $this->currentMStep = 3;
    }

    public function thirdMStepSubmit()
    {
        $this->currentMStep = 4;
    }

    public function fourthMStepSubmit()
    {
        $this->currentMStep = 5;
    }

    public function fifthMStepSubmit()
    {
        $this->currentMStep = 6;
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
