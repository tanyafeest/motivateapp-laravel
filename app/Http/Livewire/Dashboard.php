<?php

namespace App\Http\Livewire;

use App\Models\Todolist;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    // private variables
    private readonly \GuzzleHttp\Client $client;

    // public variables
    public $spotifyId;

    public $accessToken;

    public $playLists;

    public $topItems;

    public $toDoList = [false, false, false, false];

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.spotify.com']);
    }

    public function mount()
    {
        // get current state of todo list
        $toDoList = Todolist::where('user_id', Auth::user()->id)->first();
        if ($toDoList) {
            $this->toDoList[0] = $toDoList->message;
            $this->toDoList[1] = $toDoList->chat;
            $this->toDoList[2] = $toDoList->social;
            $this->toDoList[3] = $toDoList->email;
        }

        if (session()->has('temp_spotify_id')) {
            try {
                $this->spotifyId = session('temp_spotify_id');
                $this->accessToken = session('temp_spotify_access_token');

                // dd($this->spotify_id, $this->access_token);
                $headers = [
                    'Authorization' => 'Bearer '.$this->accessToken,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json',
                ];

                // get all playlist of user
                $response = $this->client->get('v1/users/'.$this->spotifyId.'/playlists?offset=0&limit=20', ['headers' => $headers]);

                $stream = $response->getBody();
                $size = $stream->getSize();
                $res = json_decode($stream->read($size), null, 512, JSON_THROW_ON_ERROR);

                $this->playLists = $res->items;

                // get top 10 items of user - default limit = 20, offset = 0, time_range = medium_term(last 6 months)
                $response = $this->client->get('v1/me/top/artists', ['headers' => $headers]);

                $stream = $response->getBody();
                $size = $stream->getSize();
                $res = json_decode($stream->read($size), null, 512, JSON_THROW_ON_ERROR);

                $this->topItems = $res->items;

            } catch (\Throwable $th) {
                dd($th);
            }
        }
    }

    public function checkTodo($type, $action)
    {
        $toDoList = Todolist::where('user_id', Auth::user()->id)->first();

        if (! $toDoList) {
            $toDoList = new Todolist;

            $toDoList->user_id = Auth::user()->id;
        }

        // If action is a toggle, the state should be the opposite of the current value.
        // If action is a check, the state should be true
        switch ($type) {
            case 'message':
                $toDoList->message = $action == 'toggle' ? ! $toDoList->message : true;
                break;
            case 'chat':
                $this->toDoList[1] = $toDoList->chat = $action == 'toggle' ? ! $toDoList->chat : true;
                break;
            case 'social':
                $this->toDoList[2] = $toDoList->social = $action == 'toggle' ? ! $toDoList->social : true;
                break;
            case 'email':
                $toDoList->email = $action == 'toggle' ? ! $toDoList->email : true;
                break;
        }

        $toDoList->save();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
