<?php

namespace App\Http\Livewire;

use App\Http\Controllers\PaymentSubScriptionCancelController;
use App\Http\Controllers\PaymentSubScriptionResumeController;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

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
        abort_if(! Auth::user(), 403);

        (new PaymentSubScriptionCancelController)->__invoke();
        $this->updateStatus();
    }

    // resume subscription
    public function resume()
    {
        abort_if(! Auth::user(), 403);

        (new PaymentSubScriptionResumeController)->__invoke();
        $this->updateStatus();
    }

    public function updateStatus()
    {
        $user = Auth::user();

        abort_if(! $user, 403);
        $this->isSubscribed = $user->isSubscribed();
        $this->isCanceled = $user->isCanceled();
        $this->isEnded = $user->isEnded();
    }

    public function render()
    {
        abort_if(! Auth::user(), 404);

        return view('livewire.upgrade');
    }
}
