<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use App\Models\Todolist;

class Dashboard extends Component
{
    // private variables
    private $client;

    // public variables
    public $spotify_id;
    public $access_token;
    public $playLists;
    public $topItems;
    public $todolist = [false, false, false, false];

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.spotify.com']);
    }

    public function mount()
    {
        // get current state of todo list
        $todolist = Todolist::where('user_id', Auth::user()->id)->first();
        if($todolist) {
            $this->todolist[0] = $todolist->message;
            $this->todolist[1] = $todolist->chat;
            $this->todolist[2] = $todolist->social;
            $this->todolist[3] = $todolist->email;
        }

        if(session()->has("temp_spotify_id")) {
            try {
                $this->spotify_id = session("temp_spotify_id");
                $this->access_token = session("temp_spotify_access_token");

                // dd($this->spotify_id, $this->access_token);
                $headers = [
                    'Authorization' => 'Bearer ' . $this->access_token,
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ];

                // get all playlist of user
                $response = $this->client->get("v1/users/" . $this->spotify_id ."/playlists?offset=0&limit=20", ['headers' => $headers]);

                if($stream = $response->getBody()) {
                    $size = $stream->getSize();
                    $res = json_decode($stream->read($size));

                    $this->playLists = $res->items;
                }

                // get top 10 items of user - default limit = 20, offset = 0, time_range = medium_term(last 6 months)
                $response = $this->client->get("v1/me/top/artists", ['headers' => $headers]);

                if($stream = $response->getBody()) {
                    $size = $stream->getSize();
                    $res = json_decode($stream->read($size));

                    $this->topItems = $res->items;
                }
            } catch (\Throwable $th) {
                dd($th);
            }
        }
    }

    public function checkTodo($type)
    {
        $todolist = Todolist::where('user_id', Auth::user()->id)->first();

        if(!$todolist) {
            $todolist = new Todolist;

            $todolist->user_id = Auth::user()->id;
        }
        
        switch($type) {
            case 'message': 
                $todolist->message = !$todolist->message;
                break;
            case 'chat': 
                $todolist->chat = !$todolist->chat;
                break;
            case 'social': 
                $todolist->social = !$todolist->social;
                break;
            case 'email': 
                $todolist->email = !$todolist->email;
                break;
        }

        $todolist->save();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
