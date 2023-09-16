<?php

namespace App\Http\Livewire;

use App\Models\Track;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Player extends Component
{
    public $currentTrack = null;

    // mount
    public function mount()
    {
        //Return if a non-user ends up inside a controller that requires authentication, etc
        abort_if(! Auth::user(), 404);

        if (session()->has('temp_current_track')) {
            // if selected song is exist, the player will handle the song
            // get current track's embedable widget
            $track = Track::find(session('temp_current_track'));
            // dd($track);
            $this->currentTrack = [
                'album_img' => $track['album_img'],
                'artist_img' => $track['artist_img'],
                'artist_name' => $track['artist'],
                'name' => $track['name'],
                'duration' => date('H:i:s', $track['duration'] / 1000),
                'uri' => $track['uri'],
                'external_link' => $track['external_link'],
            ];
        } else {
            // if the user did not select any song, the player will handle the first song.
            if (Auth::user()->inspirations()->count()) {
                $firstTrack = Auth::user()->inspirations()->first()->track;
                $this->currentTrack = [
                    'album_img' => $firstTrack->album_img,
                    'artist_img' => $firstTrack->artisit_img,
                    'artist_name' => $firstTrack->artist,
                    'name' => $firstTrack->name,
                    'duration' => date('H:i:s', $firstTrack->duration / 1000),
                    'uri' => $firstTrack->uri,
                    'external_link' => $firstTrack->external_link,
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
            'album_img' => $track['album_img'],
            'artist_img' => $track['artist_img'],
            'artist_name' => $track['artist'],
            'name' => $track['name'],
            'duration' => date('H:i:s', $track['duration'] / 1000),
            'uri' => $track['uri'],
            'external_link' => $track['external_link'],
        ];
    }

    public function render()
    {
        return view('livewire.player');
    }
}
