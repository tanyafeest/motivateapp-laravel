<?php

namespace App\Http\Livewire;

use Exception;
use Livewire\Component;
use App\Models\Quote;
use App\Models\User;
use GuzzleHttp\Client;

class Onboarding extends Component
{
    // http
    private $client;
    public $headers;

    // inspiration requester
    public $requester = null;

    // random quote values
    public $randomConfidenceQuote = null;
    public $randomPotentialQuote = null;
    public $randomDeterminationQuote = null;
    public $randomResilienceQuote = null;

    // temporarily quote values
    public $tempQuoteId = null;
    public $tempNewQuote = "";
    public $tempSong = null;

    // spotify
    public $spotifyIsTokenExpired = false;
    public $spotifyId = null;
    public $spotifyAccessToken = null;
    public $spotifyUserTopSongs = null; 

    // serach query for 
    public $search = "";
    public $openDropdown = false;
    public $tracks = [];

    // constructor
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.spotify.com']);
    }

    // mount
    public function mount()
    {   
        // get spotify id and access token if spotify connected
        if(session()->has("temp_spotify_id")) {
            $this->spotifyId = session("temp_spotify_id");
            $this->spotifyAccessToken = session("temp_spotify_access_token");
            $this->spotifyIsTokenExpired = false;

            $this->headers = [
                'Authorization' => 'Bearer ' . $this->spotifyAccessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ];

            // get top 10 items of user - limit = 10, offset = 0, time_range = medium_term(last 6 months)
            $response = $this->client->get("v1/me/top/tracks?limit=10", ['headers' => $this->headers]);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                $this->spotifyUserTopSongs = json_decode($stream->read($size), true);
            }
        }

        // get requester data by share link
        $shareLink = session('temp_inspiration_share_link');
        $this->requester = User::where('share_link', $shareLink)->first();

        // get random quote values
        $this->randomConfidenceQuote = Quote::inRandomOrder()->confidence()->first();
        $this->randomPotentialQuote = Quote::inRandomOrder()->potential()->first();
        $this->randomDeterminationQuote = Quote::inRandomOrder()->determination()->first();
        $this->randomResilienceQuote = Quote::inRandomOrder()->resilience()->first();
    }

    // render
    public function render()
    {
        return view('livewire.onboarding');
    }

    // watch search
    public function updatedSearch()
    {
        if(!$this->search) {
            $this->tracks = [];
            $this->openDropdown = false;
            return;
        }

        // search track
        try {
            $response = $this->client->get('v1/search?query=' . $this->search . '&type=track&limit=5&include_external=audio', ['headers' => $this->headers]);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                $res = json_decode($stream->read($size), true);

                $this->tracks = $res['tracks']['items'];
                $this->openDropdown = true;
            }
        } catch (Exception $e) {
            $this->spotifyIsTokenExpired = true;
        }
    }

    // handle serach focus
    public function handleSearchFocus()
    {
        $this->openDropdown = true;
    }

    // select quote
    public function selectQuote($quoteId = null)
    {
        $this->tempQuoteId = $quoteId;
    }

    // select song
    public function selectSong($key)
    {
        $this->tempSong = $this->tracks[$key];
        $this->search = $this->tempSong['name'];
        $this->openDropdown = false;
    }
}
