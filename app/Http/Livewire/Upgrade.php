<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Auth;
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
        PaymentController::cancel();
        $this->updateStatus();
    }

    public function resume()
    {
        PaymentController::resume();
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
