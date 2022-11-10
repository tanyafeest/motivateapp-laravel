<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;

class Dashboard extends Component
{
    public $spotify_id;
    public $access_token;
    private $client;
    public $playLists;
    public $topItems;

    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.spotify.com']);
    }

    public function mount()
    {
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

    public function test() {
        $id = 5;

        
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
