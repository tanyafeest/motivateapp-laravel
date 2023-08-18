<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Inspiration;
use App\Actions\Util\Spotify;
use Spatie\Browsershot\Browsershot;
use Illuminate\Support\Facades\Storage;
class InspirationCard extends Component
{
    private $spotify = null;
    public $spotifyStatus = 'DISCONNECTED';
    public $cardId;
    public $inspiration;

    /**
     * Mount
     */
    public function mount()
    {
        $this->spotify = new Spotify();
        $this->spotifyStatus = $this->spotify->status();

        $this->inspiration = Inspiration::find($this->cardId);
    }

    /**
     * Render
     */
    public function render()
    {
        return view('livewire.inspiration-card');
    }

    /**
     * Set current track id on session
     * 
     * @param Integer $id 
     * */ 
    public function handleSetCurrentTrack($id)
    {
        session(['temp_current_track' => $id]);
        return redirect()->intended(route('player'));
    }

    /**
     * Add song to the playlist
     * 
     * @param Integer $inspirationId
     */
    public function addSongToPlaylist($inspirationId)
    {
        $inspiration = Inspiration::find($inspirationId);

        // check already added to the playlist
        if($inspiration->is_added_to_playlist) {
            // TODO: notification
            dd("already addeed");
            return;
        }

        $uris = [
            $inspiration->track->uri
        ];

        if($spotifyStatus == 'CONNECTED') {
            $user = Auth::user();

            // If user does not have a playlist, we need to add them to custom playlist(name = "Friends & Family (MotiveMob)", description="The F&F MotiveMob playlist is a group of recommended songs by your own "mob" to help motivate you!")
            if(!$user->playlist_id) {
                // TODO: notification(New playlist named Motivemob will be created on your spotify account.)
                $playlist = $this->spotify->createNewPlaylist("Friends & Family (MotiveMob)", "The F&F MotiveMob playlist is a group of recommended songs by your own 'mob' to help motivate you!");
                
                $user->playlist_id = $playlist['id'];
                $user->save();
            }

            $res = $this->spotify->addSongToPlaylist($user->playlist_id, $uris);
            if($res) {
                // TODO: success notification
            } else {
                // TODO: failed notification
            }
        }

        $this->spotifyStatus = $this->spotify->status();
    }

    /**
     * Screenshot
     * 
     * @param Integer $id
     */
    public function screenshot($id)
    {
        $filename = Auth::user()->name . '.png';

        Browsershot::url(config('app.url') . 'screenshot/' . $id)
            ->windowSize(1080, 1080)
            ->save(storage_path('app/public') . $filename);

        // download
        return Storage::disk('public')->download($filename);
    }
}
