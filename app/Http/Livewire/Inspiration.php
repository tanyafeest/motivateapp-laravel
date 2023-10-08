<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Inspiration extends Component
{
    // render
    public function render()
    {
        return view('livewire.inspiration');
    }

    // set current track id on session
    public function handleSetCurrentTrack($id)
    {
        abort_if(! Auth::user(), 403);

        session(['temp_current_track' => $id]);

        return redirect()->intended(route('player'));
    }
}
