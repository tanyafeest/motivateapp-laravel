<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Quote;
use App\Models\Track;
use App\Models\User;

class Inspiration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'sharedby_user_id',
        'quotes_id',
        'track_id'
    ];

    /**
     * The attributes that are nullable.
     *
     * @var string[]
     */
    protected $nullable = [
        'quotes_id'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'is_added_to_playlist' => 'boolean'
    ];

    // get quote
    public function quote() {
        return $this->belongsTo(Quote::class);
    }

    // get track
    public function track() {
        return $this->belongsTo(Track::class);
    }

    // get sharedby user
    public function sharedbyUser() {
        return $this->belongsTo(User::class, 'sharedby_user_id');
    }

    /**
     * Scope a query to only include added to playlist.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeIsAddedToPlaylist($query)
    {
        $query->where('is_added_to_playlist', true);
    }

    /**
     * Scope a query to only include not added to playlist.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return void
     */
    public function scopeIsNotAddedToPlaylist($query)
    {
        $query->where('is_added_to_playlist', false);
    }
}
