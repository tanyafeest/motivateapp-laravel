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
            /** @phpstan-ignore-next-line */
            if (Auth::user()->inspirations->count()) {
                /** @phpstan-ignore-next-line */
                $firstTrack = Auth::user()->inspirations[0]->track;
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
        abort_if(! Auth::user(), 403);

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
        abort_if(! AUth::user(), 404);

        return view('livewire.player');
    }
}
