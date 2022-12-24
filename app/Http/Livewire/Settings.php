<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Exception;
use GuzzleHttp\Client;
use Livewire\Component;
use App\Models\Quote;
use App\Models\Setting;
use App\Models\Track;

class Settings extends Component
{
    // http
    private $client;
    public $headers;

    // search
    public $quoteList = [];
    public $songList = [];
    public $searchQuote = "";
    public $searchSong = "";

    // spotify
    public $spotifyId = null;
    public $spotifyAccessToken = null;
    public $spotifyUserTopSongs = [
        'items' => []
    ];

    // setting flags
    public $isDaily = false;
    public $isWeekly = false;
    public $isMonthly = false;
    public $isNever = false;

    // current sms frequency
    public $currentSMSFrequency = null;
    
    // sms frequency options
    public $dailyOptions = [
        14 => 'Morning',
        15 => 'Night'
    ];
    public $weeklyOptions = [
        0 => 'Monday Morning',
        1 => 'Monday Night',
        2 => 'Tuesday Morning',
        3 => 'Tuesday Night',
        4 => 'Wednesday Morning',
        5 => 'Wednesday Night',
        6 => 'Thursday Morning',
        7 => 'Thursday Night',
        8 => 'Friday Morning',
        9 => 'Friday Night',
        10 => 'Saturday Morning',
        11 => 'Saturday Night',
        12 => 'Sunday Morning',
        13 => 'Sunday Night'
    ];
    public $monthlyOptions = [
        16 => 'Morning',
        17 => 'Night'
    ];

    // constructor
    public function __construct()
    {
        $this->client = new Client(['base_uri' => 'https://api.spotify.com']);
    }

    // mount
    public function mount()
    {
        $this->isDaily = Auth::user()->setting->isDaily();
        $this->isWeekly = Auth::user()->setting->isWeekly();
        $this->isMonthly = Auth::user()->setting->isMonthly();
        $this->isNever = Auth::user()->setting->isNever();

        $this->currentSMSFrequency = Auth::user()->setting->sms_frequency;

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
                if($e->getCode() == 401) {
                    session()->flash('temp_spotify_status', 'TOKEN_EXPIRED');
                }

                if($e->getCode() == 403) {
                    session()->flash('temp_spotify_status', 'USER_NOT_REGISTERED');
                }
            }
        }
    }

    // render
    public function render()
    {
        return view('livewire.settings');
    }

    // watch search quote
    public function updatedSearchQuote()
    {
        // search quote
        $this->quoteList = Quote::where('category', 'like', '%' . $this->searchQuote . '%')->orWhere('quote', 'like', '%' . $this->searchQuote . '%')->get();
    }

    // watch search song
    public function updatedSearchSong()
    {
        // search song
        if(count($this->spotifyUserTopSongs) >= 10) {

        } else {            
            // search track
            try {
                $response = $this->client->get('v1/search?query=' . $this->searchSong . '&type=track&limit=10&include_external=audio', ['headers' => $this->headers]);

                if($stream = $response->getBody()) {
                    $size = $stream->getSize();
                    $res = json_decode($stream->read($size), true);

                    $this->songList = $res['tracks']['items'];
                }
            } catch (Exception $e) {
                if($e->getCode() == 401) {
                    session()->flash('temp_spotify_status', 'TOKEN_EXPIRED');
                }
            }
        }
    }

    // select quote as default quote
    public function selectQuote($key)
    {
        $this->searchQuote = $this->quoteList[$key]['quote'];

        // update setting
        $setting = Setting::firstWhere('user_id', Auth::user()->id);
        $setting->quote_id = $this->quoteList[$key]['id'];
        $setting->save();
    }

    // select song as default song
    public function selectSong($key)
    {
        try {
            $this->searchSong = $this->songList[$key]['name'];

            // update setting
            $setting = Setting::firstWhere('user_id', Auth::user()->id);

            if(Track::where('sid', $this->songList[$key]['id'])->exists()) {
                // this track is already exist in database, so we don't need to add this one to db
                $setting->track_id = Track::firstWhere('sid', $this->songList[$key]['id'])->id;
            } else {
                // if not, we need to add to db
                $track = new Track;

                $track->sid = $this->songList[$key]['id'];
                $track->name = $this->songList[$key]['name']; // track name
                $track->uri = $this->songList[$key]['external_urls']['spotify']; // spotify url
                $track->artist = $this->songList[$key]['artists'][0]['name']; // artist name
                $track->album_img = $this->songList[$key]['album']['images'][0]['url']; // the widest one
                $track->duration = $this->songList[$key]['duration_ms']; // the track length in milliseconds.

                // get artist image
                $responseA = $this->client->get('v1/artists/' .$this->songList[$key]['artists'][0]['id'], ['headers' => $this->headers]);
                if($streamA = $responseA->getBody()) {
                    $sizeA = $streamA->getSize();
                    $resA = json_decode($streamA->read($sizeA), true);

                    $track->artist_img = $resA['images'][2]['url']; // the smallest one
                }

                $track->save();

                $setting->track_id = $track->id;
            }

            $setting->save();
        } catch (Exception $e) {
            if($e->getCode() == 401) {
                session()->flash('temp_spotify_status', 'TOKEN_EXPIRED');
            }
        }
    }

    // select duration
    public function selectDuration($type = 'daily')
    {
        // select first option of each duration
        $setting = Auth::user()->setting;

        switch($type) {
            case 'daily':
                if(!Auth::user()->isSubscribed()) {
                    break;
                }
                $setting->sms_frequency = 14; // Daily morning
                $this->currentSMSFrequency = 14;
                $this->isDaily = true;
                $this->isWeekly = false;
                $this->isMonthly = false;
                $this->isNever = false;
                break;
            case 'weekly':
                $setting->sms_frequency = 1; // Monday night
                $this->currentSMSFrequency = 1;
                $this->isDaily = false;
                $this->isWeekly = true;
                $this->isMonthly = false;
                $this->isNever = false;
                break;
            case 'monthly':
                if(!Auth::user()->isSubscribed()) {
                    break;
                }
                $setting->sms_frequency = 16; // Monthly morning
                $this->currentSMSFrequency = 16;
                $this->isDaily = false;
                $this->isWeekly = false;
                $this->isMonthly = true;
                $this->isNever = false;
                break;
            default:
                break;
        }

        $setting->save();
    }

    // select option
    public function updatedCurrentSMSFrequency()
    {
        $setting = Auth::user()->setting;
        $setting->sms_frequency = $this->currentSMSFrequency;
        $setting->save();

        if($this->currentSMSFrequency == 18) {
            $this->isNever = true;
            $this->isDaily = false;
            $this->isWeekly = false;
            $this->isMonthly = false;
        }
    }
}