<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Track;

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
        'album_name',
        'album_href',
        'quotes_id',
    ];

    /**
     * The attributes that are nullable.
     *
     * @var string[]
     */
    protected $nullable = [
        'album_name',
        'album_href',
        'quotes_id'
    ];

    public function track() {
        return $this->hasOne(Track::class);
    }
}
