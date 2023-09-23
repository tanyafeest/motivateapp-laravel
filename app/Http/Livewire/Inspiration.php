<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Inspiration extends Component
{
    // render
    public function render()
    {
        abort_if(! Auth::user(), 404);

        return view('livewire.inspiration');
    }

    // set current track id on session
    public function handleSetCurrentTrack($id)
    {

        session(['temp_current_track' => $id]);

        return redirect()->intended(route('player'));
    }
}
