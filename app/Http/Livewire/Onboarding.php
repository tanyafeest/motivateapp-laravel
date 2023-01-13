<?php

namespace App\Http\Livewire;

use Exception;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\Quote;
use App\Models\User;
use App\Models\Inspiration;
use App\Models\Track;
use App\Actions\Util\Spotify;

class Onboarding extends Component
{
    private $spotify = null;
    public $spotifyStatus = 'DISCONNECTED';

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
    public $isNewQuote = false;

    // spotify
    public $spotifyUserTopSongs = [
        'items' => []
    ];

    // serach query for 
    public $search = "";
    public $tracks = [];

    // constructor
    public function __construct()
    {
        $this->spotify = new Spotify();
        $this->spotifyStatus = $this->spotify->status();
    }

    // mount
    public function mount()
    {
        if($this->spotify->status() == 'CONNECTED') {
            $this->spotifyUserTopSongs = $this->spotify->getTopItems();
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
        
        $this->status = $this->spotify->status();

        // search track
        if($this->spotify->status() == 'CONNECTED') {
            $this->tracks = $this->spotify->search($this->search);
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
        $this->status = $this->spotify->status();
        
        // get track detail from Spotify API
        if($this->spotify->status() == 'CONNECTED') {
            $track = new Track;
            $inspiration = new Inspiration;

            // get track detail
            $t = $this->spotify->track($this->tempSong);

            if(Track::where('sid', $this->tempSong)->exists()) {
                $track = Track::where('sid', $this->tempSong)->first();
            } else {
                // get artist detail
                $artist = $this->spotify->artist($t['artists'][0]['id']);

                $track->sid = $this->tempSong;
                $track->name = $t['name']; // track name
                $track->external_url = $t['external_urls']['spotify']; // spotify url
                $track->artist = $t['artists'][0]['name']; // artist name
                $track->album_img = $t['album']['images'][0]['url']; // the widest one
                $track->duration = $t['duration_ms']; // the track length in milliseconds.
                $track->uri = $t['uri']; // spotify uri
                $track->artist_img = $artist['images'][2]['url'];

                $track->save();
            }

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
            $inspiration->track_id = $track->id;

            $inspiration->save();

            // clear session of inspiration onboarding.
            session()->forget('temp_inspiration_share_link');
            session()->forget('temp_inspiration_full_name');
        }
    }

    // goto dashboard
    public function gotoDashboard()
    {
        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
