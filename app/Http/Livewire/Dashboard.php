<?php

namespace App\Http\Livewire;

use App\Models\Todolist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Usernotnull\Toast\Concerns\WireToast;

class Dashboard extends Component
{
    use WireToast;

    public $todoList = [false, false, false, false];

    public function mount()
    {
        // get current state of todo list
        $todoList = Todolist::firstWhere('user_id', Auth::user()->id);
        if ($todoList) {
            $this->todoList[0] = $todoList->message;
            $this->todoList[1] = $todoList->chat;
            $this->todoList[2] = $todoList->social;
            $this->todoList[3] = $todoList->email;
        }
    }

    public function checkTodo($type, $action)
    {
        abort_if(! Auth::user(), 403);

        $todoList = Todolist::firstWhere('user_id', Auth::user()->id);

        if (! $todoList) {
            $todoList = new Todolist;

            $todoList->user_id = Auth::user()->id;
        }

        // If action is a toggle, the state should be the opposite of the current value.
        // If action is a check, the state should be true
        switch ($type) {
            case 'message':
                $todoList->message = $action == 'toggle' ? ! $todoList->message : true;
                break;
            case 'chat':
                $this->todoList[1] = $todoList->chat = $action == 'toggle' ? ! $todoList->chat : true;
                break;
            case 'social':
                $this->todoList[2] = $todoList->social = $action == 'toggle' ? ! $todoList->social : true;
                break;
            case 'email':
                $todoList->email = $action == 'toggle' ? ! $todoList->email : true;
                break;
        }

        $todoList->save();
    }

    public function render()
    {
        abort_if(! Auth::user(), 404);

        return view('livewire.dashboard');
    }
}
