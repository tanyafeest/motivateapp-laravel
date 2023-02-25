<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Todolist;
use Illuminate\Support\Facades\Auth;
use Usernotnull\Toast\Concerns\WireToast;

class Dashboard extends Component
{
    use WireToast;
    public $todolist = [false, false, false, false];

    public function mount()
    {
        // get current state of todo list
        $todolist = Todolist::firstWhere('user_id', Auth::user()->id);
        if($todolist) {
            $this->todolist[0] = $todolist->message;
            $this->todolist[1] = $todolist->chat;
            $this->todolist[2] = $todolist->social;
            $this->todolist[3] = $todolist->email;
        }
    }

    public function checkTodo($type, $action)
    {
        $todolist = Todolist::firstWhere('user_id', Auth::user()->id);

        if(!$todolist) {
            $todolist = new Todolist;

            $todolist->user_id = Auth::user()->id;
        }
        
        // If action is a toggle, the state should be the opposite of the current value.
        // If action is a check, the state should be true 
        switch($type) {
            case 'message': 
                $todolist->message = $action == 'toggle' ? !$todolist->message : true;
                break;
            case 'chat': 
                $this->todolist[1] = $todolist->chat = $action == 'toggle' ? !$todolist->chat : true;
                break;
            case 'social': 
                $this->todolist[2] = $todolist->social = $action == 'toggle' ? !$todolist->social : true;
                break;
            case 'email': 
                $todolist->email = $action == 'toggle' ? !$todolist->email : true;
                break;
        }

        $todolist->save();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
