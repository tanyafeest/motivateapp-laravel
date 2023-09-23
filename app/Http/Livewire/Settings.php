<?php

namespace App\Http\Livewire;

use App\Actions\Util\Spotify;
use App\Models\Quote;
use App\Models\Setting;
use App\Models\Track;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Settings extends Component
{
    private $spotify = null;

    public $spotifyStatus = 'DISCONNECTED';

    // search
    public $quoteList = [];

    public $songList = [];

    public $searchQuote = '';

    public $searchSong = '';

    // spotify
    public $spotifyUserTopSongs = [
        'items' => [],
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
        15 => 'Night',
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
        13 => 'Sunday Night',
    ];

    public $monthlyOptions = [
        16 => 'Morning',
        17 => 'Night',
    ];

    // constructor
    public function __construct()
    {
        $this->spotify = new Spotify();
        $this->spotifyStatus = $this->spotify->status();
    }

    // mount
    public function mount()
    {
        $this->isDaily = Auth::user()->setting()->isDaily();
        $this->isWeekly = Auth::user()->setting()->isWeekly();
        $this->isMonthly = Auth::user()->setting()->isMonthly();
        $this->isNever = Auth::user()->setting()->isNever();

        $this->currentSMSFrequency = Auth::user()->setting()->sms_frequency;

        if ($this->spotify->status() == 'CONNECTED') {
            $this->spotifyUserTopSongs = $this->spotify->getTopItems();
        }
        $this->spotifyStatus = $this->spotify->status();
    }

    // render
    public function render()
    {
        abort_if(! Auth::user(), 404);

        return view('livewire.settings');
    }

    // watch search quote
    public function updatedSearchQuote()
    {
        // search quote
        $this->quoteList = Quote::where('category', 'like', '%'.$this->searchQuote.'%')->orWhere('quote', 'like', '%'.$this->searchQuote.'%')->get();
    }

    // watch search song
    public function updatedSearchSong()
    {

        // search song
        if (count($this->spotifyUserTopSongs) >= 10) {

        } else {
            // search track
            if ($this->spotifyStatus == 'CONNECTED') {
                $this->songList = $this->spotify->search($this->searchSong);
            }
            $this->spotifyStatus = $this->spotify->status();
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
        if ($this->spotifyStatus == 'CONNECTED') {
            $this->searchSong = $this->songList[$key]['name'];

            // update setting
            $setting = Setting::firstWhere('user_id', Auth::user()->id);

            if (Track::where('sid', $this->songList[$key]['id'])->exists()) {
                // this track is already exist in database, so we don't need to add this one to db
                $setting->track_id = Track::firstWhere('sid', $this->songList[$key]['id'])->id;
            } else {
                // if not, we need to add to db
                $track = new Track();

                $track->sid = $this->songList[$key]['id'];
                $track->name = $this->songList[$key]['name']; // track name
                $track->external_url = $this->songList[$key]['external_urls']['spotify']; // spotify url
                $track->artist = $this->songList[$key]['artists'][0]['name']; // artist name
                $track->album_img = $this->songList[$key]['album']['images'][0]['url']; // the widest one
                $track->duration = $this->songList[$key]['duration_ms']; // the track length in milliseconds.
                $track->uri = $this->songList[$key]['uri']; // spotify uri

                // get artist detail
                $artist = $this->spotify->artist($this->songList[$key]['artists'][0]['id']);
                $track->artist_img = $artist['images'][2]['url'];

                $track->save();
                $setting->track_id = $track->id;
            }

            $setting->save();
        }

        $this->spotifyStatus = $this->spotify->status();
    }

    // select duration
    public function selectDuration($type = 'daily')
    {
        // select first option of each duration
        $setting = Auth::user()->setting();

        switch ($type) {
            case 'daily':
                if (! Auth::user()->isSubscribed()) {
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
                if (! Auth::user()->isSubscribed()) {
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
        $setting = Auth::user()->setting();
        $setting->sms_frequency = $this->currentSMSFrequency;
        $setting->save();

        if ($this->currentSMSFrequency == 18) {
            $this->isNever = true;
            $this->isDaily = false;
            $this->isWeekly = false;
            $this->isMonthly = false;
        }
    }

    /**
     * Set auto add songs
     *
     *
     * @return void
     */
    public function setAutoAddSongs()
    {
        // We need to add songs to the playlist
        if ($this->spotifyStatus == 'CONNECTED') {
            $user = Auth::user();

            // If user does not have a playlist, we need to add them to custom playlist(name = "Friends & Family (MotiveMob)", description="The F&F MotiveMob playlist is a group of recommended songs by your own "mob" to help motivate you!")
            if (! $user->playlist_id) {
                // TODO: notification(New playlist named Motivemob will be created on your spotify account.)
                $playlist = $this->spotify->createNewPlaylist('Friends & Family (MotiveMob)', "The F&F MotiveMob playlist is a group of recommended songs by your own 'mob' to help motivate you!");

                $user->playlist_id = $playlist['id'];
                $user->save();
            }

            // add songs
            $inspirationGroups = $user->inspirations()
                ->where('is_added_to_playlist', false)
                ->groupBy('track_id');
            $uris = [];

            // --- get uris of songs
            foreach ($inspirationGroups as $key => $group) {
                $uris[] = $group[0]->track->uri;
            }

            if (! count($uris)) {
                return;
            }

            $res = $this->spotify->addTracksToPlaylist(Auth::user()->playlist_id, $uris);

            // --- if success, set the is_added_to_playlist to TRUE
            if ($res) {
                foreach ($inspirationGroups as $key1 => $group) {
                    foreach ($group as $key2 => $inspiration) {
                        $inspiration->is_added_to_playlist = true;
                        $inspiration->save();
                    }
                }

                // set is_auto_add_songs to TRUE
                $setting = Auth::user()->setting();
                $setting->is_auto_add_songs = true;
                $setting->save();
            } else {
                // TODO: notification
            }

        } else {
            // TODO: notification
        }

        $this->spotifyStatus = $this->spotify->status();
    }
}
