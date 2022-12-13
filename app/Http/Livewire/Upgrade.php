<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PaymentController;

class Upgrade extends Component
{
    public $isSubscribed;
    public $isCanceled;
    public $isEnded;

    // initialzie state
    public function mount()
    {
        $this->updateStatus();
    }

    // cancel subscription
    public function cancel()
    {
        PaymentController::cancel();
        $this->updateStatus();
    }

    // resume subscription
    public function resume()
    {
        PaymentController::resume();
        $this->updateStatus();
    }

    public function updateStatus()
    {
        $user = Auth::user();

        $this->isSubscribed = $user->isSubscribed();
        $this->isCanceled = $user->isCanceled();
        $this->isEnded = $user->isEnded();
    }

    public function render()
    {
        return view('livewire.upgrade');
    }
}
