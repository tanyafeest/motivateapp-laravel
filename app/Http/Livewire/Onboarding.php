<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\Quote;
use App\Models\User;
use App\Models\Inspiration;
use App\Providers\RouteServiceProvider;

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
    public $isNewQuote = false;
    public $tempSong = null;

    // spotify
    public $spotifyId = null;
    public $spotifyAccessToken = null;
    public $spotifyUserTopSongs = [
        'items' => []
    ];

    // serach query for 
    public $search = "";
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

            $this->headers = [
                'Authorization' => 'Bearer ' . $this->spotifyAccessToken,
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'
            ];

            // get top 10 items of user - limit = 10, offset = 0, time_range = medium_term(last 6 months)
            try {
                $response = $this->client->get("v1/me/top/tracks?limit=10", ['headers' => $this->headers]);

                if($stream = $response->getBody()) {
                    $size = $stream->getSize();
                    $this->spotifyUserTopSongs = json_decode($stream->read($size), true);
                }
            } catch (Exception $e) {
                // refresh token
                if($e->getCode() == 401) {
                    session()->flash('temp_spotify_status', 'TOKEN_EXPIRED');
                }

                if($e->getCode() == 403) {
                    session()->flash('temp_spotify_status', 'USER_NOT_REGISTERED');
                }
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
            return;
        }

        // search track
        try {
            $response = $this->client->get('v1/search?query=' . $this->search . '&type=track&limit=5&include_external=audio', ['headers' => $this->headers]);

            if($stream = $response->getBody()) {
                $size = $stream->getSize();
                $res = json_decode($stream->read($size), true);

                $this->tracks = $res['tracks']['items'];
            }
        } catch (Exception $e) {
            if($e->getCode() == 401) {
                session()->flash('temp_spotify_status', 'TOKEN_EXPIRED');
            }
        }
    }

    // select quote
    public function selectQuote($quoteId = null)
    {
        $this->tempQuoteId = $quoteId;
    }

    // select song
    public function selectSong($key)
    {
        $this->tempSong = $this->tracks[$key]['id'];
        $this->search = $this->tracks[$key]['name'];
    }

    // set isNew true
    public function handleIsNew()
    {
        $this->isNewQuote = true;
    }

    // select top song and submit
    public function selectTopSongAndSubmit($songId)
    {
        $this->tempSong = $songId;
        $this->submit();
    }

    // submit
    public function submit()
    {
        $inspiration = new Inspiration;

        if($this->isNewQuote) {
            // create new quote by the auth
            $quote = new Quote;
            $quote->category = "Custom";
            $quote->quote = $this->tempNewQuote;
            $quote->author = Auth::user()->name;

            $quote->save();
            $this->tempQuoteId = $quote->id;
        }

        $inspiration->user_id = $this->requester->id;
        $inspiration->quote_id = $this->tempQuoteId;
        $inspiration->sharedby_user_id = Auth::user()->id;
        $inspiration->track_id = $this->tempSong;

        $inspiration->save();

        // clear session of inspiration onboarding.
        session()->forget('temp_inspiration_share_link');
        session()->forget('temp_inspiration_full_name');
    }

    // goto dashboard
    public function gotoDashboard()
    {
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
