<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'sms_frequency',
        'quote_id',
        'track_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'is_auto_add_songs' => 'boolean',
    ];

    // get quote
    public function quote()
    {
        return $this->belongsTo(Quote::class);
    }

    // get track
    public function track()
    {
        return $this->belongsTo(Track::class);
    }

    // sms_frequency is Daily?
    public function isDaily()
    {
        return $this->sms_frequency == 14 || $this->sms_frequency == 15;
    }

    // sms_frequency is Daily?
    public function isWeekly()
    {
        return $this->sms_frequency < 14;
    }

    // sms_frequency is Daily?
    public function isMonthly()
    {
        return $this->sms_frequency == 16 || $this->sms_frequency == 17;
    }

    // sms_frequency is Never?
    public function isNever()
    {
        return $this->sms_frequency == 18;
    }
}
