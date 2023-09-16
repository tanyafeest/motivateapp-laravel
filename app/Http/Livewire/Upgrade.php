<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PaymentCancelController;
use App\Http\Controllers\PaymentResumeController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Upgrade extends Component
{
    public $isSubscribed;

    public $isCancelled;

    public $isEnded;

    public function mount()
    {
        $this->updateStatus();
    }

    public function cancel()
    {
        new PaymentCancelController();
        $this->updateStatus();
    }

    public function resume()
    {
        new PaymentResumeController();
        $this->updateStatus();
    }

    public function updateStatus()
    {
        $user = Auth::user();

        $this->isSubscribed = $user->isSubscribed();
        $this->isCancelled = $user->isCancelled();
        $this->isEnded = $user->isEnded();
    }

    public function render()
    {
        return view('livewire.upgrade');
    }
}
