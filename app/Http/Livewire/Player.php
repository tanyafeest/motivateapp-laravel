<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Track;
use GuzzleHttp\Client;

class Player extends Component
{
    public $currentTrack = null;

    // mount
    public function mount()
    {
        if(session()->has('temp_current_track')) {
            // if selected song is exist, the player will handle the song
            // get current track's embedable widget
            try {

            } catch (\Throwable $th) {
                //throw $th;
            }
        } else {
            // if the user did not select any song, the player will handle the first song.
            if(count(Auth::user()->tracks())) {
                $firstTrack = Auth::user()->tracks()[0];
                $this->currentTrack = [
                    "album_img" => $firstTrack['album_img'],
                    "artist_img" => $firstTrack['artist_img'],
                    "artist_name" => $firstTrack['artist'],
                    "name" => $firstTrack['name'],
                    "duration" => date("H:i:s", $firstTrack['duration'] / 1000)
                ];
            } else {
                $this->currentTrack = null;
            }
        }
    }

    // set current track
    public function handleSetCurrentTrack($id)
    {
        $track = Track::find($id);
        $this->currentTrack = [
            "album_img" => $track['album_img'],
            "artist_img" => $track['artist_img'],
            "artist_name" => $track['artist'],
            "name" => $track['name'],
            "duration" => date("H:i:s", $track['duration'] / 1000)
        ];
    }

    public function render()
    {
        return view('livewire.player');
    }
}
